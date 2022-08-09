<?php

namespace App\Controller;

use App\Entity\ProfilUtilisateur;
use App\Form\FormulaireProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Form;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil_utilisateur")
     */
    public function profil(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $hasher
    ): Response
    {
        $profil = new ProfilUtilisateur();
        $profilForm = $this -> createForm(FormulaireProfilType::class, $profil);

        dump($profilForm);
        $profilForm->handleRequest($request);
        dump($profilForm);

            if ($profilForm ->isSubmitted())
            {
            $motDePasse = $hasher ->hashPassword($profil, $profilForm->get("MotDePasse")->getData());
            $profil->setMotDePasse($motDePasse);
            $entityManager->persist($profil);
            $entityManager->flush();
            }

        return $this->render('sortie/profil.html.twig',
            [
            'profilForm' => $profilForm->createView()
            ]);
    }
}
