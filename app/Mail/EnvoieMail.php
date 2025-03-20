<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class EnvoieMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;  // Variable pour les informations de la commande
    public $pdfPath;   // Variable pour le chemin du PDF

    /**
     * Créer une nouvelle instance de message.
     *
     * @param  $order  Les informations de la commande
     * @param  $pdfPath  Le chemin du fichier PDF
     */
    public function __construct($order, $pdfPath)
    {
        $this->order = $order;
        $this->pdfPath = $pdfPath;
    }

    /**
     * Obtenir l'enveloppe du message.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Votre commande est prête',  // Sujet de l'email
        );
    }

    /**
     * Obtenir la définition du contenu du message.
     */
    public function content(): Content
    {
        // Personnalise la vue avec les détails de la commande
        return new Content(
            view: 'emails.invoice',  // Vue qui va afficher les détails de la commande
            with: [
                'order' => $this->order,  // Transmettre les données de la commande à la vue
            ]
        );
    }

    /**
     * Obtenir les pièces jointes pour le message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            // Ajouter la pièce jointe PDF à l'email
            \Illuminate\Mail\Mailables\Attachment::fromStorage($this->pdfPath)
                ->as('invoice.pdf') 
                ->withMime('application/pdf'),
        ];
    }
}
