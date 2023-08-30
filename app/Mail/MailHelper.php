<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class MailHelper extends Mailable
{
    use Queueable, SerializesModels;

    public  $body, $mysubject ;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($mysubject, $body)
    {
        $this->body = $body;
        $this->mysubject = $mysubject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
        ->from($address = "info@samsonude.dev", $name = "Samson Ude")
        ->subject($this->mysubject)
        ->view('mail.emailtemplate');
    }
    
}
