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

namespace App\Http\Controllers\Web;

use Torann\LaravelMetaTags\Facades\MetaTag;

class CountriesController extends FrontController
{
    /**
     * CountriesController constructor.
     */
    public function __construct()
    {
        parent::__construct();

    }
	
	/**
	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
	 */
    public function index()
        {

        $data = [];
        
        // Meta Tags
        MetaTag::set('title', getMetaTag('title', 'countries'));
        MetaTag::set('description', strip_tags(getMetaTag('description', 'countries')));
        MetaTag::set('keywords', getMetaTag('keywords', 'countries'));

        return appView('countries', $data);
    }
}
