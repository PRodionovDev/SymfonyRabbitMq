<?php

namespace App\Command;

use App\Message\EmailMessage;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\MessageBusInterface;

class NotificationCommand extends Command
{
    protected static $defaultName = 'app:notification';

    /** @var MessageBusInterface **/
    private MessageBusInterface $bus;

    public function __construct(MessageBusInterface $bus)
    {
        $this->bus = $bus;
        parent::__construct();
    }

    public function execute(InputInterface $input, OutputInterface $output): int
    {
        $this->bus->dispatch(new EmailMessage('test'));

        return Command::SUCCESS;
    }
}
