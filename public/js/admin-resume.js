
$(document).on('click', '.delete_resume_cv', function() {
	var basic_info_id = $(this).attr('attr_id');
	if(confirm("Are you sure you want to delete?")){
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
			}
		});
		$.ajax({
			url: "/account/resume/resume-cv-delete", 
			type: "POST",
			data: {
				'basic_info_id':basic_info_id
			}, 
			success: function(response) {
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					$(".response_message").html("");
					$(".response_message").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
					setTimeout(function(){
						$('.alert').remove();
					}, 2000);
					var experience_html = res.experience_html;
					$('.resume_cv_html').html(experience_html);
				} 
				else {
					$(".response_message").html("");
					$(".response_message").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
				}
			}	
		});
	}
    else{
        return false;
    }
})