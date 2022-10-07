<?php

namespace App\Controller;



use App\Entity\User;
use App\Entity\Profil;
use App\Form\UserType;
use App\Form\Profil1Type;
use App\Repository\UserRepository;
use App\Repository\ProfilRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{   
    #[Route('/', name: 'app_home')]
    public function index(): Response
    {
        // User
        #[Route('/', name: 'app_user_index', methods: ['GET'])]
        public function index(UserRepository $userRepository): Response
        {
            return $this->render('user/index.html.twig', [
                'users' => $userRepository->findAll(),
            ]);
        }
    
        #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
        public function new(Request $request, UserRepository $userRepository): Response
        {
            $user = new User();
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $userRepository->add($user, true);
    
                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->renderForm('user/new.html.twig', [
                'user' => $user,
                'form' => $form,
            ]);
        }
    
        #[Route('/{id}', name: 'app_user_show', methods: ['GET'])]
        public function show(User $user): Response
        {
            return $this->render('user/show.html.twig', [
                'user' => $user,
            ]);
        }
    
        #[Route('/{id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
        public function edit(Request $request, User $user, UserRepository $userRepository): Response
        {
            $form = $this->createForm(UserType::class, $user);
            $form->handleRequest($request);
    
            if ($form->isSubmitted() && $form->isValid()) {
                $userRepository->add($user, true);
    
                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            }
    
            return $this->renderForm('user/edit.html.twig', [
                'user' => $user,
                'form' => $form,
            ]);
        }
    
        #[Route('/{id}', name: 'app_user_delete', methods: ['POST'])]
        public function delete(Request $request, User $user, UserRepository $userRepository): Response
        {
            if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
                $userRepository->remove($user, true);
            }
            // User
            // profil
            #[Route('/', name: 'app_profil_index', methods: ['GET'])]
            public function index(ProfilRepository $profilRepository): Response
            {
                return $this->render('profil/index.html.twig', [
                    'profils' => $profilRepository->findAll(),
                ]);
            }
        
            #[Route('/new', name: 'app_profil_new', methods: ['GET', 'POST'])]
            public function new(Request $request, ProfilRepository $profilRepository): Response
            {
                $profil = new Profil();
                $form = $this->createForm(Profil1Type::class, $profil);
                $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
                    $profilRepository->add($profil, true);
        
                    return $this->redirectToRoute('app_profil_index', [], Response::HTTP_SEE_OTHER);
                }
        
                return $this->renderForm('profil/new.html.twig', [
                    'profil' => $profil,
                    'form' => $form,
                ]);
            }
        
            #[Route('/{id}', name: 'app_profil_show', methods: ['GET'])]
            public function show(Profil $profil): Response
            {
                return $this->render('profil_/show.html.twig', [
                    'profil' => $profil,
                ]);
            }
        
            #[Route('/{id}/edit', name: 'app_profil_edit', methods: ['GET', 'POST'])]
            public function edit(Request $request, Profil $profil, ProfilRepository $profilRepository): Response
            {
                $form = $this->createForm(Profil1Type::class, $profil);
                $form->handleRequest($request);
        
                if ($form->isSubmitted() && $form->isValid()) {
                    $profilRepository->add($profil, true);
        
                    return $this->redirectToRoute('app_profil_c_index', [], Response::HTTP_SEE_OTHER);
                }
        
                return $this->renderForm('profil_c/edit.html.twig', [
                    'profil' => $profil,
                    'form' => $form,
                ]);
            }
        
            #[Route('/{id}', name: 'app_profil_c_delete', methods: ['POST'])]
            public function delete(Request $request, Profil $profil, ProfilRepository $profilRepository): Response
            {
                if ($this->isCsrfTokenValid('delete'.$profil->getId(), $request->request->get('_token'))) {
                    $profilRepository->remove($profil, true);
                }
            //profil


        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController', ]);
    }
}

