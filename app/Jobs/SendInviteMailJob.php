<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendFriendInviteMail;
use \Cache;

class SendInviteMailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $getData = Cache::get('syncEmailArr');
        $emails = $getData['unmatched_emails'];
        if(array_key_exists('selected_emails', $getData)){
            $selectedEmails = $getData['selected_emails'];
            if(!empty($selectedEmails)){
                $emails = array_merge($emails, $selectedEmails);
            }
        }

        if(!empty($emails)){
            foreach ($emails as $key => $email) {
                $details = [
                    'name' => $getData['name']
                ];

                \Mail::to($email)->send(new \App\Mail\SendFriendInviteMail($details));
            }
            
        }
    }
}
