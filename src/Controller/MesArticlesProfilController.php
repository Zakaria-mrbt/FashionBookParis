<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesArticlesProfilController extends AbstractController
{
    #[Route('/mes/articles/profil', name: 'app_mes_articles_profil')]
    public function index(): Response
    {
        return $this->render('mes_articles_profil/index.html.twig', [
            'controller_name' => 'MesArticlesProfilController',
        ]);
    }
}
