<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ForgetMail extends Mailable
{
    use Queueable, SerializesModels;
    
     public $token;

    /** 
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($token)
    {
         $this->data = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->data;
        return $this->from('support@easylearningbd.com')->view('mail.forget',compact('data'))->subject('Password Reset Link');
    }
}
