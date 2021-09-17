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
	
	$('.phoneBlock').click(function (e) {
		e.preventDefault(); /* prevents the submit or reload */
		
		showPhone();
		
		return false;
	});
	
});

/**
 * Show the Contact's phone
 * @returns {boolean}
 */
function showPhone() {
	if ($('#postId').val() == 0 || $('#postId').val() == '') {
		return false;
	}
	
	let url = siteUrl + '/ajax/post/phone';
	
	$.ajax({
		method: 'POST',
		url: url,
		data: {
			'postId': $('#postId').val(),
			'_token': $('input[name=_token]').val()
		}
	}).done(function (data) {
		if (typeof data.phone == 'undefined') {
			return false;
		}
		
		$('.phoneBlock').html('<i class="icon-phone-1"></i> ' + data.phone);
		$('.phoneBlock').attr('href', data.link);
		$('.phoneBlock').tooltip('dispose'); /* Disable Tooltip */
		
		$('#postId').val(0);
	});
}
