<?php

namespace App\Tests\Unit\Message;

use App\Message\EmailMessage;
use PHPUnit\Framework\TestCase;

class EmailMessageTest extends TestCase
{
    /**
     * @param string $address
     * @param string $subject
     * @param string $message
     *
     * @dataProvider getDataProvider
     */
    public function testEmailMessage(string $address, string $subject, string $message): void
    {
        $emailMessage = new EmailMessage($address, $subject, $message);

        $this->assertEquals($address, $emailMessage->getAddress());
        $this->assertEquals($subject, $emailMessage->getSubject());
        $this->assertEquals($message, $emailMessage->getMessage());
    }

    /**
     * @return array
     */
    public function getDataProvider(): array
    {
        return [
            [
                'test@test.ru', 'test1', 'test1'
            ],
            [
                'test@test.org', 'test2', 'test2'
            ],
            [
                'test@test.com', 'test3', 'test3'
            ],
        ];
    }
}
