<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\Impediment;

class ImpedimentReceiverMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * The impediment.
     * 
     * @var Impediment $impediment
     */
    private $_impediment;

    /**
     * Create a new message instance.
     *
     * @param Impediment $impediment
     * @param int $sender
     * @param int $receiver
     * @return void
     */
    public function __construct(Impediment $impediment)
    {
        $this->_impediment = $impediment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $link = env('APP_URL_CLIENT') . '/impediments/';
        if($this->_impediment->parent_id) {
            $link .= $this->_impediment->parent_id;   
        }else {
            $link .= $this->_impediment->id;   
        }

        return $this->subject('Notificação de impedimento')
        ->view('mails.impediment_receiver')
        ->with([
            'sender' => $this->_impediment->user->name,
            'receiver' => $this->_impediment->receiver->name,
            'objective' => $this->_impediment->keyResult->objective->title,
            'key_result' => $this->_impediment->keyResult->title,
            'description' => $this->_impediment->description,
            'status' => $this->_impediment->statusName,
            'archive' => $this->_impediment->archive,
            'link' => $link,
        ]);
    }
}
