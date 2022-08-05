<?php

namespace App\Controller;

use App\Entity\ProfilUtilisateur;
use App\Form\FormulaireProfilType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil_utilisateur")
     */
    public function profil(): Response
    {
        $profil = new ProfilUtilisateur();
        $profilForm = $this -> createForm(FormulaireProfilType::class, $profil);


        return $this->render('sortie/profil.html.twig', [
            'profilForm' => $profilForm->createView()
        ]);
    }
}
