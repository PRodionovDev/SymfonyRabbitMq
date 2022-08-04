<?php

namespace App\Tests\Unit\Entity;

use App\Entity\Email;
use PHPUnit\Framework\TestCase;

class EmailTest extends TestCase
{
    /**
     * @param string $address
     *
     * @dataProvider getDataProvider
     */
    public function testGetAddress(string $address): void
    {
        $email = $this->getEmailMock($address);

        $this->assertEquals($address, $email->getAddress());
    }

    /**
     * @return Email
     */
    public function getEmailMock(string $address): Email
    {
        $email = new Email;
        $email->setAddress($address);

        return $email;
    }

    /**
     * @return array
     */
    public function getDataProvider(): array
    {
        return [
            [
                'test@test.ru'
            ],
            [
                'test@test.org'
            ],
            [
                'test@test.com'
            ],
        ];
    }
}
