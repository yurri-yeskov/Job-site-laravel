
$(document).on('click', '#resume_basic_information_form button[type="submit"]', function() {
	var thisButton = this;
	var form = $("#resume_basic_information_form");
	form.validate({

		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			resume_name: {
				required: true,
				//minlength: 2,
			},
			first_name: {
				required: true,
				//minlength: 2,
			},
			last_name: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			job_title: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			email: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			phone: {
				required: true,		
			},
			current_salary: {
				required: true,
				
			},expected_salary: {
				required: true,			
			},
			experience: {
				required: true				
			},
			age: {
				required: true,	
			},
			'languages[]': {
				required: true,
			},
			work_industries: {
				required: true,
			},
			description: {
				required: true,
			},
			'work_industries[]': {
				required: true,
			},


		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
			let formData = new FormData(form);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/basic-information", 
				type: "POST",
				data: formData, 
				contentType: false,
				processData: false,
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save Changes');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var inserted_id = res.inserted_id;
						$("input[name='basic_form_id']").val(inserted_id);
						$(".basic_information_response_message").html("");
						$(".basic_information_response_message").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						// $('html, body').animate({
							// scrollTop: $(".basic_information_response").offset().top
						// }, 1000);
						//$(".basic_information_response_message").offset().top						
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
					} 
					else {
						$(".basic_information_response_message").html("");
						$(".basic_information_response_message").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
						// $('html, body').animate({
							// scrollTop: $(".basic_information_response").offset().top
						// }, 1000);	
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".basic_information_response_message").html("");
						var err_msgg  = "";											
						err_msgg += "<ul class='alert alert-danger' role='alert'>";		
						$.each(xhr.responseJSON.errors, function (key, item) 										
						  {
							err_msgg += "<li>" + item + "</li>";												
						  });
					    err_msgg += "</ui>";
					    $(".basic_information_response_message").append(err_msgg);	
						// $('html, body').animate({
							// scrollTop: $(".basic_information_response").offset().top
						// }, 1000);	
						
					
				}
			});
		},
		errorPlacement: function(error, element) {
		  if(element.attr("name") == "work_industries[]") {
			error.appendTo( element.parent("div") );
		  }else if(element.attr("name") == "languages[]") {
			error.appendTo( element.parent("div") );
		  } else {
			error.insertAfter(element);
		  }
		}

	});
});
/* image upload */
function imageuploadfunction(valimage){
	document.getElementById('image-avatar').src = window.URL.createObjectURL(valimage.files[0]);
	$('.trigger-click-image-submit').trigger('click');
}
/* image upload by ajax*/
$(document).on('click', '#resume_basic_image_upload_form button[type="submit"]', function() {
	
	var form = $("#resume_basic_image_upload_form");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$('.profile-image').html('<i class="fa fa-circle-o-notch fa-spin" ></i> Upload photo');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			let formData = new FormData(form);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/basic-information-image-upload", 
				type: "POST",
				data: formData, 
				contentType: false,
				processData: false,
				success: function(response) {
					$('.profile-image').html('Upload photo');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var inserted_id = res.inserted_id;
						$("input[name='basic_form_id']").val(inserted_id);
						$(".basic_information_response").html("");
						$(".basic_information_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						$('html, body').animate({
							scrollTop: $(".basic_information_response").offset().top
						}, 1000);	
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
						var formhtml = res.formhtml;
						$('.resume_pic').html(formhtml);
					} 
					else {
						$(".basic_information_response").html("");
						$(".basic_information_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
						$('html, body').animate({
							scrollTop: $(".basic_information_response").offset().top
						}, 1000);	
					}
				}
			});
		}

	});
})
	
	
	

$(document).on('click', '#resume_basic_information_form button[type="submit"]', function() {
	
	var form = $("#resume_basic_information_form");
	form.validate({

		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			resume_name: {
				required: true,
				//minlength: 2,
			},
			first_name: {
				required: true,
				//minlength: 2,
			},
			last_name: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			job_title: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			email: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			phone: {
				required: true,		
			},
			current_salary: {
				required: true,
				
			},expected_salary: {
				required: true,			
			},
			experience: {
				required: true				
			},
			age: {
				required: true,	
			},
			languages: {
				required: true,
			},
			work_industries: {
				required: true,
			},
			description: {
				required: true,
			},

		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			let formData = new FormData(form);
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/basic-information", 
				type: "POST",
				data: formData, 
				contentType: false,
				processData: false,
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var inserted_id = res.inserted_id;
						$("input[name='basic_form_id']").val(inserted_id);
						$(".basic_information_response").html("");
						$(".basic_information_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						$('html, body').animate({
							scrollTop: $(".basic_information_response").offset().top
						}, 1000);	
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
					} 
					else {
						$(".basic_information_response").html("");
						$(".basic_information_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
						$('html, body').animate({
							scrollTop: $(".basic_information_response").offset().top
						}, 1000);	
					}
				},	
				error: function(xhr, status, error) {
					$(".basic_information_response").html("");
						var err_msgg  = "";											
						err_msgg += "<ul class='alert alert-danger' role='alert'>";		
						$.each(xhr.responseJSON.errors, function (key, item) 										
						  {
							err_msgg += "<li>" + item + "</li>";												
						  });
					    err_msgg += "</ui>";
					    $(".basic_information_response").append(err_msgg);	
						$('html, body').animate({
							scrollTop: $(".basic_information_response").offset().top
						}, 1000);						
					
				}
			});
		}

	});
});


$(document).on('click', '#experience_history_form button[type="submit"]', function() {
	var thisButton = this;
	var form = $("#experience_history_form");
	form.validate({

		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			position_head: {
				required: true,
			},
			company: {
				required: true,
			},
			start_date: {
				required: true,
			},
			end_date: {
				required: true,
			}
		},
		submitHandler: function(form) { 
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
		$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
			$.ajax({
				url: "/resume-builder/experience-history", 
				type: "POST",
				data: $('#experience_history_form').serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var experience_html = res.experience_html;
						var formhtml = res.formhtml;
						$('.resume_pic').html(formhtml);
						$(".experience_history_response").html("");
						$(".experience_history_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						$('#employ_modal').modal('hide');
						$('.experience_summary').html(experience_html);
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
						$('#experience_history_form').trigger("reset");
					} 
					else {
						$(".experience_history_response").html("");
						$(".experience_history_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".experience_history_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".experience_history_response").append(err_msgg);	
				}
			});
		}
	});
});


$(document).on('click', '.delete_experience', function(){
	
	if(confirm("Are you sure you want to delete this?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
       var experince_id = $(this).attr('attr_id');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/experience-history-delete", 
			type: "POST",
			data: {
				'experince_id':experince_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					var experience_html = res.experience_html;
					$('.experience_summary').html(experience_html);
					var formhtml = res.formhtml;
					$('.resume_pic').html(formhtml);
				} 
			}
		});
    }
    else{
        return false;
    }
})




$(document).on('click', '.employ_edit button[type="submit"]', function() {
	var thisButton = this;
	var id = $(this).attr("attr_id");
	var form = $("#experience_history_form_"+id);
	form.validate({

		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			position_head: {
				required: true,
				//minlength: 2,
			},
			company: {
				required: true,
				//minlength: 2,
			},
			start_date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			end_date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/experience-history-edit", 
				type: "POST",
				data: $("#experience_history_form_"+id).serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						$('.emp_modal').modal('hide');
						
						setTimeout(function(){
							var experience_html = res.experience_html;
							$(".experience_history_response").html("");
							$(".experience_history_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
							
							$('.experience_summary').html(experience_html);
							$('.alert').remove();
						}, 200);
					} 
					else {
						$(".experience_history_response").html("");
						$(".experience_history_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".experience_history_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".experience_history_response").append(err_msgg);	
				}
			});
		}
	});
});

$(document).on('click', '#education_response_form button[type="submit"]', function() {
	var thisButton = this;
	var form = $("#education_response_form");
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			achievement: {
				required: true,
				//minlength: 2,
			},
			school_university_institute: {
				required: true,
				//minlength: 2,
			},
			date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/education-history", 
				type: "POST",
				data: $(education_response_form).serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var formhtml = res.formhtml;
						$('.resume_pic').html(formhtml);
						var education_html = res.education_html;
						$(".education_response").html("");
						//$(".education_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						$('.education_summary').html(education_html);
						$('#employ_modal1').modal('hide');
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
						$('#education_response_form').trigger("reset");
					} 
					else {
						$(".education_response").html("");
						$(".education_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
});


$(document).on('click', '.delete_education', function(){
	if(confirm("Are you sure you want to delete this?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
       var education_id = $(this).attr('attr_id');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/education-history-delete", 
			type: "POST",
			data: {
				'education_id':education_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					var formhtml = res.formhtml;
					$('.resume_pic').html(formhtml);
					var education_html = res.education_html;
					console.log(education_html);
					$('.education_summary').html(education_html);
				} 
			}
		});
    }
    else{
        return false;
    }
})

$(document).on('click', '.education_edit button[type="submit"]', function() {
	var thisButton = this;
	var id = $(this).attr("attr_id");
	var form = $("#education_response_form_"+id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			achievement: {
				required: true,
				//minlength: 2,
			},
			school_university_institute: {
				required: true,
				//minlength: 2,
			},
			date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/education-history-update", 
				type: "POST",
				data: $("#education_response_form_"+id).serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						$('.educate_edit').modal('hide');
						setTimeout(function(){
						var education_html = res.education_html;
						$(".education_response").html("");
						$(".education_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						$('.education_summary').html(education_html);
							$('.alert').remove();
						}, 200);
					} 
					else {
						$(".education_response").html("");
						$(".education_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
});

$(".select_industry_multiple").select2({
	tags: true,
    tokenSeparators: [',', ' '],
	minimumInputLength: 1,
})




$(".select_language_multiple").select2({
	tags: true,
	selectionCssClass: "form-control style_form",
    tokenSeparators: [',', ' '],
	minimumInputLength: 1,
	
})



// $('.select_language_multiple').on('change.select2', function (e) {
    // if ($('.select_language_multiple').val().length > 0) {
       // $('.select_language_multiple').data('select2')['$container'].find(':input[type=search]')
            // .attr({placeholder: "(New Language)", style: 'width: 100%;'})
    // }
// });
//(field_name,type, table, table_id,template_id)	
$(document.body).on("change",".select_language_multiple",function(){
	var data = $(".select_language_multiple").val();  
	//var data = data.replace(/,/g, ', ');
	onblurLanguageInfo('languages',data, 'basic_informations', $('#basic_form').val(), $('#temp_id').val());
});	

$(".select_skills_multiple").select2({
	tags: true,
    tokenSeparators: [',', ' '],
	dropdownParent: $('#skills_modal'),
	minimumInputLength: 1,
})


// $(".select_skills_multiple_update").select2({
	// tags: true,
    // tokenSeparators: [',', ' '],
	// dropdownParent: $('#edit_skill_modal')
// })

$('.select2-container').css("width","100%");

$(document).on('click', '#achievementForm button[type="submit"]', function() {
	var thisButton = this;
	var form = $("#achievementForm");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			achievement1: {
				required: true,
				
			},
			achievement2:{
				required: true,
				
			},
			date:{
				required: true,
				
			}
			// achievement3: {
				// required: true,
			// }
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/achievement-save", 
				type: "POST",
				data: $("#achievementForm").serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var achievement_html = res.achievement_html;
						$(".achievment_response").html("");
						//$(".achievment_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						$('.achievement_summary').html(achievement_html);
						$('#employ_modal2').modal('hide');
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
						$('#achievementForm').trigger("reset");
					} 
					else {
						$(".achievment_response").html("");
						$(".achievment_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".achievment_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".achievment_response").append(err_msgg);	
				}
			});
		}
	});
});


$(document).on('click', '.delete_achievement', function(){
	if(confirm("Are you sure you want to delete this?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
       var achievement_id = $(this).attr('attr_id');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/achievement-delete", 
			type: "POST",
			data: {
				'achievement_id':achievement_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					var achievement_html = res.achievement_html;
					$('.achievement_summary').html(achievement_html);
				} 
			}
		});
    }
    else{
        return false;
    }
})

$(document).on('click', '.achieveModal button[type="submit"]', function() {
	var thisButton = this;
	var id = $(this).attr("attr_id");
	var form = $("#achievementForm_"+id);
	//var form = $("#achievementForm");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			achievement1: {
				required: true,
				
			},
			achievement2:{
				required: true,
				
			},
			date:{
				required: true,
				
			}
			// achievement3: {
				// required: true,
			// }
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/achievement-update", 
				type: "POST",
				data: $("#achievementForm_"+id).serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					//if (response == 'success') {
						var achievement_html = res.achievement_html;
						$(".achievment_response").html("");
						$('.achieveModal').modal('hide');
						//$(".achievment_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						
						
						setTimeout(function(){
							$('.achievement_summary').html(achievement_html);
							$('.alert').remove();
						},200);
						//$('#achievementForm').trigger("reset");
					// } 
					// else {
						// $(".achievment_response").html("");
						// $(".achievment_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					// }
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".achievment_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".achievment_response").append(err_msgg);	
				}
			});
		}
	});
})


$(document).on('click', '#skillForm  button[type="submit"]', function(){
	var thisButton = this;
	var form = $("#skillForm");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			'skill[]': {
				required: true,				
			},
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/skill-save", 
				type: "POST",
				data: $("#skillForm").serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var skills_html = res.skills_html;
						$(".skill_response").html("");
						//$(".skill_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						$('.skilldata').html(skills_html);
							var skill_new_option = res.skill_new_option;
						//$('.option_skill').html(skill_new_option);
						$('#skills_modal').modal('hide');
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
						$('#skillForm').trigger("reset");
						var template_html = res.template_html;
						$('.resume_pic').html(template_html);
						
					} 
					else {
						$(".skill_response").html("");
						$(".skill_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".skill_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".skill_response").append(err_msgg);	
				}
			});
		},
		errorPlacement: function(error, element) {
		  if(element.attr("name") == "skill[]") {
			error.appendTo( element.parent("div") );
		  } else {
			error.insertAfter(element);
		  }
		}
		
	});
})


$(document).on('click', '#skillFormEdit  button[type="submit"]', function(){
	var thisButton = this;
	var form = $("#skillFormEdit");
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			'skill[]': {
				required: true,				
			},
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save Changes');
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/skill-update", 
				type: "POST",
				data: $("#skillFormEdit").serialize(), 
				success: function(response) {
					$(thisButton).html('Save Changes');
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var skills_html = res.skills_html;
						$('#edit_skill_modal').modal('hide');
						$(".skill_response").html("");
						//$(".skill_response").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
						
							var skill_new_option = res.skill_new_option;
						//$('.option_skill').html(skill_new_option);
						
						
						
						setTimeout(function(){
							$('.skilldata').html(skills_html);
							$('.alert').remove();
						}, 200);
						$('#skillForm').trigger("reset");
						
					} 
					else {
						$(".skill_response").html("");
						$(".skill_response").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save Changes');
					$(".skill_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".skill_response").append(err_msgg);	
				}
			});
		},
		errorPlacement: function(error, element) {
		  if(element.attr("name") == "skill[]") {
			error.appendTo( element.parent("div") );
		  } else {
			error.insertAfter(element);
		  }
		}
	});
})



$(document).on('click', '.select_custom_skill', function(){
	var attr = $(this).attr('attr');
	$(this).addClass("pointevent");
	var attr_template_id = $(this).attr('attr_template_id');
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	
	$.ajax({
		url: "/resume-builder/custom-skills", 
		type: "post",
		data: {
			'attr': attr,
			'attr_template_id':attr_template_id
		}, 
		success: function(response) {
			 var myDiv = $('.'+attr);
			 $('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				if ( myDiv.length){
					$('.'+attr).html(response);
					$('html, body').animate({
						scrollTop: $('.'+attr).offset().top
					}, 1000);	
				}
				else{
					$('<div class="'+attr+'"></div>').appendTo('.add_section_dynamic');
					$('.'+attr).html(response);
					$('html, body').animate({
						scrollTop: $('.'+attr).offset().top
					}, 1000);	
				}
		
			
		}
		
	});
})

$(document).on('click', '.add_course_form_anchor', function(event){
    $('.trigger-click').trigger('click');
});


$(document).on('click', '#course_custom_form  button[type="submit"]', function(){
	var form_id = $(this).closest('form').attr('id');
	var form = $("#"+form_id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			institution: {
				required: true,
				//minlength: 2,
			},
			courses: {
				required: true,
				//minlength: 2,
			},
			start_date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			end_date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/custom-course-save", 
				type: "POST",
				data: $("#"+form_id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					
					
					if (response == 'success') {
						var course_html = res.course_html;
						$('.courses_section').html(course_html);
					} 
					
				},	
				error: function(xhr, status, error) {
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})

$(document).on('click', '.course_section_edit  button[type="submit"]', function(){
	var thisButton = this;
	var id = $(this).attr("attr");

	var form = $("#course_custom_form_"+id);
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			institution: {
				required: true,	
			},
			courses: {
				required: true,
			},
			start_date: {
				required: true,
			},
			end_date: {
				required: true,
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/custom-course-update", 
				type: "POST",
				data: $("#course_custom_form_"+id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var course_html = res.course_html;
						$('.courses_section').html(course_html);
					} 
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})

$(document).on('click', '.course_delete', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
       var course_id = $(this).attr('attr_id');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/custom-course-delete", 
			type: "POST",
			data: {
				'course_id':course_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					var course_html = res.course_html;
					$('.courses_section').html(course_html);
					var template_exist = res.template_exist;
					if(template_exist== 'No'){
					//	$("[attr=courses_section]").removeClass('pointevent');
					}
				} 
			}
		});
    }
    else{
        return false;
    }
})



$(document).on('click', '.add_custom_section_form_anchor', function(event){
    $('.trigger-click-custom-section').trigger('click');
});
$(document).on('click', '.custom_section_forms  button[type="submit"]', function(){
	var form_id = $(this).closest('form').attr('id');
	var form = $("#"+form_id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			title: {
				required: true,
				
			},
			city: {
				required: true,
			
			},
			start_date: {
				required: true,
				
			},
			end_date: {
				required: true,
	
			},
			description: {
				required: true,
				
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/custom-section-save", 
				type: "POST",
				data: $("#"+form_id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var custom_section_html = res.custom_section_html;
						$('.custom_section').html(custom_section_html);
					} 
					
				},	
				error: function(xhr, status, error) {
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})



$(document).on('click', '.custom_section_edit  button[type="submit"]', function(){
	var thisButton = this;
	var id = $(this).attr("attr");
	console.log(id);
	var form = $("#custom_section_form_"+id);
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			title: {
				required: true,
				//minlength: 2,
			},
			city: {
				required: true,
				//minlength: 2,
			},
			start_date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			end_date: {
				required: true,
				//minlength: 10,
				//minlength: 10,
			},
			description: {
				required: true,
				
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/custom-section-update", 
				type: "POST",
				data: $("#custom_section_form_"+id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var custom_section_html = res.custom_section_html;
						$('.custom_section').html(custom_section_html);
					}  
				},	
				error: function(xhr, status, error) {
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})


$(document).on('click', '.custom_delete', function(){
	if(confirm("Are you sure you want to delete?")){
       var custom_id = $(this).attr('attr_id');
	   $('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/custom-section-delete", 
			type: "POST",
			data: {
				'custom_id':custom_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					var custom_section_html = res.custom_section_html;
					$('.custom_section').html(custom_section_html);
					var template_exist = res.template_exist;
					if(template_exist== 'No'){
						//$("[attr=courses_section]").removeClass('pointevent');
					}
				} 
			}
		});
    }
    else{
        return false;
    }
})


$(document).on('click', '.custom_delete_sub_section', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
       var custom_id = $(this).attr('attr_id');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/custom-sub-section-delete", 
			type: "POST",
			data: {
				'custom_id':custom_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					
					var custom_section_html = res.custom_section_html;
					$('.custom_section').html(custom_section_html);
					var template_exist = res.template_exist;
					if(template_exist== 'No'){
						//$("[attr=courses_section]").removeClass('pointevent');
					}
				} 
			}
		});
    }
    else{
        return false;
    }
})


$(document).on('click', '.add_extra_cirrcular_form_anchor', function(){
	
    $('.trigger-click-extra-cirrcular-sections').trigger('click');
});
$(document).on('click', '#extra_actitity_custom_forms  button[type="submit"]', function(){
	
	var form_id = $(this).closest('form').attr('id');
	
	var form = $("#"+form_id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			title: {
				required: true,
			},
			employer: {
				required: true,
			},
			city: {
				required: true,
			},
			start_date: {
				required: true,
			},
			end_date: {
				required: true,
			},
			description: {
				required: true,		
			}
		},
			submitHandler: function(form) { // Checkout form submit through Ajax
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/cirrcular-activity-section-save", 
				type: "POST",
				data: $("#"+form_id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						
						var curricular_activities_section_html = res.curricular_activities_section_html;
						$('.extra_curricular_section').html(curricular_activities_section_html);
						return false;
					} 
					
				},	
				error: function(xhr, status, error) {
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
		
	})

})


$(document).on('click', '.extra_actitity_edit  button[type="submit"]', function(){
	var thisButton = this;
	var id = $(this).attr("attr");
	console.log(id);
	var form = $("#extra_actitity_custom_form_"+id);
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
				title: {
				required: true,
			},
			employer: {
				required: true,
			},
			city: {
				required: true,
			},
			start_date: {
				required: true,
			},
			end_date: {
				required: true,
			},
			description: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/cirrcular-activity-section-update", 
				type: "POST",
				data: $("#extra_actitity_custom_form_"+id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var curricular_activities_section_html = res.curricular_activities_section_html;
						$('.extra_curricular_section').html(curricular_activities_section_html);
					}  
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})

$(document).on('click', '.activity_delete', function(){
	if(confirm("Are you sure you want to delete?")){
       var activity_id = $(this).attr('attr_id');
	   $('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/cirrcular-activity-section-delete", 
			type: "POST",
			data: {
				'activity_id':activity_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
						var curricular_activities_section_html = res.curricular_activities_section_html;
						$('.extra_curricular_section').html(curricular_activities_section_html);	
						var template_exist = res.template_exist;
						if(template_exist== 'No'){
							//$("[attr=extra_curricular_section]").removeClass('pointevent');
							
						}
						
				} 
				
			}
		});
    }
    else{
        return false;
    }
})




$(document).on('click', '.add_internship_form_anchor', function(event){
	
    $('.trigger-click-intership-section').trigger('click');
});
$(document).on('click', '#internship_form  button[type="submit"]', function(){
	var form_id = $(this).closest('form').attr('id');
	var form = $("#"+form_id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			title: {
				required: true,
			},
			employer: {
				required: true,
			},
			city: {
				required: true,
			},
			start_date: {
				required: true,
			},
			end_date: {
				required: true,
			},
			description: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/internships-section-save", 
				type: "POST",
				data: $("#"+form_id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var internships_section_html = res.internships_section_html;
						$('.internships_section').html(internships_section_html);
					} 
					
				},	
				error: function(xhr, status, error) {
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})


$(document).on('click', '.intership_edit  button[type="submit"]', function(){
	var thisButton = this;
	var id = $(this).attr("attr");
	console.log(id);
	var form = $("#internship_custom_form_"+id);
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
				title: {
				required: true,
			},
			employer: {
				required: true,
			},
			city: {
				required: true,
			},
			start_date: {
				required: true,
			},
			end_date: {
				required: true,
			},
			description: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/internships-section-update", 
				type: "POST",
				data: $("#internship_custom_form_"+id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var internships_section_html = res.internships_section_html;
						$('.internships_section').html(internships_section_html);
					}  
				},	
				error: function(xhr, status, error) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})



$(document).on('click', '.intership_delete', function(){
	if(confirm("Are you sure you want to delete?")){
       var internship_id = $(this).attr('attr_id');
	   $('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/internships-section-delete", 
			type: "POST",
			data: {
				'internship_id':internship_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				
				if (response == 'success') {
						var internships_section_html = res.internships_section_html;
						$('.internships_section').html(internships_section_html);
					}  
					
					if(template_exist== 'No'){
						//$("[attr=courses_section]").removeClass('pointevent');
					}
				
			}
		});
    }
    else{
        return false;
    }
})


$(document).on('click', '.add_hobby_form_anchor', function(event){
	
    $('.trigger-click-hobby-section').trigger('click');
});
$(document).on('click', '#hobby_custom_form  button[type="submit"]', function(){
	
	var form_id = $(this).closest('form').attr('id');

	var form = $("#"+form_id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			description: {
				required: true,		
			},
			title: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/hobby-section-save", 
				type: "POST",
				data: $("#"+form_id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var formhtml = res.formhtml;
						$('.resume_pic').html(formhtml);
						var hobby_section_html = res.hobby_section_html;
						$('.hobbies_section').html(hobby_section_html);
					} 
				},	
				error: function(xhr, status, error) {
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})

$(document).on('click', '.hobbies_edit  button[type="submit"]', function(){
	var thisButton = this;
	var id = $(this).attr("attr");
	var form = $("#hobbies_custom_form_"+id);
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
				title: {
				required: true,
			},			
			description: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/hobby-section-update", 
				type: "POST",
				data: $("#hobbies_custom_form_"+id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var hobby_section_html = res.hobby_section_html;
						$('.hobbies_section').html(hobby_section_html);
					} 
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Save');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})


$(document).on('click', '.hobby_delete', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
       var hobby_id = $(this).attr('attr_id');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/hobby-section-delete", 
			type: "POST",
			data: {
				'hobby_id':hobby_id
			}, 
			success: function(response) {
				var res = JSON.parse(response);
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
						var hobby_section_html = res.hobby_section_html;
						$('.hobbies_section').html(hobby_section_html);
						var formhtml = res.formhtml;
						$('.resume_pic').html(formhtml);
					} 
					var template_exist = res.template_exist;
					if(template_exist== 'No'){
						$("[attr=courses_section]").removeClass('pointevent');
					}
			}
		});
    }
    else{
        return false;
    }
})

$(document).on('click', '.add_language_form_anchor', function(event){
	
    $('.trigger-click-language-section').trigger('click');
});
$(document).on('click', '#languages_custom_form  button[type="submit"]', function(){
	
	var form_id = $(this).closest('form').attr('id');

	var form = $("#"+form_id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			language: {
				required: true,		
			},
			level: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/language-section-save", 
				type: "POST",
				data: $("#"+form_id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var languages_section_html = res.languages_section_html;
						$('.languages_section').html(languages_section_html);
					} 
				},	
				error: function(xhr, status, error) {
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})


$(document).on('click', '.languages_edit  button[type="submit"]', function(){
	var thisButton = this;
	var id = $(this).attr("attr");
	var form = $("#languages_custom_form_"+id);
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			language: {
				required: true,		
			},
			level: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/languages-section-update", 
				type: "POST",
				data: $("#languages_custom_form_"+id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var languages_section_html = res.languages_section_html;
						$('.languages_section').html(languages_section_html);
					} 
				},	
				error: function(xhr, status, error) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})

$(document).on('click', '.language_delete', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
       var language_id = $(this).attr('attr_id');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/languages-section-delete", 
			type: "POST",
			data: {
				'language_id':language_id
			}, 
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					var languages_section_html = res.languages_section_html;
					$('.languages_section').html(languages_section_html);
					var template_exist = res.template_exist;
					if(template_exist== 'No'){
						//$("[attr=courses_section]").removeClass('pointevent');
					}
				} 
			}
		});
    }
    else{
        return false;
    }
})



$(document).on('click', '.add_references_form_anchor', function(event){
	
    $('.trigger-click-references-section').trigger('click');
});
$(document).on('click', '#references_custom_form button[type="submit"]', function(){
	var form_id = $(this).closest('form').attr('id');
	var form = $("#"+form_id);
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			name: {
				required: true,		
			},
			company: {
				required: true,		
			},
			phone: {
				required: true,		
			},
			email: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/references-section-save", 
				type: "POST",
				data: $("#"+form_id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var references_section_html = res.references_section_html;
						$('.references_section').html(references_section_html);
					} 
				},	
				error: function(xhr, status, error) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})


$(document).on('click', '.reference_update button[type="submit"]', function(){
	var thisButton = this;
	var id = $(this).attr("attr");
	var form = $("#reference_update_custom_form_"+id);
	
	form.validate({
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			name: {
				required: true,		
			},
			company: {
				required: true,		
			},
			phone: {
				required: true,		
			},
			email: {
				required: true,		
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Save');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/references-section-update", 
				type: "POST",
				data: $("#reference_update_custom_form_"+id).serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						var references_section_html = res.references_section_html;
						$('.references_section').html(references_section_html);
					} 
				},	
				error: function(xhr, status, error) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Save');
					$(".education_response").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".education_response").append(err_msgg);	
				}
			});
		}
	});
})


$(document).on('click', '.reference_delete', function(){
	if(confirm("Are you sure you want to delete?")){
       var reference_id = $(this).attr('attr_id');
	   $('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	   $.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
		});
		$.ajax({
			url: "/resume-builder/references-section-delete", 
			type: "POST",
			data: {
				'reference_id':reference_id
			}, 
			success: function(response) {
				var res = JSON.parse(response);
				var response = res.result;
				var message = res.message;
				if (response == 'success') {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					var references_section_html = res.references_section_html;
					$('.references_section').html(references_section_html);
					var template_exist = res.template_exist;
					if(template_exist== 'No'){
						//$("[attr=courses_section]").removeClass('pointevent');
					}
				} 
			}
		});
    }
    else{
        return false;
    }

})


$(document).on('click', '.click_show_btn', function(){
	
	$(this).siblings().show();
})

$(document).on('click', '.select_custom_multiple_sections', function(){
	var attr = $(this).attr('attr');
	//$(this).addClass("pointevent");
	var attr_template_id = $(this).attr('attr_template_id');
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	$.ajax({
		url: "/resume-builder/custom-sections", 
		type: "post",
		data: {
			'attr': attr,
			'attr_template_id':attr_template_id
		}, 
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			 var myDiv = $('.'+attr);
				if ( myDiv.length){
					$('.'+attr).html(response);
					$('html, body').animate({
						scrollTop: $('.'+attr).offset().top
					}, 1000);
				}
				else{
					$('<div class="'+attr+'"></div>').appendTo('.add_section_dynamic');
					$('.'+attr).html(response);
					$('html, body').animate({
						scrollTop: $('.'+attr).offset().top
					}, 1000);	
				}
		}
		
	});
})

$(document).on('click', '.custom_edit_title', function(){
	var edit_id = $(this).attr('attr_id');
	$('.custom_head_'+edit_id).hide();
	$('.custom_head_input_'+edit_id).show();
	$('.custom_head_input_'+edit_id).focus();
})


$(document).on('keyup', '.custom_heading', function(){
	var value = $(this).val();
	var edit_id = $(this).attr('attr_id');
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	$.ajax({
		url: "/resume-builder/custom-section-heading-update", 
		type: "post",
		data: {
			'input_value': value,
			'edit_id':edit_id
		}, 
		success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
		}
	});
})

$(document).on('click', '.course_delete_full_section', function(){
	if(confirm("Are you sure you want to delete?")){
		var delete_id = $(this).attr('attr_id');
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
		$.ajax({
			url: "/resume-builder/course-full-section-delete", 
			type: "post",
			data: {
				'delete_id': delete_id,
			},
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				if (response == 'success') {
					var course_html = res.course_html;
					$('.courses_section').html(course_html);
					$("[attr=courses_section]").removeClass('pointevent');
				} 	
			}
		});
	}
    else{
        return false;
    }

})

$(document).on('click', '.extra_ativity_delete_full_section', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
		var delete_id = $(this).attr('attr_id');
		$.ajax({
			url: "/resume-builder/extra-activity-full-section-delete", 
			type: "post",
			data: {
				'delete_id': delete_id,
			},
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				if (response == 'success') {
					var curricular_activities_section_html = res.curricular_activities_section_html;
					$('.extra_curricular_section').html(curricular_activities_section_html);
					$("[attr=extra_curricular_section]").removeClass('pointevent');
				} 	
			}
		});
	}
    else{
        return false;
    }

})


$(document).on('click', '.internship_delete_full_section', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
		var delete_id = $(this).attr('attr_id');
		$.ajax({
			url: "/resume-builder/internship-full-section-delete", 
			type: "post",
			data: {
				'delete_id': delete_id,
			},
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				if (response == 'success') {
				
					var internships_section_html = res.internships_section_html;
					$('.internships_section').html(internships_section_html);
					$("[attr=internships_section]").removeClass('pointevent');
				} 	
			}
		});
	}
    else{
        return false;
    }
})


$(document).on('click', '.hobby_delete_full_section', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
		var delete_id = $(this).attr('attr_id');
		$.ajax({
			url: "/resume-builder/hobby-full-section-delete", 
			type: "post",
			data: {
				'delete_id': delete_id,
			},
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				if (response == 'success') {
					var hobby_section_html = res.hobby_section_html;
					$('.hobbies_section').html(hobby_section_html);
					$("[attr=hobbies_section]").removeClass('pointevent');
				} 	
			}
		});
	}
    else{
        return false;
    }
})


$(document).on('click', '.languages_delete_full_section', function(){
	if(confirm("Are you sure you want to delete?")){
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
		var delete_id = $(this).attr('attr_id');
		$.ajax({
			url: "/resume-builder/languages-full-section-delete", 
			type: "post",
			data: {
				'delete_id': delete_id,
			},
			success: function(response) {
				$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
				var res = JSON.parse(response);
				var response = res.result;
				if (response == 'success') {
					var languages_section_html = res.languages_section_html;
					$('.languages_section').html(languages_section_html);
					$("[attr=languages_section]").removeClass('pointevent');
				} 	
			}
		});
	}
    else{
        return false;
    }
})


/* references */

$(document).on('click', '#references_form button[type="submit"]', function() {
	
	var thisButton = this;
	var form = $("#references_form");
	form.validate({
		
		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			'first_name[0]': {
				required: true,
			},
			'last_name[0]': {
				required: true,
			},
			'company[0]': {
				required: true,
			},
			'email[0]': {
				required: true,
			},
			'first_name[1]': {
				required: true,
			},
			'last_name[1]': {
				required: true,
			},
			'company[1]': {
				required: true,
			},
			'email[1]': {
				required: true,
			},
			'first_name[2]': {
				required: true,
			},
			'last_name[2]': {
				required: true,
			},
			'company[2]': {
				required: true,
			},
			'email[2]': {
				required: true,
			},
			'first_name[3]': {
				required: true,
			},
			'last_name[3]': {
				required: true,
			},
			'company[3]': {
				required: true,
			},
			'email[3]': {
				required: true,
			},
			'first_name[4]': {
				required: true,
			},
			'last_name[4]': {
				required: true,
			},
			'company[4]': {
				required: true,
			},
			'email[4]': {
				required: true,
			},
			'first_name[5]': {
				required: true,
			},
			'last_name[5]': {
				required: true,
			},
			'company[5]': {
				required: true,
			},
			'email[5]': {
				required: true,
			},
			'first_name[6]': {
				required: true,
			},
			'last_name[6]': {
				required: true,
			},
			'company[6]': {
				required: true,
			},
			'email[6]': {
				required: true,
			},
			'first_name[7]': {
				required: true,
			},
			'last_name[7]': {
				required: true,
			},
			'company[7]': {
				required: true,
			},
			'email[7]': {
				required: true,
			},
			'first_name[8]': {
				required: true,
			},
			'last_name[8]': {
				required: true,
			},
			'company[8]': {
				required: true,
			},
			'email[8]': {
				required: true,
			},
			'first_name[9]': {
				required: true,
			},
			'last_name[9]': {
				required: true,
			},
			'company[9]': {
				required: true,
			},
			'email[9]': {
				required: true,
			},
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Send Reference Requests');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/reference/save", 
				type: "POST",
				data: $("#references_form").serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Send Reference Requests');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						$(".response_message").html("");
						$(".response_message").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");
										
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
						$('#references_form').trigger("reset");
						$('.main-reference').remove();
						window.location.href = $('.next-page-reference').attr("href");
					} 
					else {
						$(".response_message").html("");
						$(".response_message").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
						
						
						
					}
				},	
				
			});
		},
		

	});
});

  
$(document).on('click', '.add_reference_section', function() {
	var numItems = $('.main-reference').length;
	if(numItems<9){
		$.ajax({
			url: "/resume-builder/reference/add-reference-section-dynamic-form", 
			type: "post",
			data: {
				'dynamic_form': 'dynamic_form',
				'numItems': numItems+1
			},
			success: function(response) {
				var res = JSON.parse(response);
				var response = res.result;
				if (response == 'success') {
					var dynamic_html = res.dynamic_html;
					$('.append_form').append(dynamic_html);
					$("[attr=languages_section]").removeClass('pointevent');
				} 	
			}
		});
	}
	else{
		return false;
	}
	
})

$(document).on('click', '#workers_form button[type="submit"]', function() {
	var thisButton = this;
	var form = $("#workers_form");

	form.validate({

		errorElement: 'span',
		errorClass: 'help-block',
		highlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').addClass("has-error");
		},
		unhighlight: function(element, errorClass, validClass) {
			$(element).closest('.form-group').removeClass("has-error");
		},
		rules: {
			first_name: {
				required: true,
			},
			employer_name: {
				required: true,
			},
			company: {
				required: true,
			},
			website: {
				required: true,
			},
			description:{
				required: true,
			}
		},
		submitHandler: function(form) { // Checkout form submit through Ajax
			$(thisButton).html('<i class="fa fa-circle-o-notch fa-spin" ></i> Send Reference Requests');
			$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
				}
			});
			$.ajax({
				url: "/resume-builder/reference-response-update", 
				type: "POST",
				data: $("#workers_form").serialize(), 
				success: function(response) {
					$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
					$(thisButton).html('Send Reference Requests');
					var res = JSON.parse(response);
					var response = res.result;
					var message = res.message;
					if (response == 'success') {
						$(".response_message").html("");
						$(".response_message").append("<ul class='alert alert-success' role='alert'>"+message+"</ul>");	
						setTimeout(function(){
							$('.alert').remove();
						}, 2000);
						window.location.href = '/resume-builder/thankyou';
					} 
					else {
						$(".response_message").html("");
						$(".response_message").append("<ul class='alert alert-danger' role='alert'>"+message+"</ul>");
					}
				},	
				error: function(xhr, status, error) {
					$(thisButton).html('Send Reference Requests');
					$(".response_message").html("");
					var err_msgg  = "";											
					err_msgg += "<ul class='alert alert-danger' role='alert'>";		
					$.each(xhr.responseJSON.errors, function (key, item) 										
					  {
						err_msgg += "<li>" + item + "</li>";												
					  });
					err_msgg += "</ui>";
					$(".response_message").append(err_msgg);	
				}
			});
		}
	});
});


$(document).on('click', '.fields_check', function() {
	var id = $("input[name='basic_form_id']").val();
	if(id == ''){
		alert('Please Complete basic information form to proceed');	
	}
	$.ajax({
		url: "/resume-builder/next-check", 
		type: "post",
		data: {
			'id': id,
		},
		success: function(response) {
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
			
				window.location.href = $('.next-page').attr("href");
			}
			else{
				alert(res.message);	
			}	
		}
	});
	
})



function onblurBasicInfo(field_name,field_value, table, table_id,template_id){
	//alert(field_value.value);
	// alert(table);
	// alert(table_id);
	// alert(template_id);
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	$.ajax({
		url: "/resume-builder/field-change", 
		type: "post",
		data: {
			'field_name':field_name,
			'field_value': field_value.value,
			'table_name': table,
			'table_id': table_id,
			'template_id': template_id,
		},
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
				$('.resume_pic').html(res.formhtml);
			}	
		}
	});
}

function onblurworkIndustry(field_name,field_value, table, table_id,template_id){
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	$.ajax({
		url: "/resume-builder/skill-change", 
		type: "post",
		data: {
			'field_name':field_name,
			'field_value': field_value,
			'table_name': table,
			'table_id': table_id,
			'template_id': template_id,
		},
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
				$('.resume_pic').html(res.formhtml);
			}	
		}
	});
}

function onblurLanguageInfo(field_name,field_value, table, table_id,template_id){
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	$.ajax({
		url: "/resume-builder/language-info-change", 
		type: "post",
		data: {
			'field_name':field_name,
			'field_value': field_value,
			'table_name': table,
			'table_id': table_id,
			'template_id': template_id,
		},
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
				$('.resume_pic').html(res.formhtml);
			}	
		}
	});
}



function onblurSkillInfo(field_name,field_value, table, table_id,template_id){
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	$.ajax({
		url: "/resume-builder/skill-change", 
		type: "post",
		data: {
			'field_name':field_name,
			'field_value': field_value,
			'table_name': table,
			'table_id': table_id,
			'template_id': template_id,
		},
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
				$('.resume_pic').html(res.formhtml);
			}	
		}
	});
}



$(document).on('hidden.bs.modal','#edit_skill_modal', function () {
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	var skill_userid = $('.skill_userid').val();
	var skill_templateid = $('.skill_tempid').val();
	$.ajax({
		url: "/resume-builder/skill-modal-close", 
		type: "post",
		data: {
			'skill_userid':skill_userid,
			'skill_templateid': skill_templateid,
		},
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
				var skills_html = res.skills_html;
				$('.skilldata').html(skills_html);
			}	
		}
	});
})


$(document).on('blur','.experience_change_check', function () {
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	var form_id = $(this).closest('form').attr('id');
	var form = $("#"+form_id);
		
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
		}
	});
	$.ajax({
		url: "/resume-builder/experience-edit-form-change", 
		type: "POST",
		data: form.serialize(), 
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			var message = res.message;
			if (response == 'success') {	
				var formhtml = res.formhtml;
				$('.resume_pic').html(formhtml);
			}
		}
	});
})


$(document).on('hidden.bs.modal','.emp_modal', function () {
	
	var experience_form =  $(this).find("form").attr('id');
	var form = $("#"+experience_form);
	$.ajax({
		url: "/resume-builder/experience-modal-close", 
		type: "post",
		data:  form.serialize(),
		success: function(response) {
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
				var experience_html = res.experience_html;
				$('.experience_summary').html(experience_html);
			}	
		}
	});
})

$(document).on('blur','.education_change_check', function () {
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	var form_id = $(this).closest('form').attr('id');
	var form = $("#"+form_id);
		
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
		}
	});
	$.ajax({
		url: "/resume-builder/education-edit-form-change", 
		type: "POST",
		data: form.serialize(), 
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			var message = res.message;
			if (response == 'success') {	
				var formhtml = res.formhtml;
				$('.resume_pic').html(formhtml);
			}
		}
	});
})

$(document).on('hidden.bs.modal','.educate_edit', function () {
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	var education_form =  $(this).find("form").attr('id');
	var form = $("#"+education_form);
	$.ajax({
		url: "/resume-builder/education-modal-close", 
		type: "post",
		data:  form.serialize(),
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			if (response == 'success') {
				var education_html = res.education_html;
				$('.education_summary').html(education_html);
			}	
		}
	});
})

$(document).on('blur','.hobby_change_check', function () {
	var form_id = $(this).closest('form').attr('id');
	var form = $("#"+form_id);
		$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
		}
	});
	$.ajax({
		url: "/resume-builder/hobby-edit-form-change", 
		type: "POST",
		data: form.serialize(), 
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			var message = res.message;
			if (response == 'success') {	
				var formhtml = res.formhtml;
				$('.resume_pic').html(formhtml);
			}
		}
	});
})

$(document).on('blur','.basicinfo_change_check', function () {
	$('.sc-saving-section').html('<i class="fa fa-circle-o-notch fa-spin" ></i><span class="save_span">Saving....</span>');
	var form = $("#resume_basic_information_form");
	let formData = new FormData(form.get(0));
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // get the meta csrf token
		}
	});
	$.ajax({
		url: "/resume-builder/basic-information-form-change", 
		type: "POST",
		data: formData, 
		contentType: false,
		processData: false,
		success: function(response) {
			$('.sc-saving-section').html('<i class="fa fa-check" aria-hidden="true"></i><span class="save_span">Saved</span>');
			var res = JSON.parse(response);
			var response = res.result;
			var message = res.message;
			if (response == 'success') {
				var inserted_id = res.inserted_id;
				$("input[name='basic_form_id']").val(inserted_id);
				var formhtml = res.formhtml;
				$('.resume_pic').html(formhtml);
			} 
		}
	});
	
})



