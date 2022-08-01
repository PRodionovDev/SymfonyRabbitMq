<?php

namespace App\Handler;

use App\Message\EmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class EmailMessageHandler implements MessageHandlerInterface
{
    public function __invoke(EmailMessage $emailMessage)
    {
        //Create Email from template

        //Send Mail
        echo 'Отправлено сообщение';
    }
}
