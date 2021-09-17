<?php
/**
 * LaraClassified - Geo Classified Ads Software
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

namespace App\Http\Controllers\Admin;

use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\PageRequest as StoreRequest;
use App\Http\Requests\Admin\PageRequest as UpdateRequest;

class PageController extends PanelController
{
	public function setup()
	{
		/*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->xPanel->setModel('App\Models\Page');
		$this->xPanel->setRoute(admin_uri('pages'));
		$this->xPanel->setEntityNameStrings(trans('admin.page'), trans('admin.pages'));
		$this->xPanel->enableReorder('name', 1);
		$this->xPanel->allowAccess(['reorder']);
		if (!request()->input('order')) {
			$this->xPanel->orderBy('lft', 'ASC');
		}
		
		$this->xPanel->addButtonFromModelFunction('top', 'bulk_delete_btn', 'bulkDeleteBtn', 'end');
		
		// Filters
		// -----------------------
		$this->xPanel->disableSearchBar();
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'name',
			'type'  => 'text',
			'label' => mb_ucfirst(trans('admin.Name')),
		],
			false,
			function ($value) {
				$this->xPanel->addClause('where', function ($query) use ($value) {
					$query->where('name', 'LIKE', "%$value%")
						->orWhere('title', 'LIKE', "%$value%");
				});
			});
		// -----------------------
		$this->xPanel->addFilter([
			'name'  => 'status',
			'type'  => 'dropdown',
			'label' => trans('admin.Status'),
		], [
			1 => trans('admin.Activated'),
			2 => trans('admin.Unactivated'),
		], function ($value) {
			if ($value == 1) {
				$this->xPanel->addClause('where', 'active', '=', 1);
			}
			if ($value == 2) {
				$this->xPanel->addClause('where', function ($query) {
					$query->where(function ($query) {
						$query->where('active', '!=', 1)->orWhereNull('active');
					});
				});
			}
		});
		
		/*
		|--------------------------------------------------------------------------
		| COLUMNS AND FIELDS
		|--------------------------------------------------------------------------
		*/
		// COLUMNS
		$this->xPanel->addColumn([
			'name'  => 'id',
			'label' => '',
			'type'  => 'checkbox',
			'orderable' => false,
		]);
		$this->xPanel->addColumn([
			'name'          => 'name',
			'label'         => trans('admin.Name'),
			'type'          => 'model_function',
			'function_name' => 'getNameHtml',
		]);
		$this->xPanel->addColumn([
			'name'  => 'title',
			'label' => trans('admin.Title'),
		]);
		$this->xPanel->addColumn([
			'name'          => 'active',
			'label'         => trans('admin.Active'),
			'type'          => "model_function",
			'function_name' => 'getActiveHtml',
			'on_display'    => 'checkbox',
		]);
		
		// FIELDS
		$this->xPanel->addField([
			'name'       => 'name',
			'label'      => trans('admin.Name'),
			'type'       => 'text',
			'attributes' => [
				'placeholder' => trans('admin.Name'),
			],
		]);
		$this->xPanel->addField([
			'name'              => 'slug',
			'label'             => trans('admin.Slug'),
			'type'              => 'text',
			'attributes'        => [
				'placeholder' => trans('admin.Will be automatically generated from your name, if left empty'),
			],
			'hint'              => trans('admin.Will be automatically generated from your name, if left empty'),
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
		]);
		$this->xPanel->addField([
			'name'              => 'external_link',
			'label'             => trans('admin.External Link'),
			'type'              => 'text',
			'attributes'        => [
				'placeholder' => "http://",
			],
			'hint'              => trans('admin.Redirect this page to the URL above') . ' ' . trans('admin.Leave this field empty if you do not want redirect this page'),
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
			],
		]);
		$this->xPanel->addField([
			'name'       => 'title',
			'label'      => trans('admin.Title'),
			'type'       => 'text',
			'attributes' => [
				'placeholder' => trans('admin.Title'),
			],
		]);
		$wysiwygEditor = config('settings.other.wysiwyg_editor');
		$wysiwygEditorViewPath = '/views/vendor/admin/panel/fields/' . $wysiwygEditor . '.blade.php';
		$this->xPanel->addField([
			'name'       => 'content',
			'label'      => trans('admin.Content'),
			'type'       => ($wysiwygEditor != 'none' && file_exists(resource_path() . $wysiwygEditorViewPath))
				? $wysiwygEditor
				: 'textarea',
			'attributes' => [
				'placeholder' => trans('admin.Content'),
				'id'          => 'pageContent',
				'rows'        => 20,
			],
		]);
		$this->xPanel->addField([
			'name'  => 'type',
			'label' => trans('admin.Type'),
			'type'  => 'enum',
		]);
		$this->xPanel->addField([
			'name'   => 'picture',
			'label'  => trans('admin.Picture'),
			'type'   => 'image',
			'upload' => true,
			'disk'   => 'public',
		]);
		$this->xPanel->addField([
			'name'                => 'name_color',
			'label'               => trans('admin.Page Name Color'),
			'type'                => 'color_picker',
			'colorpicker_options' => [
				'customClass' => 'custom-class',
			],
			'wrapperAttributes'   => [
				'class' => 'form-group col-md-6',
			],
		]);
		$this->xPanel->addField([
			'name'                => 'title_color',
			'label'               => trans('admin.Page Title Color'),
			'type'                => 'color_picker',
			'colorpicker_options' => [
				'customClass' => 'custom-class',
			],
			'wrapperAttributes'   => [
				'class' => 'form-group col-md-6',
			],
		]);
		$this->xPanel->addField([
			'name'  => 'target_blank',
			'label' => trans('admin.Open the link in new window'),
			'type'  => 'checkbox',
		]);
		$this->xPanel->addField([
			'name'  => 'excluded_from_footer',
			'label' => trans('admin.Exclude from footer'),
			'type'  => 'checkbox',
		]);
		$this->xPanel->addField([
			'name'  => 'active',
			'label' => trans('admin.Active'),
			'type'  => 'checkbox',
		]);
	}
	
	public function store(StoreRequest $request)
	{
		return parent::storeCrud();
	}
	
	public function update(UpdateRequest $request)
	{
		return parent::updateCrud();
	}
}
