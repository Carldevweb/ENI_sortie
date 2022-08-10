<?php

namespace App\Controller;


use App\Form\FormulaireProfilType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;

class ProfilController extends AbstractController
{
    /**
     * @Route("/profil", name="profil_utilisateur")
     */
    public function profil(
        Request $request,
        EntityManagerInterface $entityManager,
        UserPasswordHasherInterface $hasher,
        SluggerInterface $slugger): Response
    {
        $profil = $this->getUser();
        $profilForm = $this -> createForm(FormulaireProfilType::class, $profil);


        $profilForm->handleRequest($request);


            if ($profilForm ->isSubmitted() && $profilForm->isValid())
            {
                $file = $profilForm->get('maPhoto')->getData();

                if ($file){
                    $originalFileName = pathinfo($file->getClientOriginalName
                    (), PATHINFO_FILENAME);

                    $safeFilename = $slugger->slug($originalFileName);

                    $newFileName = $safeFilename.".".uniqid().".".$file->guessExtension();

                    try{
                        $file->move(
                            $this->getParameter('avatar_directory'),
                            $newFileName
                        );
                    } catch (FileException $e){

                    }

                    $profil->setMaPhoto($newFileName);

                }


            $motDePasse = $hasher ->hashPassword($profil, $profilForm->get("password")->getData());
            $profil->setPassword($motDePasse);
            $entityManager->persist($profil);
            $entityManager->flush();
            }

        return $this->render('sortie/profil.html.twig',
            [
            'profilForm' => $profilForm->createView(),
            'profil' => $profil,
            ]);
    }


}
