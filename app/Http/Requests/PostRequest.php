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

namespace App\Http\Requests;

use App\Helpers\Number;
use App\Helpers\RemoveFromString;
use App\Models\Package;
use App\Rules\BetweenRule;
use App\Rules\BlacklistDomainRule;
use App\Rules\BlacklistEmailRule;
use App\Rules\BlacklistTitleRule;
use App\Rules\BlacklistWordRule;
use App\Rules\DateIsValidRule;
use App\Rules\EmailRule;
use App\Rules\MbAlphanumericRule;
use App\Rules\SluggableRule;
use Mews\Purifier\Facades\Purifier;

class PostRequest extends Request
{
	public static $packages;
	public static $paymentMethods;
	
	/**
	 * Prepare the data for validation.
	 *
	 * @return void
	 */
	protected function prepareForValidation()
	{
		// Don't apply this to the Admin Panel
		if (isFromAdminPanel()) {
			return;
		}
		
		$input = $this->all();
		
		// title
		if ($this->filled('title')) {
			$input['title'] = $this->input('title');
			$input['title'] = strCleanerLite($input['title']);
			$input['title'] = onlyNumCleaner($input['title']);
			$input['title'] = RemoveFromString::contactInfo($input['title'], true);
		}
		
		// company.name
		if ($this->filled('company.name')) {
			$input['company']['name'] = $this->input('company.name');
			$input['company']['name'] = onlyNumCleaner($input['company']['name']);
			$input['company']['name'] = RemoveFromString::contactInfo($input['company']['name'], true);
		}
		
		// company.description
		if ($this->filled('company.description')) {
			$input['company']['description'] = $this->input('company.description');
			$input['company']['description'] = onlyNumCleaner($input['company']['description']);
			$input['company']['description'] = RemoveFromString::contactInfo($input['company']['description'], true);
		}
		
		// description
		if ($this->filled('description')) {
			$input['description'] = $this->input('description');
			$input['description'] = onlyNumCleaner($input['description']);
			if (config('settings.single.wysiwyg_editor') != 'none') {
				try {
					$input['description'] = Purifier::clean($input['description']);
				} catch (\Exception $e) {
				}
			} else {
				$input['description'] = strCleaner($input['description']);
			}
			$input['description'] = RemoveFromString::contactInfo($input['description'], true);
		}
		
		// salary_min
		if ($this->has('salary_min')) {
			if ($this->filled('salary_min')) {
				$input['salary_min'] = $this->input('salary_min');
				// If field's value contains only numbers and dot,
				// Then decimal separator is set as dot.
				if (preg_match('/^[0-9\.]*$/', $input['salary_min'])) {
					$input['salary_min'] = Number::formatForDb($input['salary_min'], '.');
				} else {
					$input['salary_min'] = Number::formatForDb($input['salary_min'], config('currency.decimal_separator', '.'));
				}
			} else {
				$input['salary_min'] = null;
			}
		}
		
		// salary_max
		if ($this->has('salary_max')) {
			if ($this->filled('salary_max')) {
				$input['salary_max'] = $this->input('salary_max');
				// If field's value contains only numbers and dot,
				// Then decimal separator is set as dot.
				if (preg_match('/^[0-9\.]*$/', $input['salary_max'])) {
					$input['salary_max'] = Number::formatForDb($input['salary_max'], '.');
				} else {
					$input['salary_max'] = Number::formatForDb($input['salary_max'], config('currency.decimal_separator', '.'));
				}
			} else {
				$input['salary_max'] = null;
			}
		}
		
		// contact_name
		if ($this->filled('contact_name')) {
			$input['contact_name'] = strCleanerLite($this->input('contact_name'));
			$input['contact_name'] = onlyNumCleaner($input['contact_name']);
		}
		
		// phone
		if ($this->filled('phone')) {
			$input['phone'] = phoneFormatInt($this->input('phone'), $this->input('country_code', session('country_code')));
		}
		
		// tags
		if ($this->filled('tags')) {
			$input['tags'] = tagCleaner($this->input('tags'));
		}
		
		// application_url
		if ($this->filled('application_url')) {
			$input['application_url'] = addHttp($this->input('application_url'));
		}
		
		request()->merge($input); // Required!
		$this->merge($input);
	}
	
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		$guard = isFromApi() ? 'sanctum' : null;
		
		$cat = null;
		
		$rules = [
			'category_id'    => ['required', 'not_in:0'],
			'post_type_id'   => ['required', 'not_in:0'],
			'title'          => [
				'required',
				new BetweenRule(2, 150),
				new MbAlphanumericRule(),
				new SluggableRule(),
				new BlacklistTitleRule(),
			],
			'description'    => ['required', new BetweenRule(5, 12000), new MbAlphanumericRule(), new BlacklistWordRule()],
			'salary_type_id' => ['required', 'not_in:0'],
			'contact_name'   => ['required', new BetweenRule(2, 200)],
			'email'          => ['max:100', new BlacklistEmailRule(), new BlacklistDomainRule()],
			'phone'          => ['max:20'],
			'city_id'        => ['required', 'not_in:0'],
			'start_date'     => [new DateIsValidRule('future')],
		];
		
		if (!auth($guard)->check()) {
			$rules['accept_terms'] = ['accepted'];
		}
		
		// CREATE
		if (in_array($this->method(), ['POST', 'CREATE'])) {
			// Single Step Form
			if (config('settings.single.publication_form_type') == '2') {
				// Package & PaymentMethod
				if (
					isset(self::$packages, self::$paymentMethods)
					&& self::$packages->count() > 0
					&& self::$paymentMethods->count() > 0
				) {
					// Require 'package_id' if Packages are available
					$rules['package_id'] = 'required';
					
					// Require 'payment_method_id' if the selected package's price > 0
					if ($this->has('package_id')) {
						$package = Package::find($this->input('package_id'));
						if (!empty($package) && $package->price > 0) {
							$rules['payment_method_id'] = 'required|not_in:0';
						}
					}
				}
			}
			
			// CAPTCHA
			$rules = $this->captchaRules($rules);
		}
		
		// UPDATE
		// if (in_array($this->method(), ['PUT', 'PATCH', 'UPDATE'])) {}
		
		// COMMON
		
		// Location
		if (in_array(config('country.admin_type'), ['1', '2']) && config('country.admin_field_active') == 1) {
			$rules['admin_code'] = ['required', 'not_in:0'];
		}
		
		// Email
		if ($this->filled('email')) {
			$rules['email'][] = 'email';
			$rules['email'][] = new EmailRule();
		}
		if (isEnabledField('email')) {
			if (isEnabledField('phone') && isEnabledField('email')) {
				// Email address is required for Guests
				$rules['email'][] = (!auth($guard)->check()) ? 'required' : 'required_without:phone';
			} else {
				$rules['email'][] = 'required';
			}
		}
		
		// Phone
		if (config('settings.sms.phone_verification') == 1) {
			if ($this->filled('phone')) {
				$countryCode = $this->input('country_code', config('country.code'));
				if ($countryCode == 'UK') {
					$countryCode = 'GB';
				}
				$rules['phone'][] = 'phone:' . $countryCode;
			}
		}
		if (isEnabledField('phone')) {
			if (isEnabledField('phone') && isEnabledField('email')) {
				$rules['phone'][] = 'required_without:email';
			} else {
				$rules['phone'][] = 'required';
			}
		}
		
		// Company
		if (!$this->filled('company_id') || empty($this->input('company_id'))) {
			$rules['company.name'] = ['required', new BetweenRule(2, 200), new BlacklistTitleRule()];
			$rules['company.description'] = ['required', new BetweenRule(5, 1000), new BlacklistWordRule()];
			
			// Check 'company.logo' is required
			if ($this->file('company.logo')) {
				$rules['company.logo'] = [
					'required',
					'image',
					'mimes:' . getUploadFileTypes('image'),
					'max:' . (int)config('settings.upload.max_image_size', 1000),
				];
			}
		} else {
			$rules['company_id'] = ['required', 'not_in:0'];
		}
		
		// Application URL
		if ($this->filled('application_url')) {
			$rules['application_url'] = ['url'];
		}
		
		/*
		 * Tags (Only allow letters, numbers, spaces and ',;_-' symbols)
		 *
		 * Explanation:
		 * [] 	=> character class definition
		 * p{L} => matches any kind of letter character from any language
		 * p{N} => matches any kind of numeric character
		 * _- 	=> matches underscore and hyphen
		 * + 	=> Quantifier — Matches between one to unlimited times (greedy)
		 * /u 	=> Unicode modifier. Pattern strings are treated as UTF-16. Also causes escape sequences to match unicode characters
		 */
		if ($this->filled('tags')) {
			$rules['tags'] = ['regex:/^[\p{L}\p{N} ,;_-]+$/u'];
		}
		
		return $rules;
	}
	
	/**
	 * Get custom attributes for validator errors.
	 *
	 * @return array
	 */
	public function attributes()
	{
		$attributes = [];
		
		if ($this->file('company.logo')) {
			$attributes['company.logo'] = t('logo');
		}
		
		return $attributes;
	}
	
	/**
	 * @return array
	 */
	public function messages()
	{
		$messages = [];
		
		// Logo
		if ($this->file('company.logo')) {
			// uploaded
			$maxSize = (int)config('settings.upload.max_image_size', 1000); // In KB
			$maxSize = $maxSize * 1024;                                     // Convert KB to Bytes
			$msg = t('large_file_uploaded_error', [
				'field'   => t('logo'),
				'maxSize' => readableBytes($maxSize),
			]);
			
			$uploadMaxFilesizeStr = @ini_get('upload_max_filesize');
			$postMaxSizeStr = @ini_get('post_max_size');
			if (!empty($uploadMaxFilesizeStr) && !empty($postMaxSizeStr)) {
				$uploadMaxFilesize = (int)strToDigit($uploadMaxFilesizeStr);
				$postMaxSize = (int)strToDigit($postMaxSizeStr);
				
				$serverMaxSize = min($uploadMaxFilesize, $postMaxSize);
				$serverMaxSize = $serverMaxSize * 1024 * 1024; // Convert MB to KB to Bytes
				if ($serverMaxSize < $maxSize) {
					$msg = t('large_file_uploaded_error_system', [
						'field'   => t('logo'),
						'maxSize' => readableBytes($serverMaxSize),
					]);
				}
			}
			
			$messages['company.logo.uploaded'] = $msg;
		}
		
		// Category & Sub-Category
		if ($this->filled('parent_id') && !empty($this->input('parent_id'))) {
			$messages['category_id.required'] = t('The field is required', ['field' => mb_strtolower(t('Sub-Category'))]);
			$messages['category_id.not_in'] = t('The field is required', ['field' => mb_strtolower(t('Sub-Category'))]);
		}
		
		// Single Step Form
		if (config('settings.single.publication_form_type') == '2') {
			// Package & PaymentMethod
			$messages['package_id.required'] = trans('validation.required_package_id');
			$messages['payment_method_id.required'] = t('validation.required_payment_method_id');
			$messages['payment_method_id.not_in'] = t('validation.required_payment_method_id');
		}
		
		return $messages;
	}
}
