<?php

namespace App\Controller;

use App\Entity\Beer;
use App\Entity\Category;
use App\Entity\Country;
use App\Repository\BeerRepository;
use App\Repository\CategoryRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BarController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(BeerRepository $repo): Response
    {
        $beers = $repo->findAll();
        return $this->render('bar/index.html.twig', [
            'beers' => $beers
        ]);
    }

    public function mainMenu(CategoryRepository $categoryRepository): Response
    {
        $categories = $categoryRepository->findBy(['term' => 'normal']);

        return $this->render('menu/menu.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/country/{id}", name="beers_by_country")
     */
    public function beersByCountry(Country $country): Response
    {
        return $this->render('bar/beers_by_country.html.twig', [
            'country' => $country,
            'beers' => $country->getBeers() ?? [],
        ]);
    }

    /**
     * @Route("/category/{id}", name="beers_by_category")
     */
    public function beersByCategory(Category $category): Response
    {
        return $this->render('bar/beers_by_category.html.twig', [
            'category' => $category,
            'beers' => $category->getBeer() ?? [],
        ]);
    }
}
