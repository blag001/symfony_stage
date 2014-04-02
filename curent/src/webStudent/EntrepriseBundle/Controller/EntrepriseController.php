<?php

namespace webStudent\EntrepriseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use webStudent\EntrepriseBundle\Entity\Entreprise;

class EntrepriseController extends Controller
{
    public function indexAction()
    {
        //return $this->render('webStudentEntrepriseBundle:Default:index.html.twig', array('name' => $name));
		return $this->render('webStudentEntrepriseBundle:Entreprise:index.html.twig');
    }

    public function consulterEntrepriseAction()
    {
        $repository = $this->getDoctrine()
                       ->getManager()
                       ->getRepository('webStudentEntrepriseBundle:Entreprise');

        $listeEntreprises = $repository->findAll();

        if ($listeEntreprises === null) {
           throw $this->createNotFoundException('Entreprise inexistant.');

        }

        return $this->render('webStudentEntrepriseBundle:Entreprise:ConsulterEntreprise.html.twig', array(
             'listeEntreprises' => $listeEntreprises
            ));
    }

}
