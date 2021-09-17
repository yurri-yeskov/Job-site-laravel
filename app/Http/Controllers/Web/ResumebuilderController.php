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



namespace App\Http\Controllers\Web;



use App\Helpers\ArrayHelper;

use App\Helpers\UrlGen;

use App\Models\Company;

use App\Models\Post;

use App\Models\Category;

use App\Models\HomeSection;

use App\Models\SubAdmin1;

use App\Models\City;

use App\Models\User;

use Illuminate\Support\Facades\Cache;

use Torann\LaravelMetaTags\Facades\MetaTag;

use App\Models\Template;

use Illuminate\Http\Request;

use App\Models\Basic_information;

use App\Models\Experience_history;

use App\Models\Education_history;

use App\Models\Current_salary;

use App\Models\Expected_salary;

use App\Models\Work_industry;

use App\Models\Achievement;

use App\Models\Skill;

use App\Models\Course;

use App\Models\Extra_cirricular_activity;

use App\Models\Internship;

use App\Models\Hobby;

use App\Models\Custom_language;

use App\Models\Skill_list;

use App\Models\Resume_language;

use App\Models\Custom_section;

use App\Models\Custom_sub_section;

use App\Models\Send_reference;

use DB;

use App\Mail\ReferenceMail;

class ResumebuilderController extends FrontController

{

	/**

	 * HomeController constructor.

	 */

	public function __construct()

	{

		parent::__construct();

	}

	

	/**

	 * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View

	 */

	public function index()

	{
		
			
		$data = [];
		$template = Template::where('status',1)->get();
		$data = ['template'=>$template];
		return appView('resume-builder.index', compact('data'));
	}

	
	
	/**

	 * Get Resume pages

	 */

	public function resumeBuilderPages($slug = null)
	{
		$template = Template::where('slug',$slug)->get();
		$current_salary = Current_salary::get();
		$expected_salary = Expected_salary::get();
		$basic_information = Basic_information::where('user_id',1)->where('template_id',$template[0]->id)->get();
		$experience_history = Experience_history::where('user_id',1)->where('template_id',$template[0]->id)->get();
		$experience_html = view('resume-builder/sections/experience-section',array('experience_history'=>$experience_history))->render();
		$education_history = Education_history::where('user_id',1)->where('template_id',$template[0]->id)->get();
		$education_html = view('resume-builder/sections/education-section',array('education_history'=>$education_history))->render();
		$ecptemp = explode(", ",$template[0]->id);
		$temp_id = $template[0]->id;		
	
		$works_ind = array();
		$work_industry = Work_industry::get();
		foreach($work_industry as $wkind){
			$works_ind[] = $wkind->type;
		}
		$expwork = array();
		if(isset($basic_information[0])){
			if($basic_information[0]->work_industries){
				$expwork = explode(', ',$basic_information[0]->work_industries);
			}
			
		}
		$work_industry = array_unique(array_merge($works_ind,$expwork), SORT_REGULAR);
		
		
		$skills_html ='';
		$skills = Skill::where('user_id',1)->where('template_id',$template[0]->id)->get();
		$skill_ind = array();
		$skill_industry = skill_list::get();
		foreach($skill_industry as $skind){
			$skill_ind[] = $skind->type;
		}
		$expskill = array();
		if(isset($skills[0])){
			if($skills[0]->type){
				$expskill = explode(', ',$skills[0]->type);
			}
			
		}
		$skills_merge = array_unique(array_merge($skill_ind,$expskill), SORT_REGULAR);
		if(isset($skills[0])){
			$skills_html = view('resume-builder/sections/skill-section',array('skills_user'=>$skills, 'attr_template_id'=>$template[0]->id,'skills_merge'=>$skills_merge))->render();
		}
	
		$skills_all = Skill_list::get();
		
		$course_html = '';
		$course = Course::where('user_id',1)->where('template_id',$template[0]->id)->get();
		if(isset($course[0])){
			$course_html = view('resume-builder/custom_skill_section/courses_section',array('course'=>$course, 'attr_template_id'=>$template[0]->id))->render();
		}
		
		$custom_section = Custom_section::where('user_id',1)->where('template_id',$template[0]->id)->orderBy('id', 'ASC')->get();	
		
		$custom_section_html = '';
		if(isset($custom_section[0])){
			if(isset($custom_section[0])){
				foreach($custom_section as $k=>$custom_sub){
					$custom_sub_section = Custom_sub_section::where('custom_section_id',$custom_sub->id)->get();
					if(isset($custom_sub_section[0])){
						$custom_section[$k]->custom_sub_section =  $custom_sub_section;
					}
					else{
						$custom_section[$k]->custom_sub_section = array();
					}
					
				}
			}
			$custom_section_html = view('resume-builder/custom_skill_section/custom_section',array('custom_section'=>$custom_section, 'attr_template_id'=>$template[0]->id))->render();
		}

		
		$achievement_html = '';
		$achievement = Achievement::where('user_id',1)->where('template_id',$template[0]->id)->get();
		if(isset($achievement[0])){
			$achievement_html = view('resume-builder/sections/achievement-section',array('achievement'=>$achievement))->render();
		}
		
		$curricular_activities_section_html = '';
		$curricular_activities_section = Extra_cirricular_activity::where('user_id',1)->where('template_id',$template[0]->id)->get();
		if(isset($curricular_activities_section[0])){		
			$curricular_activities_section_html = view('resume-builder/custom_skill_section/extra_curricular_section',array('curricular_activities_section'=>$curricular_activities_section, 'attr_template_id'=>$template[0]->id))->render();
		}

		$internship_section = Internship::where('user_id',1)->where('template_id',$template[0]->id)->get();	
		$internships_section_html= '';
		if(!empty($internship_section[0])){
			$internships_section_html = view('resume-builder/custom_skill_section/internships_section',array('internship_section'=>$internship_section, 'attr_template_id'=>$template[0]->id))->render();
		}
		
		$hobby_section = Hobby::where('user_id',1)->where('template_id',$template[0]->id)->get();
		$hobby_section_html = '';
		if(!empty($hobby_section[0])){
			$hobby_section_html = view('resume-builder/custom_skill_section/hobbies_section',array('hobbies_section'=>$hobby_section, 'attr_template_id'=>$template[0]->id))->render();
		}
		$languages_section_html = '';
		$languages_section = Custom_language::where('user_id',1)->where('template_id',$template[0]->id)->get();	
		if(!empty($languages_section[0])){
			$languages_section_html = view('resume-builder/custom_skill_section/languages_section',array('languages_section'=>$languages_section, 'attr_template_id'=>$template[0]->id))->render();
		}
		
		
		
		$resume_lang = array();
		$resume_languages = Resume_language::all();;
		foreach($resume_languages as $reslang){
			$resume_lang[] = $reslang->name;
		}
		$explang = array();
		if(isset($basic_information[0])){
			if($basic_information[0]->languages){
				$explang = explode(', ',$basic_information[0]->languages);
			}
			
		}
		$resume_languages = array_unique(array_merge($resume_lang,$explang), SORT_REGULAR);	
		$template_html = $this->resumeData($template[0]->id,1);
		
		$data = [];
		if(isset($template[0])){
			$data = ['template'=>$template,
					 'current_salary'=>$current_salary,
					 'expected_salary'=>$expected_salary,
					 'basic_information'=>$basic_information,
					 'experience_html'=>$experience_html,
					 'education_html'=>$education_html,
					 'work_industry'=>$work_industry,
					 'achievement_html'=>$achievement_html,
					 'skills'=>$skills,
					 'skills_all'=>$skills_all,
					 'skills_html'=>$skills_html,
					 'course_html'=>$course_html,
					 'custom_section_html'=>$custom_section_html,
					 'curricular_activities_section_html'=>$curricular_activities_section_html,
					 'internships_section_html'=>$internships_section_html,
					 'hobby_section_html'=>$hobby_section_html,
					 'languages_section_html'=>$languages_section_html,
					
					 'resume_languages'=>$resume_languages,
					 'template_html'=>$template_html
					];
			return appView('resume-builder.enterDetails', compact('data'));	
		}
		else{
			return redirect()->route('resume.home'); 
		}
		die;
	}

	
	 public function nextCheck(Request $request)
	{
		$id = $request->id;
		$basic_information = Basic_information::where('id',$id)->get();
		
		if(isset($basic_information[0])){
			if(!empty($basic_information[0]->resume_name) && !empty($basic_information[0]->first_name) && !empty($basic_information[0]->last_name) && !empty($basic_information[0]->job_title) && !empty($basic_information[0]->email) && !empty($basic_information[0]->phone) && !empty($basic_information[0]->current_salary) && !empty($basic_information[0]->expected_salary) && !empty($basic_information[0]->experience) && !empty($basic_information[0]->age) && !empty($basic_information[0]->languages) && !empty($basic_information[0]->work_industries) && !empty($basic_information[0]->description)){
				
				$result =  array(
					'result' => 'success',
					'message'=> 'success',
					''
				);
				return json_encode($result);
				die;
			}
			else{
				$result =  array(
					'result' => 'failed',
					'message'=> 'Please Complete basic information form to proceed'
				);
				return json_encode($result);
				die;
				
			}
		}
	}
	

	/**

	 * resumeImageInformation

	 */
	 
	 public function resumeImageInformation(Request $request)
	{
		
		$user_id = 1;
		$template_id = $request['template_id'];
		if(empty($request['basic_form_id'])){
			$basic_information = new Basic_information();
			if ($request->hasFile('file')) {
				$image = $request->file('file');
				$name = time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/images/profile_image/');
				$image->move($destinationPath, $name);
				$basic_information->image = $name;
			 }
			 $basic_information->user_id = $user_id;
			 $basic_information->template_id = $template_id;
			$basic_information->save();
			$insertedId = $basic_information->id;
			if($insertedId != ""){
				$inserted_id=$insertedId;
				$formhtml = $this->resumeData($template_id, $user_id);
				
				$result =  array(
					'result' => 'success',
					'message'=> 'Image has been saved successfully.',
					'inserted_id'=>$inserted_id,
					'formhtml'=> $formhtml
				);
				return json_encode($result);
				die;
			}else{
				$result =  array(
					'result' => 'success',
					'message'=> 'Something went wrong wrong'
				);
				return json_encode($result);
				die;
			}
		}
		else{
			$basic_form_id = $request['basic_form_id'];
			$img_check = Basic_information::where('id',$basic_form_id)->get();
			if ($request->hasFile('file')) {
			
				if(!empty($img_check[0]->image)){
					if(file_exists(public_path('/images/profile_image/').'/'.$img_check[0]->image)){
					  unlink(public_path('/images/profile_image/').'/'.$img_check[0]->image);
					}
				}
			}
			
			$basic_form_id = $request['basic_form_id'];	
			$image = $request->file('file');
			$name = time().'.'.$image->getClientOriginalExtension();
			$destinationPath = public_path('/images/profile_image/');
			$image->move($destinationPath, $name);
			Basic_information::where('id', '=', $basic_form_id)
							->update(['image'=>$name]);
			$formhtml = $this->resumeData($template_id, $user_id);
			 $result =  array(
				'inserted_id'=>$img_check[0]->id,
				'result' => 'success',
				'message'=> 'Image updated successfully.',
				'formhtml'=> $formhtml
			);
			return json_encode($result);
			die;
		}
	}
	
	

	/**

	 * Get Resume pages

	 */

	public function resumeBasicInformation(Request $request)
	{
		$rules = [
			//'file' =>'required|mimes:jpeg,bmp,png|size:12',
			'resume_name'    => ['required'],
			'first_name' => ['required'],
			'last_name' => ['required'],
			'job_title' => ['required'],
			'email' => ['required', 'email'],
			'phone' => ['required'],
			'current_salary' => ['required'],
			'expected_salary' => ['required'],
			'experience' => ['required'],
			'age' => ['required'],
			'languages' => ['required'],
			'work_industries' => ['required'],
			'description' => ['required'],
			//'file'=>'required|image|mimes:jpeg,png,jpg|max:10240',
		];
		$request->validate($rules);
		//die;
		$resume_name = $request['resume_name'];
		$first_name = $request['first_name'];
		$last_name = $request['last_name'];
		$job_title = $request['job_title'];
		$email = $request['email'];
		$phone = $request['phone'];
		$current_salary = $request['current_salary'];
		$expected_salary = $request['expected_salary'];
		$experience = $request['experience'];
		$age = $request['age'];
		//$languages = $request['languages'];
		$user_id = 1;
		$description = $request['description'];
		$template_id = $request['template_id'];
		$wkindustry = '';
		$array2 =array();
		if(!empty($request['work_industries'])){
			foreach ($request['work_industries'] as $row) {
				if ($row !== '')
				   $array2[] = $row;
			}
			$array = $array2;
				
			$wkindustry = implode(', ', $array);
		}
			
		
		$work_industries = $wkindustry;

		$languages = '';
		$array4 = array();
		if(!empty($request['languages'])){
			foreach ($request['languages'] as $row) {
				if ($row !== '')
				   $array4[] = $row;
			}
			$array = $array4;
				
			$wklanguage = implode(', ', $array);
		}
			
		
		$languages = $wklanguage;
		
		if(empty($request['basic_form_id'])){
			$basic_information = new Basic_information();
			$basic_information->user_id = $user_id;
			$basic_information->template_id = $template_id;
			$basic_information->resume_name = $resume_name;
			$basic_information->first_name = $first_name;
			$basic_information->last_name = $last_name;
			$basic_information->job_title = $job_title;
			$basic_information->email = $email;
			$basic_information->phone = $phone;
			$basic_information->current_salary = $current_salary;
			$basic_information->expected_salary = $expected_salary;
			$basic_information->experience = $experience;
			$basic_information->age = $age;
			$basic_information->languages = $languages;
			$basic_information->work_industries = $work_industries;
			$basic_information->description = $description;
			if ($request->hasFile('file')) {
				$image = $request->file('file');
				$name = time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/images/profile_image/');
				$image->move($destinationPath, $name);
				$basic_information->image = $name;
			 }
			$basic_information->save();
			
			
			$insertedId = $basic_information->id;
			if($insertedId != ""){
				
				
				$inserted_id=$insertedId;
				$result =  array(
					'result' => 'success',
					'message'=> 'Basic information has been saved successfully.',
					'inserted_id'=>$inserted_id
				);
				return json_encode($result);
				die;
			}else{
				$result =  array(
					'result' => 'success',
					'message'=> 'Something went wrong wrong'
				);
				return json_encode($result);
				die;
			}
		}
		else{
			// echo '<pre>';
			// print_r($request->all());
			// die;
			$basic_form_id = $request['basic_form_id'];
			Basic_information::where('id', '=', $basic_form_id)
								->update([
											'resume_name'=>$resume_name,
											'first_name'=>$first_name,
											'last_name'=>$last_name,
											'job_title'=>$job_title,
											'email'=>$email,
											'phone'=>$phone,
											'current_salary'=>$current_salary,
											'expected_salary'=>$expected_salary,
											'experience'=>$experience,
											'age'=>$age,
											'languages'=>$languages,
											'work_industries'=>$work_industries,
											'description'=>$description,
										]);
				$img_check = Basic_information::where('id',$basic_form_id)->get();
				if ($request->hasFile('file')) {
				
				if(!empty($img_check[0]->image)){
					if(file_exists(public_path('/images/profile_image/').'/'.$img_check[0]->image)){
					  unlink(public_path('/images/profile_image/').'/'.$img_check[0]->image);
					}
				}
				
				$image = $request->file('file');
				$name = time().'.'.$image->getClientOriginalExtension();
				$destinationPath = public_path('/images/profile_image/');
				$image->move($destinationPath, $name);
				Basic_information::where('id', '=', $basic_form_id)
								->update(['image'=>$name]);
				
			 }
			 $result =  array(
				'inserted_id'=>$basic_form_id,
				'result' => 'success',
				'message'=> 'Basic information updated successfully.'
				
			);
			return json_encode($result);
			die;
		}
	}

	public function experienceHistory(Request $request){
		$rules = [
			'position_head'    => ['required'],
			'company' => ['required'],
			'start_date' => ['required'],
			'end_date' => ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$position_head = $request->position_head;
		$company = $request->company;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$duties1 = $request->duties1;
		$duties2 = $request->duties2;
		$duties3 = $request->duties3;
		$duties4 = $request->duties4;
	
		$experience_history = new Experience_history();
		$experience_history->user_id = $user_id;
		$experience_history->template_id = $template_id;
		$experience_history->position_head = $position_head;
		$experience_history->company = $company;
		$experience_history->start_date = $start_date;
		$experience_history->end_date = $end_date;
		$experience_history->duty1 = $duties1;
		$experience_history->duty2 = $duties2;
		$experience_history->duty3 = $duties3;
		$experience_history->duty4 = $duties4;
		$experience_history->save();	
		$insertedId = $experience_history->id;
		if($insertedId != ""){
			$experience_history = Experience_history::where('user_id',$user_id)->where('template_id',$template_id)->get();
			$experience_html = view('resume-builder/sections/experience-section',array('experience_history'=>$experience_history))->render();	
			$formhtml = $this->resumeData($template_id, $user_id);
			$result =  array(
				'result' => 'success',
				'message'=> 'Experience history has been saved successfully.',
				'experience_html'=>$experience_html,
				'formhtml'=> $formhtml
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
	
	
	public function experienceHistoryDelete(Request $request){
		$experince_id = $request->experince_id;
		$experince_info = Experience_history::where('id', '=', $experince_id)->get();
		if(isset($experince_info[0])){
			Experience_history::where('id', $experince_id )->where('user_id', 1 )->delete();	
			$experience_history = Experience_history::where('template_id',$experince_info[0]->template_id)->where('user_id', $experince_info[0]->user_id )->get();
			$experience_html = view('resume-builder/sections/experience-section',array('experience_history'=>$experience_history))->render();	
			$formhtml = $this->resumeData($experince_info[0]->template_id, $experince_info[0]->user_id);			
			$result =  array(
						'result' => 'success',
						'message'=> 'Experience deleted successfully.',
						'experience_html'=>$experience_html,
						'formhtml'=> $formhtml
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
	
	public function experienceHistoryEdit(Request $request){
		$rules = [
			'position_head'    => ['required'],
			'company' => ['required'],
			'start_date' => ['required'],
			'end_date' => ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$experience_id = $request->experience_id;
		$position_head = $request->position_head;
		$company = $request->company;
		$template_id = $request->template_id;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$duties1 = $request->duties1;
		$duties2 = $request->duties2;
		$duties3 = $request->duties3;
		$duties4 = $request->duties4;
		
		
		Experience_history::where('id', '=', $experience_id)
								->update([
											'position_head'=>$position_head,
											'company'=>$company,
											'start_date'=>$start_date,
											'end_date'=>$end_date,
											'duty1'=>$duties1,
											'duty2'=>$duties2,
											'duty3'=>$duties3,
											'duty4'=>$duties4,
										]);
		
			$experience_history = Experience_history::where('user_id',$user_id)->where('template_id',$template_id)->get();
			$experience_html = view('resume-builder/sections/experience-section',array('experience_history'=>$experience_history))->render();	
		
			$result =  array(
				'result' => 'success',
				'message'=> 'Experience history has been saved successfully.',
				'experience_html'=>$experience_html
			);
			return json_encode($result);
			die;
		
	}
	
	public function educationHistoryDelete(Request $request){
		$education_id = $request->education_id;
		$education_info = Education_history::where('id', '=', $education_id)->get();
		if(isset($education_info[0])){
			Education_history::where('id', $education_id )->delete();	
			$education_history = Education_history::where('template_id',$education_info[0]->template_id)->where('user_id', 1 )->get();
			$education_html = view('resume-builder/sections/education-section',array('education_history'=>$education_history))->render();	
			$formhtml = $this->resumeData($education_info[0]->template_id, $education_info[0]->user_id);					
			$result =  array(
						'result' => 'success',
						'message'=> 'Education deleted successfully.',
						'education_html'=>$education_html,
						'formhtml'=>$formhtml
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
		
	public function educationHistoryUpdate(Request $request){
		$rules = [
			'achievement'    => ['required'],
			'school_university_institute' => ['required'],
			'date' => ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$education_id = $request->education_id;
		$template_id = $request->template_id;
		$achievement = $request->achievement;
		$school= $request->school_university_institute;
		$date = $request->date;
		$subject1 = $request->subject1;
		$subject2 = $request->subject2;
		$subject3 = $request->subject3;
		
		Education_history::where('id', '=', $education_id)
								->update([
											'achievement'=>$achievement,
											'school'=>$school,
											'date'=>$date,
											'subject1'=>$subject1,
											'subject2'=>$subject2,
											'subject3'=>$subject3,
											
										]);
		$education_history = Education_history::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$education_html = view('resume-builder/sections/education-section',array('education_history'=>$education_history))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Education history has been updated successfully.',
				'education_html'=>$education_html
			);
			return json_encode($result);
			die;
	}

	public function educationHistory(Request $request){
		$rules = [
			'achievement'    => ['required'],
			'school_university_institute' => ['required'],
			'date' => ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$achievement = $request->achievement;
		$school= $request->school_university_institute;
		$date = $request->date;
		$subject1 = $request->subject1;
		$subject2 = $request->subject2;
		$subject3 = $request->subject3;
		
		$education_history = new Education_history();
		$education_history->user_id = $user_id;
		$education_history->template_id = $template_id;
		$education_history->achievement = $achievement;
		$education_history->school = $school;
		$education_history->date = $date;
		$education_history->subject1 = $subject1;
		$education_history->subject2 = $subject2;
		$education_history->subject3 = $subject3;
		$education_history->save();	
		$insertedId = $education_history->id;
		if($insertedId != ""){
			$education_history = Education_history::where('user_id',$user_id)->where('template_id',$template_id)->get();
			$education_html = view('resume-builder/sections/education-section',array('education_history'=>$education_history))->render();
			$formhtml = $this->resumeData($education_history[0]->template_id, $education_history[0]->user_id);			
			$result =  array(
				'result' => 'success',
				'message'=> 'Education history has been saved successfully.',
				'education_html'=>$education_html,
				'formhtml'=>$formhtml
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong.'
			);
			return json_encode($result);
			die;
		}
	}
	


	public function resumeBuilderEdit($slug = null)
		{
			$template = Template::where('slug',$slug)->get();
			$data = [];
			if(isset($template[0])){
				$template_html = $this->resumeData($template[0]->id,1);
				$data = ['template'=>$template, 'template_html'=>$template_html];
				return appView('resume-builder.resumeEdit', compact('data'));	
			}
			else{
				return redirect()->route('resume.home'); 
			}
			die;	
		}

	
	
	
	public function achievementSave(Request $request){
		// $rules = [
			// 'achievement1'    => ['required'],
			// 'achievement2' => ['required'],
			// 'achievement3' => ['required'],
		// ];
		// $request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$achievement1 = $request->achievement1;
		$achievement2 = $request->achievement2;
		$date = $request->date;
		
		
		$achievement = new Achievement();
		$achievement->user_id = $user_id;
		$achievement->template_id = $template_id;
		$achievement->achievement1 = $achievement1;
		$achievement->achievement2 = $achievement2;
		$achievement->date = $date;
		
		$achievement->save();	
		$insertedId = $achievement->id;
		if($insertedId != ""){
				
			$achievement = Achievement::where('user_id',$user_id)->where('template_id',$template_id)->get();
			$achievement_html = view('resume-builder/sections/achievement-section',array('achievement'=>$achievement))->render();

		
			$result =  array(
				'result' => 'success',
				'message'=> 'Achievement has been saved successfully.',
				'achievement_html'=>$achievement_html
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
	public function achievementDelete(Request $request){
		$achievement_id = $request->achievement_id;
		$achievement_info = Achievement::where('id', '=', $achievement_id)->get();
		if(isset($achievement_info[0])){
			$user_id = 1;
			Achievement::where('id', $achievement_id )->where('user_id', $user_id )->delete();	
			$achievement = Achievement::where('user_id',$user_id)->where('template_id',$achievement_info[0]->template_id)->get();
			$achievement_html = view('resume-builder/sections/achievement-section',array('achievement'=>$achievement))->render();				
			$result =  array(
						'result' => 'success',
						'message'=> 'Experience deleted successfully.',
						'achievement_html'=>$achievement_html
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
	
	public function achievementUpdate(Request $request){
		
		// $rules = [
			// 'achievement1'    => ['required'],
			// 'achievement2' => ['required'],
			// 'achievement3' => ['required'],
		// ];
		// $request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$achievement1 = $request->achievement1;
		$achievement2 = $request->achievement2;
		$date = $request->date;
		$achievement_id = $request->achievement_id;
		
		Achievement::where('id', '=', $achievement_id)->update([
												'achievement1' => $achievement1,
												'achievement2' => $achievement2,
												'date' => $date,
											]);
											
		
		
		$achievement = Achievement::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$achievement_html = view('resume-builder/sections/achievement-section',array('achievement'=>$achievement))->render();

	
		$result =  array(
			'result' => 'success',
			'message'=> 'Achievement has been updated successfully.',
			'achievement_html'=>$achievement_html
		);
		return json_encode($result);
		die;
		
	}
	
	/* 31/7/21 */
	
	public function skillSave(Request $request){
		
		$rules = [
			//'skill[]'=> ['required'],
		];
		
		$request->validate($rules);
		$user_id = 1;
		$skillinput = $request->skill;
		$template_id = $request->template_id;
		$skillrequest = '';
		$array2 = array();
		if(!empty($request->skill)){
			foreach ($request->skill as $row) {
				if ($row !== '')
				   $array2[] = $row;
			}
			$array = $array2;
				
			$skillrequest = implode(', ', $array);
		}

		$skill = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$skill_get = array();
		if(!isset($skill[0])){
			$skill_tbl = new Skill();
			$skill_tbl->user_id = $user_id;
			$skill_tbl->type = $skillrequest;
			$skill_tbl->template_id = $template_id;
			$skill_tbl->save();		
			$insertedId = $skill_tbl->id;
		}
		else{
			$skills_exp = array();
			if(isset($skill[0]->type)){
				$skills_exp = explode(', ',$skill[0]->type);	
			}
			$skill_merge = array_unique(array_merge($request->skill,$skills_exp), SORT_REGULAR);
			
			Skill::where('id', '=', $skill[0]->id)
						->update([
							'type'=>implode(', ',$skill_merge),
							
						]);
	
		}
		
		$skills_user = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$skill_ind = array();
		$skill_industry = skill_list::get();
		foreach($skill_industry as $skind){
			$skill_ind[] = $skind->type;
		}
		$expskill = array();
		if(isset($skills_user[0])){
			if($skills_user[0]->type){
				$expskill = explode(', ',$skills_user[0]->type);
			}
			
		}
		$skills_merge = array_unique(array_merge($skill_ind,$expskill), SORT_REGULAR);
		$skills_html = view('resume-builder/sections/skill-section',array('skills_user'=>$skills_user, 'attr_template_id'=>$template_id,'skills_merge'=>$skills_merge))->render();
		$skills_all = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$skill_new_option = '';
		
		
		
		$template_html = $this->resumeData($request->template_id,$user_id);
			
		$result =  array(
			'result' => 'success',
			'message'=> 'Skill has been saved successfully.',
			'skills_html'=>$skills_html,
			'skill_new_option'=>$skill_new_option,
			'template_html'=>$template_html
		);
		return json_encode($result);
		die;
		
	}
	
	
	public function skillUpdate(Request $request){
		
		$rules = [
			//'skill[]'=> ['required'],
		];
		
		$request->validate($rules);
		$user_id = 1;
		$skillinput = $request->skill;
		$template_id = $request->template_id;
		$skillrequest = '';
		$array2 = array();
		if(!empty($request->skill)){
			foreach ($request->skill as $row) {
				if ($row !== '')
				   $array2[] = $row;
			}
			$array = $array2;
				
			$skillrequest = implode(', ', $array);
		}

		$skill = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$skill_get = array();
		
		$skills_exp = array();
		if(isset($skill[0]->type)){
			$skills_exp = explode(', ',$skill[0]->type);	
		}
		$skill_merge = array_unique(array_merge($request->skill,$skills_exp), SORT_REGULAR);
		
		Skill::where('id', '=', $skill[0]->id)
					->update([
						'type'=>$skillrequest,
						
					]);

		$skills_user = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$skill_ind = array();
		$skill_industry = skill_list::get();
		foreach($skill_industry as $skind){
			$skill_ind[] = $skind->type;
		}
		$expskill = array();
		if(isset($skills_user[0])){
			if($skills_user[0]->type){
				$expskill = explode(', ',$skills_user[0]->type);
			}
			
		}
		$skills_merge = array_unique(array_merge($skill_ind,$expskill), SORT_REGULAR);
		$skills_html = view('resume-builder/sections/skill-section',array('skills_user'=>$skills_user, 'attr_template_id'=>$template_id,'skills_merge'=>$skills_merge))->render();
		$skills_all = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$skill_new_option = '';
		
		$result =  array(
			'result' => 'success',
			'message'=> 'Skill has been updated successfully.',
			'skills_html'=>$skills_html,
			'skill_new_option'=>$skill_new_option
		);
		return json_encode($result);
		die;
	}
	
	
	public function customSkills(Request $request){
		
		if(isset($request->attr)){
			$view = 'resume-builder/custom_skill_section/'.$request->attr;
			return view($view,array('attr_template_id'=>$request->attr_template_id))->render();
		}
	}
	
	public function customCourseSave(Request $request){
		$rules = [
			'courses'=> ['required'],
			'institution'=> ['required'],
			'start_date'=> ['required'],
			'end_date'=> ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		
		$template_id = $request->template_id;
		$courses = $request->courses;
		$institution = $request->institution;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		
		$course_tbl = new Course();
		$course_tbl->user_id = $user_id;
		$course_tbl->template_id = $template_id;
		$course_tbl->course_name = $courses;
		$course_tbl->institution = $institution;
		$course_tbl->start_date = $start_date;
		$course_tbl->end_date = $end_date;
		$course_tbl->save();
		
		if($course_tbl != ""){
			$course = Course::where('user_id',1)->where('template_id',$template_id)->get();	
			$course_html = view('resume-builder/custom_skill_section/courses_section',array('course'=>$course, 'attr_template_id'=>$template_id))->render();
		
			$result =  array(
				'result' => 'success',
				'message'=> 'Course has been saved successfully.',
				'course_html'=>$course_html
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
	
	public function customCourseUpdate(Request $request){
		$rules = [
			'courses'=> ['required'],
			'institution'=> ['required'],
			'start_date'=> ['required'],
			'end_date'=> ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$courses = $request->courses;
		$institution = $request->institution;
		$start_date = $request->start_date;
		$end_date= $request->end_date;
		$course_id= $request->course_id;
		$template_id = $request->template_id;
		Course::where('id', '=', $course_id)
								->update([
											'course_name'=>$courses,
											'institution'=>$institution,
											'start_date'=>$start_date,
											'end_date'=>$end_date,
										]);
		$course = Course::where('user_id',$user_id)->where('template_id',$template_id)->get();
		$course_html = view('resume-builder/custom_skill_section/courses_section',array('course'=>$course, 'attr_template_id'=>$template_id))->render();
		$result =  array(
			'result' => 'success',
			'message'=> 'Course has been saved successfully.',
			'course_html'=>$course_html
		);
			return json_encode($result);
			die;
	}
	
	public function customCourseDelete(Request $request){
		$course_id = $request->course_id;
		$course_info = Course::where('id', '=', $course_id)->get();
		if(isset($course_info[0])){
			Course::where('id', $course_id )->delete();	
			$course = Course::where('user_id',$course_info[0]->user_id)->where('template_id',$course_info[0]->template_id)->get();
			$course_html = view('resume-builder/custom_skill_section/courses_section',array('course'=>$course, 'attr_template_id'=>$course_info[0]->template_id))->render();	
			if(isset($course[0])){
				$template_exist = 'Yes';
			}
			else{
				$template_exist = 'No';
			}
			$result =  array(
						'result' => 'success',
						'message'=> 'Course deleted successfully.',
						'course_html'=>$course_html,
						'template_exist'=>$template_exist
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
	
	public function customSectionSave(Request $request){
	
		$rules = [
			'title'=> ['required'],
			'city'=> ['required'],
			'start_date'=> ['required'],
			'end_date'=> ['required'],
			'description'=> ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$section_id = $request->section_id;
		$title = $request->title;
		$city = $request->city;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$description = $request->description;
		
		$custom_sub_tbl = new Custom_sub_section();
		$custom_sub_tbl->custom_section_id = $section_id;
		$custom_sub_tbl->title = $title;
		$custom_sub_tbl->city = $city;
		$custom_sub_tbl->start_date = $start_date;
		$custom_sub_tbl->end_date = $end_date;
		$custom_sub_tbl->description = $description;
		$custom_sub_tbl->save();
		$insertedId = $custom_sub_tbl->id;
		
		if($insertedId != ""){
			Custom_section::where('id', '=', $section_id)
									->update([
												'sub_section_id'=>$insertedId,
											]);
			$custom_section = Custom_section::where('user_id',1)->where('template_id',$template_id)->orderBy('id', 'ASC')->get();	
			if(isset($custom_section[0])){
				foreach($custom_section as $k=>$custom_sub){
					$custom_sub_section = Custom_sub_section::where('custom_section_id',$custom_sub->id)->get();
					if(isset($custom_sub_section[0])){
						$custom_section[$k]->custom_sub_section =  $custom_sub_section;
					}
					else{
						$custom_section[$k]->custom_sub_section = array();
					}
				}
			}
			$custom_section_html = view('resume-builder/custom_skill_section/custom_section',array('custom_section'=>$custom_section, 'attr_template_id'=>$template_id))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Custom section has been saved successfully.',
				'custom_section_html'=>$custom_section_html
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
	
	
	
	public function customSectionUpdate(Request $request){
		$rules = [
			'title'=> ['required'],
			'city'=> ['required'],
			'start_date'=> ['required'],
			'end_date'=> ['required'],
			'description'=> ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$title = $request->title;
		$city = $request->city;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$description = $request->description;
		Custom_section::where('id', '=', $request->custom_id)
								->update([
											'title'=>$title,
											'city'=>$city,
											'start_date'=>$start_date,
											'end_date'=>$end_date,
											'description'=>$description
										]);
		$custom_section = Custom_section::where('user_id',1)->where('template_id',$template_id)->orderBy('id', 'ASC')->get();	
			$custom_section_html = view('resume-builder/custom_skill_section/custom_section',array('custom_section'=>$custom_section, 'attr_template_id'=>$template_id))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Custom section has been saved successfully.',
				'custom_section_html'=>$custom_section_html
			);
			return json_encode($result);
			die;
	}
	
	
	public function customSectionDelete(Request $request){
		$custom_id = $request->custom_id;
		$custom_info = Custom_section::where('id', '=', $custom_id)->get();
		if(isset($custom_info[0])){
			Custom_section::where('id', $custom_id )->delete();	
			Custom_sub_section::where('custom_section_id', $custom_id )->delete();
			$custom_section = Custom_section::where('user_id',1)->where('template_id',$custom_info[0]->template_id)->orderBy('id', 'ASC')->get();	
			if(isset($custom_section[0])){
				foreach($custom_section as $k=>$custom_sub){
					$custom_sub_section = Custom_sub_section::where('custom_section_id',$custom_sub->id)->get();
					if(isset($custom_sub_section[0])){
						$custom_section[$k]->custom_sub_section =  $custom_sub_section;
					}
					else{
						$custom_section[$k]->custom_sub_section = array();
					}
					
				}
			}
			$custom_section_html = view('resume-builder/custom_skill_section/custom_section',array('custom_section'=>$custom_section, 'attr_template_id'=>$custom_info[0]->template_id))->render();
			if(isset($custom_info[0])){
				$template_exist = 'Yes';
			}
			else{
				$template_exist = 'No';
			}
			$result =  array(
						'result' => 'success',
						'message'=> 'Custom Section deleted successfully.',
						'custom_section_html'=>$custom_section_html,
						'template_exist'=>$template_exist
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
	
	public function customSubSectionDelete(Request $request){
		$custom_id = $request->custom_id;
		$custom_info = Custom_sub_section::where('id', '=', $custom_id)->get();
		if(isset($custom_info[0])){
			Custom_sub_section::where('id', $custom_id )->delete();	
			$custom_section = Custom_section::where('id',$custom_info[0]->custom_section_id)->orderBy('id', 'ASC')->get();
			if(isset($custom_section[0])){
				$custom_section = Custom_section::where('user_id',1)->where('template_id',$custom_section[0]->template_id)->get();	
				foreach($custom_section as $k=>$custom_sub){
					$custom_sub_section = Custom_sub_section::where('custom_section_id',$custom_sub->id)->get();
					if(isset($custom_sub_section[0])){
						$custom_section[$k]->custom_sub_section =  $custom_sub_section;
					}
					else{
						$custom_section[$k]->custom_sub_section = array();
					}
					
				}
			}
			$custom_section_html = view('resume-builder/custom_skill_section/custom_section',array('custom_section'=>$custom_section, 'attr_template_id'=>$custom_info[0]->template_id))->render();
			if(isset($custom_info[0])){
				$template_exist = 'Yes';
			}
			else{
				$template_exist = 'No';
			}
			$result =  array(
						'result' => 'success',
						'message'=> 'Custom Section deleted successfully.',
						'custom_section_html'=>$custom_section_html,
						'template_exist'=>$template_exist
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
	
	
	public function cirrcularActivitySave(Request $request)
		{
			$rules = [
				'title'=> ['required'],
				'employer'=> ['required'],
				'city'=> ['required'],
				'start_date'=> ['required'],
				'end_date'=> ['required'],
				'description'=> ['required'],
			];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$title = $request->title;
		$employer = $request->employer;
		$city = $request->city;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$description = $request->description;
		
		$activity_tbl = new Extra_cirricular_activity();
		$activity_tbl->user_id = $user_id;
		$activity_tbl->template_id = $template_id;
		$activity_tbl->title = $title;
		$activity_tbl->employer = $employer;
		$activity_tbl->city = $city;
		$activity_tbl->start_date = $start_date;
		$activity_tbl->end_date = $end_date;
		$activity_tbl->description = $description;
		$activity_tbl->save();
		
		if($activity_tbl != ""){
			$curricular_activities_section = Extra_cirricular_activity::where('user_id',1)->where('template_id',$template_id)->get();	
			$curricular_activities_section_html = view('resume-builder/custom_skill_section/extra_curricular_section',array('curricular_activities_section'=>$curricular_activities_section, 'attr_template_id'=>$template_id))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Extra-curricular Activities has been saved successfully.',
				'curricular_activities_section_html'=>$curricular_activities_section_html
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
	
		public function cirrcularActivityUpdate(Request $request)
		{
			$rules = [
				'title'=> ['required'],
				'employer'=> ['required'],
				'city'=> ['required'],
				'start_date'=> ['required'],
				'end_date'=> ['required'],
				'description'=> ['required'],
			];
			$request->validate($rules);
			$user_id = 1;
			$template_id = $request->template_id;
			$activity_id = $request->activity_id;
			$title = $request->title;
			$employer = $request->employer;
			$city = $request->city;
			$start_date = $request->start_date;
			$end_date = $request->end_date;
			$description = $request->description;
			Extra_cirricular_activity::where('id', '=', $activity_id)
									->update([
												'title'=>$title,
												'city'=>$city,
												'employer'=>$employer,
												'start_date'=>$start_date,
												'end_date'=>$end_date,
												'description'=>$description
											]);
			$curricular_activities_section = Extra_cirricular_activity::where('user_id',1)->where('template_id',$template_id)->get();	
			$curricular_activities_section_html = view('resume-builder/custom_skill_section/extra_curricular_section',array('curricular_activities_section'=>$curricular_activities_section, 'attr_template_id'=>$template_id))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Extra-curricular Activities has been saved successfully.',
				'curricular_activities_section_html'=>$curricular_activities_section_html
			);
			return json_encode($result);
			die;
		}
		
	public function cirrcularActivityDelete(Request $request){
		$activity_id = $request->activity_id;
		$activity_info = Extra_cirricular_activity::where('id', '=', $activity_id)->get();
		if(isset($activity_info[0])){
			Extra_cirricular_activity::where('id', $activity_id )->delete();	
			$curricular_activities_section = Extra_cirricular_activity::where('user_id',$activity_info[0]->user_id)->where('template_id',$activity_info[0]->template_id)->get();
			$curricular_activities_section_html = view('resume-builder/custom_skill_section/extra_curricular_section',array('curricular_activities_section'=>$curricular_activities_section, 'attr_template_id'=>$activity_info[0]->template_id))->render();
			if(isset($curricular_activities_section[0])){
				$template_exist = 'Yes';
			}
			else{
				$template_exist = 'No';
			}
			$result =  array(
						'result' => 'success',
						'message'=> 'Activity deleted successfully.',
						'curricular_activities_section_html'=>$curricular_activities_section_html,
						'template_exist'=>$template_exist
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
		
		
		
		
	public function internshipsSectionSave(Request $request)
		{
			$rules = [
				'title'=> ['required'],
				'employer'=> ['required'],
				'city'=> ['required'],
				'start_date'=> ['required'],
				'end_date'=> ['required'],
				'description'=> ['required'],
			];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$title = $request->title;
		$employer = $request->employer;
		$city = $request->city;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$description = $request->description;
		
		$activity_tbl = new Internship();
		$activity_tbl->user_id = $user_id;
		$activity_tbl->template_id = $template_id;
		$activity_tbl->title = $title;
		$activity_tbl->employer = $employer;
		$activity_tbl->city = $city;
		$activity_tbl->start_date = $start_date;
		$activity_tbl->end_date = $end_date;
		$activity_tbl->description = $description;
		$activity_tbl->save();
		
		if($activity_tbl != ""){
			$internship_section = Internship::where('user_id',1)->where('template_id',$template_id)->get();	
			$internships_section_html = view('resume-builder/custom_skill_section/internships_section',array('internship_section'=>$internship_section, 'attr_template_id'=>$template_id))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Internship has been saved successfully.',
				'internships_section_html'=>$internships_section_html
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
		public function internshipsSectionUpdate(Request $request)
		{
			
			$rules = [
				'title'=> ['required'],
				'employer'=> ['required'],
				'city'=> ['required'],
				'start_date'=> ['required'],
				'end_date'=> ['required'],
				'description'=> ['required'],
			];
			$request->validate($rules);
			$user_id = 1;
			$template_id = $request->template_id;
			$activity_id = $request->activity_id;
			$title = $request->title;
			$employer = $request->employer;
			$city = $request->city;
			$start_date = $request->start_date;
			$end_date = $request->end_date;
			$description = $request->description;
			Internship::where('id', '=', $activity_id)
									->update([
												'title'=>$title,
												'city'=>$city,
												'employer'=>$employer,
												'start_date'=>$start_date,
												'end_date'=>$end_date,
												'description'=>$description
											]);
			$internship_section = Internship::where('user_id',1)->where('template_id',$template_id)->get();	
			$internships_section_html = view('resume-builder/custom_skill_section/internships_section',array('internship_section'=>$internship_section, 'attr_template_id'=>$template_id))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Internship has been updates successfully.',
				'internships_section_html'=>$internships_section_html
			);
			return json_encode($result);
			die;
		}
		
		
	public function internshipsSectionDelete(Request $request){
		$internship_id = $request->internship_id;
		$internship_info = Internship::where('id', '=', $internship_id)->get();
		if(isset($internship_info[0])){
			Internship::where('id', $internship_id )->delete();	
			$internship_section = Internship::where('user_id',$internship_info[0]->user_id)->where('template_id',$internship_info[0]->template_id)->get();
			$internships_section_html = view('resume-builder/custom_skill_section/internships_section',array('internship_section'=>$internship_section, 'attr_template_id'=>$internship_info[0]->template_id))->render();	
			if(isset($internship_info[0])){
				$template_exist = 'Yes';
			}
			else{
				$template_exist = 'No';
			}
			$result =  array(
						'result' => 'success',
						'message'=> 'Internship deleted successfully.',
						'internships_section_html'=>$internships_section_html,
						'template_exist'=>$template_exist
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}

		
	public function hobbySectionSave(Request $request)
		{
			$rules = [
				'title'=>['required'],
				'description'=> ['required'],
			];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$title = $request->title;
		$description = $request->description;
		
		$hobby_tbl = new Hobby();
		$hobby_tbl->user_id = $user_id;
		$hobby_tbl->template_id = $template_id;
		$hobby_tbl->title = $title;
		$hobby_tbl->description = $description;
		$hobby_tbl->save();
		
		if($hobby_tbl != ""){
			$hobby_section = Hobby::where('user_id',1)->where('template_id',$template_id)->get();	
			$hobby_section_html = view('resume-builder/custom_skill_section/hobbies_section',array('hobbies_section'=>$hobby_section, 'attr_template_id'=>$template_id))->render();
			$formhtml = $this->resumeData($template_id, $user_id);		
			$result =  array(
				'result' => 'success',
				'message'=> 'Hobby has been saved successfully.',
				'hobby_section_html'=>$hobby_section_html,
				'formhtml'=>$formhtml
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
	
	
	public function hobbySectionUpdate(Request $request)
		{
			$rules = [
				'title'=> ['required'],
				'description'=> ['required'],
			];
			$request->validate($rules);
			$user_id = 1;
			$template_id = $request->template_id;
			$hobby_id = $request->language_id;
			$title = $request->title;
			$description = $request->description;
		
			Hobby::where('id', '=', $hobby_id)
									->update([
												'title'=>$title,
												'description'=>$description
											]);
			$hobby_section = Hobby::where('user_id',1)->where('template_id',$template_id)->get();	
			$hobby_section_html = view('resume-builder/custom_skill_section/hobbies_section',array('hobbies_section'=>$hobby_section, 'attr_template_id'=>$template_id))->render();
			
			$result =  array(
				'result' => 'success',
				'message'=> 'Hobby has been updated successfully.',
				'hobby_section_html'=>$hobby_section_html
			);
			return json_encode($result);
			die;
		}
	
	public function hobbySectionDelete(Request $request){
		$hobby_id = $request->hobby_id;
		$hobby_info = Hobby::where('id', '=', $hobby_id)->get();
		if(isset($hobby_info[0])){
			Hobby::where('id', $hobby_id )->delete();	
			$hobby_section = Hobby::where('user_id',$hobby_info[0]->user_id)->where('template_id',$hobby_info[0]->template_id)->get();
			$hobby_section_html = view('resume-builder/custom_skill_section/hobbies_section',array('hobbies_section'=>$hobby_section, 'attr_template_id'=>$hobby_info[0]->template_id))->render();	
			if(isset($course[0])){
				$template_exist = 'Yes';
			}
			else{
				$template_exist = 'No';
			}
			$formhtml = $this->resumeData($hobby_info[0]->template_id, $hobby_info[0]->user_id);			
			
			$result =  array(
						'result' => 'success',
						'message'=> 'Hobby deleted successfully.',
						'hobby_section_html'=>$hobby_section_html,
						'template_exist'=>$template_exist,
						'formhtml'=> $formhtml
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}

	
			
	public function languageSectionUpdate(Request $request)
		{
			$rules = [
				'language'=>['required'],
				'level'=> ['required'],
			];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$language = $request->language;
		$level = $request->level;
		
		$hobby_tbl = new Custom_language();
		$hobby_tbl->user_id = $user_id;
		$hobby_tbl->template_id = $template_id;
		$hobby_tbl->language = $language;
		$hobby_tbl->level = $level;
		$hobby_tbl->save();
		
		if($hobby_tbl != ""){
			$languages_section = Custom_language::where('user_id',1)->where('template_id',$template_id)->get();	
			$languages_section_html = view('resume-builder/custom_skill_section/languages_section',array('languages_section'=>$languages_section, 'attr_template_id'=>$template_id))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'Language has been saved successfully.',
				'languages_section_html'=>$languages_section_html
			);
			return json_encode($result);
			die;
		}else{
			$result =  array(
				'result' => 'failed',
				'message'=> 'Something went wrong wrong'
			);
			return json_encode($result);
			die;
		}
	}
	
	public function languagesSectionUpdate(Request $request)
	{
		$rules = [
			'language'=>['required'],
			'level'=> ['required'],
		];
		$request->validate($rules);
		$user_id = 1;
		$template_id = $request->template_id;
		$language_id = $request->language_id;
		
		$language = $request->language;
		$level = $request->level;
		
	
		Custom_language::where('id', '=', $language_id)
								->update([
											'language'=>$language,
											'level'=>$level
										]);
		$languages_section = Custom_language::where('user_id',1)->where('template_id',$template_id)->get();	
		$languages_section_html = view('resume-builder/custom_skill_section/languages_section',array('languages_section'=>$languages_section, 'attr_template_id'=>$template_id))->render();
		$result =  array(
			'result' => 'success',
			'message'=> 'Language has been updated successfully.',
			'languages_section_html'=>$languages_section_html
		);
		return json_encode($result);
		die;
		
	}
	
	
	public function languagesSectionDelete(Request $request){
		$language_id = $request->language_id;
		$language_info = Custom_language::where('id', '=', $language_id)->get();
		if(isset($language_info[0])){
			Custom_language::where('id', $language_id )->delete();	
			$languages_section = Custom_language::where('user_id',1)->where('template_id',$language_info[0]->template_id)->get();	
			$languages_section_html = view('resume-builder/custom_skill_section/languages_section',array('languages_section'=>$language_info[0]->languages_section, 'attr_template_id'=>$language_info[0]->template_id))->render();
			if(isset($language_info[0])){
				$template_exist = 'Yes';
			}
			else{
				$template_exist = 'No';
			}
			$result =  array(
						'result' => 'success',
						'message'=> 'Language deleted successfully.',
						'languages_section_html'=>$languages_section_html,
						'template_exist'=>$template_exist
					);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}


	
	
	/**


	 * Email Template

	 *

	 * @param 

	 */


	
		
	public function resumeBuilderEmail()
		{
			$data = [];
			return appView('resume-builder.resumeEmail', compact('data'));	
		}




	public function customSection(Request $request){
		if(isset($request->attr)){
			$user_id = 1;
			$template_id = $request->attr_template_id;
			$custom_tbl = new Custom_section();
			$custom_tbl->user_id = $user_id;
			$custom_tbl->template_id = $template_id;
			$custom_tbl->title = '';
			$custom_tbl->save();
			$insertedId = $custom_tbl->id;
			if($insertedId != ""){
				$custom_section = Custom_section::where('user_id',1)->where('template_id',$template_id)->orderBy('id', 'ASC')->get();	
				if(isset($custom_section[0])){
					foreach($custom_section as $k=>$custom_sub){
						$custom_sub_section = Custom_sub_section::where('custom_section_id',$custom_sub->id)->get();
						if(isset($custom_sub_section[0])){
							$custom_section[$k]->custom_sub_section =  $custom_sub_section;
						}
						else{
							$custom_section[$k]->custom_sub_section = array();
						}
					}
				}
				
				$custom_section_html = '';
				if(isset($custom_section[0])){
					$view = 'resume-builder/custom_skill_section/'.$request->attr;
					return view($view,array('custom_section'=>$custom_section, 'attr_template_id'=>$template_id))->render();
				}
			}
		}
	}
	public function customSectionHeadingUpdate(Request $request){
		
		$input_value = $request->input_value;
		$edit_id = $request->edit_id;
		$custom_section = Custom_section::where('id',$edit_id)->get();	
		if(isset($custom_section[0])){
			Custom_section::where('id', '=', $edit_id)->update(['title'=>$input_value]);
			return 'success';
		}
		
	}

	public function coursefullSectionDelete(Request $request){
		$delete_id = $request->delete_id;
	
		$course_info = Course::where('id', '=', $delete_id)->get();

		if(isset($course_info[0])){
			Course::where('user_id', $course_info[0]->user_id)->where('template_id',$course_info[0]->template_id)->delete();	
			$course_html = '';
			$course = Course::where('user_id',$course_info[0]->user_id)->where('template_id',$course_info[0]->template_id)->get();	
			if(isset($course[0])){
				$course_html = view('resume-builder/custom_skill_section/courses_section',array('course'=>$course, 'attr_template_id'=>$course_info[0]->template_id))->render();
			}
			$result =  array(
				'result' => 'success',
				'message'=> 'Courses has been deletes successfully.',
				'course_html'=>$course_html
			);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}

	public function extraActivityfullSectionDelete(Request $request){
		$delete_id = $request->delete_id;
	
		$extra_info = Extra_cirricular_activity::where('id', '=', $delete_id)->get();

		if(isset($extra_info[0])){
			Extra_cirricular_activity::where('user_id', $extra_info[0]->user_id)->where('template_id',$extra_info[0]->template_id)->delete();	
			$curricular_activities_section_html = '';
			$curricular_activities_section = Extra_cirricular_activity::where('user_id',$extra_info[0]->user_id)->where('template_id',$extra_info[0]->template_id)->get();	
			if(isset($curricular_activities_section[0])){
				$curricular_activities_section_html = view('resume-builder/custom_skill_section/extra_curricular_section',array('curricular_activities_section'=>$curricular_activities_section, 'attr_template_id'=>$extra_info[0]->id))->render();
			}
			$result =  array(
				'result' => 'success',
				'message'=> 'Extra activity has been deleted successfully.',
				'curricular_activities_section_html'=>$curricular_activities_section_html
			);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}

	public function internshipFullSectionDelete(Request $request){
		$delete_id = $request->delete_id;
	
		$internship_info = Internship::where('id', '=', $delete_id)->get();

		if(isset($internship_info[0])){
			Internship::where('user_id', $internship_info[0]->user_id)->where('template_id',$internship_info[0]->template_id)->delete();	
			$internships_section_html = '';
			$internship_section = Internship::where('user_id',$internship_info[0]->user_id)->where('template_id',$internship_info[0]->template_id)->get();	
			if(isset($internship_section[0])){
				$internships_section_html = view('resume-builder/custom_skill_section/internships_section',array('internship_section'=>$internship_section, 'attr_template_id'=>$internship_info[0]->id))->render();
			}
			$result =  array(
				'result' => 'success',
				'message'=> 'Internship has been deleted successfully.',
				'internships_section_html'=>$internships_section_html
			);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}

	
	public function hobbyfullSectionDelete(Request $request){
		$delete_id = $request->delete_id;
	
		$hobby_info = Hobby::where('id', '=', $delete_id)->get();

		if(isset($hobby_info[0])){
			Hobby::where('user_id', $hobby_info[0]->user_id)->where('template_id',$hobby_info[0]->template_id)->delete();	
			$hobby_section_html = '';
			$hobby_section = Hobby::where('user_id',$hobby_info[0]->user_id)->where('template_id',$hobby_info[0]->template_id)->get();	
			if(isset($hobby_section[0])){
				$hobby_section_html = view('resume-builder/custom_skill_section/hobbies_section',array('hobbies_section'=>$hobby_section, 'attr_template_id'=>$hobby_info[0]->id))->render();
			}
			$result =  array(
				'result' => 'success',
				'message'=> 'Hobby has been deleted successfully.',
				'hobby_section_html'=>$hobby_section_html
			);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	
	public function languagesFullSectionDelete(Request $request){
		$delete_id = $request->delete_id;
	
		$language_info = Custom_language::where('id', '=', $delete_id)->get();

		if(isset($language_info[0])){
			Custom_language::where('user_id', $language_info[0]->user_id)->where('template_id',$language_info[0]->template_id)->delete();	
			$languages_section_html = '';
			$languages_section = Custom_language::where('user_id',$language_info[0]->user_id)->where('template_id',$language_info[0]->template_id)->get();	
			if(isset($languages_section[0])){
				$languages_section_html = view('resume-builder/custom_skill_section/languages_section',array('languages_section'=>$languages_section, 'attr_template_id'=>$template[0]->id))->render();
			}
			$result =  array(
				'result' => 'success',
				'message'=> 'Custom language has been deleted successfully.',
				'languages_section_html'=>$languages_section_html
			);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
						'result' => 'failed',
						'message'=> 'Something went wrong'
					);
			return json_encode($result);
			die;
		}
	}
	/* References */

	public function referenceSectionDynamicForm(Request $request){
		if(isset($request->dynamic_form)){
			$numItems = $request->numItems;
			$dynamic_html = view('resume-builder/custom_reference/reference_dynamic_form',array('numItems'=>$numItems))->render();
			$result =  array(
				'result' => 'success',
				'message'=> 'success',
				'dynamic_html'=>$dynamic_html
			);
			return json_encode($result);
			die;
		}
	}
		
	public function referenceSave(Request $request){
		$user_id = 1;
		if(isset($request->template_id)){
			$template_id = $request->template_id;
			$basic_information = Basic_information::where('user_id',1)->where('template_id',$template_id)->get();
			if($request->first_name){
				
				foreach($request->first_name as $k=>$person_data){
					$details = array();
					$details['resume_name'] = $basic_information[0]->first_name.' '.$basic_information[0]->last_name;
					$details['reference_name'] = ucfirst($person_data);
					$to = $request['email'][$k];
				
					$details['subject'] = "Requesting Reference";
					$details['enc_email'] = $this->encrypt($request['email'][$k]);
					$details['enc_user_id'] = $this->encrypt($basic_information[0]->user_id);
					$details['enc_template_id'] = $this->encrypt($template_id);
					$details['enc_first_name'] = $this->encrypt($person_data);
					$enc_response_url =  url('/resume-builder/reference-response').'?email='.$details['enc_email'].'&user_id='.$details['enc_user_id'].'&template_id='.$details['enc_template_id'].'&first_name='.$details['enc_first_name'];
					$details['enc_response_url'] = $enc_response_url;
					$enc_logo = url('public/images/builder/images/logo-email.png');
					$details['enc_logo'] = $enc_logo;
	
					// echo view('email/referenceEmail',array('details'=>$details))->render();
						// die;
					$send_reference = new Send_reference;
					$send_reference->user_id = $basic_information[0]->user_id;
					$send_reference->employer_name = $basic_information[0]->resume_name;
					$send_reference->template_id = $template_id;
					$send_reference->first_name = $person_data;
					$send_reference->last_name = $request['last_name'][$k];
					$send_reference->company = $request['company'][$k];
					$send_reference->email = $request['email'][$k];
					$send_reference->save();

					\Mail::to($to)->send(new \App\Mail\ReferenceMail($details));
						
				}
				$result =  array(
					'result' => 'success',
					'message'=> 'Refrences email has been successfully sent',
				);
				return json_encode($result);
				die;
			}
		}
	}
	
	

	
	
	function encrypt($string, $key=5) {
		$result = '';
		$string = $string;
		for($i=0, $k= strlen($string); $i<$k; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result .= $char;
		}
		return base64_encode($result);
	}
	
	/*Decrypt*/
	function decrypt($string, $key=5) {
		$result = '';
		$string = base64_decode($string);
		for($i=0,$k=strlen($string); $i< $k ; $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
	}
	
	function referenceResponse(Request $request){
		
		$email = $this->decrypt($request['email']);
		$user_id = $this->decrypt($request['user_id']);
		$template_id = $this->decrypt($request['template_id']);
		$first_name = $this->decrypt($request['first_name']);
		
		$send_request = Send_reference::where('user_id',$user_id)->where('email',$email)->where('template_id',$template_id)->where('first_name',$first_name)->get();
		if(isset($send_request[0])){
			$template_html = $this->resumeData($send_request[0]->template_id,$send_request[0]->user_id);
			$data = ['send_request'=>$send_request,'template_html'=>$template_html];
			return appView('resume-builder.resumeResponse', compact('data'));
		}
		else{
			 return redirect()->route('resume.home');
		}
	}
	function referenceResponseUpdate(Request $request){
		if(isset($request->workers_id)){
			$send_request = Send_reference::where('id',$request->workers_id)->get();
			if(isset($send_request[0])){
				if($send_request[0]->status == 1 ){
					$result =  array(
						'result' => 'failed',
						'message'=> 'This form is already submitted.'	
					);
					return json_encode($result);
					die;
				}
				$first_name = $request->first_name;
				$employer_name = $request->employer_name;
				$company = $request->company;
				$website = $request->website;
				if(isset($request->permission)){
					$permission = 1;
				}
				else{
					$permission = 0;
				}
				$description = $request->description;
				
				Send_reference::where('id', '=', $request->workers_id)
								->update([
									'first_name'=>$first_name,
									'employer_name'=>$employer_name,
									'company'=>$company,
									'website'=>$website,
									'permission'=>$permission,
									'description'=>$description,
									'status'=>1,
								]);
				 $result =  array(
					'result' => 'success',
					'message'=> 'Workers details updated successfully.'	
				);
				return json_encode($result);
				die;
			}
		}
	}
	
	public function referenceThankyou(){
		return appView('resume-builder.referenceThankyou');
	}
	
	
	
	public function resumeData($template_id, $user_id){
		// $template_id = 1;
		// $user_id = 1;
		
		$alldata = array();
		$basic_information = Basic_information::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($basic_information[0])){
			$alldata['basic_information'] = $basic_information;
		}
		else{
			$alldata['basic_information'] = '';
		}
		$experience_history = Experience_history::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($experience_history[0])){
			$alldata['experience_history'] = $experience_history;
		}
		else{
			$alldata['experience_history'] = '';
		}
		$education_history = Education_history::where('user_id',$user_id)->where('template_id', $template_id)->get();
		if(isset($education_history[0])){
			$alldata['education_history'] = $education_history;
		}
		else{
			$alldata['education_history'] = '';
		}
		$skills = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($skills[0])){
			$alldata['skills'] = $skills;
		}
		else{
			$alldata['skills'] = '';
		}
		$achievement = Achievement::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($achievement[0])){
			$alldata['achievement'] = $achievement;
		}
		else{
			$alldata['achievement'] = '';
		}
		/*custom section*/
		
		$course = Course::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($course[0])){
			$alldata['course'] = $course;
		}
		else{
			$alldata['course'] = '';
		}
		$curricular_activities_section = Extra_cirricular_activity::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($curricular_activities_section[0])){
			$alldata['curricular_activities_section'] = $curricular_activities_section;
		}
		else{
			$alldata['curricular_activities_section'] = '';
		}
		$internship_section = Internship::where('user_id',$user_id)->where('template_id',$template_id)->get();	
		if(isset($internship_section[0])){
			$alldata['internship_section'] = $internship_section;
		}
		else{
			$alldata['internship_section'] = '';
		}
		$hobby_section = Hobby::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($hobby_section[0])){
			$alldata['hobby_section'] = $hobby_section;
		}
		else{
			$alldata['hobby_section'] = '';
		}
		$languages_section = Custom_language::where('user_id',$user_id)->where('template_id',$template_id)->get();	
		if(isset($hobby_section[0])){
			$alldata['hobby_section'] = $hobby_section;
		}
		else{
			$alldata['hobby_section'] = '';
		}
		$languages_section = Custom_language::where('user_id',$user_id)->where('template_id',$template_id)->get();
		if(isset($languages_section[0])){
			$alldata['languages_section'] = $languages_section;
		}
		else{
			$alldata['languages_section'] = '';
		}

		$template = Template::where('id',$template_id)->get();
		$template_html = '';
		if(isset($template[0]));
		{
			$template_name = 'resume-builder/resume_templates/resume_'.$template[0]->slug;
			$template_html =  view($template_name, array('template_data'=>$alldata))->render();
		}	
		
		return $template_html;
	}
	
	public function resumeFieldChange(Request $request){
	
		if(!empty($request->table_id)){
			$field_name = $request->field_name;
				$field_value = $request->field_value;
				$table_name = $request->table_name;
				$table_id = $request->table_id;
				$template_id = $request->template_id;
			$check = DB::table($table_name)->where('id',$table_id)->get();
				//update
			if(isset($check[0])){
				
				$languages_section = DB::table($table_name)->where('id',$table_id)->update([$field_name=>$field_value]);
				
				$formhtml = $this->resumeData($template_id, $check[0]->user_id);
				$result =  array(
					'result' => 'success',
					'formhtml'=> $formhtml
				);
				return json_encode($result);
				die;
			}
			
		}
		else{
			//addnew field
		}
	}
	
	public function resumelanguageInfoChange(Request $request){
		if(!empty($request->table_id)){
			$field_name = $request->field_name;
			if(!empty($request->field_value)){
				$field_value = implode(', ',$request->field_value);
			}
			else{
				$field_value = array();
			}
			
			$table_name = $request->table_name;
			$table_id = $request->table_id;
			$template_id = $request->template_id;
			$check = DB::table($table_name)->where('id',$table_id)->get();
				//update
			if(isset($check[0])){
				
				$languages_section = DB::table($table_name)->where('id',$table_id)->update([$field_name=>$field_value]);
				
				$formhtml = $this->resumeData($template_id, $check[0]->user_id);
				$result =  array(
					'result' => 'success',
					'formhtml'=> $formhtml
				);
				return json_encode($result);
				die;
			}
			
		}
		else{
			//addnew field
		}
	}
	
	public function resumeSkillChange(Request $request){
		if(!empty($request->table_id)){
			$field_name = $request->field_name;
			$field_value = implode(', ',$request->field_value);
			$table_name = $request->table_name;
			$table_id = $request->table_id;
			$template_id = $request->template_id;
			$check = DB::table($table_name)->where('id',$table_id)->get();
				//update
			if(isset($check[0])){
				
				$languages_section = DB::table($table_name)->where('id',$table_id)->update([$field_name=>$field_value]);
				
				$formhtml = $this->resumeData($template_id, $check[0]->user_id);
				$result =  array(
					'result' => 'success',
					'formhtml'=> $formhtml
				);
				return json_encode($result);
				die;
			}
			
		}
		else{
			//addnew field
		}
	}
	public function resumeSkillModalClose(Request $request){
		if(!empty($request->skill_templateid)){
			$user_id = $request->skill_userid;
			$template_id = $request->skill_templateid;
			$skills_user = Skill::where('user_id',$user_id)->where('template_id',$template_id)->get();
			$skill_ind = array();
			$skill_industry = skill_list::get();
			foreach($skill_industry as $skind){
				$skill_ind[] = $skind->type;
			}
			$skills_html = '';
			$expskill = array();
			if(isset($skills_user[0])){
				if($skills_user[0]->type){
					$expskill = explode(', ',$skills_user[0]->type);
				}
				
			}
			$skills_merge = array_unique(array_merge($skill_ind,$expskill), SORT_REGULAR);
			$skills_html = view('resume-builder/sections/skill-section',array('skills_user'=>$skills_user, 'attr_template_id'=>$template_id,'skills_merge'=>$skills_merge))->render();
			
			$result =  array(
				'result' => 'success',
				//'message'=> 'Skill has been updated successfully.',
				'skills_html'=>$skills_html,
			);
			return json_encode($result);
				die;
		}
	}

	public function resumeExperienceEditFormChange(Request $request){
		$user_id = 1;
		$experience_id = $request->experience_id;
		$position_head = $request->position_head;
		$company = $request->company;
		$template_id = $request->template_id;
		$start_date = $request->start_date;
		$end_date = $request->end_date;
		$duties1 = $request->duties1;
		$duties2 = $request->duties2;
		$duties3 = $request->duties3;
		$duties4 = $request->duties4;
		Experience_history::where('id', '=', $experience_id)
								->update([
											'position_head'=>$position_head,
											'company'=>$company,
											'start_date'=>$start_date,
											'end_date'=>$end_date,
											'duty1'=>$duties1,
											'duty2'=>$duties2,
											'duty3'=>$duties3,
											'duty4'=>$duties4,
										]);
		$formhtml = $this->resumeData($template_id, $user_id);
		$result =  array(
			'result' => 'success',
			'formhtml'=> $formhtml
		);
		return json_encode($result);
	}
	
	public function resumeExperienceModalClose(Request $request){
		
		$user_id = 1;
		$experience_id = $request->experience_id;
		$experience_info = Experience_history::where('id', '=', $experience_id)->get();
		if(isset($experience_info[0])){
			$experience_history = Experience_history::where('user_id', '=', $experience_info[0]->user_id)->where('template_id',$experience_info[0]->template_id)->get();
			
			$experience_html = view('resume-builder/sections/experience-section',array('experience_history'=>$experience_history))->render();				
			$result =  array(
						'result' => 'success',
						'message'=> 'Experience Modal closes.',
						'experience_html'=>$experience_html
					);
			return json_encode($result);
			die;
		}
	}
	
	
	
	public function resumeEducationEditFormChange(Request $request){
		$user_id = 1;
		$education_id = $request->education_id;
		$template_id = $request->template_id;
		$achievement = $request->achievement;
		$school= $request->school_university_institute;
		$date = $request->date;
		$subject1 = $request->subject1;
		$subject2 = $request->subject2;
		$subject3 = $request->subject3;
		
		Education_history::where('id', '=', $education_id)
								->update([
											'achievement'=>$achievement,
											'school'=>$school,
											'date'=>$date,
											'subject1'=>$subject1,
											'subject2'=>$subject2,
											'subject3'=>$subject3,
											
										]);
		$formhtml = $this->resumeData($template_id, $user_id);
		$result =  array(
			'result' => 'success',
			'formhtml'=> $formhtml
		);
		return json_encode($result);
	}
	
	
	public function resumeEducationEditModalClose(Request $request){
		
		$user_id = 1;
		$education_id = $request->education_id;
		$education_info = Education_history::where('id', '=', $education_id)->get();
		if(isset($education_info[0])){
			$education_history = Education_history::where('user_id', '=', $education_info[0]->user_id)->where('template_id',$education_info[0]->template_id)->get();
			$education_html = view('resume-builder/sections/education-section',array('education_history'=>$education_history))->render();				
			$result =  array(
						'result' => 'success',
						'message'=> 'Education Modal closes.',
						'education_html'=>$education_html
					);
			return json_encode($result);
			die;
		}
	}
	
	
	public function resumeHobbyEditFormChange(Request $request){
		$user_id = 1;
		$template_id = $request->template_id;
		$hobby_id = $request->language_id;
		$title = $request->title;
		$description = $request->description;
	
		Hobby::where('id', '=', $hobby_id)
								->update([
											'title'=>$title,
											'description'=>$description
										]);
		$formhtml = $this->resumeData($template_id, $user_id);
		$result =  array(
			'result' => 'success',
			'formhtml'=> $formhtml
		);
		return json_encode($result);
	}
	
	
	public function resumeBasicInfoFormChange(Request $request){
	
		$resume_name = $request['resume_name'];
		$first_name = $request['first_name'];
		$last_name = $request['last_name'];
		$job_title = $request['job_title'];
		$email = $request['email'];
		$phone = $request['phone'];
		$current_salary = $request['current_salary'];
		$expected_salary = $request['expected_salary'];
		$experience = $request['experience'];
		$age = $request['age'];
		$user_id = 1;
		$description = $request['description'];
		$template_id = $request['template_id'];
		$wkindustry = '';
		$array2 =array();
		if(!empty($request['work_industries'])){
			foreach ($request['work_industries'] as $row) {
				if ($row !== '')
				   $array2[] = $row;
			}
			$array = $array2;
				
			$wkindustry = implode(', ', $array);
		}
			
		
		$work_industries = $wkindustry;

		$languages = '';
		$array4 = array();
		$wklanguage = '';
		if(!empty($request['languages'])){
			foreach ($request['languages'] as $row) {
				if ($row !== '')
				   $array4[] = $row;
			}
			$array = $array4;
				
			$wklanguage = implode(', ', $array);
		}
			
		
		$languages = $wklanguage;
		
		if(empty($request['basic_form_id'])){
			$basic_information = new Basic_information();
			$basic_information->user_id = $user_id;
			$basic_information->template_id = $template_id;
			$basic_information->resume_name = $resume_name;
			$basic_information->first_name = $first_name;
			$basic_information->last_name = $last_name;
			$basic_information->job_title = $job_title;
			$basic_information->email = $email;
			$basic_information->phone = $phone;
			$basic_information->current_salary = $current_salary;
			$basic_information->expected_salary = $expected_salary;
			$basic_information->experience = $experience;
			$basic_information->age = $age;
			$basic_information->languages = $languages;
			$basic_information->work_industries = $work_industries;
			$basic_information->description = $description;
			$basic_information->save();
			
			
			$insertedId = $basic_information->id;
			
			
			if($insertedId != ""){
				$inserted_id=$insertedId;
				$formhtml = $this->resumeData($template_id, $user_id);
				$result =  array(
					'result' => 'success',
					'message'=> 'Basic information has been saved successfully.',
					'inserted_id'=>$inserted_id,
					'formhtml'=> $formhtml
				);
				return json_encode($result);
				die;
			}else{
				$result =  array(
					'result' => 'success',
					'message'=> 'Something went wrong wrong'
				);
				return json_encode($result);
				die;
			}
		}
		else{
			$basic_form_id = $request['basic_form_id'];
			Basic_information::where('id', '=', $basic_form_id)
								->update([
											'resume_name'=>$resume_name,
											'first_name'=>$first_name,
											'last_name'=>$last_name,
											'job_title'=>$job_title,
											'email'=>$email,
											'phone'=>$phone,
											'current_salary'=>$current_salary,
											'expected_salary'=>$expected_salary,
											'experience'=>$experience,
											'age'=>$age,
											'languages'=>$languages,
											'work_industries'=>$work_industries,
											'description'=>$description,
										]);
			$img_check = Basic_information::where('id',$basic_form_id)->get();
			$formhtml = $this->resumeData($template_id, $user_id);
			 $result =  array(
				'inserted_id'=>$basic_form_id,
				'result' => 'success',
				'message'=> 'Basic information updated successfully.',
				'formhtml'=> $formhtml
			);
			return json_encode($result);
			die;
		}
	}
	

}

