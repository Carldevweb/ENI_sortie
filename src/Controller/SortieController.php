<?php

namespace App\Controller;


use App\Entity\Campus;
use App\Entity\Lieu;
use App\Entity\Sortie;
use App\Entity\Ville;
use App\Form\CampusType;
use App\Form\LieuType;
use App\Form\SortieType;
use App\Form\VilleType;
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
        $sortie = new Sortie();
        $sortieForm = $this->createForm(SortieType::class, $sortie);

        $campus = new Campus();
        $campusForm = $this->createForm(CampusType::class, $campus);

        $lieu = new Lieu();
        $lieuForm = $this->createForm(LieuType::class, $lieu);

        $ville = new Ville();
        $villeForm = $this->createForm(VilleType::class, $ville);

        return $this->render('sortie/creersortie.html.twig', [
            'sortieForm' => $sortieForm->createView(),
            'campusForm' => $campusForm->createView(),
            'lieuForm' => $lieuForm->createView(),
            'villeForm' => $villeForm->createView()
        ]);
    }
}
