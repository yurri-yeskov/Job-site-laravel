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

namespace App\Providers\AppService;

use App\Helpers\Date;
use App\Models\Language;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

trait ConfigTrait
{
	/**
	 * Setup Configs
	 */
	protected function setupConfigs()
	{
		// Create Configs for Default Language
		$this->createConfigForDefaultLanguage();
		
		// Create Configs for DB Settings
		$this->createConfigForSettings();
		
		// Updating...
		
		// Global
		$this->updateGlobalConfigs();
		
		// Mail
		$this->updateMailConfigs();
		
		// Cache
		$this->updateCacheConfigs();
		
		// Backup
		$this->updateBackupConfigs();
	}
	
	/**
	 * Create Configs for Default Language
	 */
	private function createConfigForDefaultLanguage()
	{
		/*
		 * NOTE:
		 * The system master/default locale (APP_LOCALE) is set in the /.env
		 * By changing the default system language from the Admin Panel,
		 * the APP_LOCALE variable is updated with the selected language's code.
		 *
		 * Calling app()->getLocale() or config('app.locale') from the Admin Panel
		 * means usage of the APP_LOCALE variable from /.env files.
		 */
		
		try {
			// Get the DB default language
			$defaultLang = Cache::remember('language.default', $this->cacheExpiration, function () {
				$defaultLang = Language::where('default', 1)->first();
				
				return $defaultLang;
			});
			
			if (!empty($defaultLang)) {
				// Create DB default language settings
				config()->set('appLang', $defaultLang->toArray());
				
				// Set dates default locale
				Date::setAppLocale(config('appLang.locale'));
			} else {
				config()->set('appLang.abbr', config('app.locale'));
			}
		} catch (\Exception $e) {
			config()->set('appLang.abbr', config('app.locale'));
		}
	}
	
	/**
	 * Create Configs for DB Settings
	 */
	private function createConfigForSettings()
	{
		// Get some default values
		config()->set('settings.app.purchase_code', config('larapen.core.purchaseCode'));
		
		// Check DB connection and catch it
		try {
			// Get all settings from the database
			$settings = Cache::remember('settings.active', $this->cacheExpiration, function () {
				$settings = Setting::where('active', 1)->get();
				
				return $settings;
			});
			
			// Bind all settings to the Laravel config, so you can call them like
			if ($settings->count() > 0) {
				foreach ($settings as $setting) {
					if (is_array($setting->value) && count($setting->value) > 0) {
						foreach ($setting->value as $subKey => $value) {
							if (!empty($value)) {
								config()->set('settings.' . $setting->key . '.' . $subKey, $value);
							}
						}
					}
				}
			}
		} catch (\Exception $e) {
			config()->set('settings.error', true);
			config()->set('settings.app.logo', config('larapen.core.logo'));
		}
	}
	
	/**
	 * Update Global Configs
	 */
	private function updateGlobalConfigs()
	{
		// App
		config()->set('app.name', config('settings.app.app_name'));
		if (config('settings.app.php_specific_date_format')) {
			config()->set('larapen.core.dateFormat.default', config('larapen.core.dateFormat.php'));
			config()->set('larapen.core.datetimeFormat.default', config('larapen.core.datetimeFormat.php'));
		}
		
		// CAPTCHA
		config()->set('captcha.option', env('CAPTCHA', config('settings.security.captcha')));
		if (config('settings.security.captcha') == 'custom') {
			if (config('settings.security.captcha_length') && config('settings.security.captcha_length') >= 3 && config('settings.security.captcha_length') <= 8) {
				config()->set('captcha.custom.length', config('settings.security.captcha_length'));
			}
			if (config('settings.security.captcha_width') && config('settings.security.captcha_width') >= 100 && config('settings.security.captcha_width') <= 300) {
				config()->set('captcha.custom.width', config('settings.security.captcha_width'));
			}
			if (config('settings.security.captcha_height') && config('settings.security.captcha_height') >= 30 && config('settings.security.captcha_height') <= 150) {
				config()->set('captcha.custom.height', config('settings.security.captcha_height'));
			}
			if (config('settings.security.captcha_quality')) {
				config()->set('captcha.custom.quality', config('settings.security.captcha_quality'));
			}
			if (config('settings.security.captcha_math')) {
				config()->set('captcha.custom.math', config('settings.security.captcha_math'));
			}
			if (config('settings.security.captcha_expire')) {
				config()->set('captcha.custom.expire', config('settings.security.captcha_expire'));
			}
			if (config('settings.security.captcha_encrypt')) {
				config()->set('captcha.custom.encrypt', config('settings.security.captcha_encrypt'));
			}
			if (config('settings.security.captcha_lines')) {
				config()->set('captcha.custom.lines', config('settings.security.captcha_lines'));
			}
			if (config('settings.security.captcha_bgImage')) {
				config()->set('captcha.custom.bgImage', config('settings.security.captcha_bgImage'));
			}
			if (config('settings.security.captcha_bgColor')) {
				config()->set('captcha.custom.bgColor', config('settings.security.captcha_bgColor'));
			}
			if (config('settings.security.captcha_sensitive')) {
				config()->set('captcha.custom.sensitive', config('settings.security.captcha_sensitive'));
			}
			if (config('settings.security.captcha_angle')) {
				config()->set('captcha.custom.angle', config('settings.security.captcha_angle'));
			}
			if (config('settings.security.captcha_sharpen')) {
				config()->set('captcha.custom.sharpen', config('settings.security.captcha_sharpen'));
			}
			if (config('settings.security.captcha_blur')) {
				config()->set('captcha.custom.blur', config('settings.security.captcha_blur'));
			}
			if (config('settings.security.captcha_invert')) {
				config()->set('captcha.custom.invert', config('settings.security.captcha_invert'));
			}
			if (config('settings.security.captcha_contrast')) {
				config()->set('captcha.custom.contrast', config('settings.security.captcha_contrast'));
			}
		}
		
		// Facebook
		config()->set('services.facebook.client_id', env('FACEBOOK_CLIENT_ID', config('settings.social_auth.facebook_client_id')));
		config()->set('services.facebook.client_secret', env('FACEBOOK_CLIENT_SECRET', config('settings.social_auth.facebook_client_secret')));
		// LinkedIn
		config()->set('services.linkedin.client_id', env('LINKEDIN_CLIENT_ID', config('settings.social_auth.linkedin_client_id')));
		config()->set('services.linkedin.client_secret', env('LINKEDIN_CLIENT_SECRET', config('settings.social_auth.linkedin_client_secret')));
		// Twitter
		config()->set('services.twitter.client_id', env('TWITTER_CLIENT_ID', config('settings.social_auth.twitter_client_id')));
		config()->set('services.twitter.client_secret', env('TWITTER_CLIENT_SECRET', config('settings.social_auth.twitter_client_secret')));
		// Google
		config()->set('services.google.client_id', env('GOOGLE_CLIENT_ID', config('settings.social_auth.google_client_id')));
		config()->set('services.google.client_secret', env('GOOGLE_CLIENT_SECRET', config('settings.social_auth.google_client_secret')));
		config()->set('services.googlemaps.key', env('GOOGLE_MAPS_API_KEY', config('settings.other.googlemaps_key')));
		// Yahoo
		config()->set('services.yahoo.client_id', env('YAHOO_CLIENT_ID', config('settings.social_auth.yahoo_client_id')));
		config()->set('services.yahoo.client_secret', env('YAHOO_CLIENT_SECRET', config('settings.social_auth.yahoo_client_secret')));
		
		// Meta-tags
		config()->set('meta-tags.title', config('settings.app.slogan'));
		config()->set('meta-tags.open_graph.site_name', config('settings.app.app_name'));
		config()->set('meta-tags.twitter.creator', config('settings.seo.twitter_username'));
		config()->set('meta-tags.twitter.site', config('settings.seo.twitter_username'));
		
		// Cookie Consent
		config()->set('cookie-consent.enabled', env('COOKIE_CONSENT_ENABLED', config('settings.other.cookie_consent_enabled')));
		
		// Admin panel
		config()->set('larapen.admin.skin', config('settings.style.admin_skin'));
		if (Str::contains(config('settings.footer.show_powered_by'), 'fa')) {
			config()->set('larapen.admin.show_powered_by', Str::contains(config('settings.footer.show_powered_by'), 'fa-check-square-o') ? 1 : 0);
		} else {
			config()->set('larapen.admin.show_powered_by', config('settings.footer.show_powered_by'));
		}
	}
	
	/**
	 * Update Mail Configs
	 */
	private function updateMailConfigs()
	{
		// Mail
		config()->set('mail.default', env('MAIL_MAILER', env('MAIL_DRIVER', config('settings.mail.driver'))));
		config()->set('mail.from.address', env('MAIL_FROM_ADDRESS', config('settings.mail.email_sender')));
		config()->set('mail.from.name', env('MAIL_FROM_NAME', config('settings.app.app_name')));
		// Sendmail
		config()->set('mail.mailers.sendmail.path', env('MAIL_SENDMAIL', config('settings.mail.sendmail_path')));
		// SMTP
		config()->set('mail.mailers.smtp.host', env('MAIL_HOST', config('settings.mail.host')));
		config()->set('mail.mailers.smtp.port', env('MAIL_PORT', config('settings.mail.port')));
		config()->set('mail.mailers.smtp.encryption', env('MAIL_ENCRYPTION', config('settings.mail.encryption')));
		config()->set('mail.mailers.smtp.username', env('MAIL_USERNAME', config('settings.mail.username')));
		config()->set('mail.mailers.smtp.password', env('MAIL_PASSWORD', config('settings.mail.password')));
		// Mailgun
		config()->set('services.mailgun.domain', env('MAILGUN_DOMAIN', config('settings.mail.mailgun_domain')));
		config()->set('services.mailgun.secret', env('MAILGUN_SECRET', config('settings.mail.mailgun_secret')));
		config()->set('services.mailgun.endpoint', env('MAILGUN_ENDPOINT', config('settings.mail.mailgun_endpoint', 'api.mailgun.net')));
		// Postmark
		config()->set('services.postmark.token', env('POSTMARK_TOKEN', config('settings.mail.postmark_token')));
		// Amazon SES
		config()->set('services.ses.key', env('SES_KEY', config('settings.mail.ses_key')));
		config()->set('services.ses.secret', env('SES_SECRET', config('settings.mail.ses_secret')));
		config()->set('services.ses.region', env('SES_REGION', config('settings.mail.ses_region')));
		// Mandrill
		config()->set('services.mandrill.secret', env('MANDRILL_SECRET', config('settings.mail.mandrill_secret')));
		// Sparkpost
		config()->set('services.sparkpost.secret', env('SPARKPOST_SECRET', config('settings.mail.sparkpost_secret')));
	}
	
	/**
	 * Update Cache Configs
	 */
	private function updateCacheConfigs()
	{
		config()->set('cache.default', env('CACHE_DRIVER', 'file'));
		// Memcached
		config()->set('cache.stores.memcached.persistent_id', env('MEMCACHED_PERSISTENT_ID'));
		config()->set('cache.stores.memcached.sasl', [
			env('MEMCACHED_USERNAME'),
			env('MEMCACHED_PASSWORD'),
		]);
		$memcachedServers = [];
		$i = 1;
		while (getenv('MEMCACHED_SERVER_' . $i . '_HOST')) {
			if ($i == 1) {
				$host = '127.0.0.1';
				$port = 11211;
			} else {
				$host = null;
				$port = null;
			}
			$memcachedServers[$i]['host'] = env('MEMCACHED_SERVER_' . $i . '_HOST', $host);
			$memcachedServers[$i]['port'] = env('MEMCACHED_SERVER_' . $i . '_PORT', $port);
			$i++;
		}
		config()->set('cache.stores.memcached.servers', $memcachedServers);
		// Redis
		config()->set('database.redis.client', env('REDIS_CLIENT', 'predis'));
		config()->set('database.redis.default.host', env('REDIS_HOST', '127.0.0.1'));
		config()->set('database.redis.default.password', env('REDIS_PASSWORD', null));
		config()->set('database.redis.default.port', env('REDIS_PORT', 6379));
		config()->set('database.redis.default.database', env('REDIS_DB', 0));
		config()->set('database.redis.options.cluster', env('REDIS_CLUSTER', 'predis'));
		if (config('settings.optimization.redis_cluster_activation')) {
			$redisClusters = [];
			$i = 1;
			while (getenv('REDIS_CLUSTER_' . $i . '_HOST')) {
				$redisClusters[$i]['host'] = env('REDIS_CLUSTER_' . $i . '_HOST');
				$redisClusters[$i]['password'] = env('REDIS_CLUSTER_' . $i . '_PASSWORD');
				$redisClusters[$i]['port'] = env('REDIS_CLUSTER_' . $i . '_PORT');
				$redisClusters[$i]['database'] = env('REDIS_CLUSTER_' . $i . '_DB');
				$i++;
			}
			config()->set('database.redis.clusters.default', $redisClusters);
		}
		// Check if the caching is disabled, then disabled it!
		if (config('settings.optimization.cache_driver') == 'array') {
			config()->set('settings.optimization.cache_expiration', '-1');
		}
	}
	
	/**
	 * Update Backup Configs
	 */
	private function updateBackupConfigs()
	{
		config()->set('backup.backup.name', config('app.name'));
		config()->set('backup.monitor_backups.name', config('app.name'));
		
		// Set the backup system disks
		$disks = config('backup.backup.destination.disks');
		if (config('settings.backup.storage_disk') == '1') {
			$disks = [config('filesystems.cloud')];
		} else if (config('settings.backup.storage_disk') == '2') {
			$disks = array_merge($disks, [config('filesystems.cloud')]);
		}
		$disks = array_unique($disks);
		config()->set('backup.backup.destination.disks', $disks);
		
		// Flags (Depreciated)
		config()->set('backup.backup.admin_flags', [
			'--disable-notifications' => (config('settings.backup.disable_notifications')) ? true : false,
		]);
		
		// Notifications
		config()->set('backup.notifications.mail.from.address', config('mail.from.address'));
		config()->set('backup.notifications.mail.from.name', config('mail.from.name'));
		if (config('settings.app.email')) {
			config()->set('backup.notifications.mail.to', config('settings.app.email'));
		}
		
		// Backup Cleanup Settings
		$keepAllBackupsForDays = (int)config('settings.backup.keep_all_backups_for_days');
		if ($keepAllBackupsForDays > 0) {
			config()->set('backup.cleanup.default_strategy.keep_all_backups_for_days', $keepAllBackupsForDays);
		}
		$keepDailyBackupsForDays = (int)config('settings.backup.keep_daily_backups_for_days');
		if ($keepDailyBackupsForDays > 0) {
			config()->set('backup.cleanup.default_strategy.keep_daily_backups_for_days', $keepDailyBackupsForDays);
		}
		$keepWeeklyBackupsForWeeks = (int)config('settings.backup.keep_weekly_backups_for_weeks');
		if ($keepWeeklyBackupsForWeeks > 0) {
			config()->set('backup.cleanup.default_strategy.keep_weekly_backups_for_weeks', $keepWeeklyBackupsForWeeks);
		}
		$keepMonthlyBackupsForMonths = (int)config('settings.backup.keep_monthly_backups_for_months');
		if ($keepMonthlyBackupsForMonths > 0) {
			config()->set('backup.cleanup.default_strategy.keep_monthly_backups_for_months', $keepMonthlyBackupsForMonths);
		}
		$keepYearlyBackupsForYears = (int)config('settings.backup.keep_yearly_backups_for_years');
		if ($keepYearlyBackupsForYears > 0) {
			config()->set('backup.cleanup.default_strategy.keep_yearly_backups_for_years', $keepYearlyBackupsForYears);
		}
		$maximumStorageInMegabytes = (int)config('settings.backup.maximum_storage_in_megabytes');
		if ($maximumStorageInMegabytes > 0) {
			config()->set('backup.cleanup.default_strategy.delete_oldest_backups_when_using_more_megabytes_than', $maximumStorageInMegabytes);
		}
		
		// Monitor Backups
		$monitorBackups = [
			[
				'name'          => config('app.name'),
				'disks'         => $disks,
				'health_checks' => [
					\Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumAgeInDays::class          => ($keepAllBackupsForDays > 0) ? $keepAllBackupsForDays : 1,
					\Spatie\Backup\Tasks\Monitor\HealthChecks\MaximumStorageInMegabytes::class => ($maximumStorageInMegabytes > 0) ? $maximumStorageInMegabytes : 5000,
				],
			],
		];
		config()->set('backup.monitor_backups', $monitorBackups);
	}
}
