<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Entity\Sortie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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
    public function rechercher(Request $request, ManagerRegistry $doctrine)
    {

        $parameters = $request->request;
        $campusList = $doctrine
            ->getRepository(Campus::class)
            ->findAll();
        dump('amasd', $parameters);
        if($parameters->get('startDate') != "") {
            $campusId = $doctrine->getRepository(Campus::class)->findOneBy(['nom' => $parameters->get('campus')]);
            dump($campusId);
            if($campusId) {
                $fetchData = $doctrine->getRepository(Sortie::class)->getOuts(
                    $campusId->getId(),$parameters->get('startDate'), $parameters->get('endDate'),$parameters->get('outName')
                );
                dump($fetchData);
                return $this->render('main/search.html.twig', [
                    'data'=>  $fetchData,
                    'campusList' => $campusList
                ]);
            }
        }
        $campusList = $doctrine
            ->getRepository(Campus::class)
            ->findAll();
        $sortiesList = $doctrine
            ->getRepository(Sortie::class)
            ->findAll();
        return $this->render('main/search.html.twig', [
            'data'=>  $sortiesList,
            'campusList' => $campusList
        ]);
    }




}
