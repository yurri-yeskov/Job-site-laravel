<?php

namespace App\Mail;

use App\Models\Chatter_Discussion;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ChatterDiscussionUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public $discussion;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Chatter_Discussion $discussion)
    {
        $this->discussion = $discussion;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view(config('chatter.email.view'))->with([
            'discussion' => $this->discussion,
        ]);
    }
}
