<?php

namespace App\Tests\Functional\Command;

use App\Command\NotificationCommand;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class NotificationCommandTest extends KernelTestCase
{
    /**
     * @dataProvider getDataProvider
     */
    public function testExecute(string $expection)
    {
        $kernel = self::bootKernel();
        $application = new Application($kernel);

        $command = $application->find('app:notification');
        $commandTester = new CommandTester($command);
        $commandTester->execute([
            'subject' => 'тема письма',
            'message' => 'текст письма',
        ]);

        $commandTester->assertCommandIsSuccessful();

        $output = $commandTester->getDisplay();
        $this->assertStringContainsString($expection, $output);
    }

    public function getDataProvider(): array
    {
        return [
            [
'Получен список email для рассылки
Отправляется сообщение для test@test.ru
Отправляется сообщение для test@test.com
Отправляется сообщение для test@test.org
'
            ]
        ];
    }
}