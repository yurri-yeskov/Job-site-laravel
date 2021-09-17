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

namespace App\Http\Controllers\Admin;

use App\Helpers\Categories\AdjacentToNested;
use App\Models\Category;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\CategoryRequest as StoreRequest;
use App\Http\Requests\Admin\CategoryRequest as UpdateRequest;
use Prologue\Alerts\Facades\Alert;
use Illuminate\Support\Facades\Cache;

class CategoryController extends PanelController
{
	public $parentId = 0;
	public $entryId = null;
	
	public function setup()
	{
		// Get the Parent ID & Current entry ID (If exists)
		if (request()->segment(4) == 'subcategories') {
			$this->parentId = request()->segment(3);
			$this->entryId = request()->segment(5);
		} else {
			$this->parentId = null;
			$this->entryId = request()->segment(3);
		}
		
		// Finding the good URL
		if (request()->segment(4) == 'edit' || request()->segment(6) == 'edit') {
			$entry = Category::find($this->entryId);
			if (!empty($entry)) {
				if (isset($entry->parent) && !empty($entry->parent)) {
					if (empty($this->parentId)) {
						$goodId = $entry->parent->id;
						$goodChildId = $entry->id;
					} else {
						if ($this->parentId != $entry->parent->id) {
							$goodId = $entry->parent->id;
							$goodChildId = $entry->id;
						}
					}
					if (isset($goodId, $goodChildId)) {
						$uri = 'categories/' . $goodId . '/subcategories/' . $goodChildId . '/edit';
						
						redirectUrl(admin_url($uri), 301, config('larapen.core.noCacheHeaders'));
					}
				} else {
					if (!empty($this->parentId)) {
						$goodId = $this->entryId;
						$uri = 'categories/' . $goodId . '/edit';
						
						redirectUrl(admin_url($uri), 301, config('larapen.core.noCacheHeaders'));
					}
				}
			}
		}
		
		// Get Parent Category name
		$parent = Category::find($this->parentId);
		
		/*
		|--------------------------------------------------------------------------
		| BASIC CRUD INFORMATION
		|--------------------------------------------------------------------------
		*/
		$this->xPanel->setModel('App\Models\Category');
		$this->xPanel->with(['children']);
		if (empty($parent)) {
			$this->xPanel->addClause('where', function ($query) {
				$query->where('parent_id', 0)->orWhereNull('parent_id');
			});
			$this->xPanel->setRoute(admin_uri('categories'));
			$this->xPanel->setEntityNameStrings(trans('admin.category'), trans('admin.categories'));
			$this->xPanel->allowAccess(['reorder', 'details_row']);
		} else {
			$this->xPanel->setRoute(admin_uri('categories/' . $this->parentId . '/subcategories'));
			$this->xPanel->setEntityNameStrings(
				trans('admin.subcategory') . ' &rarr; ' . '<strong>' . $parent->name . '</strong>',
				trans('admin.subcategories') . ' &rarr; ' . '<strong>' . $parent->name . '</strong>'
			);
			$this->xPanel->enableParentEntity();
			$this->xPanel->setParentKeyField('parent_id');
			$this->xPanel->addClause('where', 'parent_id', '=', $this->parentId);
			if (isset($parent->parent) && !empty($parent->parent)) {
				$this->xPanel->setParentRoute(admin_uri('categories/' . $parent->parent->id . '/subcategories'));
			} else {
				$this->xPanel->setParentRoute(admin_uri('categories'));
			}
			$this->xPanel->setParentEntityNameStrings('parent ' . trans('admin.category'), 'parent ' . trans('admin.categories'));
			$this->xPanel->allowAccess(['reorder', 'details_row', 'parent']);
		}
		$this->xPanel->enableReorder('name', 1);
		$this->xPanel->enableDetailsRow();
		if (!request()->input('order')) {
			$this->xPanel->orderBy('lft', 'ASC');
		}
		
		$this->xPanel->addButtonFromModelFunction('top', 'rebuild_nested_set_nodes_btn', 'rebuildNestedSetNodesBtn', 'end');
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
				$this->xPanel->addClause('where', 'name', 'LIKE', "%$value%");
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
			'name'      => 'id',
			'label'     => '',
			'type'      => 'checkbox',
			'orderable' => false,
		]);
		$this->xPanel->addColumn([
			'name'          => 'name',
			'label'         => trans('admin.Name'),
			'type'          => 'model_function',
			'function_name' => 'getNameHtml',
		]);
		$this->xPanel->addColumn([
			'name'          => 'subcategories',
			'label'         => mb_ucfirst(trans('admin.subcategories')),
			'type'          => 'model_function',
			'function_name' => 'subCategoriesBtn',
		]);
		$this->xPanel->addColumn([
			'name'          => 'active',
			'label'         => trans('admin.Active'),
			'type'          => 'model_function',
			'function_name' => 'getActiveHtml',
			'on_display'    => 'checkbox',
		]);
		
		// FIELDS
		$skippedId = (is_numeric($this->entryId)) ? $this->entryId : -1;
		$this->xPanel->addField([
			'name'              => 'parent_id',
			'label'             => 'Parent',
			'type'              => 'select2_from_array',
			'options'           => Category::selectBoxTree($skippedId),
			'allows_null'       => false,
			'value'             => $this->parentId,
			'wrapperAttributes' => [
				'class' => 'form-group col-md-12',
			],
		]);
		$this->xPanel->addField([
			'name'              => 'name',
			'label'             => trans('admin.Name'),
			'type'              => 'text',
			'attributes'        => [
				'placeholder' => trans('admin.Name'),
			],
			'wrapperAttributes' => [
				'class' => 'form-group col-md-6',
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
			'name'       => 'description',
			'label'      => trans('admin.Description'),
			'type'       => 'textarea',
			'attributes' => [
				'placeholder' => trans('admin.Description'),
			],
		]);
		$this->xPanel->addField([
			'name'   => 'picture',
			'label'  => trans('admin.Picture'),
			'type'   => 'image',
			'upload' => true,
			'disk'   => 'public',
			'hint'   => trans('admin.category_picture_icon_hint'),
		]);
		$this->xPanel->addField([
			'name'        => 'icon_class',
			'label'       => trans('admin.Icon'),
			'type'        => 'select2_from_array',
			'options'     => collect(config('fontello'))->map(function ($iconCode, $iconClass) {
				return $iconClass . ' (' . $iconCode . ')';
			})->toArray(),
			'allows_null' => true,
			'hint'        => trans('admin.Used in the categories area on the home and sitemap pages'),
		]);
		$this->xPanel->addField([
			'name'    => 'active',
			'label'   => trans('admin.Active'),
			'type'    => 'checkbox',
			'default' => '1',
		], 'create');
		$this->xPanel->addField([
			'name'  => 'active',
			'label' => trans('admin.Active'),
			'type'  => 'checkbox',
		], 'update');
	}
	
	public function store(StoreRequest $request)
	{
		$this->updateCheche();
		return parent::storeCrud();
	}
	
	public function update(UpdateRequest $request)
	{
		$this->updateCheche();
		return parent::updateCrud();
	}
	
	public function updateCheche()
	{
		$cacheId = 'categoriesTypes.all.' . config('app.locale');
		Cache::pull($cacheId);
		$categoriesTypes = Cache::remember($cacheId, 3600, function () {
			return Category::orderBy('lft')->where('created_by', NULL)->get();
		});
		view()->share('categoriesTypes', $categoriesTypes);
		# code...
	}
	/**
	 * Convert Adjacent List to Nested Set
	 *
	 * NOTE:
	 * - The items order is reset, using the adjacent list's primary key order
	 * - Need to use adjacent list model to add, update or delete nodes
	 */
	public function rebuildNestedSetNodes()
	{
		$errorFound = false;
		
		$params = [
			'adjacentTable' => 'categories',
			'nestedTable'   => 'categories',
		];
		
		$transformer = new AdjacentToNested($params);
		
		try {
			$transformer->getAndSetAdjacentItemsIds();
			$transformer->convertChildrenRecursively(0);
			$transformer->setNodesDepth();
		} catch (\Exception $e) {
			Alert::error($e->getMessage())->flash();
			$errorFound = true;
		}
		
		// Check if error occurred
		if (!$errorFound) {
			$message = trans('admin.action_performed_successfully');
			Alert::success($message)->flash();
		}
		
		return redirect()->back();
	}
}
