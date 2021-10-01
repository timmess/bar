<?php

namespace App\DataFixtures;

use App\Entity\Client;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class ClientFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        for ($i=1;$i<11;$i++){
            $client = new Client();
            $client ->setName($faker->name)
                    ->setEmail($faker->email)
                    ->setAge(rand(18,90))
                    ->setNumberBeer(rand(2,200))
                    ->setWeight(rand(60, 100));
            $manager->persist($client);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 4;
    }
}
