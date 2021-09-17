/*
 * LaraClassified - Classified Ads Web Application
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

$(document).ready(function () {
	
	var xhrOptions;
	var token = $('meta[name="csrf-token"]').attr('content');
	if (token) {
		xhrOptions = {
			headers: {
				'X-Requested-With': 'XMLHttpRequest',
				'X-CSRF-TOKEN': token
			},
			async: true,
			cache: false,
			xhrFields: {withCredentials: true},
			crossDomain: true
		};
	} else {
		xhrOptions = {
			headers: {
				'X-Requested-With': 'XMLHttpRequest',
			},
			async: true,
			cache: false,
			xhrFields: {withCredentials: true},
			crossDomain: true
		};
	}
	$.ajaxSetup(xhrOptions);
	
});
