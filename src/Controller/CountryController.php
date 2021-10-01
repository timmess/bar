<?php

namespace App\Controller;

use App\Repository\BeerRepository;
use App\Repository\CategoryRepository;
use App\Repository\CountryRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CountryController extends AbstractController
{
    /**
     * @Route("/country", name="home_country")
     */
    public function index(CountryRepository $repo): Response
    {
        $countries = $repo->findAll();
        return $this->render('country/index.html.twig', [
            'countries' => $countries,
        ]);
    }
}
