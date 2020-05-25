<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrderAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $date;
    public $client;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($date)
    {
        $this->date = $date;
        $this->client = $date->createdBy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.orders.new.admin');
    }
}
