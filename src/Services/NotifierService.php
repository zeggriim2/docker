<?php


namespace App\Services;


use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;

class NotifierService
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var MailerInterface
     */
    private $mailer;

    public function __construct(
        Environment $twig,
        MailerInterface $mailer
    )
    {
        $this->twig = $twig;
        $this->mailer = $mailer;
    }

    public function notify()
    {
        $email = (new Email())
            ->from('noreply@site.fr')
            ->to('toto@hotmail.fr')
            ->html($this->twig->render('email/notification.html.twig'))
        ;
        sleep(2);
        throw new \Exception('Pas possible');
        $this->mailer->send($email);
    }
}