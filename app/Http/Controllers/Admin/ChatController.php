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
use App\Models\ChatPermission;
use Larapen\Admin\app\Http\Controllers\PanelController;
use App\Http\Requests\Admin\ChatPermissionRequest as StoreRequest;
use App\Http\Requests\Admin\ChatPermissionRequest as UpdateRequest;

class ChatController  extends PanelController
{
public function setup()
    {

        /*

        |--------------------------------------------------------------------------
        | BASIC CRUD INFORMATION
        |--------------------------------------------------------------------------
        */

        $this->xPanel->setModel('App\Models\ChatPermission');
        $this->xPanel->setRoute(admin_uri('chat'));
        $this->xPanel->setEntityNameStrings(trans('admin.role'), trans('admin.role'));
        // $this->xPanel->addButtonFromModelFunction('top', 'bulk_delete_btn', 'bulkDeleteBtn', 'end');
        $this->xPanel->disableSearchBar();
        /*
        |--------------------------------------------------------------------------
        | COLUMNS AND FIELDS
        |--------------------------------------------------------------------------
        */
        // COLUMNS
        $this->xPanel->addColumn([
            'name'  => 'role',
            'label' => trans('admin.role'),
        ]);
        $this->xPanel->addColumn([
            'name'  => 'permission',
            'label' => trans('admin.permission'),
        ]);
        //  $this->xPanel->addColumn([
        //     'name'          => 'active',
        //     'label'         => trans('admin.Active'),
        //     'type'          => "model_function",
        //     'function_name' => 'getActiveHtml',
        // ]);
        $entity = $this->xPanel->getModel()->find(request()->segment(3));
         
       // FIELDS
        $this->xPanel->addField([
            'name'  => 'role',
            'label' =>  trans('admin.role'),
            'type'  =>  'text'
        ]);
        $this->xPanel->addField([
            'name'       => 'permission',
            'label'      => trans('admin.permission'),
            'type'       => 'text',
        ]);
        
    }
    
    public function store(StoreRequest $request)
    {

        //Check admin users (Don't ban admin users)
        // if ($this->isAnAdminUser()) {
        //     return redirect()->back();
        // }
             
        return parent::storeCrud();
    }
    
    public function update(UpdateRequest $request)
    {
        // Check admin users (Don't ban admin users)
        // if ($this->isAnAdminUser()) {
        //     return redirect()->back();
        // }
        
        return parent::updateCrud();
    }
    

}
