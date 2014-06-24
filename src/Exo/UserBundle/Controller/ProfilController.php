<?php

namespace Exo\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Exo\UserBundle\Form\InfoProType;
use Exo\UserBundle\Entity\InfoPro;

class ProfilController extends Controller
{
    public function voirAction($id)
    {
        $user = $this->getUser();
        $userId = $user->getId();

        //verif qu'il ne change pas l'url pour accéder à un autre profil
        if ($userId != $id)
        {
            throw $this->createNotFoundException('Ce n\'est pas votre profil bien tenter !');
        }
        else
        {
            //recherche du profil
            $profil = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('ExoUserBundle:InfoPro')
                           ->find($id);

            return $this->render('ExoUserBundle:infoPro:info_pro.html.twig', array(
                'profil' => $profil,
                'user'   => $user
            ));
        }
    }


    public function modifierAction($id)
    {
        //récupération de l'utilisateur en cours
        $user = $this->getUser();
        $userId = $user->getId();

        if ($userId != $id)
        {
            throw $this->createNotFoundException('Ce n\'est pas votre profil bien tenter !');
        }
        else
        {
            //recherche du profil
            $profil = $this->getDoctrine()
                           ->getManager()
                           ->getRepository('ExoUserBundle:InfoPro')
                           ->find($id);

            //création du formulaire pour modifier le profil
            $form = $this->createForm(new InfoProType, $profil);

            //on vérifie quel type de requête on envoit
            $request = $this->get('request');

            if ($request->getMethod() == 'POST')
            {
                $form->bind($request);

                if ($form->isValid()) {

                    $em = $this->getDoctrine()->getManager();
                    $em->persist($profil);
                    $em->flush();

                    return $this->redirect($this->generateUrl('voir_profil', array('id' => $userId)));
                }
            }

            return $this->render('ExoUserBundle:infoPro:info_pro_contenu.html.twig', array(
                'form'  =>$form->createView(),
                'user'  => $user
            ));
        }
    }
}