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

namespace App\Http\Controllers\Web\Friend;

use App\Http\Controllers\Web\Auth\Traits\VerificationTrait;
use App\Http\Controllers\Web\FrontController;
use App\Http\Requests\UserRequest;
use App\Models\Gender;
use App\Helpers\Auth\Traits\RegistersUsers;
use App\Models\UserType;
use Torann\LaravelMetaTags\Facades\MetaTag;
use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Session;
use \Cache;
use App\Mail\SendFriendInviteMail;
use App\Jobs\SendInviteMailJob;
use File;
use Google_Client;
use Google_Service_PeopleService;


class FriendController extends FrontController
{
	protected $microsoftClientId = 'c19595b5-caee-4406-bb54-c463c64bff51';
	protected $microsoftSecretKey = 'UN29sSx_8~JdC_Z~rO39JhHO_DK4~5M6Am';
	protected $googleApiKey = 'AIzaSyCdW3iUBxPy6Pb_9utmHAv4RURMZdkXuP0';

	/**
	 * Where to redirect users after login / registration.
	 *
	 * @var string
	 */
	protected $redirectTo = '/account';

	/**
	 * FriendController constructor.
	 */
	public function __construct()
	{
		parent::__construct();

		$this->middleware(function ($request, $next) {
			if(Auth::user()){
				return $next($request);
			}
				return redirect('/');
		});

	}

	public function findFriends(){
		$userModel = User::where('id', auth()->user()->id)->first();
		if($userModel->signup_status == 1){
			return redirect('/');
		}
		// Meta Tags
		MetaTag::set('title', getMetaTag('title', 'Find a firend'));
		MetaTag::set('description', strip_tags(getMetaTag('description', 'find a friend')));
		MetaTag::set('keywords', getMetaTag('keywords', 'find a friend'));

		$outlookUrl = 'https://login.microsoftonline.com/common/oauth2/v2.0/authorize?state=normal&scope='.urlencode('https://graph.microsoft.com/contacts.read').'&response_type=code&approval_prompt=auto&client_id='.$this->microsoftClientId.'&redirect_uri='. urlencode(env('APP_URL') . '/friends/contacts/microsoft');

		$googleAPIkey = $this->googleApiKey;
		$clientIdGoogle = config('settings.social_auth.google_client_id');
		return appView('friend.index', compact('outlookUrl', 'googleAPIkey', 'clientIdGoogle'));
	}

	public function sendInvitesToFriendsEmails(Request $request){
		$userModel = User::where('id', auth()->user()->id)->first();
		if($userModel->signup_status == 1){
			return redirect('/');
		}

		$emails = $request->emails;
		$syncType = $request->sync_type;
		$validator = Validator::make($request->all(), [
			'sync_type' => 'required',
		]);
		
		if ($validator->fails()) {
			Session::flash('profile_error', 'Please select an option to continue!!');
			return redirect()->back()->withInput();
		}
		$matchedEmailArr = $notMatchedEmails= $data = [];
		// enter manual emails 
		if($syncType == 'email'){
			$emails = str_replace(' ', '', $emails);
			$explode = explode(',',$emails); // Explodes the emails by the comma
			$valid = true;

			// Loop through each email and validate it
			foreach($explode as $email) {
			    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			        $valid = false;
			    }else{
			    	$userModel = User::where('email', $email)->first();
			    	if(!empty($userModel)){
			    		$matchedEmailArr[] = $email;
			    	}else{
			    		$notMatchedEmails[] = $email;
			    	}
			    }
			}

			if(!$valid){
				Session::flash('profile_error', 'Please enter valid emails and should be comma separated!!');
				return redirect()->back()->withInput();
			}

			$name = auth()->user()->first_name.' '. auth()->user()->last_name;
			$data['name'] = $name;
			$data['matched_emails'] = $matchedEmailArr;
			$data['unmatched_emails'] = $notMatchedEmails;
			Cache::put('syncEmailArr', $data);

			if(!empty($matchedEmailArr)){
				return redirect('friends/list');
			}else{
				return redirect('friends/send/invites');
			}
		}

		// enter emails using CSV
		if($syncType == 'csv'){
			$validator = Validator::make($request->all(), [
	            'csv' => 'max:10240|required',
	        ]);
	     
	        if ($validator->passes()) {
	            $mimeTypeFile = $request->file('csv')->getClientMimeType();
	            if ($mimeTypeFile != 'application/vnd.ms-excel' 
				&& $mimeTypeFile != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' 
				&& $mimeTypeFile != 'application/octet-stream' 
				&& $mimeTypeFile != 'text/plain') {
	            	Session::flash('profile_error', 'Please upload csv file only!');
					return redirect()->back()->withInput();
	            }

	            $fileNameOrg = $request->file('csv')->getClientOriginalName();
	            $fileNameArr = explode('.', $fileNameOrg);
	            $fileName = time().'_'.str_replace(' ', '_', reset($fileNameArr)).'.'.end($fileNameArr);
	            
	            $path = storage_path().'/app/friends_invite_csv';
	            if(!File::exists($path)) {
				    File::makeDirectory($path, $mode = 0777, true, true);
				}
	            //upload csv file
	            $request->csv->move(storage_path('app/friends_invite_csv'), $fileName);
				if($mimeTypeFile == 'text/plain'){
					$contentFromTxt = File::get($path.'/'.$fileName);
					preg_match_all("/[\._a-zA-Z0-9-]+@[\._a-zA-Z0-9-]+/i", $contentFromTxt, $emailGetArray);
					if(!empty($emailGetArray[0])){
						foreach($emailGetArray[0] as $emailAdd){
							if(!empty($emailAdd)){
								$email = trim($emailAdd);
								$userModel = User::where('email', $email)->first();
								if(!empty($userModel)){
									$matchedEmailArr[] = $email;
								}else{
									$notMatchedEmails[] = $email;
								}
							}
						}	
					}
				}else{
					//read csv file
					$fileD = fopen($path.'/'.$fileName,"r");
					$column=fgetcsv($fileD);
					while(!feof($fileD)){
						 $rowData[]=fgetcsv($fileD);
					}
	
					$emailKey = array_search ('Email Address', $column);
					foreach ($rowData as $key => $emailVal) {
						$email = trim($emailVal[$emailKey]);
						$userModel = User::where('email', $email)->first();
						if(!empty($userModel)){
							$matchedEmailArr[] = $email;
						}else{
							$notMatchedEmails[] = $email;
						}
					}
				}

				$name = auth()->user()->first_name.' '. auth()->user()->last_name;
				$data['name'] = $name;
	            $data['matched_emails'] = $matchedEmailArr;
				$data['unmatched_emails'] = $notMatchedEmails;
				Cache::put('syncEmailArr', $data);

				unlink(storage_path('app/friends_invite_csv').'/'. $fileName);
				if(!empty($matchedEmailArr)){
					return redirect('friends/list');
				}else{
					return redirect('friends/send/invites');
				}
	        }

	        $errorMsg = $validator->errors()->all()[0];
	        Session::flash('profile_error', $errorMsg);
			return redirect()->back()->withInput();
			
		}

		//google contacts
		if($syncType == 'google'){
			$contactsGet = json_decode($request->googleContacts);

			$matchedEmailArr = $notMatchedEmails= $data = [];

			foreach ($contactsGet as $userContact) {
				if(!empty($userContact)){
					$emailContact = $userContact;
					$userModel = User::where('email', $emailContact)->first();
					if(!empty($userModel)){
						$matchedEmailArr[] = $emailContact;
					}else{
						$notMatchedEmails[] = $emailContact;
					}
				}
			}
			$name = auth()->user()->first_name.' '. auth()->user()->last_name;
			$data['name'] = $name;
			$data['matched_emails'] = $matchedEmailArr;
			$data['unmatched_emails'] = $notMatchedEmails;
			Cache::put('syncEmailArr', $data);
			if(!empty($matchedEmailArr)){
				return redirect('friends/list');
			}else{
				return redirect('friends/send/invites');
			}
		}

		if($syncType == 'outlook'){
			$contactsGet = json_decode($request->googleContacts);

			$matchedEmailArr = $notMatchedEmails= $data = [];

			foreach ($contactsGet as $userContact) {
				if(!empty($userContact)){
					$emailContact = $userContact;
					$userModel = User::where('email', $emailContact)->first();
					if(!empty($userModel)){
						$matchedEmailArr[] = $emailContact;
					}else{
						$notMatchedEmails[] = $emailContact;
					}
				}
			}

			$name = auth()->user()->first_name.' '. auth()->user()->last_name;
			$data['name'] = $name;
			$data['matched_emails'] = $matchedEmailArr;
			$data['unmatched_emails'] = $notMatchedEmails;
			Cache::put('syncEmailArr', $data);
			if(!empty($matchedEmailArr)){
				return redirect('friends/list');
			}else{
				return redirect('friends/send/invites');
			}
		}
	}

	public function friendsListOfApp(){
		$userModel = User::where('id', auth()->user()->id)->first();
		if($userModel->signup_status == 1){
			return redirect('/');
		}

		$getData = Cache::get('syncEmailArr');
		$matchedEmail = $getData['matched_emails'];

		$userData = User::whereIn('email', $matchedEmail)->get();

		Session::flash('success_msg', '<p>Congratulations you have connections <br> that are using Virtualworkers.pH </p>');
		return appView('friend.app-users', compact('userData'));

	}

	public function sendFriendInvites(){
		$userModel = User::where('id', auth()->user()->id)->first();
		if($userModel->signup_status == 1){
			return redirect('/');
		}
		$getData = Cache::get('syncEmailArr');
		$unMatchedEmail = $getData['unmatched_emails'];
		if(array_key_exists('selected_emails', $getData)){
			$selectedEmails = $getData['selected_emails'];
			if(!empty($selectedEmails)){
				$unMatchedEmail = array_merge($unMatchedEmail, $selectedEmails);
			}
		}

		return appView('friend.send-invites', compact('unMatchedEmail'));
	}

	public function selectFriends(Request $request){
		$selectedUser = $request->select;
		$getData = Cache::get('syncEmailArr');
		$getData['selected_emails'] = $selectedUser;
		Cache::put('syncEmailArr', $getData);

		return redirect('friends/send/invites');
	}

	public function sendMail(){
		$userModel = User::where('id', auth()->user()->id)->first();
		if($userModel->signup_status == 1){
			return redirect('/');
		}
		$getData = Cache::get('syncEmailArr');
		dispatch(new \App\Jobs\SendInviteMailJob())->afterResponse();

		$name = auth()->user()->first_name.' '. auth()->user()->last_name;
		// Cache::forget('syncEmailArr');
		Session::flash('success_msg', "<p>Congratulation $name! <br> Your email has been confirmed <br> You have received reward points</p>");
		return appView('friend.invites-send');
	}

	public function skipSignup(){
		$userModel = User::where('id', auth()->user()->id)->first();
		$userModel->signup_status = 1;
		$userModel->save();
		return redirect('/');
	}

	public function signupProcessComplete(){
		$userModel = User::where('id', auth()->user()->id)->first();
		$userModel->signup_status = 1;
		$userModel->save();

		return redirect('/');
	}

}