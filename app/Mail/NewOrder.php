<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    public $data = [];
    public $pdf = null;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $pdf)
    {
        $this->data = $data;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bonrencontretest@gmail.com')
            ->subject('Nouvelle vente')
            ->markdown('emails.markdown-neworder')
            ->attachData($this->pdf, 'bon-de-commande.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
