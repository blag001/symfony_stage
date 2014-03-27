<?php

namespace webStudent\EntrepriseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class EntrepriseController extends Controller
{
    public function indexAction()
    {
        //return $this->render('webStudentEntrepriseBundle:Default:index.html.twig', array('name' => $name));
		return $this->render('webStudentEntrepriseBundle:Entreprise:index.html.twig');
    }
    public function consulterEntrepriseAction()
    {
        //return $this->render('webStudentEntrepriseBundle:Default:index.html.twig', array('name' => $name));
		return $this->render('webStudentEntrepriseBundle:Entreprise:index.html.twig');
    }

}