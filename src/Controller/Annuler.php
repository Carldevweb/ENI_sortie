<?php

namespace App\Controller;

use App\Entity\Campus;
use App\Entity\Sortie;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Annuler extends AbstractController
{
    /**
     * @Route("/annuler/{id}", name="annuler")
     */
    public function annuler($id, ManagerRegistry $registry)
    {
        $sortie = $registry->getRepository(Sortie::class)->findById($id);
        $campu = $sortie[0]->getCampus();
        $campus = $registry->getRepository(Campus::class)->findById($campu->getId());
        return $this->render('main/annuler.html.twig', [
            'sortie' => $sortie[0],
            'campus' => $campus[0]
        ]);
    }
}
