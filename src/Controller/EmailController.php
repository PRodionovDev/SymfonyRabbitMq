<?php

namespace App\Controller;

use App\Message\EmailMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;

class EmailController extends AbstractController
{
    /**
     * @Route("/send", name="send")
     * @param MessageBusInterface $bus
     * @return Response
     */
    public function sendEmail(MessageBusInterface $bus): Response
    {
        $bus->dispatch(new EmailMessage('test'));

        return new Response('send this message');
    }
}
