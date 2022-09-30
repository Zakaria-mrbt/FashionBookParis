<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TrainingProfilController extends AbstractController
{
    #[Route('/training/profil', name: 'app_training_profil')]
    public function index(): Response
    {
        return $this->render('training_profil/index.html.twig', [
            'controller_name' => 'TrainingProfilController',
        ]);
    }
}
