/*
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

$(document).ready(function () {
	
	if (modalDefaultAdminCode !== 0 && modalDefaultAdminCode !== '') {
		changeCity(countryCode, modalDefaultAdminCode);
	}
	$('#modalAdminField').change(function () {
		changeCity(countryCode, $(this).val());
	});
	
});

function changeCity(countryCode, modalDefaultAdminCode) {
	/* Check Bugs */
	if (typeof languageCode == 'undefined' || typeof countryCode == 'undefined' || typeof modalDefaultAdminCode == 'undefined') {
		return false;
	}
	
	let url = siteUrl + '/ajax/countries/' + strToLower(countryCode) + '/admin1/cities';
	
	$.ajax({
		method: 'POST',
		url: url,
		data: {
			'languageCode': languageCode,
			'adminCode': modalDefaultAdminCode,
			'currSearch': $('#currSearch').val(),
			'_token': $('input[name=_token]').val()
		}
	}).done(function (data) {
		if (typeof data.adminCities == "undefined") {
			return false;
		}
		$('#selectedAdmin strong').html(data.selectedAdmin);
		$('#adminCities').html(data.adminCities);
		$('#modalAdminField').val(modalDefaultAdminCode).prop('selected');
	});
}