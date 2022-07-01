<?php

namespace Leeuwenkasteel\Auth\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyMail extends Mailable{
    use Queueable, SerializesModels;

    public $maildata;

    public function __construct($maildata){
        $this->maildata = $maildata;
    }

    public function build(){
        return $this->markdown('auth::emails.verify')
                ->subject(trans('auth::messages.email_verify_header'))
                ->with('maildata', $this->maildata);
    }
}