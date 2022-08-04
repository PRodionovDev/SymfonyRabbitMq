<?php

namespace App\Command;

use App\Message\EmailMessage;
use App\Repository\EmailRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class NotificationCommand extends Command
{
    protected static $defaultName = 'app:notification';

    /** @var MessageBusInterface **/
    private MessageBusInterface $bus;
    /** @var EmailRepository **/
    private EmailRepository $repository;

    public function __construct(MessageBusInterface $bus, EmailRepository $repository)
    {
        $this->bus = $bus;
        $this->repository = $repository;
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $emails = $this->repository->findAll();
        $output->writeln('Получен список email для рассылки');

        foreach ($emails as $email) {
            $output->writeln('Отправляется сообщение для ' . $email->getAddress());
            $this->bus->dispatch(new EmailMessage($email->getAddress(), 'test'));
        }

        return Command::SUCCESS;
    }
}
