<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;

class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The user.
     * 
     * @var User $_user
     */
    private $_user;
    
    /**
     * The new password.
     * 
     * @var string $_password
     */
    private $_password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, string $password)
    {
        $this->_user = $user;
        $this->_password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject(trans('mails.reset_subject'))
        ->view('mails.reset_password')
        ->with([
            'name' => $this->_user->name,
            'password' => $this->_password,
        ]);
    }
}
