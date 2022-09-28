<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class JobsProfilController extends AbstractController
{
    #[Route('/jobs/profil', name: 'app_jobs_profil')]
    public function index(): Response
    {
        return $this->render('jobs_profil/index.html.twig', [
            'controller_name' => 'JobsProfilController',
        ]);
    }
}
