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


        $profilForm->handleRequest($request);


            if ($profilForm ->isSubmitted() && $profilForm->isValid())
            {

            $file = $profilForm->get('MaPhoto')->getData();
                if ($file){
                    $newFileName = $profil->getNom()."-".$profil->getId()."
                    .".$file->guessExtension();

                    $fileDirectory = $this->getParameter('upload_MaPhoto_Profil_dir');

                    $file->move($fileDirectory, $newFileName);

                    $profil->setMaPhoto($newFileName);
                }


            $motDePasse = $hasher ->hashPassword($profil, $profilForm->get("MotDePasse")->getData());
            $profil->setMotDePasse($motDePasse);
            $entityManager->persist($profil);
            $entityManager->flush();
            }

        return $this->render('sortie/profil.html.twig',
            [
            'profilForm' => $profilForm->createView(),
            'avatarPix' => $profil->getMaPhoto()
            ]);
    }
}
