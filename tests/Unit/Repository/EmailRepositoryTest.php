<?php

namespace App\Tests\Unit\Repository;

use App\Entity\Email;
use App\Repository\EmailRepository;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Persistence\ObjectRepository;
use PHPUnit\Framework\TestCase;

class EmailRepositoryTest extends TestCase
{
    /**
     * @param string $address
     *
     * @dataProvider getDataProvider
     */
    public function testEmailRepository(string $address): void
    {
        $email = new Email();
        $email->setAddress($address);

        $emailRepository = $this->createMock(ObjectRepository::class);
        $emailRepository->expects($this->any())
            ->method('find')
            ->willReturn($email);


        $objectManager = $this->createMock(ObjectManager::class);
        $objectManager->expects($this->any())
            ->method('getRepository')
            ->willReturn($emailRepository);

        $this->assertEquals($email, $emailRepository->find($address));
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
