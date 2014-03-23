<?php

namespace webStudent\StageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('webStudentStageBundle:Default:index.html.twig', array('name' => $name));
    }
}
