<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MediaProfilController extends AbstractController
{
    #[Route('/media/profil', name: 'app_media_profil')]
    public function index(): Response
    {
        return $this->render('media_profil/index.html.twig', [
            'controller_name' => 'MediaProfilController',
        ]);
    }
}
