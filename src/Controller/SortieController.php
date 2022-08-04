<?php

namespace App\Controller;

use App\Entity\CreerSortie;
use App\Form\CreerSortieType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/sortie", name="sortie_creer")
     */
    public function sortie(): Response
    {
        $sortie = new CreerSortie();
        $sortieForm = $this->createForm(CreerSortieType::class, $sortie);


        return $this->render('sortie/creersortie.html.twig', [
            'sortieForm' => $sortieForm->createView()
        ]);
    }
}
