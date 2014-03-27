<?php

namespace webStudent\StageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
class StageController extends Controller
{
    public function indexAction($name)
    {
        //return new Response("Salut tout le monde stage");
		return $this->render('webStudentStageBundle:Stage:index.html.twig');
    }
	public function consulterAction($id)
    {
    // $id vaut 5 si l'on a appelé l'URL /Etudiant/stage/5
    // Ici, on récupèrera depuis la base de données l'étudiant correspondant à l'id $id
    // Puis on passera l'etudiant à la vue pour qu'elle puisse l'afficher
    return new Response("Affichage du satge n°: ".$id.".");
    }
	
	public function consulterStageAction()
{
	$repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('webStudentStageBundle:Stage');

    $listeStages = $repository->findAll();
	//$etudiant = $repository;
     
  	return $this->render('webStudentStageBundle:Stage:ConsulterStage.html.twig', array(
   		 'listeStages' => $listeStages
  		));
}

}
