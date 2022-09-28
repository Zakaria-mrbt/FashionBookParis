<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MonReseauController extends AbstractController
{
    #[Route('/mon/reseau', name: 'app_mon_reseau')]
    public function index(): Response
    {
        return $this->render('mon_reseau/index.html.twig', [
            'controller_name' => 'MonReseauController',
        ]);
    }
}
