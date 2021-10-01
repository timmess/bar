<?php

namespace App\DataFixtures;

use App\Entity\Beer;
use App\Entity\Category;
use App\Entity\Country;
use App\Repository\CategoryRepository;
use App\Repository\CountryRepository;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class BeerFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();

        $countries = $manager->getRepository(Country::class)->findAll();

        // Beer loop
        for ($a = 0; $a < 20; $a++){
            $nb_country = rand(0,4);
            $price = rand(6,12);

            $beer = new Beer;

            $beer   ->setName($faker->word)
                    ->setDescription($faker->paragraph)
                    ->setCountry($countries[$nb_country])
                    ->setPublishedAt($faker->dateTime)
                    ->setPrice($price)
                    ->setPhoto("https://resize1.prod.docfr.doc-media.fr/s/1200/img/var/doctissimo/storage/images/fr/www/nutrition/famille-d-aliments/biere/biere-vertus/103637-3-fre-FR/biere-vertus.jpg");

            $manager->persist($beer);
        }

        $manager->flush();
    }

    public function getOrder()
    {
        return 2;
    }
}
