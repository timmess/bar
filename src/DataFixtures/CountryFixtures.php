<?php

namespace App\DataFixtures;

use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class CountryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        //Country loop
        for($i = 0; $i < 5; $i++){
            $country = new Country();

            $country->setName($faker->country)
                    ->setEmail($faker->email)
                    ->setAddress($faker->address);

            $manager->persist($country);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}
