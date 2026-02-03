<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function build()
    {
        // This tells Laravel to use the 'emailc' view for the email content
        return $this->view('emailc')
                    ->subject($this->data['subject'])
                    ->with(['msg' => $this->data['message']]);
    }
}