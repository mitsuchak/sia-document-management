<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginCredentials extends Mailable
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
        return $this->view('emails.login_credentials')
                    ->with([
                        'first_name' => $this->credentials['first_name'],
                        'email' => $this->credentials['email'],
                        'password' => $this->credentials['password'],
                    ])
                    ->subject('Your Login Credentials');
    }
}
