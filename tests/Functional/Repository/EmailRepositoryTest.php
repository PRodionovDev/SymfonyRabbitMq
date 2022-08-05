<?php

namespace App\Tests\Functional\Repository;

use App\Entity\Email;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class EmailRepositoryTest extends KernelTestCase
{
    /**
     * @var \Doctrine\ORM\EntityManager
     */
    private $entityManager;

    protected function setUp(): void
    {
        $kernel = self::bootKernel();

        $this->entityManager = $kernel->getContainer()
            ->get('doctrine')
            ->getManager();
    }

    /**
     * @dataProvider getDataProvider
     */
    public function testSearchByAddress(string $address)
    {
        $email = $this->entityManager
            ->getRepository(Email::class)
            ->findOneBy(['address' => $address])
        ;

        $this->assertSame($address, $email->getAddress());
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

    protected function tearDown(): void
    {
        parent::tearDown();

        $this->entityManager->close();
        $this->entityManager = null;
    }
}
