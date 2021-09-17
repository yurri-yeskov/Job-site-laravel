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

namespace App\Http\Requests\Admin;

use App\Helpers\Number;
use App\Rules\BetweenRule;
use App\Rules\BlacklistTitleRule;
use App\Rules\BlacklistWordRule;

class PostRequest extends Request
{
	/**
	 * Prepare the data for validation.
	 *
	 * @return void
	 */
	protected function prepareForValidation()
	{
		$input = $this->all();
		
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
		$rules = [
            'category_id'         => ['required', 'not_in:0'],
            'post_type_id'        => ['required', 'not_in:0'],
            'company_name'        => ['required', new BetweenRule(2, 200), new BlacklistTitleRule()],
            'company_description' => ['required', new BetweenRule(10, 3000), new BlacklistWordRule()],
            'title'               => ['required', new BetweenRule(2, 150)],
            'description'         => ['required', new BetweenRule(5, 12000)],
            'contact_name'        => ['required', new BetweenRule(3, 200)],
            'email'               => ['required', 'email', 'max:100'],
        ];
	
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
}
