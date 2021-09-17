@push('after_styles_stack')
	@include('layouts.inc.tools.wysiwyg.css')
	
	<link href="{{ url('assets/plugins/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet">
	@if (config('lang.direction') == 'rtl')
		<link href="{{ url('assets/plugins/bootstrap-fileinput/css/fileinput-rtl.min.css') }}" rel="stylesheet">
	@endif
	
	{{-- Multi Steps Form --}}
	@if (config('settings.single.publication_form_type') == '1')
	<style>
		.krajee-default.file-preview-frame:hover:not(.file-preview-error) {
			box-shadow: 0 0 5px 0 #666666;
		}
	</style>
	@endif
	
	{{-- Single Step Form --}}
	@if (config('settings.single.publication_form_type') == '2')
	<style>
		.krajee-default.file-preview-frame:hover:not(.file-preview-error) {
			box-shadow: 0 0 5px 0 #666666;
		}
		.file-loading:before {
			content: " {{ t('Loading') }}...";
		}
		/* Preview Frame Size */
		/*
		.krajee-default.file-preview-frame .kv-file-content,
		.krajee-default .file-caption-info,
		.krajee-default .file-size-info {
			width: 90px;
		}
		*/
		.krajee-default.file-preview-frame .kv-file-content {
			height: auto;
		}
		.krajee-default.file-preview-frame .file-thumbnail-footer {
			height: 30px;
		}
	</style>
	@endif
	
	<link href="{{ url('assets/plugins/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">
@endpush

@push('after_scripts_stack')
	@include('layouts.inc.tools.wysiwyg.js')
	
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.13.1/jquery.validate.min.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/1.2.3/jquery.payment.min.js"></script>
	@if (file_exists(public_path() . '/assets/plugins/forms/validation/localization/messages_'.config('app.locale').'.min.js'))
		<script src="{{ url('assets/plugins/forms/validation/localization/messages_'.config('app.locale').'.min.js') }}" type="text/javascript"></script>
	@endif
	
	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/plugins/sortable.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-fileinput/themes/fas/theme.js') }}" type="text/javascript"></script>
	<script src="{{ url('js/fileinput/locales/' . config('app.locale') . '.js') }}" type="text/javascript"></script>
	
	<script src="{{ url('assets/plugins/momentjs/moment.min.js') }}" type="text/javascript"></script>
	<script src="{{ url('assets/plugins/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
	
	<?php
	$postInput = $postInput ?? [];
	$countryCode = (isset($post, $post->country_code) && !empty($post->country_code)) ? $post->country_code : data_get($postInput, 'country_code', config('country.code', 0));
	$selectedAdminCode = (isset($admin) && !empty($admin)) ? $admin->code : data_get($postInput, 'admin_code', 0);
	$cityId = isset($post, $post->city_id) ? (int)$post->city_id : data_get($postInput, 'city_id', 0);
	?>
	
	<script>
		/* Translation */
		var lang = {
			'select': {
				'country': "{{ t('select_a_country') }}",
				'admin': "{{ t('select_a_location') }}",
				'city': "{{ t('select_a_city') }}"
			},
			'price': "{{ t('Price') }}",
			'salary': "{{ t('Salary') }}",
			'nextStepBtnLabel': {
				'next': "{{ t('Next') }}",
				'submit': "{{ t('Update') }}"
			}
		};
		
		var stepParam = 0;
		
		/* Company */
		var postCompanyId = '{{ old('company_id', ($postCompanyId ?? 0)) }}';
		getCompany(postCompanyId);
		
		/* Locations */
		var countryCode = '{{ old('country_code', $countryCode) }}';
		var adminType = '{{ config('country.admin_type', 0) }}';
		var selectedAdminCode = '{{ old('admin_code', $selectedAdminCode) }}';
		var cityId = '{{ old('city_id', $cityId) }}';
		
		/* Packages */
		var packageIsEnabled = false;
		@if (isset($packages, $paymentMethods) && $packages->count() > 0 && $paymentMethods->count() > 0)
			packageIsEnabled = true;
		@endif
	</script>
	<script>
		$(document).ready(function() {
			/* Company */
			$('#companyId').bind('click, change', function() {
				postCompanyId = $(this).val();
				getCompany(postCompanyId);
			});
			
			/* Company logo's button */
			$('#companyFormLink').bind('click', function(e) {
				let companyLink = $(this).attr('href');
				if (companyLink.indexOf('/new/') !== -1) {
					e.preventDefault();
					getCompany(0);
					
					return false;
				}
			});
			
			$('#tags').tagit({
				fieldName: 'tags',
				placeholderText: '{{ t('add a tag') }}',
				caseSensitive: true,
				allowDuplicates: false,
				allowSpaces: false,
				tagLimit: {{ (int)config('settings.single.tags_limit', 15) }},
				singleFieldDelimiter: ','
			});
		});
		
		$(function() {
			/*
			 * start_date field
			 * https://www.daterangepicker.com/#options
			 */
			let dateEl = $('#postForm .cf-date');
			dateEl.daterangepicker({
				autoUpdateInput: false,
				autoApply: true,
				showDropdowns: true,
				minYear: parseInt(moment().format('YYYY')),
				maxYear: parseInt(moment().format('YYYY')) + 10,
				locale: {
					format: '{{ t('datepicker_format') }}',
					applyLabel: "{{ t('datepicker_applyLabel') }}",
					cancelLabel: "{{ t('datepicker_cancelLabel') }}",
					fromLabel: "{{ t('datepicker_fromLabel') }}",
					toLabel: "{{ t('datepicker_toLabel') }}",
					customRangeLabel: "{{ t('datepicker_customRangeLabel') }}",
					weekLabel: "{{ t('datepicker_weekLabel') }}",
					daysOfWeek: [
						"{{ t('datepicker_sunday') }}",
						"{{ t('datepicker_monday') }}",
						"{{ t('datepicker_tuesday') }}",
						"{{ t('datepicker_wednesday') }}",
						"{{ t('datepicker_thursday') }}",
						"{{ t('datepicker_friday') }}",
						"{{ t('datepicker_saturday') }}"
					],
					monthNames: [
						"{{ t('January') }}",
						"{{ t('February') }}",
						"{{ t('March') }}",
						"{{ t('April') }}",
						"{{ t('May') }}",
						"{{ t('June') }}",
						"{{ t('July') }}",
						"{{ t('August') }}",
						"{{ t('September') }}",
						"{{ t('October') }}",
						"{{ t('November') }}",
						"{{ t('December') }}"
					],
					firstDay: 1
				},
				singleDatePicker: true,
				startDate: moment().format('{{ t('datepicker_format') }}')
			});
			dateEl.on('apply.daterangepicker', function(ev, picker) {
				if (picker.startDate.format('YYYYMMDD') >= parseInt(moment().format('YYYYMMDD'))) {
					$(this).val(picker.startDate.format('{{ t('datepicker_format') }}'));
				} else {
					alert('{{ t('date_cannot_be_in_the_past') }}');
					$(this).val('');
				}
			});
		});
	</script>
	
	<script src="{{ url('assets/js/app/d.select.category.js') . vTime() }}"></script>
	<script src="{{ url('assets/js/app/d.select.location.js') . vTime() }}"></script>
@endpush
