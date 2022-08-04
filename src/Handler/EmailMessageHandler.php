<?php

namespace App\Handler;

use App\Message\EmailMessage;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;

class EmailMessageHandler implements MessageHandlerInterface
{
    /** @var MailerInterface $mailer **/
    private MailerInterface $mailer;

    public function __construct(MailerInterface $mailer)
    {
        $this->mailer = $mailer;
    }

    public function __invoke(EmailMessage $emailMessage)
    {
        $email = (new Email())
            ->to($emailMessage->getAddress())
            ->subject($emailMessage->getSubject())
            ->text($emailMessage->getMessage());

        $this->mailer->send($email);
    }
}
