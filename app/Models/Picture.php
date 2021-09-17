<?php
/**
 * JobClass - Job Board Web Application
 * Copyright (c) BedigitCom. All Rights Reserved
 *
 * Website: https://bedigit.com
 *
 * LICENSE
 * -------
 * This software is furnished under a license and may be used and copied
 * only in accordance with the terms of such license and with the inclusion
 * of the above copyright notice. If you Purchased from CodeCanyon,
 * Please read the full License from here - http://codecanyon.net/licenses/standard
 */

namespace App\Models;

use App\Helpers\Files\Storage\StorageDisk;
use App\Helpers\UrlGen;
use App\Models\Scopes\LocalizedScope;
use App\Models\Scopes\ReviewedScope;
use App\Models\Scopes\VerifiedScope;
use App\Models\Scopes\ActiveScope;
use App\Observers\PictureObserver;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
use Larapen\Admin\app\Models\Traits\Crud;

class Picture extends BaseModel
{
	use Crud, HasFactory;
	
	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'pictures';
	
	/**
	 * The primary key for the model.
	 *
	 * @var string
	 */
	// protected $primaryKey = 'id';
	
	/**
	 * Indicates if the model should be timestamped.
	 *
	 * @var boolean
	 */
	// public $timestamps = false;
	
	/**
	 * The attributes that aren't mass assignable.
	 *
	 * @var array
	 */
	protected $guarded = ['id'];
	
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['post_id', 'filename', 'active'];
	
	/**
	 * The attributes that should be hidden for arrays
	 *
	 * @var array
	 */
	// protected $hidden = [];
	
	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = ['created_at', 'updated_at'];
	
	
	/*
	|--------------------------------------------------------------------------
	| FUNCTIONS
	|--------------------------------------------------------------------------
	*/
	protected static function boot()
	{
		parent::boot();
		
		Picture::observe(PictureObserver::class);
		
		static::addGlobalScope(new ActiveScope());
		static::addGlobalScope(new LocalizedScope());
	}
	
	public function getFilenameHtml()
	{
		// Get picture
		$out = '<img src="' . imgUrl($this->filename, 'small') . '" style="width:auto; max-height:90px;" class="img-rounded">';
		
		return $out;
	}
	
	public function getPostTitleHtml()
	{
		if ($this->post) {
			// $postUrl = url(UrlGen::postUri($this->post));
			$postUrl = dmUrl($this->post->country_code, UrlGen::postPath($this->post));
			
			return '<a href="' . $postUrl . '" target="_blank">' . $this->post->title . '</a>';
		} else {
			return 'no-link';
		}
	}
	
	public function getCountryHtml()
	{
		$out = '';
		
		if (isset($this->post, $this->post->country_code)) {
			$countryName = (isset($this->post->country) && isset($this->post->country->name)) ? $this->post->country->name : null;
			$countryName = (!empty($countryName)) ? $countryName : $this->post->country_code;
			
			$iconPath = 'images/flags/16/' . strtolower($this->post->country_code) . '.png';
			if (file_exists(public_path($iconPath))) {
				$out = '';
				$out .= '<a href="' . dmUrl($this->post->country_code, '/', true, true) . '" target="_blank">';
				$out .= '<img src="' . url($iconPath) . getPictureVersion() . '" data-toggle="tooltip" title="' . $countryName . '">';
				$out .= '</a>';
				
				return $out;
			} else {
				return $this->post->country_code;
			}
		}
		
		return $out;
	}
	
	public function editPostBtn($xPanel = false)
	{
		$out = '';
		
		if ($this->post) {
			$url = admin_url('posts/' . $this->post->id . '/edit');
			
			$msg = trans('admin.Edit the ad of this picture');
			$tooltip = ' data-toggle="tooltip" title="' . $msg . '"';
			
			$out .= '<a class="btn btn-xs btn-light" href="' . $url . '"' . $tooltip . '>';
			$out .= '<i class="fa fa-edit"></i> ';
			$out .= mb_ucfirst(trans('admin.Edit the ad'));
			$out .= '</a>';
		}
		
		return $out;
	}
	
	/*
	|--------------------------------------------------------------------------
	| RELATIONS
	|--------------------------------------------------------------------------
	*/
	public function post()
	{
		return $this->belongsTo(Post::class, 'post_id');
	}
	
	/*
	|--------------------------------------------------------------------------
	| SCOPES
	|--------------------------------------------------------------------------
	*/
	
	/*
	|--------------------------------------------------------------------------
	| ACCESSORS
	|--------------------------------------------------------------------------
	*/
	public function getFilenameFromOldPath()
	{
		if (!isset($this->attributes) || !isset($this->attributes['filename'])) {
			return null;
		}
		
		$value = $this->attributes['filename'];
		
		// Fix path
		$value = str_replace('uploads/pictures/', '', $value);
		$value = str_replace('pictures/', '', $value);
		$value = 'pictures/' . $value;
		
		$disk = StorageDisk::getDisk();
		
		if (!$disk->exists($value)) {
			$value = null;
		}
		
		return $value;
	}
	
	public function getFilenameAttribute()
	{
		// OLD PATH
		$value = $this->getFilenameFromOldPath();
		if (!empty($value)) {
			return $value;
		}
		
		// NEW PATH
		if (!isset($this->attributes) || !isset($this->attributes['filename'])) {
			return null;
		}
		
		$value = $this->attributes['filename'];
		
		$disk = StorageDisk::getDisk();
		
		if (!$disk->exists($value)) {
			$value = config('larapen.core.picture.default');
		}
		
		return $value;
	}
	
	/*
	|--------------------------------------------------------------------------
	| MUTATORS
	|--------------------------------------------------------------------------
	*/
	public function setFilenameAttribute($value)
	{
		$disk = StorageDisk::getDisk();
		$attribute_name = 'filename';
		
		if (empty($this->post)) {
			$this->attributes[$attribute_name] = null;
		}
		
		// Get ad details
		$post = Post::withoutGlobalScopes([VerifiedScope::class, ReviewedScope::class])->where('id', $this->post_id)->first();
		if (empty($post)) {
			$this->attributes[$attribute_name] = null;
			
			return false;
		}
		
		// Path
		$destination_path = 'files/' . strtolower($post->country_code) . '/' . $post->id;
		
		// If the image was erased
		if (empty($value)) {
			// delete the image from disk
			if (!Str::contains($this->{$attribute_name}, config('larapen.core.picture.default'))) {
				$disk->delete($this->{$attribute_name});
			}
			
			// set null in the database column
			$this->attributes[$attribute_name] = null;
			
			return false;
		}
		
		// Check the image file
		if ($value == url('/')) {
			$this->attributes[$attribute_name] = null;
			
			return false;
		}
		
		// If laravel request->file('filename') resource OR base64 was sent, store it in the db
		try {
			if (fileIsUploaded($value)) {
				// Get file extension
				$extension = getUploadedFileExtension($value);
				if (empty($extension)) {
					$extension = 'jpg';
				}
				
				// Image quality
				$imageQuality = config('settings.upload.image_quality', 90);
				
				// Image default dimensions
				$width = (int)config('settings.upload.img_resize_width', 1000);
				$height = (int)config('settings.upload.img_resize_height', 1000);
				
				// Other parameters
				$ratio = config('settings.upload.img_resize_ratio', '1');
				$upSize = config('settings.upload.img_resize_upsize', '0');
				
				// Init. Intervention
				$image = Image::make($value);
				
				// Get the image original dimensions
				$imgWidth = (int)$image->width();
				$imgHeight = (int)$image->height();
				
				// Fix the Image Orientation
				if (exifExtIsEnabled()) {
					$image = $image->orientate();
				}
				
				// If the original dimensions are higher than the resize dimensions
				// OR the 'upsize' option is enable, then resize the image
				if ($imgWidth > $width || $imgHeight > $height || $upSize == '1') {
					// Resize
					$image = $image->resize($width, $height, function ($constraint) use ($ratio, $upSize) {
						if ($ratio == '1') {
							$constraint->aspectRatio();
						}
						if ($upSize == '1') {
							$constraint->upsize();
						}
					});
				}
				
				// Encode the Image!
				$image = $image->encode($extension, $imageQuality);
				
				// Generate a filename.
				$filename = md5($value . time()) . '.' . $extension;
				
				// Store the image on disk.
				$disk->put($destination_path . '/' . $filename, $image->stream()->__toString());
				
				// Save the path to the database
				$this->attributes[$attribute_name] = $destination_path . '/' . $filename;
			} else {
				// Retrieve current value without upload a new file.
				if (Str::startsWith($value, config('larapen.core.picture.default'))) {
					$value = null;
				} else {
					if (!Str::startsWith($value, 'files/')) {
						$value = $destination_path . last(explode($destination_path, $value));
					}
				}
				$this->attributes[$attribute_name] = $value;
			}
		} catch (\Exception $e) {
			flash($e->getMessage())->error();
			$this->attributes[$attribute_name] = null;
			
			return false;
		}
	}
}
