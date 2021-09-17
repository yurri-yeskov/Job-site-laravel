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

class Curl
{
	public static $userAgent = "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3";
	public static $httpHeader = [
		'Accept-Charset: utf-8',
		'Accept-Language: en-us,en;q=0.7,bn-bd;q=0.3'
	];

	/**
	 * @param $url
	 * @param string $cookieFile
	 * @param string $postData
	 * @param string $referrerUrl
	 * @return mixed|string
	 */
	public static function fetch($url, $cookieFile = null, $postData = null, $referrerUrl = null)
	{
		// Use PHP 'file_get_contents' function if cURL is not enable
		if (!function_exists('curl_init') || !function_exists('curl_exec')) {
			return self::fileGetContents($url);
		}

		// Use cURL
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);

		if (!empty($postData)) {
			if (is_array($postData)) {
				$postData = http_build_query($postData);
			}
			curl_setopt($ch, CURLOPT_POSTFIELDS, $postData); // Set the post data
			curl_setopt($ch, CURLOPT_POST, 1); // This is a POST query
		}

		curl_setopt($ch, CURLOPT_HEADER, 0);

		if (strpos(strtolower($url), 'https://') !== false) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // To disable SSL Cert checks
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		}

		curl_setopt($ch, CURLOPT_HTTPHEADER, self::$httpHeader);
		curl_setopt($ch, CURLOPT_USERAGENT, self::$userAgent);

		if (!empty($referrerUrl)) {
			curl_setopt($ch, CURLOPT_REFERER, $referrerUrl);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); // We want the content after the query
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1); // Follow Location redirects

		if (!empty($cookieFile)) {
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); // Read cookie information
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); // Write cookie information
		}

		$buffer = curl_exec($ch);
		$error = curl_error($ch);
		curl_close($ch);

		if ($buffer) {
			return $buffer;
		} else {
			return $error;
		}
	}

	/**
	 * @param $url
	 * @return string
	 */
	public static function fileGetContents($url)
	{
		try {
			$buffer = file_get_contents($url);
		} catch (\Exception $e) {
			$buffer = $e->getMessage();
			if (empty($buffer)) {
				$buffer = 'Unknown Error.';
			}
		}
		return $buffer;
	}

	/**
	 * @param $url
	 * @param $saveTo
	 * @param string $cookieFile
	 */
	public static function grabFile($url, $saveTo, $cookieFile = null)
	{
		$url = str_replace(['&amp;'], ['&'], $url);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		if (strpos(strtolower($url), 'https://') !== false) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		}
		curl_setopt($ch, CURLOPT_USERAGENT, self::$userAgent);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		if (!empty($cookieFile)) {
			curl_setopt($ch, CURLOPT_COOKIEFILE, $cookieFile); // Read cookie information
			curl_setopt($ch, CURLOPT_COOKIEJAR, $cookieFile); // Write cookie information
		}

		$buffer = curl_exec($ch);
		$error = curl_error($ch);
		curl_close($ch);

		if ($buffer) {
			if (file_exists($saveTo)) {
				unlink($saveTo);
			}
			if (self::filePutContents($saveTo, $buffer) === false) {
				die($url . " doesn't save at " . $saveTo . ".\n");
			}
		} else {
			die($error);
		}
	}

	/**
	 * @param $url
	 * @param null $cookies
	 * @return mixed
	 */
	public static function getContent($url, $cookies = null)
	{
		$ch = curl_init();
		if (strpos(strtolower($url), 'https://') !== false) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // To disable SSL Cert checks
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		}
		curl_setopt($ch, CURLOPT_USERAGENT, self::$userAgent);
		if (!empty($cookies)) {
			curl_setopt($ch, CURLOPT_COOKIE, $cookies);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);

		$buffer = curl_exec($ch);
		$error = curl_error($ch);
		curl_close($ch);

		if ($buffer) {
			return $buffer;
		} else {
			return $error;
		}
	}

	/**
	 * @param $url
	 * @param $params
	 * @param null $cookies
	 * @return mixed
	 */
	public static function getContentByForm($url, $params, $cookies = null)
	{
		$ch = curl_init();
		if (strpos(strtolower($url), 'https://') !== false) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // To disable SSL Cert checks
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		}
		curl_setopt($ch, CURLOPT_USERAGENT, self::$userAgent);
		if (!empty($cookies)) {
			curl_setopt($ch, CURLOPT_COOKIE, $cookies);
		}
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $params);

		$buffer = curl_exec($ch);
		curl_close($ch);

		return $buffer;
	}

	/**
	 * @param $url
	 * @return string
	 */
	public static function getCookies($url)
	{
		$ch = curl_init();
		if (strpos(strtolower($url), 'https://') !== false) {
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // To disable SSL Cert checks
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
		}
		curl_setopt($ch, CURLOPT_USERAGENT, self::$userAgent);
		curl_setopt($ch, CURLOPT_HEADER, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_URL, $url);

		$buffer = curl_exec($ch);
		curl_close($ch);

		preg_match_all('|Set-Cookie: (.*);|U', $buffer, $tmp);
		if (isset($tmp[1]) && !empty($tmp[1])) {
			$cookies = implode(';', $tmp[1]);
		} else {
			$cookies = null;
		}

		return $cookies;
	}

	/**
	 * @param $filename
	 * @param $data
	 * @param int $flags
	 * @param null $context
	 */
	public static function filePutContents($filename, $data, $flags = 0, $context = null)
	{
		$tmp = explode('/', $filename);
		$shortFilename = array_pop($tmp);

		$filePath = '';
		foreach ($tmp as $path) {
			$filePath .= '/' . $path;
			if (!is_dir($filePath)) {
				mkdir($filePath);
			}
		}

		$filename = $filePath . '/' . $shortFilename;

		file_put_contents($filename, $data, $flags, $context);
	}

	// helper function to create contact in send-in-blue
	// required params - email of user, list Id of sendinblue list
	public static function createWorkerContact($email, $listId, $firstName, $lastName)
	{
		$listID = (int)$listId;			// converting to integer
		$postRequest = array(				// creating request payload object
			'email' => $email,
			'listIds' => [$listID],
			'attributes' => [
				'FIRSTNAME' => $firstName,
				'LASTNAME' => $lastName
			]
		);

		// creating cURL request to create contact
		$cURLConnection = curl_init('https://api.sendinblue.com/v3/contacts');
		curl_setopt($cURLConnection, CURLOPT_POSTFIELDS, json_encode($postRequest));
		curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($cURLConnection, CURLOPT_HTTPHEADER, array(
			'content-type: application/json', 'api-key: ' . env('SEND_IN_BLUE_API_KEY')
		));

		$response = curl_exec($cURLConnection);
		$error = curl_error($cURLConnection);
		curl_close($cURLConnection);
		if ($response) {
			return $response;
		} else {
			return $error;
		}
	}
}
