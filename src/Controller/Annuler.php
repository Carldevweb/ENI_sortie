<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Annuler extends AbstractController
{
    /**
     * @Route("/annuler", name="annuler")
     */
    public function annuler()
    {
        return $this->render('main/annuler.html.twig');
    }
}
