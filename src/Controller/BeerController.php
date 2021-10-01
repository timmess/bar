<?php

namespace App\Controller;

use App\Entity\Beer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    /**
     * @Route("/beer/{id}", name="beer")
     */
    public function index(Beer $beer): Response
    {
        return $this->render('beer/index.html.twig', [
            'beer' => $beer
        ]);
    }
}
