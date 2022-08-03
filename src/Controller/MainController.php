<?php

namespace App\Controller;

use App\Entity\Login;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil_login")
     */
    public function accueil()
    {
        $login = new Login();
        $utilisateurForm = $this->createForm(UserType::class, $login);

        return $this->render('main/login.html.twig', [
            'utilisateurForm' =>$utilisateurForm->createView()
        ]);

    }
    /**
     * @Route("/mdp", name="oublie_mdp")
     */
    public function mdp()
    {
        return $this->render('main/forgottenMdp.html.twig');
    }

}