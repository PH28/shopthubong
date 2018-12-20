<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ForgotPassWord extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     protected $token;
    public function __construct($userpass)
    {
      
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // modify function build
    public function build()
    {
        
        return $this->view('view.name');
    }
}
