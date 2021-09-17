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

namespace App\Observers\Traits\Setting;

use Jackiedo\DotenvEditor\Facades\DotenvEditor;

trait SmsTrait
{
	/**
	 * Updating
	 *
	 * @param $setting
	 * @param $original
	 */
	public function smsUpdating($setting, $original)
	{
		$this->saveParametersInEnvFile($setting);
	}
	
	/**
	 * Save SMS Settings in the /.env file
	 *
	 * @param $setting
	 */
	private function saveParametersInEnvFile($setting)
	{
		$envFileHasChanged = false;
		
		if (
			!DotenvEditor::keyExists('NEXMO_KEY')
			&& !DotenvEditor::keyExists('NEXMO_SECRET')
			&& !DotenvEditor::keyExists('NEXMO_FROM')
			&& !DotenvEditor::keyExists('TWILIO_USERNAME')
			&& !DotenvEditor::keyExists('TWILIO_PASSWORD')
			&& !DotenvEditor::keyExists('TWILIO_AUTH_TOKEN')
			&& !DotenvEditor::keyExists('TWILIO_ACCOUNT_SID')
			&& !DotenvEditor::keyExists('TWILIO_FROM')
			&& !DotenvEditor::keyExists('TWILIO_ALPHA_SENDER')
			&& !DotenvEditor::keyExists('TWILIO_SMS_SERVICE_SID')
			&& !DotenvEditor::keyExists('TWILIO_DEBUG_TO')
		) {
			DotenvEditor::addEmpty();
			$envFileHasChanged = true;
		}
		
		if (array_key_exists('nexmo_key', $setting->value)) {
			if (!empty($setting->value['nexmo_key'])) {
				DotenvEditor::setKey('NEXMO_KEY', $setting->value['nexmo_key']);
			} else {
				if (DotenvEditor::keyExists('NEXMO_KEY')) {
					DotenvEditor::deleteKey('NEXMO_KEY');
				}
			}
		}
		if (array_key_exists('nexmo_secret', $setting->value)) {
			if (!empty($setting->value['nexmo_secret'])) {
				DotenvEditor::setKey('NEXMO_SECRET', $setting->value['nexmo_secret']);
			} else {
				if (DotenvEditor::keyExists('NEXMO_SECRET')) {
					DotenvEditor::deleteKey('NEXMO_SECRET');
				}
			}
		}
		if (array_key_exists('nexmo_from', $setting->value)) {
			if (!empty($setting->value['nexmo_from'])) {
				DotenvEditor::setKey('NEXMO_FROM', $setting->value['nexmo_from']);
			} else {
				if (DotenvEditor::keyExists('NEXMO_FROM')) {
					DotenvEditor::deleteKey('NEXMO_FROM');
				}
			}
		}
		if (array_key_exists('twilio_username', $setting->value)) {
			if (!empty($setting->value['twilio_username'])) {
				DotenvEditor::setKey('TWILIO_USERNAME', $setting->value['twilio_username']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_USERNAME')) {
					DotenvEditor::deleteKey('TWILIO_USERNAME');
				}
			}
		}
		if (array_key_exists('twilio_password', $setting->value)) {
			if (!empty($setting->value['twilio_password'])) {
				DotenvEditor::setKey('TWILIO_PASSWORD', $setting->value['twilio_password']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_PASSWORD')) {
					DotenvEditor::deleteKey('TWILIO_PASSWORD');
				}
			}
		}
		if (array_key_exists('twilio_auth_token', $setting->value)) {
			if (!empty($setting->value['twilio_auth_token'])) {
				DotenvEditor::setKey('TWILIO_AUTH_TOKEN', $setting->value['twilio_auth_token']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_AUTH_TOKEN')) {
					DotenvEditor::deleteKey('TWILIO_AUTH_TOKEN');
				}
			}
		}
		if (array_key_exists('twilio_account_sid', $setting->value)) {
			if (!empty($setting->value['twilio_account_sid'])) {
				DotenvEditor::setKey('TWILIO_ACCOUNT_SID', $setting->value['twilio_account_sid']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_ACCOUNT_SID')) {
					DotenvEditor::deleteKey('TWILIO_ACCOUNT_SID');
				}
			}
		}
		if (array_key_exists('twilio_from', $setting->value)) {
			if (!empty($setting->value['twilio_from'])) {
				DotenvEditor::setKey('TWILIO_FROM', $setting->value['twilio_from']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_FROM')) {
					DotenvEditor::deleteKey('TWILIO_FROM');
				}
			}
		}
		if (array_key_exists('twilio_alpha_sender', $setting->value)) {
			if (!empty($setting->value['twilio_alpha_sender'])) {
				DotenvEditor::setKey('TWILIO_ALPHA_SENDER', $setting->value['twilio_alpha_sender']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_ALPHA_SENDER')) {
					DotenvEditor::deleteKey('TWILIO_ALPHA_SENDER');
				}
			}
		}
		if (array_key_exists('twilio_sms_service_sid', $setting->value)) {
			if (!empty($setting->value['twilio_sms_service_sid'])) {
				DotenvEditor::setKey('TWILIO_SMS_SERVICE_SID', $setting->value['twilio_sms_service_sid']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_SMS_SERVICE_SID')) {
					DotenvEditor::deleteKey('TWILIO_SMS_SERVICE_SID');
				}
			}
		}
		if (array_key_exists('twilio_debug_to', $setting->value)) {
			if (!empty($setting->value['twilio_debug_to'])) {
				DotenvEditor::setKey('TWILIO_DEBUG_TO', $setting->value['twilio_debug_to']);
			} else {
				if (DotenvEditor::keyExists('TWILIO_DEBUG_TO')) {
					DotenvEditor::deleteKey('TWILIO_DEBUG_TO');
				}
			}
		}
		
		if (
			array_key_exists('nexmo_key', $setting->value)
			|| array_key_exists('nexmo_secret', $setting->value)
			|| array_key_exists('nexmo_from', $setting->value)
			|| array_key_exists('twilio_username', $setting->value)
			|| array_key_exists('twilio_password', $setting->value)
			|| array_key_exists('twilio_auth_token', $setting->value)
			|| array_key_exists('twilio_account_sid', $setting->value)
			|| array_key_exists('twilio_from', $setting->value)
			|| array_key_exists('twilio_alpha_sender', $setting->value)
			|| array_key_exists('twilio_sms_service_sid', $setting->value)
			|| array_key_exists('twilio_debug_to', $setting->value)
		) {
			$envFileHasChanged = true;
		}
		
		// Save the /.env file
		if ($envFileHasChanged) {
			DotenvEditor::save();
			
			// Some time of pause
			sleep(2);
		}
	}
}
