<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactformMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $inputs;
    public function __construct($inputs)
    {
        $this->inputs = $inputs;
    }

    public function build()
    {
        return $this->view('contactform.mail')->with(['inputs' => $this->inputs])
        ->subject('お問い合わせを受け付けました');
        
    }
}
