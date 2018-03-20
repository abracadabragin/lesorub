<?php

namespace Lesorub\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $params;
    /**
     * Create a new message instance.
     *
     * @param array $params
     * @return void
     */
    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Заявка')->view('mail')->with("params", $this->params);
    }
}
