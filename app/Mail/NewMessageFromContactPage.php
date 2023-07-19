<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class NewMessageFromContactPage extends Mailable
{
    use Queueable, SerializesModels;

    private array $data;
    /**
     * Create a new message instance.
     *
     */
    public function __construct($name, $userEmail,$userMessage)
    {
        $this->data['name'] = $name;
        $this->data['email'] = $userEmail;
        $this->data['message'] = $userMessage;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('New message from contact page purovite.com')
            ->markdown('mails.messageFromContactPage', [
                'data' => $this->data
            ]);
    }
}
