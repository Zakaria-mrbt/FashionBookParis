<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreatePublicationController extends AbstractController
{
    #[Route('/create/publication', name: 'app_create_publication')]
    public function index(): Response
    {
        return $this->render('create_publication/index.html.twig', [
            'controller_name' => 'CreatePublicationController',
        ]);
    }
}
