<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\Beer;
use App\Entity\Country;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

//        $countries = [];
//
//        //Country loop
//        for($i = 0; $i < 5; $i++){
//            $country = new Country();
//
//            $country->setName($faker->country)
//                    ->setEmail($faker->email)
//                    ->setAddress($faker->address);
//
//            $manager->persist($country);
//
//            $countries[] = $country;
//        }

//        // Category loop
//        for($i = 0; $i < 5; $i++){
//            $category = new Category();
//
//            $category   ->setName($faker->word());
//            // Beer loop
//            for ($a = 0; $a < 3; $a++){
//                $nb_country = rand(0, 4);
//                $beer = new Beer;
//
//                $beer   ->setName($faker->word)
//                        ->setDescription($faker->paragraph)
//                        ->setCountry($countries[$nb_country])
//                        ->setPublishedAt($faker->dateTime);
//
//                $manager->persist($beer);
//                $category->addBeer($beer);
//            }
//            $manager->persist($category);
//        }

        $manager->flush();
    }
}
