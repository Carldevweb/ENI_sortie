<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
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
     * @Route("/creerSortie", name="")
     */
    public function index(): Response
    {
        return $this->render('main/home.html.twig');

    }

}