<?php

namespace App\Http\Controllers\Web\Account;

use App\Models;
use App\Models\User;
use App\Models\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\NewMessage;
use Auth;
use DB;
use DateTime;
use App\Models\Basic_information;
use App\Models\Experience_history;
use App\Models\Education_history;
use App\Models\Skill;
use App\Models\Achievement;
use App\Models\Custom_section;
use App\Models\Custom_sub_section;
use App\Models\Course;
use App\Models\Extra_cirricular_activity;
use App\Models\Internship;
use App\Models\Custom_language;
use App\Models\Hobby;
use App\Models\Template;

class ChatController extends Controller
{
	public function index()
	{
		return appView('chat.index');
	}

	public function get()
    {
        // get all users except the authenticated one
        $contacts = User::where('id', '!=', auth()->id())->get();
        // get a collection of items where sender_id is the user who sent us a message
        // and messages_count is the number of unread messages we have from him
        $unreadIds = Message::select(\DB::raw('`from` as sender_id, count(`from`) as messages_count'))
            ->where('to', auth()->id())
            ->where('read', false)
            ->groupBy('from')
            ->get();

        // add an unread key to each contact with the count of unread messages
        $contacts = $contacts->map(function($contact) use ($unreadIds) {
            $contactUnread = $unreadIds->where('sender_id', $contact->id)->first();
            $contact->datetime = $this->time_elapsed_string($contact->created_at);
            $contact->unread = $contactUnread ? $contactUnread->messages_count : 0;

            return $contact;
        });
        // dd($contacts);
        return response()->json($contacts);
    }

    public function getMessagesFor($id)
    {
        // mark all messages with the selected contact as read
        Message::where('from', $id)->where('to', auth()->id())->update(['read' => true]);

        // get all messages between the authenticated user and the selected user
        $messages = Message::where(function($q) use ($id) {
            $q->where('from', auth()->id());
            $q->where('to', $id);
        })->orWhere(function($q) use ($id) {
            $q->where('from', $id);
            $q->where('to', auth()->id());
        })
        ->orderBy('id', 'ASC')->get();

        $msgs = [];
        foreach ($messages as $key => $value) {
            $msgs[$key] = $value;
            if ($value->from) {
                $msgs[$key]->from_user = User::find($value->from)->name;
            }
            if ($value->to) {
                $msgs[$key]->to_user = User::find($value->to)->name;
            }
            $msgs[$key]->datetime = $this->time_elapsed_string($value->created_at);
        }
        return response()->json($msgs);
    }

    public function sendOld(Request $request)
    {
        $message = Message::create([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text
        ]);

        if ($message->from) {
            $message->from_user = User::find(auth()->id())->name;
        }
        if ($message->to) {
            $message->to_user = User::find($request->contact_id)->name;
        }
        $message->datetime = $this->time_elapsed_string(date('Y-m-d h:i:s'));
        broadcast(new NewMessage($message));

        return response()->json($message);
    }

    public function send(Request $request)
   {
        $result = DB::table('messages')->insertGetId([
            'from' => auth()->id(),
            'to' => $request->contact_id,
            'text' => $request->text,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $entries = DB::table('messages AS m')
        ->select('m.*','u.name AS from_user','us.name AS to_user')
        ->leftJoin('users AS u','m.from' ,'=','u.id')
        ->leftJoin('users AS us','m.to' ,'=','us.id')
        ->where('m.id',$result)->first();

        $entryModel = new \App\Models\Message;
        $entryModel->forceFill((array)$entries);

        broadcast(new NewMessage($entryModel));
        $entries->datetime = $this->time_elapsed_string($entries->created_at);
        return response()->json($entries);
    }

    public function time_elapsed_string($datetime, $full = false) {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);

        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;

        $string = array(
            'y' => 'year',
            'm' => 'month',
            'w' => 'week',
            'd' => 'day',
            'h' => 'hour',
            'i' => 'minute',
            's' => 'second',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
            } else {
                unset($string[$k]);
            }
        }

        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' ago' : 'just now';
    }

    public function searchResult(Request $request)
    {
        $userList = [];
        if ($request->keywords=='') {
            $userList= User::where('id', '!=', auth()->id())->get();
        }else if($request->keywords!=''){
            $userList= User::where('name', 'LIKE', "%{$request->keywords}%")->where('id', '!=', auth()->id())->get();
        }
        return response()->json($userList);
    }
	
	
	public function resume(){
		$basic_information = Basic_information::where('user_id',1)->get();	
		if(isset($basic_information[0])){
			foreach($basic_information as $k=>$binfo){
				$template = Template::where('id',$binfo->template_id)->get();
				if(isset($template[0])){
					$basic_information[$k]->slug = $template[0]->slug;
				}
			}
		}
		$experience_html = view('chat/resume_sections/resume_list',array('basic_information'=>$basic_information))->render();		
		$data = ['experience_html'=>$experience_html];		
		return appView('chat.resume', $data);	
	}
	
	public function resumeCvDelete(Request $request){
		$basic_info_id = $request->basic_info_id;
		$basic_information = Basic_information::where('id',$basic_info_id)->get();	
		if(isset($basic_information[0])){
			$user_id = $basic_information[0]->user_id;
			$template_id = $basic_information[0]->template_id;
			Basic_information::where('user_id', $user_id)->where('template_id',$template_id)->delete();
			Experience_history::where('user_id',$user_id)->where('template_id',$template_id)->delete();
			Education_history::where('user_id',$user_id)->where('template_id',$template_id)->delete();
			Skill::where('user_id',$user_id)->where('template_id',$template_id)->delete();
			Achievement::where('user_id',$user_id)->where('template_id',$template_id)->delete();
			$custom_section = Custom_section::where('user_id',$user_id)->where('template_id',$template_id)->get();	
			if(isset($custom_section[0])){
				Custom_sub_section::where('custom_section_id',$custom_section[0]->id)->delete();
			}
			Course::where('user_id',$user_id)->where('template_id',$template_id)->delete();
			Extra_cirricular_activity::where('user_id',$user_id)->where('template_id',$template_id)->delete();
			Internship::where('user_id',$user_id)->where('template_id',$template_id)->delete();	
			Hobby::where('user_id',$user_id)->where('template_id',$template_id)->delete();
			Custom_language::where('user_id',$user_id)->where('template_id',$template_id)->get();
			$resume_html = Basic_information::where('user_id',$user_id)->get();
			$experience_html = view('chat/resume_sections/resume_list',array('basic_information'=>$resume_html))->render();					
			$result =  array(
				'result' => 'success',
				'message'=> 'Resume deleted successfully',
				'experience_html'=>$experience_html
			);
			return json_encode($result);
			die;
		}
		else{
			$result =  array(
					'result' => 'failed',
					'message'=> 'Something went wrong',
					''
				);
				return json_encode($result);
				die;
		}
	}
	
	public function reference(){
		$data = [];		
		return appView('chat.reference', $data);	
	}
	
	public function resumeSentOut(){
		$data = [];		
		return appView('chat.resumesentout', $data);	
	}
}