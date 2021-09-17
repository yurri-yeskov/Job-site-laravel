<?php

namespace App\Models;

use App\Models\Scopes\LocalizedScope;
use App\Models\Traits\CountryTrait;
use App\Observers\SubAdmin1Observer;
use Larapen\Admin\app\Models\Traits\Crud;
use Larapen\Admin\app\Models\Traits\SpatieTranslatable\HasTranslations;

class Work_industry extends BaseModel
{
	
	use Crud;
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'work_industires';
	
	protected $fillable = [
		'type',
	];
	
	public function deleteBtn($xPanel = false)
	{
		if (strtolower($this->name) == strtolower(Role::getSuperAdminRole())) {
			return null;
		}
		
		$url = admin_url('resume/industry/' . $this->id);
		
		$out = '';
		$out .= '<a href="' . $url . '" class="btn btn-xs btn-danger" data-button-type="delete">';
		$out .= '<i class="fa fa-trash"></i> ';
		$out .= trans('admin.delete');
		$out .= '</a>';
		
		return $out;
	}
    
}
