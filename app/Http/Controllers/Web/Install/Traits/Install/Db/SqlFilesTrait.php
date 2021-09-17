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

use App\Helpers\DBTool;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

trait SqlFilesTrait
{
	/**
	 * Import Database's Schema (Migration)
	 *
	 * @param \PDO $pdo
	 * @param $tablesPrefix
	 * @return bool
	 */
	protected function importSchemaSql(\PDO $pdo, $tablesPrefix)
	{
		// Default Schema SQL file
		$filename = 'database/schema.sql';
		$filePath = storage_path($filename);
		
		// Import the SQL file
		$res = DBTool::importSqlFile($pdo, $filePath, $tablesPrefix);
		if ($res === false) {
			dd('ERROR');
		}
		
		return $res;
	}
	
	/**
	 * Import Database's Required Data (Seeding)
	 *
	 * @param \PDO $pdo
	 * @param $tablesPrefix
	 * @return bool
	 */
	protected function importDataSql(\PDO $pdo, $tablesPrefix)
	{
		// Default Required Data SQL file
		$filename = 'database/data.sql';
		$filePath = storage_path($filename);
		
		// Import the SQL file
		$res = DBTool::importSqlFile($pdo, $filePath, $tablesPrefix);
		if ($res === false) {
			dd('ERROR');
		}
		
		return $res;
	}
	
	/**
	 * Update the seeded data (with the Site Information)
	 *
	 * @param \PDO $pdo
	 * @param $tablesPrefix
	 * @param $siteInfo
	 */
	protected function updateImportedData(\PDO $pdo, $tablesPrefix, $siteInfo)
	{
		// Default date
		$date = Carbon::now();
		
		try {
			
			// USERS - Insert default superuser
			$pdo->exec('DELETE FROM `' . $tablesPrefix . 'users` WHERE 1');
			$sql = 'INSERT INTO `' . $tablesPrefix . 'users`
				(`id`, `country_code`, `user_type_id`, `gender_id`, `name`, `about`, `email`, `password`, `is_admin`, `verified_email`, `verified_phone`)
				VALUES (1, :countryCode, 1, 1, :name, "Administrator", :email, :password, 1, 1, 1);';
			$query = $pdo->prepare($sql);
			$res = $query->execute([
				':countryCode' => $siteInfo['default_country'],
				':name'        => $siteInfo['name'],
				':email'       => $siteInfo['email'],
				':password'    => Hash::make($siteInfo['password']),
			]);
			
			// Setup ACL system
			$this->setupAclSystem();
			
			// COUNTRIES - Activate default country
			$sql = 'UPDATE `' . $tablesPrefix . 'countries` SET `active`=1 WHERE `code`=:countryCode';
			$query = $pdo->prepare($sql);
			$res = $query->execute([
				':countryCode' => $siteInfo['default_country'],
			]);
			
			// SETTINGS - Update settings
			// App
			$app = [
				'purchase_code' => isset($siteInfo['purchase_code']) ? $siteInfo['purchase_code'] : '',
				'name'          => isset($siteInfo['site_name']) ? $siteInfo['site_name'] : '',
				'slogan'        => isset($siteInfo['site_slogan']) ? $siteInfo['site_slogan'] : '',
				'email'         => isset($siteInfo['email']) ? $siteInfo['email'] : '',
			];
			$sql = 'UPDATE `' . $tablesPrefix . 'settings` SET `value`=:appSettings WHERE `key`="app"';
			$query = $pdo->prepare($sql);
			$res = $query->execute([
				':appSettings' => json_encode($app),
			]);
			
			// Geo Location
			$geoLocation = [
				'default_country_code' => isset($siteInfo['default_country']) ? $siteInfo['default_country'] : '',
			];
			$sql = 'UPDATE `' . $tablesPrefix . 'settings` SET `value`=:geoLocationSettings WHERE `key`="geo_location"';
			$query = $pdo->prepare($sql);
			$res = $query->execute([
				':geoLocationSettings' => json_encode($geoLocation),
			]);
			
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
			$sql = 'UPDATE `' . $tablesPrefix . 'settings` SET `value`=:mailSettings WHERE `key`="mail"';
			$query = $pdo->prepare($sql);
			$res = $query->execute([
				':mailSettings' => json_encode($mail),
			]);
			
		} catch (\PDOException $e) {
			dd($e->getMessage());
		} catch (\Exception $e) {
			dd($e->getMessage());
		}
	}
}
