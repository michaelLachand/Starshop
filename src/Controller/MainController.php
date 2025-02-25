<?php

namespace App\Controller;

use App\Repository\StarshipRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class MainController extends AbstractController
{
    #[Route('/')]
    public function homepage(
        StarshipRepository $starshipRepository,
    ): Response
    {

        $ships = $starshipRepository->findAll();
        $myShip = $ships[array_rand($ships)];

        return $this->render('main/homepage.html.twig', [
            'myShip' => $myShip,
            'ships' => $ships,
        ]);
    }
}