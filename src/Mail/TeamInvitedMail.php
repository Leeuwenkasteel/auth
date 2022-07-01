<?php

namespace Leeuwenkasteel\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TeamInvitedMail extends Mailable{
    use Queueable, SerializesModels;

    public $maildata;

    public function __construct($maildata){
        $this->maildata = $maildata;
    }

    public function build(){
        return $this->markdown('auth::emails.invited_team')
                ->subject(trans('auth::messages.invited_team'))
                ->with('maildata', $this->maildata);
    }
}