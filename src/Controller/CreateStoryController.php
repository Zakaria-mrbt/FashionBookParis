<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateStoryController extends AbstractController
{
    #[Route('/create/story', name: 'app_create_story')]
    public function index(): Response
    {
        return $this->render('create_story/index.html.twig', [
            'controller_name' => 'CreateStoryController',
        ]);
    }
}
