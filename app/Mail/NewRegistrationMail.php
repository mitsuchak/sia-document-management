<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewRegistrationMail extends Mailable
{
    use Queueable, SerializesModels;

    public $credentials;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($credentials)
    {
        $this->credentials = $credentials;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.newregistration')
                    ->with([
                        'first_name' => $this->credentials['first_name'],
                        'last_name' => $this->credentials['last_name'],
                    ])
                    ->subject('Your Login Credentials');
    }
}
