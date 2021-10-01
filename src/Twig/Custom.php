<?php

namespace App\Twig;

use App\Entity\Beer;
use Doctrine\Persistence\ObjectManager;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

class Custom extends AbstractExtension
{
    private $manager;

    public function __construct(ObjectManager $manager){
        $this->manager = $manager;
    }

    public function getFilters()
    {
//        return parent::getFilters(); // TODO: Change the autogenerated stub

        return [
            new TwigFilter('avg', function (array $numbers){
                return array_sum($numbers);
            })
        ];
    }


    public function getFunctions()
    {
//        return parent::getFunctions(); // TODO: Change the autogenerated stub

        return [
            new TwigFunction('special', function (Beer $beer){
                return $this->manager->getRepository(Beer::class)->findByCatTerm('special', $beer->getId());
            }),
            new TwigFunction('normal', function (Beer $beer){
                return $this->manager->getRepository(Beer::class)->findByCatTerm('normal', $beer->getId());
            }),
        ];
    }

}