<?php

namespace App\DataFixtures;

use App\Entity\Beer;
use App\Entity\Client;
use App\Entity\Statistic;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class StatisticFixtures extends Fixture implements OrderedFixtureInterface
{

    /**
     * La table statistic a des relation MANYtoOne avec Beer et Client
     */

    public function load(ObjectManager $manager)
    {
        $clients = $manager->getRepository(Client::class)->findAll();
        $beers = $manager->getRepository(Beer::class)->findAll();

        foreach ($clients as $client){
            foreach ($beers as $beer){
                for ($n = 1; $n<101;$n++){
                    $statistic = new Statistic();
                    $statistic  ->setClient($client)
                                ->setBeer($beer)
                                ->setQuantity(rand(1,50))
                                ->setScore(rand(1,10));
                }
                $manager->persist($statistic);
            }


            $manager->flush();
        }
    }

    public function getOrder()
    {
        return 5;
    }
}
