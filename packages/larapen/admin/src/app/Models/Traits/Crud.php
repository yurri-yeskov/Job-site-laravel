<?php

namespace Larapen\Admin\app\Models\Traits;

trait Crud
{
	use HasEnumFields;
	use HasRelationshipFields;
	use HasUploadFields;
	use HasFakeFields;
	use HasTranslatableFields;
	
	/*
    |--------------------------------------------------------------------------
    | Translation Methods
    |--------------------------------------------------------------------------
    */
	
	
	/*
	|--------------------------------------------------------------------------
	| Methods for ALL models
	|--------------------------------------------------------------------------
	*/
	
	/**
	 * Check if the attribute exists
	 *
	 * @param $attr
	 * @return bool
	 */
	public function hasAttribute($attr)
	{
		return array_key_exists($attr, $this->attributes);
	}
	
	/**
	 * @param bool $xPanel
	 * @return string
	 */
	public function bulkDeleteBtn($xPanel = false)
	{
		// Button
		$out = '';
		$out .= '<button id="bulkDeleteBtn" class="btn btn-danger shadow">';
		$out .= '<i class="fas fa-times"></i> ';
		$out .= trans('admin.Delete Selected Items');
		$out .= '</button>';
		
		return $out;
	}
}
