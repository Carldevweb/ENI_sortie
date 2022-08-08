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
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SortieController extends AbstractController
{
    /**
     * @Route("/sortie", name="sortie_creer")
     */
    public function sortie(
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
        $sortie = new Sortie();
        $sortieForm = $this->createForm(SortieType::class, $sortie);

        $campus = new Campus();
        $campusForm = $this->createForm(CampusType::class, $campus);

        $lieu = new Lieu();
        $lieuForm = $this->createForm(LieuType::class, $lieu);

        $ville = new Ville();
        $villeForm = $this->createForm(VilleType::class, $ville);

        $sortieForm->handleRequest($request);
        $campusForm->handleRequest($request);
        $lieuForm->handleRequest($request);
        $villeForm->handleRequest($request);


        if($sortieForm->isSubmitted()){
            $entityManager->persist($sortie);
            $entityManager->persist($campus);
            $entityManager->persist($lieu);
            $entityManager->persist($ville);
            $entityManager->flush();;
        }


        return $this->render('sortie/creersortie.html.twig', [

            'sortieForm' => $sortieForm->createView(),
            'campusForm' => $campusForm->createView(),
            'lieuForm' => $lieuForm->createView(),
            'villeForm' => $villeForm->createView()
        ]);
    }
}
