$(function () {
	
	/* Popover */
	/* Dismiss all popovers by clicking outside, don't dismiss if clicking inside the popover content */
	$(document).on('click', function (e) {
		var $popover, $target = $(e.target);
		
		/* Do nothing if there was a click on popover content */
		if ($target.hasClass('popover') || $target.closest('.popover').length) {
			return;
		}
		
		$('[data-toggle="popover"]').each(function () {
			$popover = $(this);
			
			if (
				!$popover.is(e.target)
				&& $popover.has(e.target).length === 0
				&& $('.popover').has(e.target).length === 0
			) {
				$popover.popover('hide');
			} else {
				$popover.popover('toggle');
			}
		});
	});
	
});

/**
 * Redirect URL
 * @param url
 */
function redirect(url) {
	window.location.replace(url);
	window.location.href = url;
}
