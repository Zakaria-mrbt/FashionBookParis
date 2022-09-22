<?php

namespace App\Controller;

use App\Entity\Profil;
use App\Form\ProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfilController extends AbstractController
{
    #[Route('/profil', name: 'app_profil')]
    public function index(EntityManagerInterface $entityManager, Request $request,): Response
    {
        $profil = new Profil();
        $form = $this->createForm(ProfilType::class, $profil);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
           

            $entityManager->persist($profil);
            $entityManager->flush();


            return $this->redirectToRoute('app_profil');
        }

        return $this->render('profil/index.html.twig', [
            'profil' => $form->createView(),
        ]);
    }
}
