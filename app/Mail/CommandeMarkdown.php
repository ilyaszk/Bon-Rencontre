<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CommandeMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    public $commande = [];
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($commande)
    {
        $this->commande = $commande;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('bonrencontretest@gmail.com')
            ->subject('Votre commande est prête!')
            ->markdown('emails.markdown-commande');
    }
}
