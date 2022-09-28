<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MesAnnoncesProfilController extends AbstractController
{
    #[Route('/mes/annonces/profil', name: 'app_mes_annonces_profil')]
    public function index(): Response
    {
        return $this->render('mes_annonces_profil/index.html.twig', [
            'controller_name' => 'MesAnnoncesProfilController',
        ]);
    }
}
