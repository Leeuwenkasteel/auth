<?php

namespace Leeuwenkasteel\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgotMail extends Mailable{
    use Queueable, SerializesModels;

    public $maildata;

    public function __construct($maildata){
        $this->maildata = $maildata;
    }

    public function build(){
        return $this->markdown('auth::emails.forgot')
                ->subject(trans('auth::messages.reset_password'))
                ->with('maildata', $this->maildata);
    }
}