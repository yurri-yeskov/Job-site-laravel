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

namespace App\Http\Controllers\Web\Install\Traits\Install\Db;

use App\Models\Country;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

/*
 * NOTE: THIS IS UNUSED WAITING ONE LARAVEL'S MIGRATION SYSTEM UPDATE
 * For now it's not possible to rollback a specific Laravel migration (very important for the plugins migrations).
 */
trait MigrationsTrait
{
	/**
	 * Import from Laravel Migrations
	 * php artisan migrate --path=/database/migrations --force
	 *
	 * Rollback & Re-runs all of the Migrations
	 * php artisan migrate:refresh --path=/database/migrations --force
	 *
	 * Drop All Tables & Migrate
	 * php artisan migrate:fresh --path=/database/migrations --force
	 */
	protected function runMigrations()
	{
		Artisan::call('migrate', [
			'--path'  => '/database/migrations',
			'--force' => true,
		]);
		
		// Run Sanctum Migrations
		Artisan::call('migrate', [
			'--path'  => '/vendor/laravel/sanctum/database/migrations',
			'--force' => true,
		]);
		
		// sleep(2);
	}
	
	/**
	 * Import from Laravel Seeders
	 * php artisan db:seed --force
	 */
	protected function runSeeders()
	{
		Artisan::call('db:seed', ['--force' => true]);
		
		// sleep(2);
	}
	
	/**
	 * Insert & Update the Site Information
	 *
	 * @param $siteInfo
	 */
	protected function runSiteInfoSeeder($siteInfo)
	{
		try {
			
			DB::statement('SET FOREIGN_KEY_CHECKS=0;');
			
			// USERS - Insert default superuser
			$usersTable = (new User())->getTable();
			DB::table($usersTable)->truncate();
			$user = [
				'country_code'   => $siteInfo['default_country'],
				'user_type_id'   => 1,
				'gender_id'      => 1,
				'name'           => $siteInfo['name'],
				'about'          => 'Administrator',
				'email'          => $siteInfo['email'],
				'password'       => Hash::make($siteInfo['password']),
				'is_admin'       => 1,
				'verified_email' => 1,
				'verified_phone' => 1,
				'created_at'     => now(),
				'updated_at'     => now(),
			];
			DB::table($usersTable)->insert($user);
			
			// Setup ACL system
			$this->setupAclSystem();
			
			// COUNTRIES - Activate default country
			$countriesTable = (new Country())->getTable();
			DB::table($countriesTable)->where('code', $siteInfo['default_country'])->update(['active' => 1]);
			
			// SETTINGS - Update settings
			$settingsTable = (new Setting())->getTable();
			
			// App
			$app = [
				'purchase_code' => isset($siteInfo['purchase_code']) ? $siteInfo['purchase_code'] : '',
				'name'          => isset($siteInfo['site_name']) ? $siteInfo['site_name'] : '',
				'slogan'        => isset($siteInfo['site_slogan']) ? $siteInfo['site_slogan'] : '',
				'email'         => isset($siteInfo['email']) ? $siteInfo['email'] : '',
			];
			DB::table($settingsTable)->where('key', 'app')->update(['value' => json_encode($app)]);
			
			// Geo Location
			$geoLocation = [
				'default_country_code' => isset($siteInfo['default_country']) ? $siteInfo['default_country'] : '',
			];
			DB::table($settingsTable)->where('key', 'geo_location')->update(['value' => json_encode($geoLocation)]);
			
			// Mail
			$mail = [];
			$mail['email_sender'] = isset($siteInfo['email']) ? $siteInfo['email'] : '';
			$mail['driver'] = isset($siteInfo['mail_driver']) ? $siteInfo['mail_driver'] : '';
			if (isset($siteInfo['mail_driver'])) {
				if ($siteInfo['mail_driver'] == 'sendmail') {
					$mail['sendmail_path'] = isset($siteInfo['sendmail_path']) ? $siteInfo['sendmail_path'] : '';
				}
				if (in_array($siteInfo['mail_driver'], ['smtp', 'mailgun', 'mandrill', 'ses', 'sparkpost'])) {
					$mail['host'] = isset($siteInfo['smtp_hostname']) ? $siteInfo['smtp_hostname'] : '';
					$mail['port'] = isset($siteInfo['smtp_port']) ? $siteInfo['smtp_port'] : '';
					$mail['encryption'] = isset($siteInfo['smtp_encryption']) ? $siteInfo['smtp_encryption'] : '';
					$mail['username'] = isset($siteInfo['smtp_username']) ? $siteInfo['smtp_username'] : '';
					$mail['password'] = isset($siteInfo['smtp_password']) ? $siteInfo['smtp_password'] : '';
				}
				if ($siteInfo['mail_driver'] == 'mailgun') {
					$mail['mailgun_domain'] = isset($siteInfo['mailgun_domain']) ? $siteInfo['mailgun_domain'] : '';
					$mail['mailgun_secret'] = isset($siteInfo['mailgun_secret']) ? $siteInfo['mailgun_secret'] : '';
				}
				if ($siteInfo['mail_driver'] == 'mandrill') {
					$mail['mandrill_secret'] = isset($siteInfo['mandrill_secret']) ? $siteInfo['mandrill_secret'] : '';
				}
				if ($siteInfo['mail_driver'] == 'ses') {
					$mail['ses_key'] = isset($siteInfo['ses_key']) ? $siteInfo['ses_key'] : '';
					$mail['ses_secret'] = isset($siteInfo['ses_secret']) ? $siteInfo['ses_secret'] : '';
					$mail['ses_region'] = isset($siteInfo['ses_region']) ? $siteInfo['ses_region'] : '';
				}
				if ($siteInfo['mail_driver'] == 'sparkpost') {
					$mail['sparkpost_secret'] = isset($siteInfo['sparkpost_secret']) ? $siteInfo['sparkpost_secret'] : '';
				}
			}
			DB::table($settingsTable)->where('key', 'mail')->update(['value' => json_encode($mail)]);
			
			DB::statement('SET FOREIGN_KEY_CHECKS=1;');
			
		} catch (\PDOException $e) {
			dd($e->getMessage());
		} catch (\Exception $e) {
			dd($e->getMessage());
		}
	}
}
