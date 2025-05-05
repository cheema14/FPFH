<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserApprovalMail extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    public $loginUrl;

    public function __construct($user)
    {
        $this->user = $user;
        $this->loginUrl = route('login');
    }

    public function build()
    {
        return $this->subject('Account Approved - Welcome to ' . config('app.name'))
                    ->markdown('emails.user-approval', [
                        'user' => $this->user,
                        'loginUrl' => $this->loginUrl
                    ]);
    }
} 