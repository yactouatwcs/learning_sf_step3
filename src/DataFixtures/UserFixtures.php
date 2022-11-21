<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{

    public function __construct(private UserPasswordHasherInterface $hasher) {}

    public function load(ObjectManager $manager)
    {
        $faker = Factory::create();

        $userToto = new User();
        $userToto->setUsername('toto');
        $userToto->setPassword($this->hasher->hashPassword($userToto, 'pass_1234'));
        $userToto->setLoyaltyDiscount($faker->randomFloat(2, 0.00, 1.00));
        $manager->persist($userToto);
        $manager->flush();
    }
}
