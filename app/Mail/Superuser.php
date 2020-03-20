<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Superuser extends Mailable
{
    use Queueable, SerializesModels;
    public $data ;
    public $temp_pass;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data,$temp_pass)
    {
        $this->data= $data;
        $this->temp_pass=$temp_pass;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.SuperUser');
    }
}
