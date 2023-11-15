<?php

namespace App\Controller;

use App\Repository\BeerRepository;
use App\Service\Proxy\BeerProxy;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BeerController extends AbstractController
{
    public function __construct(private BeerProxy $beerProxy)
    {}


    #[Route('/', name: 'app_beer')]
    /**
     * Main page of the application, printing all beer regardless sorting
     * @return Response
     */
    public function index(): Response
    {
        return $this->render('beer/index.html.twig', [
            'beers'=>$this->beerProxy->findAleBeers()
        ]);
    }
}
