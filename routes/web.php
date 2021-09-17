<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use App\Http\Controllers\Web\Post\CreateOrEdit\MultiSteps\CreateController;
use App\Http\Controllers\Web\company\CompanyController;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Upgrading
|--------------------------------------------------------------------------
|
| The upgrading process routes
|
*/

Route::get('/clear-cache', function () {
	\Artisan::call('cache:clear');
	return "Cache is cleared";
});
Route::group([
	'namespace' => 'App\Http\Controllers\Web\Install',
	'middleware' => ['web', 'no.http.cache']
], function () {
	Route::get('upgrade', 'UpdateController@index');
	Route::post('upgrade/run', 'UpdateController@run');
});


/*
|--------------------------------------------------------------------------
| Installation
|--------------------------------------------------------------------------
|
| The installation process routes
|
*/
Route::group([
	'namespace'  => 'App\Http\Controllers\Web\Install',
	'middleware' => ['web', 'install.checker', 'no.http.cache'],
	'prefix'     => 'install',
], function () {

	Route::get('/', 'InstallController@starting');
	Route::get('site_info', 'InstallController@siteInfo');
	Route::post('site_info', 'InstallController@siteInfo');
	Route::get('system_compatibility', 'InstallController@systemCompatibility');
	Route::get('database', 'InstallController@database');
	Route::post('database', 'InstallController@database');
	Route::get('database_import', 'InstallController@databaseImport');
	Route::get('cron_jobs', 'InstallController@cronJobs');
	Route::get('finish', 'InstallController@finish');
});


/*
|--------------------------------------------------------------------------
| Back-end
|--------------------------------------------------------------------------
|
| The admin panel routes
|
*/

/**
 * Employer dashboard all routs
 */

/** Free post routes */
Route::get('jobs/free/create', [CreateController::class,'getFreePostStep'])->name('jobs.create');
Route::post('jobs/free/create', [CreateController::class,'postFreePostStep'])->name('postFreePostStep');

/** search workers route */
Route::get('company/search/workers', [CompanyController::class,'viewSearchWorker'])->name('emp.findeworkers');
Route::get('company/list/applicant', [CompanyController::class,'listApplicants'])->name('emp.listApplicants');
// resume alert route
Route::get('company/resume/alerts', [CompanyController::class,'listResumeAlert'])->name('emp.resumealert'); 


/**
 * ----------- end.-------------------
 */

// v2
Route::group([
	'namespace' => 'App\Http\Controllers\Web'
], function ($router) {

	Route::get('jobs/v2/free/create', 'FreePostsController@getFreePostStep')->name('jobs.create-v2');
	Route::post('jobs/v2/free/create', 'FreePostsController@postFreePostStep')->name('postFreePostStep-v2');
});


// comany 
Route::group(['prefix' => 'company'], function ($router) {
	// Messenger


	Route::group([
		'middleware' => ['auth', 'banned.user', 'no.http.cache'],
		'namespace' => 'App\Http\Controllers\Web\Post\CreateOrEdit'
	], function ($router) {
		$router->pattern('id', '[0-9]+');
		Route::get('/post/manage', 'PostsController@list')->name('manage');
		Route::get('/post/createfree', 'PostsController@createFree')->name('createEmpFreePost');
		Route::get('/post/view/{id}', 'PostsController@viewSinglePost')->name('viewSinglePost');
		Route::get('/post/edit/{id}', 'PostsController@editPost')->name('editPost');
		Route::post('/post/edit/{id}', 'PostsController@updatePost')->name('updatePost');
		Route::get('/post/delete/{id}', 'PostsController@delete');
		Route::post('/post/createfree', 'PostsController@createFreeAction');
		Route::get('/create/freepost', 'PostsController@updateCompanyProfile')->name('freepost');
	});
});

Route::group(['prefix' => 'company'], function ($router) {
	// Messenger
	Route::group([
		'middleware' => ['auth', 'banned.user', 'no.http.cache'],
		'namespace' => 'App\Http\Controllers\Web\company'
	], function ($router) {
		$router->pattern('id', '[0-9]+');
		Route::get('/dashboard', 'CompanyController@index')->name('companydashboard');
	
	});
});

// company end


Route::group([
	'namespace'  => 'App\Http\Controllers\Admin',
	'middleware' => ['web', 'install.checker'],
	'prefix'     => config('larapen.admin.route', 'admin'),
], function ($router) {
	// Auth
	// Authentication Routes...
	Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
	Route::post('login', 'Auth\LoginController@login');
	Route::get('logout', 'Auth\LoginController@logout')->name('logout');

	// Password Reset Routes...
	Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
	Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
	Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset')->where('token', '.+');
	Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

	// company routes 


	// Admin Panel Area
	Route::group([
		'middleware' => ['admin', 'clearance', 'banned.user', 'no.http.cache'],
	], function ($router) {
		// Dashboard
		Route::get('dashboard', 'DashboardController@dashboard');
		Route::get('/', 'DashboardController@redirect');


		// Extra (must be called before CRUD)
		Route::get('homepage/{action}', 'HomeSectionController@reset')->where('action', 'reset_(.*)');
		Route::get('languages/sync_files', 'LanguageController@syncFilesLines');
		Route::get('languages/texts/{lang?}/{file?}', 'LanguageController@showTexts')->where('lang', '[^/]*')->where('file', '[^/]*');
		Route::post('languages/texts/{lang}/{file}', 'LanguageController@updateTexts')->where('lang', '[^/]+')->where('file', '[^/]+');
		Route::get('permissions/create_default_entries', 'PermissionController@createDefaultEntries');
		Route::get('blacklists/add', 'BlacklistController@banUserByEmail');
		Route::get('categories/rebuild-nested-set-nodes', 'CategoryController@rebuildNestedSetNodes');

		// CRUD
		CRUD::resource('advertisings', 'AdvertisingController');
		CRUD::resource('chat', 'ChatController');
		CRUD::resource('blacklists', 'BlacklistController');
		CRUD::resource('categories', 'CategoryController');
		CRUD::resource('categories/{catId}/subcategories', 'CategoryController');
		CRUD::resource('cities', 'CityController');
		CRUD::resource('companies', 'CompanyController');
		CRUD::resource('countries', 'CountryController');
		CRUD::resource('countries/{countryCode}/cities', 'CityController');
		CRUD::resource('countries/{countryCode}/admins1', 'SubAdmin1Controller');
		CRUD::resource('currencies', 'CurrencyController');
		CRUD::resource('genders', 'GenderController');
		CRUD::resource('homepage', 'HomeSectionController');
		CRUD::resource('admins1/{admin1Code}/cities', 'CityController');
		CRUD::resource('admins1/{admin1Code}/admins2', 'SubAdmin2Controller');
		CRUD::resource('admins2/{admin2Code}/cities', 'CityController');
		CRUD::resource('languages', 'LanguageController');
		CRUD::resource('meta_tags', 'MetaTagController');
		CRUD::resource('packages', 'PackageController');
		CRUD::resource('pages', 'PageController');
		CRUD::resource('payments', 'PaymentController');
		CRUD::resource('payment_methods', 'PaymentMethodController');
		CRUD::resource('permissions', 'PermissionController');
		CRUD::resource('pictures', 'PictureController');
		CRUD::resource('posts', 'PostController');
		CRUD::resource('p_types', 'PostTypeController');
		CRUD::resource('report_types', 'ReportTypeController');
		CRUD::resource('roles', 'RoleController');
		// CRUD::resource('teamSize', 'TeamSizeController');
		CRUD::resource('salary_types', 'SalaryTypeController');
		CRUD::resource('settings', 'SettingController');
		CRUD::resource('time_zones', 'TimeZoneController');
		CRUD::resource('users', 'UserController');
		CRUD::resource('resume/industry', 'ResumeIndustryController');
		CRUD::resource('resume/skills', 'ResumeSkillController');
		CRUD::resource('resume/currentsalary', 'ResumeCurrentSalaryController');
		CRUD::resource('resume/expectedsalary', 'ResumeExpectedSalaryController');	
		CRUD::resource('resume/languages', 'ResumeLanguageController');
		Route::resource('teamSize', 'TeamSizeController');
		Route::get('teamSize/{id}/delete', 'TeamSizeController@delete');
		Route::get('teamSize/edit/{id}', 'TeamSizeController@editSize');
		Route::post('teamSize/edit/{id}', 'TeamSizeController@updateSize');

		Route::get('employer', 'EmployerController@index')->name('employerSetting');
		// crud education level
		Route::get('education', 'EducationLevelController@index');
		Route::get('education/create', 'EducationLevelController@create');
		Route::post('education', 'EducationLevelController@store'); // create
		Route::get('education/{id}/edit', 'EducationLevelController@edit'); // edit view
		Route::post('education/{id}/edit', 'EducationLevelController@update'); // update view
		Route::get('education/{id}/delete', 'EducationLevelController@delete'); // update view

		// crud experience level
		Route::get('experience', 'ExperienceController@index');
		Route::get('experience/create', 'ExperienceController@create');
		Route::post('experience', 'ExperienceController@store'); // create
		Route::get('experience/{id}/edit', 'ExperienceController@edit'); // edit view
		Route::post('experience/{id}/edit', 'ExperienceController@update'); // update view
		Route::get('experience/{id}/delete', 'ExperienceController@delete'); // update view

		// crud Skills 
		Route::get('skill', 'SkillController@index');
		Route::get('skill/create', 'SkillController@create');
		Route::post('skill', 'SkillController@store'); // create
		Route::get('skill/{id}/edit', 'SkillController@edit'); // edit view
		Route::post('skill/{id}/edit', 'SkillController@update'); // update view
		Route::get('skill/{id}/delete', 'SkillController@delete'); // update view

		// salary salary 
		Route::get('salary', 'SalaryController@index');
		Route::get('salary/create', 'SalaryController@create');
		Route::post('salary', 'SalaryController@store'); // create
		Route::get('salary/{id}/edit', 'SalaryController@edit'); // edit view
		Route::post('salary/{id}/edit', 'SalaryController@update'); // update view
		Route::get('salary/{id}/delete', 'SalaryController@delete'); // update view

		// salary specialities 
		Route::get('specialities', 'SpecialitiesController@index');
		Route::get('specialities/create', 'SpecialitiesController@create');
		Route::post('specialities', 'SpecialitiesController@store'); // create
		Route::get('specialities/{id}/edit', 'SpecialitiesController@edit'); // edit view
		Route::post('specialities/{id}/edit', 'SpecialitiesController@update'); // update view
		Route::get('specialities/{id}/delete', 'SpecialitiesController@delete'); // update view

		// Route::get('teamSize/edit/{id}','EducationLevelController@editSize');
		// Route::post('teamSize/edit/{id}','EducationLevelController@updateSize');

		// Others
		Route::get('account', 'UserController@account');
		Route::post('ajax/{table}/{field}', 'InlineRequestController@make')->where('table', '[^/]+')->where('field', '[^/]+');

		// Backup
		Route::get('backups', 'BackupController@index');
		Route::put('backups/create', 'BackupController@create');
		Route::get('backups/download/{file_name?}', 'BackupController@download')->where('file_name', '[^/]*');
		Route::delete('backups/delete/{file_name?}', 'BackupController@delete')->where('file_name', '[^/]*');

		// Actions
		Route::get('actions/clear_cache', 'ActionController@clearCache');
		Route::get('actions/clear_images_thumbnails', 'ActionController@clearImagesThumbnails');
		Route::get('actions/maintenance/{mode}', 'ActionController@maintenance')->where('mode', 'down|up');

		// Re-send Email or Phone verification message
		$router->pattern('id', '[0-9]+');
		Route::get('users/{id}/verify/resend/email', 'UserController@reSendEmailVerification');
		Route::get('users/{id}/verify/resend/sms', 'UserController@reSendPhoneVerification');
		Route::get('posts/{id}/verify/resend/email', 'PostController@reSendEmailVerification');
		Route::get('posts/{id}/verify/resend/sms', 'PostController@reSendPhoneVerification');

		// Plugins
		$router->pattern('plugin', '.+');
		Route::get('plugins', 'PluginController@index');
		Route::post('plugins/{plugin}/install', 'PluginController@install');
		Route::get('plugins/{plugin}/install', 'PluginController@install');
		Route::get('plugins/{plugin}/uninstall', 'PluginController@uninstall');
		Route::get('plugins/{plugin}/delete', 'PluginController@delete');

        // Community
        Route::get('community', 'CommunityController@index');
        Route::get('community/create_category','CommunityController@create_category');
		
        Route::post('community/store_category', 'CommunityController@store_category'); // create
        Route::get('community/category/{id}/edit','CommunityController@edit_category');
        Route::post('community/category/{id}/edit','CommunityController@update_category');
        Route::get('community/category/{id}/delete','CommunityController@delete_category');

		Route::get('community/{id}/edit','CommunityController@edit_discussion');
		Route::post('community/{id}/edit','CommunityController@update_discussion');
		Route::get('community/{id}/delete','CommunityController@delete_discussion');
		// System Info
		Route::get('system', 'SystemController@systemInfo');
	});
});


/*
|--------------------------------------------------------------------------
| Front-end
|--------------------------------------------------------------------------
|
| The not translated front-end routes
|
*/
Route::group([
	'namespace'  => 'App\Http\Controllers\Web',
	'middleware' => ['web', 'install.checker'],
], function ($router) {
	// Select Language
	Route::get('lang/{code}', 'Locale\SetLocaleController@redirect');

	// FILES
	Route::get('file', 'FileController@show');
	Route::get('js/fileinput/locales/{code}.js', 'FileController@fileInputLocales');

	// SEO
	Route::get('sitemaps.xml', 'SitemapsController@index');

	// Impersonate (As admin user, login as an another user)
	Route::group(['middleware' => 'auth'], function ($router) {
		Route::impersonate();
	});
});


/*
|--------------------------------------------------------------------------
| Front-end
|--------------------------------------------------------------------------
|
| The translated front-end routes
|
*/
Route::group([
	'namespace'  => 'App\Http\Controllers\Web',
], function ($router) {
	Route::group(['middleware' => ['web', 'install.checker']], function ($router) {
		// Country Code Pattern
		$countryCodePattern = implode('|', array_map('strtolower', array_keys(getCountries())));
		$countryCodePattern = !empty($countryCodePattern) ? $countryCodePattern : 'us';
		/*
		 * NOTE:
		 * '(?i:foo)' : Make 'foo' case-insensitive
		 */
		$countryCodePattern = '(?i:' . $countryCodePattern . ')';
		$router->pattern('countryCode', $countryCodePattern);


		Route::get('resume-builder', 'ResumebuilderController@index')->name('resume.home');
		Route::get('resume-builder/enter-details/{slug}', 'ResumebuilderController@resumeBuilderPages')->name('resume.pages');
		Route::post('resume-builder/basic-information-image-upload', 'ResumebuilderController@resumeImageInformation')->name('resume.image.information');
		
		Route::post('resume-builder/next-check', 'ResumebuilderController@nextCheck')->name('resume.next.check');

		Route::post('resume-builder/basic-information', 'ResumebuilderController@resumeBasicInformation')->name('resume.basic.information');
		Route::post('resume-builder/experience-history', 'ResumebuilderController@experienceHistory')->name('experience.history');
		Route::post('resume-builder/experience-history-delete', 'ResumebuilderController@experienceHistoryDelete')->name('experience.history.delete');
		Route::post('resume-builder/experience-history-edit', 'ResumebuilderController@experienceHistoryEdit')->name('experience.history.edit');

		Route::post('resume-builder/education-history', 'ResumebuilderController@educationHistory')->name('education.history');
		Route::post('resume-builder/education-history-delete', 'ResumebuilderController@educationHistoryDelete')->name('education.history.delete');
		Route::post('resume-builder/education-history-update', 'ResumebuilderController@educationHistoryUpdate')->name('education.history.update');

		Route::post('resume-builder/achievement-save', 'ResumebuilderController@achievementSave')->name('achievement.save');
		Route::post('resume-builder/achievement-delete', 'ResumebuilderController@achievementDelete')->name('achievement.delete');
		Route::post('resume-builder/achievement-update', 'ResumebuilderController@achievementUpdate')->name('achievement.update');

		Route::get('resume-builder/send-request/{slug}', 'ResumebuilderController@resumeBuilderEdit')->name('resume.edit');
		Route::get('resume-builder/email', 'ResumebuilderController@resumeBuilderEmail')->name('resume.email');

		Route::post('resume-builder/skill-save', 'ResumebuilderController@skillSave')->name('skill.save');

		Route::post('resume-builder/skill-update', 'ResumebuilderController@skillUpdate')->name('skill.updatet');

		Route::post('resume-builder/custom-skills', 'ResumebuilderController@customSkills')->name('custom.skill');
		Route::post('resume-builder/custom-course-save', 'ResumebuilderController@customCourseSave')->name('custom.course.save');
		Route::post('resume-builder/custom-course-update', 'ResumebuilderController@customCourseUpdate')->name('custom.course.update');
		Route::post('resume-builder/custom-course-delete', 'ResumebuilderController@customCourseDelete')->name('custom.course.delete');

		Route::post('resume-builder/custom-section-save', 'ResumebuilderController@customSectionSave')->name('custom.section.save');
		Route::post('resume-builder/custom-section-update', 'ResumebuilderController@customSectionUpdate')->name('custom.section.update');
		Route::post('resume-builder/custom-section-delete', 'ResumebuilderController@customSectionDelete')->name('custom.section.delete');

		Route::post('resume-builder/cirrcular-activity-section-save', 'ResumebuilderController@cirrcularActivitySave')->name('cirrcular.activity.save');
		Route::post('resume-builder/cirrcular-activity-section-update', 'ResumebuilderController@cirrcularActivityUpdate')->name('cirrcular.section.update');
		Route::post('resume-builder/cirrcular-activity-section-delete', 'ResumebuilderController@cirrcularActivityDelete')->name('cirrcular.activity.delete');

		Route::post('resume-builder/internships-section-save', 'ResumebuilderController@internshipsSectionSave')->name('internships.section.save');
		Route::post('resume-builder/internships-section-update', 'ResumebuilderController@internshipsSectionUpdate')->name('internships.section.update');
		Route::post('resume-builder/internships-section-delete', 'ResumebuilderController@internshipsSectionDelete')->name('internships.section.delete');

		Route::post('resume-builder/hobby-section-save', 'ResumebuilderController@hobbySectionSave')->name('hobby.section.save');
		Route::post('resume-builder/hobby-section-update', 'ResumebuilderController@hobbySectionUpdate')->name('hobby.section.update');
		Route::post('resume-builder/hobby-section-delete', 'ResumebuilderController@hobbySectionDelete')->name('hobby.section.delete');

		Route::post('resume-builder/language-section-save', 'ResumebuilderController@languageSectionUpdate')->name('language.section.save');
		Route::post('resume-builder/languages-section-update', 'ResumebuilderController@languagesSectionUpdate')->name('languages.section.update');
		Route::post('resume-builder/languages-section-delete', 'ResumebuilderController@languagesSectionDelete')->name('languages.section.delete');

		Route::post('resume-builder/references-section-save', 'ResumebuilderController@referencesSectionSave')->name('references.section.save');
		Route::post('resume-builder/references-section-update', 'ResumebuilderController@referencesSectionUpdate')->name('references.section.update');
		Route::post('resume-builder/references-section-delete', 'ResumebuilderController@referencesSectionDelete')->name('references.section.delete');
		
		Route::post('resume-builder/custom-sections', 'ResumebuilderController@customSection')->name('custom.section');	
		Route::post('resume-builder/custom-sub-section-delete', 'ResumebuilderController@customSubSectionDelete')->name('custom.sub.section.delete');	
		Route::post('resume-builder/custom-section-heading-update', 'ResumebuilderController@customSectionHeadingUpdate')->name('custom.section.heading.update');	
		Route::post('resume-builder/course-full-section-delete', 'ResumebuilderController@coursefullSectionDelete')->name('course.full.section.delete');	
		Route::post('resume-builder/extra-activity-full-section-delete', 'ResumebuilderController@extraActivityfullSectionDelete')->name('extra.activuty.full.section.delete');	
		Route::post('resume-builder/internship-full-section-delete', 'ResumebuilderController@internshipFullSectionDelete')->name('internship.Full.section.delete');	
		Route::post('resume-builder/hobby-full-section-delete', 'ResumebuilderController@hobbyfullSectionDelete')->name('hobby.full.section.delete');	
		Route::post('resume-builder/languages-full-section-delete', 'ResumebuilderController@languagesFullSectionDelete')->name('languages.Full.section.delete');	
			
		Route::post('/resume-builder/reference/add-reference-section-dynamic-form', 'ResumebuilderController@referenceSectionDynamicForm')->name('reference.dynamic.form');	
		Route::post('/resume-builder/reference/save', 'ResumebuilderController@referenceSave')->name('reference.save');	
			
		Route::get('resume-builder/reference-response', 'ResumebuilderController@referenceResponse')->name('reference.response');	
		Route::post('resume-builder/reference-response-update', 'ResumebuilderController@referenceResponseUpdate')->name('reference.response.update');	
			
		Route::get('resume-builder/thankyou', 'ResumebuilderController@referenceThankyou')->name('reference.thankyou');	
			
		Route::get('resume-builder/resume-data', 'ResumebuilderController@resumeData')->name('resume.data');	
			
			
			
		Route::post('resume-builder/field-change', 'ResumebuilderController@resumeFieldChange')->name('resume.field.change');	
		Route::post('resume-builder/language-info-change', 'ResumebuilderController@resumeLanguageInfoChange')->name('resume.language.info.change');	
		Route::post('resume-builder/skill-change', 'ResumebuilderController@resumeSkillChange')->name('resume.skill.change');	
		Route::post('resume-builder/skill-modal-close', 'ResumebuilderController@resumeSkillModalClose')->name('resume.skill.modal.close');	
			
		Route::post('resume-builder/experience-modal-close', 'ResumebuilderController@resumeExperienceModalClose')->name('resume.experience.modal.close');	
		Route::post('resume-builder/experience-edit-form-change', 'ResumebuilderController@resumeExperienceEditFormChange')->name('resume.experience.form.change');	
			
		Route::post('resume-builder/education-edit-form-change', 'ResumebuilderController@resumeEducationEditFormChange')->name('resume.education.form.change');	
		Route::post('resume-builder/education-modal-close', 'ResumebuilderController@resumeEducationEditModalClose')->name('resume.education-modal-close');	
			
		Route::post('resume-builder/hobby-edit-form-change', 'ResumebuilderController@resumeHobbyEditFormChange')->name('resume.hobby.form.change');	
			
		Route::post('resume-builder/basic-information-form-change', 'ResumebuilderController@resumeBasicInfoFormChange')->name('resume.basic.info.form.change');


		// HOMEPAGE
		Route::get('/', 'HomeController@index');
		Route::get(dynamicRoute('routes.countries'), 'CountriesController@index');

		// find a friend module
		Route::get('find/friends', 'Friend\FriendController@findFriends');
		Route::post('find/friends', 'Friend\FriendController@getGoogleData');
		Route::post('send/friends/invites', 'Friend\FriendController@sendInvitesToFriendsEmails');
		Route::get('friends/list', 'Friend\FriendController@friendsListOfApp');
		Route::post('friends/selection', 'Friend\FriendController@selectFriends');
		Route::get('friends/send/invites', 'Friend\FriendController@sendFriendInvites');
		Route::get('friends/send/mail', 'Friend\FriendController@sendMail');
		Route::get('friends/skip', 'Friend\FriendController@skipSignup');
		Route::get('friends/process/complete', 'Friend\FriendController@signupProcessComplete');

		$router->pattern('provider', 'facebook|linkedin|twitter|google|yahoo');
		Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
		Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
		Route::post('auth/social/signup', 'Auth\SocialController@socialSignupScreen');

		// AUTH
		Route::group(['middleware' => ['guest', 'no.http.cache']], function ($router) {
			// Registration Routes...
			Route::get(dynamicRoute('routes.register'), 'Auth\RegisterController@showRegistrationForm');
			Route::post(dynamicRoute('routes.register'), 'Auth\RegisterController@register');
			Route::get('register/finish', 'Auth\RegisterController@finish');


			Route::post('register/first', 'Auth\RegisterController@registerFirst');
			Route::post('register/worker-first', 'Auth\RegisterController@registerWorkerFirst');
			Route::post('register/worker-second', 'Auth\RegisterController@registerWorkerSecondScreen');
			Route::post('register/worker-third', 'Auth\RegisterController@registerWorkerThirdScreen');
			Route::post('register/employer-first', 'Auth\RegisterController@registerEmployerFirst');
			Route::post('register/employer-second', 'Auth\RegisterController@registerEmployerSecond');
			Route::post('register/get-countries', 'Auth\RegisterController@getCountries');
			Route::post('register/get-cities', 'Auth\RegisterController@getCities');
			Route::get('verify/email/{emailToken}', 'Auth\RegisterController@verifyEmail');
			Route::post('register/resend/verification/code', 'Auth\RegisterController@resednEmailVerification');


			// Authentication Routes...
			Route::get(dynamicRoute('routes.login'), 'Auth\LoginController@showLoginForm');
			Route::post(dynamicRoute('routes.login'), 'Auth\LoginController@login');


			// Forgot Password Routes...
			Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm');
			Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLink');

			// Reset Password using Token
			Route::get('password/token', 'Auth\ResetPasswordController@showTokenRequestForm');
			Route::post('password/token', 'Auth\ResetPasswordController@sendResetToken');

			// Reset Password using Link (Core Routes...)
			Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm');
			Route::post('password/reset', 'Auth\ResetPasswordController@reset');

			// Social Authentication
			// $router->pattern('provider', 'facebook|linkedin|twitter|google|yahoo');
			// Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
			// Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
			// Route::post('auth/social/signup', 'Auth\SocialController@socialSignupScreen');
		});

		// Route::group(['middleware' => ['auth']], function ($router) {
		// 	// Social Authentication
		// 	$router->pattern('provider', 'facebook|linkedin|twitter|google|yahoo');
		// 	Route::get('auth/{provider}', 'Auth\SocialController@redirectToProvider');
		// 	Route::get('auth/{provider}/callback', 'Auth\SocialController@handleProviderCallback');
		// });
		// Email Address or Phone Number verification
		$router->pattern('field', 'email|phone');
		Route::get('users/{id}/verify/resend/email', 'Auth\RegisterController@reSendEmailVerification');
		Route::get('users/{id}/verify/resend/sms', 'Auth\RegisterController@reSendPhoneVerification');
		Route::get('users/verify/{field}/{token?}', 'Auth\RegisterController@verification');
		Route::post('users/verify/{field}/{token?}', 'Auth\RegisterController@verification');

		// User Logout
		Route::get(dynamicRoute('routes.logout'), 'Auth\LoginController@logout');


		// POSTS
		Route::group(['namespace' => 'Post'], function ($router) {
			$router->pattern('id', '[0-9]+');
			// $router->pattern('slug', '.*');
			$bannedSlugs = collect(config('routes'))->filter(function ($value, $key) {
				return (!Str::contains($key, '.') && !empty($value));
			})->flatten()->toArray();
			if (!empty($bannedSlugs)) {
				/*
				 * NOTE:
				 * '^(?!companies|users)$' : Don't match 'companies' or 'users'
				 * '^(?=.*)$'              : Match any character
				 * '^((?!\/).)*$'          : Match any character, but don't match string with '/'
				 */
				$router->pattern('slug', '^(?!' . implode('|', $bannedSlugs) . ')(?=.*)((?!\/).)*$');
			} else {
				$router->pattern('slug', '^(?=.*)((?!\/).)*$');
			}

			// SingleStep Post creation
			Route::group(['namespace' => 'CreateOrEdit\SingleStep'], function ($router) {
				Route::get('create', 'CreateController@getForm');
				Route::post('create', 'CreateController@postForm');
				Route::get('create/finish', 'CreateController@finish');

				// Payment Gateway Success & Cancel
				Route::get('create/payment/success', 'CreateController@paymentConfirmation');
				Route::get('create/payment/cancel', 'CreateController@paymentCancel');
				Route::post('create/payment/success', 'CreateController@paymentConfirmation');

				// Email Address or Phone Number verification
				$router->pattern('field', 'email|phone');
				Route::get('posts/{id}/verify/resend/email', 'CreateController@reSendEmailVerification');
				Route::get('posts/{id}/verify/resend/sms', 'CreateController@reSendPhoneVerification');
				Route::get('posts/verify/{field}/{token?}', 'CreateController@verification');
				Route::post('posts/verify/{field}/{token?}', 'CreateController@verification');
			});

			// MultiSteps Post creation
			Route::group(['namespace' => 'CreateOrEdit\MultiSteps'], function ($router) {
				Route::get('posts/create', 'CreateController@getPostStep');
				// Route::get('posts/free/create', 'CreateController@getFreePostStep');
				Route::post('posts/create', 'CreateController@postPostStep');
				// Route::post('posts/free/create', 'CreateController@postFreePostStep');
				Route::get('posts/create/payment', 'CreateController@getPaymentStep');
				Route::post('posts/create/payment', 'CreateController@postPaymentStep');
				Route::post('posts/create/finish', 'CreateController@finish');
				Route::get('posts/create/finish', 'CreateController@finish');

				// Payment Gateway Success & Cancel
				Route::get('posts/create/payment/success', 'CreateController@paymentConfirmation');
				Route::post('posts/create/payment/success', 'CreateController@paymentConfirmation');
				Route::get('posts/create/payment/cancel', 'CreateController@paymentCancel');

				// Email Address or Phone Number verification
				$router->pattern('field', 'email|phone');
				Route::get('posts/{id}/verify/resend/email', 'CreateController@reSendEmailVerification');
				Route::get('posts/{id}/verify/resend/sms', 'CreateController@reSendPhoneVerification');
				Route::get('posts/verify/{field}/{token?}', 'CreateController@verification');
				Route::post('posts/verify/{field}/{token?}', 'CreateController@verification');
			});

			Route::group(['middleware' => ['auth']], function ($router) {
				$router->pattern('id', '[0-9]+');

				// SingleStep Post edition
				Route::group(['namespace' => 'CreateOrEdit\SingleStep'], function ($router) {
					Route::get('edit/{id}', 'EditController@getForm');
					Route::put('edit/{id}', 'EditController@postForm');

					// Payment Gateway Success & Cancel
					Route::get('edit/{id}/payment/success', 'EditController@paymentConfirmation');
					Route::get('edit/{id}/payment/cancel', 'EditController@paymentCancel');
					Route::post('edit/{id}/payment/success', 'EditController@paymentConfirmation');
				});

				// MultiSteps Post edition
				Route::group(['namespace' => 'CreateOrEdit\MultiSteps'], function ($router) {
					Route::get('posts/{id}/edit', 'EditController@getForm');
					Route::put('posts/{id}/edit', 'EditController@postForm');
					Route::get('posts/{id}/payment', 'PaymentController@getForm');
					Route::post('posts/{id}/payment', 'PaymentController@postForm');

					// Payment Gateway Success & Cancel
					Route::get('posts/{id}/payment/success', 'PaymentController@paymentConfirmation');
					Route::post('posts/{id}/payment/success', 'PaymentController@paymentConfirmation');
					Route::get('posts/{id}/payment/cancel', 'PaymentController@paymentCancel');
				});
			});

			// Post's Details
			Route::get(dynamicRoute('routes.post'), 'DetailsController@index');

			// Contact Job's Author
			Route::post('posts/{id}/contact', 'DetailsController@sendMessage');

			// Send report abuse
			Route::get('posts/{id}/report', 'ReportController@showReportForm');
			Route::post('posts/{id}/report', 'ReportController@sendReport');
		});
		Route::post('send-by-email', 'Search\SearchController@sendByEmail');


		// ACCOUNT
		Route::group(['prefix' => 'account'], function ($router) {
			// Messenger
			// Contact Post's Author
			Route::group([
				'namespace' => 'Account',
				'prefix'    => 'messages',
			], function ($router) {
				Route::post('posts/{id}', 'MessagesController@store');
			});

			Route::group([
				'middleware' => ['auth', 'banned.user', 'no.http.cache'],
				'namespace' => 'Account'
			], function ($router) {
				$router->pattern('id', '[0-9]+');

				// Users
				Route::get('/', 'EditController@index');
				Route::get('/dashboard', 'EditController@dashboard')->name('dashboard');
				Route::get('/company/profile', 'profileController@getCompanyProfile')->name('profile');
				Route::get('/company/post/manage', 'PostController@index')->name('manage');
				Route::get('/company/create/freepost', 'profileController@updateCompanyProfile')->name('freepost');

				Route::post('/company/profile', 'profileController@updateCompanyProfile')->name('profile');
				Route::get('/message-chat', 'ChatController@index')->name('message-chat');

				Route::get('/resume', 'ChatController@resume')->name('resume-admin');
				Route::get('/reference', 'ChatController@reference')->name('reference-admin');
				Route::get('/resume-sent-out', 'ChatController@resumeSentOut')->name('resume-sent-out');
				
				Route::post('/resume/resume-cv-delete', 'ChatController@resumeCvDelete')->name('resume-cv-delete');

				Route::get('/contacts', 'ChatController@get');
				Route::get('/conversation/{id}', 'ChatController@getMessagesFor');
				Route::post('/conversation/send', 'ChatController@send');
				Route::get('/search-chat-user', 'ChatController@searchResult');

				Route::group(['middleware' => 'impersonate.protect'], function () {
					Route::put('/', 'EditController@updateDetails');
					Route::put('settings', 'EditController@updateSettings');
					Route::put('preferences', 'EditController@updatePreferences');
				});
				Route::get('close', 'CloseController@index');
				Route::group(['middleware' => 'impersonate.protect'], function () {
					Route::post('close', 'CloseController@submit');
				});
				Route::post('password/email', 'EditController@sendResetLink');

				// Companies
				Route::group(['prefix' => 'companies'], function ($router) {
					Route::get('/', 'CompanyController@index');
					Route::get('create', 'CompanyController@create');
					Route::post('/', 'CompanyController@store');
					Route::get('{id}', 'CompanyController@show');
					Route::get('{id}/edit', 'CompanyController@edit');
					Route::put('{id}', 'CompanyController@update');
					Route::get('{id}/delete', 'CompanyController@destroy');
					Route::post('delete', 'CompanyController@destroy');
				});

				// Resumes
				Route::group(['prefix' => 'resumes'], function ($router) {
					Route::get('/', 'ResumeController@index');
					Route::get('
					', 'ResumeController@create');
					Route::post('/', 'ResumeController@store');
					Route::get('{id}', 'ResumeController@show');
					Route::get('{id}/edit', 'ResumeController@edit');
					Route::put('{id}', 'ResumeController@update');
					Route::get('{id}/delete', 'ResumeController@destroy');
					Route::post('delete', 'ResumeController@destroy');
				});

				// Posts
				Route::get('saved-search', 'PostsController@getSavedSearch');
				$router->pattern('pagePath', '(my-posts|archived|favourite|pending-approval|saved-search)+');
				Route::get('{pagePath}', 'PostsController@getPage');
				Route::get('my-posts/{id}/offline', 'PostsController@getMyPosts');
				Route::get('archived/{id}/repost', 'PostsController@getArchivedPosts');
				Route::get('{pagePath}/{id}/delete', 'PostsController@destroy');
				Route::post('{pagePath}/delete', 'PostsController@destroy');

				// Messenger
				Route::group(['prefix' => 'messages'], function ($router) {
					$router->pattern('id', '[0-9]+');
					Route::post('check-new', 'MessagesController@checkNew');
					Route::get('/', 'MessagesController@index');
					// Route::get('create', 'MessagesController@create');
					Route::post('/', 'MessagesController@store');
					Route::get('{id}', 'MessagesController@show');
					Route::put('{id}', 'MessagesController@update');
					Route::get('{id}/actions', 'MessagesController@actions');
					Route::post('actions', 'MessagesController@actions');
					Route::get('{id}/delete', 'MessagesController@destroy');
					Route::post('delete', 'MessagesController@destroy');
				});

				// Transactions
				Route::get('transactions', 'TransactionsController@index');
			});
		});



		// AJAX
		Route::group(['prefix' => 'ajax'], function ($router) {
			Route::get('countries/{countryCode}/admins/{adminType}', 'Ajax\LocationController@getAdmins');
			Route::get('countries/{countryCode}/admins/{adminType}/{adminCode}/cities', 'Ajax\LocationController@getCities');
			Route::get('countries/{countryCode}/cities/{id}', 'Ajax\LocationController@getSelectedCity');
			Route::post('countries/{countryCode}/cities/autocomplete', 'Ajax\LocationController@searchedCities');
			Route::post('countries/{countryCode}/admin1/cities', 'Ajax\LocationController@getAdmin1WithCities');
			Route::post('category/select-category', 'Ajax\CategoryController@getCategoriesHtml');
			Route::post('save/post', 'Ajax\PostController@savePost');
			Route::post('save/search', 'Ajax\PostController@saveSearch');
			Route::post('post/phone', 'Ajax\PostController@getPhone');
		});


		// FEEDS
		Route::feeds();


		// SITEMAPS (XML)
		Route::get('{countryCode}/sitemaps.xml', 'SitemapsController@site');
		Route::get('{countryCode}/sitemaps/pages.xml', 'SitemapsController@pages');
		Route::get('{countryCode}/sitemaps/categories.xml', 'SitemapsController@categories');
		Route::get('{countryCode}/sitemaps/cities.xml', 'SitemapsController@cities');
		Route::get('{countryCode}/sitemaps/posts.xml', 'SitemapsController@posts');


		// PAGES
		Route::get(dynamicRoute('routes.pricing'), 'PageController@pricing');
		Route::get(dynamicRoute('routes.pageBySlug'), 'PageController@cms');
		Route::get(dynamicRoute('routes.contact'), 'PageController@contact');
		Route::post(dynamicRoute('routes.contact'), 'PageController@contactPost');
		Route::get('/aboutus', 'PageController@aboutus');
		Route::get('/worker', 'PageController@worker');
		Route::get('/employer', 'PageController@employer');
		Route::get('/how-it-work', 'PageController@howitwork');
		Route::get('/blog-page', 'PageController@blogpage');
		Route::get('/blog-list', 'PageController@bloglist');
		Route::get('/job-detail', 'PageController@jobdetail');
		Route::get('/worker-profile', 'PageController@workprofile');
		Route::get('/all-jobs', 'PageController@alljobs');
		Route::get('/all-worker', 'PageController@allworker');
		Route::get('/company-profile', 'PageController@companyprofile');





		// SITEMAP (HTML)
		Route::get(dynamicRoute('routes.sitemap'), 'SitemapController@index');


		// SEARCH
		Route::group(['namespace' => 'Search'], function ($router) {
			$router->pattern('id', '[0-9]+');
			$router->pattern('username', '[a-zA-Z0-9]+');
			Route::get(dynamicRoute('routes.companies'), 'CompanyController@index');
			Route::get(dynamicRoute('routes.search'), 'SearchController@index');
			Route::get(dynamicRoute('routes.searchPostsByUserId'), 'UserController@index');
			Route::get(dynamicRoute('routes.searchPostsByUsername'), 'UserController@profile');
			Route::get(dynamicRoute('routes.searchPostsByCompanyId'), 'CompanyController@profile');
			Route::get(dynamicRoute('routes.searchPostsByTag'), 'TagController@index');
			Route::get(dynamicRoute('routes.searchPostsByCity'), 'CityController@index');
			Route::get(dynamicRoute('routes.searchPostsBySubCat'), 'CategoryController@index');
			Route::get(dynamicRoute('routes.searchPostsByCat'), 'CategoryController@index');
		});


		// COMMUNITIES

        $route = function ($accessor, $default = '') {
            return Config::get('chatter.routes.' . $accessor, $default);
        };

        Route::group(['prefix' => $route('home'), 'namespace' => 'Communities'], function ($router) use ($route) {
            Route::get('/', ['as' => 'home', 'uses' => 'ChatterController@index']);
            // Single category view.
            Route::get($route('category') . '/{slug}', ['as' => 'category.show', 'uses' => 'ChatterController@index']);
            Route::post('/vote', ['as' => 'category.vote', 'uses' => 'ChatterController@vote']);

            /*
            * Discussion routes.
            */
            Route::group(['as' => 'discussion.','prefix' => $route('discussion')], function () {
                // All discussions view.
                Route::get('/', ['as' => 'index','uses' => 'ChatterDiscussionController@index']);
                // Create discussion view.
                Route::get('create', ['as' => 'create', 'uses' => 'ChatterDiscussionController@create']);
                // Store discussion action.
                Route::post('/', ['as' => 'store', 'uses' => 'ChatterDiscussionController@store']);
                // Single discussion view.
                Route::get('{category}/{slug}', ['as' => 'showInCategory', 'uses' => 'ChatterDiscussionController@show']);
                // Add user notification to discussion
                Route::post('{category}/{slug}/email', ['as' => 'email', 'uses' =>'ChatterDiscussionController@toggleEmailNotification']);

                /*
                * Specific discussion routes.
                */
                Route::group(['prefix' => '{discussion}'], function () {
                    // Single discussion view.
                    Route::get('/', ['as' => 'show', 'uses' => 'ChatterDiscussionController@show']);
                    // Edit discussion view.
                    Route::get('edit', ['as' => 'edit', 'uses' => 'ChatterDiscussionController@edit']);
                    // Update discussion action.
                    Route::match(['PUT', 'PATCH'], '/', ['as' => 'update', 'uses' => 'ChatterDiscussionController@update']);
                    // Destroy discussion action.
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'ChatterDiscussionController@destroy']);
                });
            });
            /*
            * Post routes.
            */
            Route::group(['as' => 'posts.', 'prefix' => $route('post', 'posts')], function () {
                // All posts view.
                Route::get('/', ['as' => 'index', 'uses' => 'ChatterPostController@index']);
                // Create post view.
                Route::get('create', ['as' => 'create', 'uses' => 'ChatterPostController@create']);
                // Store post action.
                Route::post('/', ['as' => 'store', 'uses' => 'ChatterPostController@store']);

                Route::post('emoji',['as' => 'emoji', 'uses' => 'ChatterPostController@set_emoji']);
                /*
                * Specific post routes.
                */
                Route::group(['prefix' => '{post}'], function () {
                    // Single post view.
                    Route::get('/', ['as' => 'show', 'uses' => 'ChatterPostController@show']);
                    // Edit post view.
                    Route::get('edit', ['as' => 'edit', 'uses' => 'ChatterPostController@edit']);
                    // Update post action.
                    Route::match(['PUT', 'PATCH'], '/', ['as' => 'update', 'uses' => 'ChatterPostController@update']);
                    // Destroy post action.
                    Route::delete('/', ['as' => 'destroy', 'uses' => 'ChatterPostController@destroy']);
                });
            });
        });

        Route::get($route('home') . '.atom', ['as' => 'chatter.atom', 'uses' => 'DevDojo\Chatter\Controllers\ChatterAtomController@index',]);
	});
});
// Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
