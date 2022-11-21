<?php

namespace App\DataFixtures;

use App\Entity\Offer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker\Factory;

class OfferFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $faker = Factory::create();

        for ($i=1; $i <= 365; $i++) { 
            $offer = new Offer();
            $offer->setDiscount($faker->randomFloat(2, 0.00, 1.00));
            $offer->setDayOfTheYear($i);
            $manager->persist($offer);
        }

        $manager->flush();
    }
}
