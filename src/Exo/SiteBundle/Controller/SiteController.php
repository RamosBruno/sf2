<?php

namespace Exo\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SiteController extends Controller
{
    public function indexAction()
    {
        $user = $this->getUser();

        return $this->render('ExoSiteBundle:Site:index.html.twig', array('user' => $user));
    }


}