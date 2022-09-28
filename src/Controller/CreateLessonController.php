<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CreateLessonController extends AbstractController
{
    #[Route('/create/lesson', name: 'app_create_lesson')]
    public function index(): Response
    {
        return $this->render('create_lesson/index.html.twig', [
            'controller_name' => 'CreateLessonController',
        ]);
    }
}
