<?php

namespace Leeuwenkasteel\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewUserMail extends Mailable{
    use Queueable, SerializesModels;

    public $maildata;

    public function __construct($maildata){
        $this->maildata = $maildata;
    }

    public function build(){
        return $this->markdown('auth::emails.new_user')
                ->subject(trans('auth::messages.invited'))
                ->with('maildata', $this->maildata);
    }
}