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

namespace App\Helpers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class Date
{
	/**
	 * Set Locale Information (Override the PHP setlocale() function)
	 *
	 * IMPORTANT: Prevent issue in Laravel Blade
	 * The Blade @if(...) statement doesn't convert to <?php if(...): ?> in Turkish language (for example).
	 *
	 * RESOURCES
	 * - https://www.php.net/manual/fr/function.setlocale.php
	 * - https://stackoverflow.com/questions/43589501/if-statements-not-working-correctly-on-laravel-blade
	 * - https://docs.moodle.org/dev/Table_of_locales
	 * - https://stackoverflow.com/questions/3191664/list-of-all-locales-and-their-short-codes
	 * - https://github.com/umpirsky/locale-list
	 * - Get locales list in Terminal on MAC/Linux: locale -a
	 *
	 * @param $locale
	 * @return string
	 */
	public static function setAppLocale($locale)
	{
		// Note from \Carbon\Carbon:
		// isoFormat() use ISO format rather than PHP-specific format
		// and use inner translations rather than language packages you need to install
		// on every machine where you deploy your application.
		if (!config('settings.app.php_specific_date_format')) {
			Carbon::setLocale($locale);
			
			return $locale;
		}
		
		$localeFound = false;
		
		// Get available locales from the server
		try {
			exec('locale -a', $locales);
		} catch (\Exception $e) {
		}
		
		if (!isset($locales) || empty($locales)) {
			$locales = array_keys((array)config('locales'));
		}
		
		if (is_array($locales) && in_array($locale, $locales)) {
			if (setlocale(LC_ALL, $locale)) {
				Carbon::setLocale($locale);
				setlocale(LC_ALL, $locale);
				$localeFound = true;
			}
		}
		
		// If not found, try to use locale with codeset (If it exists)
		if (!$localeFound) {
			if (is_array($locales)) {
				foreach ($locales as $sysLocale) {
					/*
					 * Check if $locale exists on the server with a codeset (locale.codeset)
					 * e.g. tr_TR.UTF-8, ru_RU.UTF-8, ru_RU.ISO8859-5, fr_CH.ISO8859-15, ...
					 * More Info: https://stackoverflow.com/a/24355529
					 */
					$pattern = '#' . $locale . '\.#i';
					if (preg_match($pattern, $sysLocale)) {
						if (setlocale(LC_ALL, $locale)) {
							Carbon::setLocale($locale);
							setlocale(LC_ALL, $locale);
							$localeFound = true;
						}
					}
				}
			}
			
			// If not found, force to use a fixed locale
			if (!$localeFound) {
				$locale = 'en_US';
				Carbon::setLocale($locale);
				setlocale(LC_ALL, $locale);
			}
		}
		
		return $locale;
	}
	
	/**
	 * Get Time Zone List
	 *
	 * @param null $countryCode
	 * @return array
	 */
	public static function getTimeZones($countryCode = null)
	{
		$timeZones = [];
		
		try {
			if (empty($countryCode)) {
				$timeZones = \DateTimeZone::listIdentifiers(\DateTimeZone::ALL);
			} else {
				$timeZones = \DateTimeZone::listIdentifiers(\DateTimeZone::PER_COUNTRY, $countryCode);
			}
		} catch (\Exception $e) {
		}
		
		if (empty($timeZones)) {
			$timeZones = (array)config('time-zones');
		}
		
		$timeZones = collect($timeZones)->mapWithKeys(function ($item) {
			return [$item => $item];
		})->toArray();
		
		return $timeZones;
	}
	
	/**
	 * Get the App's current Time Zone
	 *
	 * @return \Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed
	 */
	public static function getAppTimeZone()
	{
		$tz = config('ipCountry.time_zone', config('country.time_zone'));
		$tz = isFromAdminPanel() ? config('app.timezone') : $tz;
		$tz = (auth()->check() && isset(auth()->user()->time_zone) && !empty(auth()->user()->time_zone)) ? auth()->user()->time_zone : $tz;
		$tz = self::isValidTimeZone($tz) ? $tz : 'UTC';
		
		return $tz;
	}
	
	/**
	 * Format the instance with the current locale.  You can set the current
	 * locale using setlocale() https://www.php.net/manual/en/function.setlocale.php
	 *
	 * @param $value
	 * @param string $dateType
	 * @return \Illuminate\Support\Carbon|string
	 */
	public static function format($value, $dateType = 'date')
	{
		if ($value instanceof Carbon) {
			$dateFormat = self::getAppDateFormat($dateType);
			
			try {
				if (self::isIsoFormat($dateFormat)) {
					$value = $value->isoFormat($dateFormat);
				} else {
					$value = $value->translatedFormat($dateFormat);
				}
			} catch (\Exception $e) {
			}
		}
		
		return $value;
	}
	
	/**
	 * @param $value
	 * @return \Illuminate\Support\Carbon|string
	 */
	public static function formatFormNow($value)
	{
		if (!$value instanceof Carbon) {
			return $value;
		}
		
		$formattedDate = self::format($value, 'datetime');
		
		try {
			if (
				config('settings.listing.elapsed_time_from_now')
				&& (
					Str::contains(Route::currentRouteAction(), '\Search\\')
					|| Str::contains(Route::currentRouteAction(), 'HomeController')
					|| Str::contains(Route::currentRouteAction(), '\Account\\')
				)
			) {
				$popover = ' data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="' . $formattedDate . '"';
				if (config('lang.direction')=='rtl') {
					$popover = ' data-toggle="tooltip" data-placement="bottom" title="' . $formattedDate . '"';
				}
				
				$out = '';
				$out .= '<span style="cursor: help;"' . $popover . '>';
				$out .= $value->fromNow();
				$out .= '</span>';
				
				$value = $out;
			} else if (
				config('settings.single.elapsed_time_from_now')
				&& Str::contains(Route::currentRouteAction(), 'DetailsController')
			) {
				$popover = ' data-toggle="popover" data-trigger="hover" data-placement="bottom" data-content="' . $formattedDate . '"';
				if (config('lang.direction')=='rtl') {
					$popover = ' data-toggle="tooltip" data-placement="bottom" title="' . $formattedDate . '"';
				}
				
				$out = '';
				$out .= '<span style="cursor: help;"' . $popover . '>';
				$out .= $value->fromNow();
				$out .= '</span>';
				
				$value = $out;
			} else {
				$value = $formattedDate;
			}
		} catch (\Exception $e) {
		}
		
		return $value;
	}
	
	/**
	 * Check if a time zone is valid for PHP
	 *
	 * @param $timeZoneId
	 * @return bool
	 */
	private static function isValidTimeZone($timeZoneId)
	{
		$timeZones = self::getTimeZones();
		
		return (isset($timeZones[$timeZoneId]) && !empty($timeZones[$timeZoneId]));
	}
	
	/**
	 * Get the App Date Format
	 *
	 * @param string $dateType
	 * @return bool|\Illuminate\Config\Repository|\Illuminate\Contracts\Foundation\Application|mixed|string
	 */
	private static function getAppDateFormat($dateType = 'date')
	{
		$adminDateFormat = ($dateType == 'datetime')
			? config('settings.app.datetime_format', config('larapen.core.datetimeFormat.default'))
			: config('settings.app.date_format', config('larapen.core.dateFormat.default'));
		
		$langFrontDateFormat = ($dateType == 'datetime') ? config('lang.datetime_format') : config('lang.date_format');
		$frontDateFormat = !empty($langFrontDateFormat) ? $langFrontDateFormat : $adminDateFormat;
		
		$countryFrontDateFormat = ($dateType == 'datetime') ? config('country.datetime_format') : config('country.date_format');
		$frontDateFormat = !empty($countryFrontDateFormat) ? $countryFrontDateFormat : $frontDateFormat;
		
		$dateFormat = isFromAdminPanel() ? $adminDateFormat : $frontDateFormat;
		
		if (empty($dateFormat)) {
			$dateFormat = ($dateType == 'datetime') ? config('larapen.core.datetimeFormat.default') : config('larapen.core.dateFormat.default');
		}
		
		// For stats short dates
		if ($dateType == 'stats') {
			$dateFormat = (!config('settings.app.php_specific_date_format')) ? 'MMM DD' : '%b %d';
		}
		
		// For backup dates
		if ($dateType == 'backup') {
			$dateFormat = (!config('settings.app.php_specific_date_format')) ? 'DD MMMM YYYY, HH:mm' : '%d %B %Y, %H:%M';
		}
		
		if (Str::contains($dateFormat, '%')) {
			$dateFormat = self::strftimeToDateFormat($dateFormat);
		}
		
		return $dateFormat;
	}
	
	/**
	 * Equivalent to `date_format_to( $format, 'date' )`
	 *
	 * @param string $strfFormat A `strftime()` date/time format
	 * @return string
	 */
	private static function strftimeToDateFormat($strfFormat)
	{
		return self::dateFormatTo($strfFormat, 'date');
	}
	
	/**
	 * Equivalent to `convert_datetime_format_to( $format, 'strf' )`
	 *
	 * @param string $dateFormat A `date()` date/time format
	 * @return string
	 */
	private static function dateToStrftimeFormat($dateFormat)
	{
		return self::dateFormatTo($dateFormat, 'strf');
	}
	
	/**
	 * Convert date/time format between `date()` and `strftime()`
	 *
	 * Timezone conversion is done for Unix. Windows users must exchange %z and %Z.
	 *
	 * Unsupported date formats : S, n, t, L, B, G, u, e, I, P, Z, c, r
	 * Unsupported strftime formats : %U, %W, %C, %g, %r, %R, %T, %X, %c, %D, %F, %x
	 *
	 * @param string $format The format to parse.
	 * @param string $syntax The format's syntax. Either 'strf' for `strtime()` or 'date' for `date()`.
	 * @return bool|string Returns a string formatted according $syntax using the given $format or `false`.
	 * @link http://php.net/manual/en/function.strftime.php#96424
	 *
	 * @example Convert `%A, %B %e, %Y, %l:%M %P` to `l, F j, Y, g:i a`, and vice versa for "Saturday, March 10, 2001, 5:16 pm"
	 */
	private static function dateFormatTo($format, $syntax)
	{
		// http://php.net/manual/en/function.strftime.php
		$strfSyntax = [
			// Day - no strf eq : S (created one called %O)
			'%O', '%d', '%a', '%e', '%A', '%u', '%w', '%j',
			// Week - no date eq : %U, %W
			'%V',
			// Month - no strf eq : n, t
			'%B', '%m', '%b', '%-m',
			// Year - no strf eq : L; no date eq : %C, %g
			'%G', '%Y', '%y',
			// Time - no strf eq : B, G, u; no date eq : %r, %R, %T, %X
			'%P', '%p', '%l', '%I', '%H', '%M', '%S',
			// Timezone - no strf eq : e, I, P, Z
			'%z', '%Z',
			// Full Date / Time - no strf eq : c, r; no date eq : %c, %D, %F, %x
			'%s',
		];
		
		// http://php.net/manual/en/function.date.php
		$dateSyntax = [
			'S', 'd', 'D', 'j', 'l', 'N', 'w', 'z',
			'W',
			'F', 'm', 'M', 'n',
			'o', 'Y', 'y',
			'a', 'A', 'g', 'h', 'H', 'i', 's',
			'O', 'T',
			'U',
		];
		
		switch ($syntax) {
			case 'date':
				$from = $strfSyntax;
				$to = $dateSyntax;
				break;
			
			case 'strf':
				$from = $dateSyntax;
				$to = $strfSyntax;
				break;
			
			default:
				return false;
		}
		
		$pattern = array_map(
			function ($s) {
				return '/(?<!\\\\|\%)' . $s . '/';
			},
			$from
		);
		
		return preg_replace($pattern, $to, $format);
	}
	
	/**
	 * Check if the format is a valid ISO format
	 *
	 * @param $format
	 * @return bool
	 */
	public static function isIsoFormat($format)
	{
		$isIsoFormat = false;
		
		$splitChars = preg_split('/( |-|\/|\.|,|:|;)/', $format);
		$splitChars = array_filter($splitChars);
		
		if (is_array($splitChars) && count($splitChars) > 0) {
			foreach ($splitChars as $char) {
				if (in_array($char, self::diffBetweenIsoAndDateTimeFormats())) {
					$isIsoFormat = true;
					break;
				}
			}
		}
		
		return $isIsoFormat;
	}
	
	/**
	 * Difference between the ISO and the DateTime formats
	 *
	 * @return string[]
	 */
	private static function diffBetweenIsoAndDateTimeFormats()
	{
		$diff = array_diff(self::isoFormatReplacement(), self::dateTimeFormatReplacement());
		
		return $diff;
	}
	
	/**
	 * Date ISO format replacement
	 * https://carbon.nesbot.com/docs/#api-localization
	 *
	 * @return string[]
	 */
	private static function isoFormatReplacement()
	{
		return [
			'OD', 'OM', 'OY', 'OH', 'Oh', 'Om', 'Os', 'D', 'DD', 'Do',
			'd', 'dd', 'ddd', 'dddd', 'DDD', 'DDDD', 'DDDo', 'e', 'E',
			'H', 'HH', 'h', 'hh', 'k', 'kk', 'm', 'mm', 'a', 'A', 's', 'ss', 'S', 'SS', 'SSS', 'SSSS', 'SSSSS', 'SSSSSS', 'SSSSSSS', 'SSSSSSSS', 'SSSSSSSSS',
			'M', 'MM', 'MMM', 'MMMM', 'Mo', 'Q', 'Qo',
			'G', 'GG', 'GGG', 'GGGG', 'GGGGG', 'g', 'gg', 'ggg', 'gggg', 'ggggg', 'W', 'WW', 'Wo', 'w', 'ww', 'wo',
			'x', 'X',
			'Y', 'YY', 'YYYY', 'YYYYY',
			'z', 'zz', 'Z', 'ZZ',
			// Macro-formats
			'LT', 'LTS', 'L', 'l', 'LL', 'll', 'LLL', 'lll', 'LLLL', 'llll',
		];
	}
	
	/**
	 * DateTime format replacement
	 * https://www.php.net/manual/en/datetime.format.php
	 *
	 * @return string[]
	 */
	private static function dateTimeFormatReplacement()
	{
		return [
			// Day
			'd', 'D', 'j', 'l', 'N', 'S', 'w', 'z',
			// Week
			'W',
			// Month
			'F', 'm', 'M', 'n', 't',
			// Year
			'L', 'o', 'Y', 'y',
			// Time
			'a', 'A', 'B', 'g', 'G', 'h', 'H', 'i', 's', 'u', 'v',
			// Timezone
			'e', 'I', 'O', 'P', 'p', 'T', 'Z',
			// Full Date/Time
			'c', 'r', 'U',
		];
	}
	
	/**
	 * strftime format replacement
	 * https://www.php.net/manual/en/function.strftime.php
	 *
	 * @return string[]
	 */
	private static function strftimeFormatReplacement()
	{
		return [
			// Day
			'%a', '%A', '%d', '%e', '%j', '%u', '%w',
			// Week
			'%U', '%V', '%W',
			// Month
			'%b', '%B', '%h', '%m',
			// Year
			'%C', '%g', '%G', '%y', '%Y',
			// Time
			'%H', '%k', '%I', '%l', '%M', '%p', '%P', '%r', '%R', '%S', '%T', '%X', '%z', '%Z',
			// Time and Date Stamps
			'%c', '%D', '%F', '%s', '%x',
			// Miscellaneous
			'%n', '%t', '%%',
		];
	}
}
