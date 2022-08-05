<?php

namespace App\DataFixtures;

use App\Entity\Email;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class EmailFixture extends Fixture
{
    const TEST_EMAIL_ADDRESS_1 = 'test@test.ru';
    const TEST_EMAIL_ADDRESS_2 = 'test@test.com';
    const TEST_EMAIL_ADDRESS_3 = 'test@test.org';

    public function load(ObjectManager $manager): void
    {
        $email = new Email();
        $email->setAddress(self::TEST_EMAIL_ADDRESS_1);

        $manager->persist($email);

        $email = new Email();
        $email->setAddress(self::TEST_EMAIL_ADDRESS_2);

        $manager->persist($email);

        $email = new Email();
        $email->setAddress(self::TEST_EMAIL_ADDRESS_3);

        $manager->persist($email);

        $manager->flush();
    }
}
