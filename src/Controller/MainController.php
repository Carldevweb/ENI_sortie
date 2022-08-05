<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    /**
     * @Route("/mdp", name="oublie_mdp")
     */
    public function mdp()
    {
        return $this->render('main/forgottenMdp.html.twig');
    }
    /**
     * @Route ("/rechercher", name="recherche_sortie")
     */
    public function rechercher()
    {
        return $this->render('main/home.html.twig');
    }
}
