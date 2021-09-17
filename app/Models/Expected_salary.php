<?php

namespace App\Models;

use App\Models\Scopes\LocalizedScope;
use App\Models\Traits\CountryTrait;
use App\Observers\SubAdmin1Observer;
use Larapen\Admin\app\Models\Traits\Crud;
use Larapen\Admin\app\Models\Traits\SpatieTranslatable\HasTranslations;

class Expected_salary extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
	use Crud;

    protected $table = 'expected_salary';

	protected $fillable = [
		'min','max'
	];
	
	public function deleteBtn($xPanel = false)
	{
		if (strtolower($this->name) == strtolower(Role::getSuperAdminRole())) {
			return null;
		}
		
		$url = admin_url('resume/expectedsalary/' . $this->id);
		
		$out = '';
		$out .= '<a href="' . $url . '" class="btn btn-xs btn-danger" data-button-type="delete">';
		$out .= '<i class="fa fa-trash"></i> ';
		$out .= trans('admin.delete');
		$out .= '</a>';
		
		return $out;
	}
    
}
