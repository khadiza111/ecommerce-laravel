<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //define our subject line
        $subject = $this->data['name'] . 'Send a Message on '. $this->data['subject'];
        //$email = $this->data['email'];

        return $this->view('dynamic_email_template')
                    ->subject($subject)
                    ->with([
                        'data'=>$this->data
                    ]);

        // return $this->subject('New Customer Query !!')->view('dynamic_email_template')->with('data', $this->data);
    }
}
