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

if (typeof loadingImage === 'undefined') {
	var loadingImage = '/images/loading.gif';
}
if (typeof confirmMessage === 'undefined') {
	var confirmMessage = 'Are you sure you want to perform this action?';
}
if (typeof loadingErrorMessage === 'undefined') {
	var loadingErrorMessage = 'Threads could not be loaded.';
}
if (typeof actionErrorMessage === 'undefined') {
	var actionErrorMessage = 'This action could not be done.';
}
if (typeof actionText === 'undefined') {
	var actionText = 'Action';
}

$(function () {
	$('ul.dropdown-menu-sort li').click(function (e) {
		$('ul.dropdown-menu-sort li').removeClass('active');
		$(this).addClass('active');
		let selectedText = $(this).find('a').text();
		$('.dropdown-menu-sort-selected').text(selectedText);
	});
	
	$('.markAllAsRead').click(function () {
		let confirmation = confirm(confirmMessage);
		if (confirmation) {
			markAllAsRead();
		}
	});
	
	/* Check all entries */
	$('#form-check-all').click(function (e) {
		e.stopPropagation();
		$('.message-list input:checkbox').not(this).prop('checked', this.checked);
	});
	
	
	/* ====== */
	
	
	/* AJAX data loading & pagination */
	$(document).on('click', '#linksThreads a', function (e) {
		e.preventDefault();
		
		/* $('#linksThreads a').css('color', '#dfecf6'); */
		
		let url = $(this).attr('href');
		getThreads(url);
		window.history.pushState('', '', url);
	});
	
	/* Confirm Actions */
	$(document).on('click', '.list-box-action a, #groupedAction a, .call-xhr-action a', function (e) {
		e.preventDefault();
		
		let confirmation = confirm(confirmMessage);
		
		if (confirmation) {
			let currentPageFilter = getUrlParameter('filter');
			let url = $(this).attr('href');
			if ($(this).closest('#groupedAction').length) {
				let checkedCheckboxes = getCheckedCheckboxes();
				makeAction(currentPageFilter, url, false, checkedCheckboxes);
			} else {
				if (url !== 'undefined') {
					makeAction(currentPageFilter, url, $(this));
				}
			}
		}
		
		return false;
	});
	
	/* Refresh Threads */
	$(document).on('click', '#btnRefresh', function (e) {
		e.preventDefault();
		
		let url = window.location.href;
		getThreads(url);
	});
});


/* Function of AJAX data loading & pagination */
function getThreads(url) {
	$('#listThreads').append('<img class="loading-img" src="' + loadingImage + '" />');
	
	$.ajax({
		method: 'GET',
		url: url
	}).done(function (data) {
		if (typeof data.threads === 'undefined' || typeof data.links === 'undefined') {
			return false;
		}
		
		$('#listThreads').html(data.threads);
		$('#linksThreads').html(data.links);
		
		/* Check Threads with New Messages */
		checkNewMessages();
		
		/* Clear all alert message */
		try {
			sleep(6000).then(() => {
				$('#successMsg').empty().hide();
				$('#errorMsg').empty().hide();
			});
		} catch (error) {
			$('#successMsg').empty().hide();
			$('#errorMsg').empty().hide();
		}
	}).fail(function () {
		alert(loadingErrorMessage);
	});
}

/* Get checked checkboxes */
function getCheckedCheckboxes() {
	let checkedList = [];
	
	$('.message-list input[type=checkbox]:checked').each(function () {
		checkedList.push($(this).val());
	});
	
	return checkedList;
}

/* Make action */
function makeAction(currentPageFilter, url, clickedEl, checkedCheckboxes) {
	let options = {
		method: 'GET',
		url: url
	};
	
	if (checkedCheckboxes) {
		options = {
			method: 'POST',
			url: url,
			data: {
				'entries': checkedCheckboxes,
				'_token': $('input[name=_token]').val()
			}
		};
	}
	
	$.ajax(options).done(function (data) {
		if (typeof data.type === 'undefined' || typeof data.success === 'undefined' || typeof data.msg === 'undefined') {
			return false;
		}
		
		let currentUrl = window.location.href;
		let titleIs, newActionUrl;
		
		if (clickedEl) {
			if (data.type === 'markAsRead' || data.type === 'markAsUnread') {
				if (currentPageFilter === 'unread') {
					
					clickedEl.tooltip('hide');
					getThreads(currentUrl);
					
				} else {
					let isSeen = clickedEl.closest('.list-group-item').hasClass('seen');
					titleIs = isSeen ? title.seen : title.notSeen;
					clickedEl.find('i').toggleClass('fa-envelope-open fa-envelope');
					clickedEl.closest('.list-group-item').toggleClass('seen');
					clickedEl.attr('title', titleIs).attr('data-original-title', titleIs).tooltip('hide');
					if (typeof data.baseUrl !== 'undefined') {
						newActionUrl = data.baseUrl + '?type=' + (isSeen ? 'markAsRead' : 'markAsUnread');
						clickedEl.attr('href', newActionUrl);
					}
					
					checkNewMessages();
				}
			}
			if (data.type === 'markAsImportant' || data.type === 'markAsNotImportant') {
				if (currentPageFilter === 'important') {
					
					clickedEl.tooltip('hide');
					getThreads(currentUrl);
					
				} else {
					let isImportant = clickedEl.hasClass('markAsNotImportant');
					titleIs = isImportant ? title.important : title.notImportant;
					clickedEl.find('i').toggleClass('fas far');
					clickedEl.toggleClass('markAsNotImportant markAsImportant');
					clickedEl.attr('title', titleIs).attr('data-original-title', titleIs).tooltip('hide');
					if (typeof data.baseUrl !== 'undefined') {
						newActionUrl = data.baseUrl + '?type=' + (isSeen ? 'markAsImportant' : 'markAsNotImportant');
						clickedEl.attr('href', newActionUrl);
					}
				}
			}
			if (data.type === 'delete') {
				
				clickedEl.tooltip('hide');
				getThreads(currentUrl);
				
			}
		} else {
			/* Close the grouped actions dropdown menu */
			$('#groupedAction').trigger('click.bs.dropdown');
			/* Uncheck the 'check all' checkbox */
			$('#form-check-all').prop('checked', false);
			
			/* Refresh Data */
			getThreads(currentUrl);
			
			$('.dropdown-menu-sort-selected').text(actionText);
		}
		
		if (data.success) {
			$('#errorMsg').empty().hide();
			$('#successMsg').html(data.msg).show();
		} else {
			$('#successMsg').empty().hide();
			$('#errorMsg').html(data.msg).show();
		}
	}).fail(function () {
		alert(actionErrorMessage);
	});
}

/**
 * Get URL parameters using JavaScript
 *
 * @param sParam
 * @returns {*}
 */
function getUrlParameter(sParam) {
	let sPageURL = window.location.search.substring(1),
		sURLVariables = sPageURL.split('&'),
		sParameterName,
		i;
	
	for (i = 0; i < sURLVariables.length; i++) {
		sParameterName = sURLVariables[i].split('=');
		
		if (sParameterName[0] === sParam) {
			return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
		}
	}
}

/* Mark all as read */
function markAllAsRead() {
	$.ajax({
		method: 'POST',
		url: siteUrl + '/account/messages/actions?type=markAllAsRead',
		data: {
			'_token': $('input[name=_token]').val()
		}
	}).done(function (data) {
		if (typeof data.success === 'undefined' || typeof data.msg === 'undefined') {
			return false;
		}
		
		let url = window.location.href;
		getThreads(url);
		
		if (data.success) {
			$('#errorMsg').empty().hide();
			$('#successMsg').html(data.msg).show();
		} else {
			$('#successMsg').empty().hide();
			$('#errorMsg').html(data.msg).show();
		}
	}).fail(function () {
		alert(actionErrorMessage);
	});
}