<?php

namespace webStudent\EntrepriseBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('webStudentEntrepriseBundle:Default:index.html.twig', array('name' => $name));
    }
}
