<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    /**
     * @Route ("/accueil", name="accueil_sortie")
     */
    public function accueil()
    {
        return $this->render('main/home.html.twig');
    }
}