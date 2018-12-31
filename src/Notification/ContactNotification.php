<?php
namespace App\Notification;

use App\Entity\Contact;
use Twig\Environment;

class ContactNotification {

    /**
     * @var \Swift_Mailer
     */
    private $mailer;
    /**
     * @var Environment
     */
    private $environement;
    public function __construct(\Swift_Mailer $mailer, Environment $environment)
    {
        $this->mailer = $mailer;
        $this->environement = $environment;
    }

    /**
     * @param Contact $contact
     * @throws \Twig_Error_Loader
     * @throws \Twig_Error_Runtime
     * @throws \Twig_Error_Syntax
     */
    public function notifyContact(Contact $contact) {
        $message = (new \Swift_Message('Agence : ' . $contact->getProperty()->getTitle()))
            ->setFrom('noreplay@agence.fr')
            ->setTo('fallousamb74@gmail.com')
            ->setReplyTo($contact->getEmail())
            ->setBody($this->environement->render('emails/contact.html.twig', [
                'contact' => $contact
            ]), 'text/html');

        $this->mailer->send($message);
    }
}