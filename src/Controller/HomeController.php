<?php

namespace App\Controller;

use App\Repository\ThematiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(ThematiqueRepository $repository): Response
    {
        $thematiques = $repository->findAll();
        return $this->render('home/index.html.twig', [
            "thematiques" => $thematiques
        ]);
    }
}
