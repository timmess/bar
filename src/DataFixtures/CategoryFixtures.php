<?php

namespace App\DataFixtures;

use App\Entity\Beer;
use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Persistence\ObjectManager;
use Faker;

class CategoryFixtures extends Fixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = Faker\Factory::create();
        $beers = $manager->getRepository(Beer::class)->findAll();

        // catégories normals
        $categoriesNormals = ['blonde', 'brune', 'blanche'];

        // catégories specials
        $categoriesSpecials = ['houblon', 'rose', 'menthe', 'grenadine', 'réglisse', 'marron', 'whisky', 'bio'] ;

        foreach ($categoriesNormals as $nmCat){
            $category = new Category();

            $category   ->setName($nmCat);

            foreach ($beers as $beer){
                $rand = rand(0,3);
                for ($rand; $rand<3; $rand++){
                    $beer->addCategory($category);
                }
            }

            $manager->persist($category);
        }

        foreach ($categoriesSpecials as $spCat){
            $category = new Category();

            $category   ->setName($spCat)
                        ->setTerm('special');

            foreach ($beers as $key => $beer){
                if($key % 3 == 0){
                    $beer->addCategory($category);
                }
            }

            $manager->persist($category);
        }


        $manager->flush();
    }

    public function getOrder()
    {
        return 3;
    }
}
