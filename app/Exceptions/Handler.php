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

namespace App\Exceptions;

use App\Exceptions\Traits\JsonRenderTrait;
use App\Helpers\DBTool;
use App\Helpers\UrlGen;
use Illuminate\Contracts\Container\Container;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Exceptions\PostTooLargeException;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Prologue\Alerts\Facades\Alert;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
	use JsonRenderTrait;
	
	/**
	 * A list of the exception types that should not be reported.
	 *
	 * @var array
	 */
	protected $dontReport = [
		\Illuminate\Auth\AuthenticationException::class,
		\Illuminate\Auth\Access\AuthorizationException::class,
		\Symfony\Component\HttpKernel\Exception\HttpException::class,
		\Illuminate\Database\Eloquent\ModelNotFoundException::class,
		\Illuminate\Session\TokenMismatchException::class,
		\Illuminate\Validation\ValidationException::class,
	];
	
	/**
	 * A list of the inputs that are never flashed for validation exceptions.
	 *
	 * @var array
	 */
	protected $dontFlash = [
		'password',
		'password_confirmation',
	];
	
	/**
	 * Illuminate request class.
	 *
	 * @var \Illuminate\Foundation\Application
	 */
	protected $app;
	
	/**
	 * Handler constructor.
	 *
	 * @param Container $container
	 */
	public function __construct(Container $container)
	{
		parent::__construct($container);
		
		$this->app = app();
		
		// Fix the 'files' & 'filesystem' binging.
		$this->app->register(\Illuminate\Filesystem\FilesystemServiceProvider::class);
		
		// Create a config var for current language
		$this->getLanguage();
	}
	
	/**
	 * Report or log an exception.
	 *
	 * @param \Throwable $e
	 * @return void
	 *
	 * @throws \Exception
	 */
	public function report(Throwable $e)
	{
		// Prevent error 500 from PDO Exception
		if (appInstallFilesExist()) {
			if ($this->isPDOException($e)) {
				if (($res = $this->testDatabaseConnection()) !== true) {
					die($res);
				}
			}
		} else {
			// Clear PDO error log during installation
			if ($this->isPDOException($e)) {
				$this->clearLog();
			}
		}
		
		parent::report($e);
	}
	
	/**
	 * Render an exception into an HTTP response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Throwable $e
	 * @return \Symfony\Component\HttpFoundation\Response
	 *
	 * @throws \Throwable
	 */
	public function render($request, Throwable $e)
	{
		// Restore the request headers back to the original state
		// saved before API call (using sub request option)
		if (config('request.original.headers')) {
			request()->headers->replace(config('request.original.headers'));
		}
		
		// Show API or AJAX requests exceptions
		if (isFromApi() || $request->ajax() || $request->expectsJson()) {
			return $this->jsonRender($e);
		}
		
		// Show HTTP exceptions
		if ($this->isHttpException($e)) {
			// Check if the app is installed when page is not found (or when 404 page is called),
			// to prevent any DB error when the app is not installed yet.
			if (method_exists($e, 'getStatusCode')) {
				if ($e->getStatusCode() == 404) {
					if (!appIsInstalled() && $request->input('exception') != '404') {
						return redirect(getRawBaseUrl() . '/install?exception=404');
					}
				}
			}
			
			if ($e instanceof PostTooLargeException) {
				$message = 'Maximum data (including files to upload) size to post and memory usage are limited on the server.';
				$message = 'Payload Too Large. ' . $message;
				$backLink = ' <a href="' . url()->previous() . '">' . t('Back') . '</a>';
				$message = $message . $backLink;
				
				abort(500, $message);
			}
			
			// Original Code
			return parent::render($request, $e);
		}
		
		// Show caching exception (APC or Redis)
		if (
			preg_match('#apc_#ui', $e->getMessage())
			|| preg_match('#/predis/#i', $e->getFile())
		) {
			$msg = '';
			$msg .= '<html><head>';
			$msg .= '<title>Cache Driver Error</title>';
			$msg .= '<meta name="robots" content="noindex,nofollow">';
			$msg .= '<meta name="googlebot" content="noindex">';
			$msg .= '</head><body>';
			$msg .= '<pre>';
			$msg .= '<h1>Cache Driver Error</h1>';
			$msg .= '<br><strong>Error:</strong> ' . $e->getMessage() . '.';
			$msg .= '<br><br><strong>Information: </strong>';
			$msg .= '<ul>';
			if (preg_match('#apc_#ui', $e->getMessage())) {
				$msg .= '<li>It looks like that the <a href="http://php.net/manual/en/book.apc.php" target="_blank">APC extension</a> is not installed (or not properly installed) for PHP.</li>';
			}
			$msg .= '<li>Make sure you have properly installed the components related to the selected cache driver on your server.</li>';
			$msg .= '<li>To get your website up and running again you have to change the cache driver in the /.env file with the "file" or "array" driver (example: CACHE_DRIVER=file).</li>';
			$msg .= '</ul>';
			$msg .= 'Happy Configuration!';
			$msg .= '</pre>';
			$msg .= '</body></html>';
			echo $msg;
			exit();
		}
		
		// Show DB exceptions
		if ($e instanceof \PDOException) {
			// Check if the app installation files exist,
			// to prevent any DB error (from the Admin Panel) when the app is not installed yet.
			if (!appInstallFilesExist() && $request->input('exception') != 'PDO') {
				$msg = $e->getMessage();
				if (!empty($msg)) {
					dd($msg);
				}
				
				$this->clearLog();
				
				return redirect(getRawBaseUrl() . '/install?exception=PDO');
			}
			
			/*
			 * DB Connection Error:
			 * http://dev.mysql.com/doc/refman/5.7/en/error-messages-server.html
			 */
			$dbErrorCodes = ['mysql' => ['1042', '1044', '1045', '1046', '1049'], 'standardized' => ['08S01', '42000', '28000', '3D000', '42000', '42S22'],];
			$tableErrorCodes = ['mysql' => ['1051', '1109', '1146'], 'standardized' => ['42S02'],];
			
			// Database errors
			if (in_array($e->getCode(), $dbErrorCodes['mysql']) or in_array($e->getCode(), $dbErrorCodes['standardized'])) {
				$msg = '';
				$msg .= '<html><head>';
				$msg .= '<title>SQL Error</title>';
				$msg .= '<meta name="robots" content="noindex,nofollow">';
				$msg .= '<meta name="googlebot" content="noindex">';
				$msg .= '</head><body>';
				$msg .= '<pre>';
				$msg .= '<h1>SQL Error</h1>';
				$msg .= '<br>Code error: ' . $e->getCode() . '.';
				$msg .= '<br><br><blockquote>' . $e->getMessage() . '</blockquote>';
				$msg .= '</pre>';
				$msg .= '</body></html>';
				echo $msg;
				exit();
			}
			
			// Tables and fields errors
			if (in_array($e->getCode(), $tableErrorCodes['mysql']) or in_array($e->getCode(), $tableErrorCodes['standardized'])) {
				$msg = '';
				$msg .= '<html><head>';
				$msg .= '<title>Installation</title>';
				$msg .= '<meta name="robots" content="noindex,nofollow">';
				$msg .= '<meta name="googlebot" content="noindex">';
				$msg .= '</head><body>';
				$msg .= '<pre>';
				$msg .= '<h1>There were errors during the installation process</h1>';
				$msg .= 'Some tables in the database are absent.';
				$msg .= '<br><br><blockquote>' . $e->getMessage() . '</blockquote>';
				$msg .= '<br>1/ Remove all tables from the database (if existing)';
				$msg .= '<br>2/ Delete the <code>/.env</code> file (required before re-installation)';
				$msg .= '<br>3/ and reload this page -or- go to install URL: <a href="' . url('install') . '">' . url('install') . '</a>.';
				$msg .= '<br>';
				$msg .= '<br>BE CAREFUL: If your site is already in production, you will lose all your data in both cases.';
				$msg .= '</pre>';
				$msg .= '</body></html>';
				echo $msg;
				exit();
			}
		}
		
		// Show Token exceptions
		if ($e instanceof TokenMismatchException) {
			$message = t('Your session has expired');
			if (isFromAdminPanel()) {
				Alert::error($message)->flash();
			} else {
				flash($message)->error();
			}
			$previousUrl = url()->previous();
			if (!Str::contains($previousUrl, 'CsrfToken')) {
				$queryString = (parse_url($previousUrl, PHP_URL_QUERY) ? '&' : '?') . 'error=CsrfToken';
				$previousUrl = $previousUrl . $queryString;
			}
			
			return redirect($previousUrl)->withInput();
		}
		
		// Show MethodNotAllowed HTTP exceptions
		if ($e instanceof MethodNotAllowedHttpException) {
			$message = "Opps! Seems you use a bad request method. Please try again.";
			$backLink = ' <a href="' . url()->previous() . '">' . t('Back') . '</a>';
			$message = $message . $backLink;
			abort(500, $message);
		}
		
		// Try to fix the cookies issue related the Laravel security release:
		// https://laravel.com/docs/5.6/upgrade#upgrade-5.6.30
		if (Str::contains($e->getMessage(), 'unserialize()') && request()->get('exception') != 'unserialize') {
			// Unset cookies
			unsetCookies();
			
			// Customize and Redirect to the previous URL
			$previousUrl = url()->previous();
			$queryString = (parse_url($previousUrl, PHP_URL_QUERY) ? '&' : '?') . 'exception=unserialize';
			$previousUrl = $previousUrl . $queryString;
			
			redirectUrl($previousUrl, 301, config('larapen.core.noCacheHeaders'));
		}
		
		// Customize the HTTP 500 error page
		$filePath = $e->getFile();
		if (!empty($filePath) && is_string($filePath) && !Str::contains($filePath, '/vendor/')) {
			$message = $e->getMessage();
			$message = str_replace(base_path(), '', $message);
			
			if (!empty($message)) {
				$filePath = str_replace(base_path(), '', $filePath);
				$message .= "\n" . 'In the: "' . $filePath . '" file';
				if ($e->getLine()) {
					$message .= ' at line: ' . $e->getLine();
				}
				
				abort(500, nl2br($message));
			}
		}
		
		// Original Code
		return parent::render($request, $e);
	}
	
	/**
	 * Convert an authentication exception into an unauthenticated response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Illuminate\Auth\AuthenticationException $exception
	 * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
	 */
	protected function unauthenticated($request, AuthenticationException $exception)
	{
		if (isFromApi() || $request->expectsJson()) {
			return $this->respondUnAuthorized('Unauthenticated.');
		}
		
		return redirect()->guest(UrlGen::loginPath());
	}
	
	/**
	 * Convert a validation exception into a JSON response.
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param \Illuminate\Validation\ValidationException $exception
	 * @return \Illuminate\Http\JsonResponse
	 */
	protected function invalidJson($request, ValidationException $exception)
	{
		return response()->json($exception->errors(), $exception->status);
	}
	
	// PRIVATE METHODS
	
	/**
	 * Is a PDO Exception
	 *
	 * @param \Throwable $e
	 * @return bool
	 */
	private function isPDOException(Throwable $e)
	{
		if (
			($e instanceof \PDOException) ||
			$e->getCode() == 1045 ||
			Str::contains($e->getMessage(), 'SQLSTATE') ||
			Str::contains($e->getFile(), 'Database/Connectors/Connector.php')
		) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Test Database Connection
	 *
	 * @return bool|string
	 */
	private function testDatabaseConnection()
	{
		$pdo = DBTool::getPDOConnexion();
		
		if ($pdo instanceof \PDO) {
			return true;
		}
		
		return false;
	}
	
	/**
	 * Create a config var for current language
	 */
	private function getLanguage()
	{
		// Get the language only the app is already installed
		// to prevent HTTP 500 error through DB connexion during the installation process.
		if (appInstallFilesExist()) {
			$this->app['config']->set('lang.abbr', config('app.locale'));
		}
	}
	
	/**
	 * Clear Laravel Log files
	 */
	private function clearLog()
	{
		$mask = storage_path('logs') . DIRECTORY_SEPARATOR . 'laravel*.log';
		$logFiles = glob($mask);
		if (is_array($logFiles) && !empty($logFiles)) {
			foreach ($logFiles as $filename) {
				@unlink($filename);
			}
		}
	}
}
