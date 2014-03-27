<?php

namespace webStudent\StageBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use webStudent\StageBundle\Entity\Stage;
use webStudent\StageBundle\Form\StageType;

class StageController extends Controller
{
    public function indexAction()
    {
        //return new Response("Salut tout le monde stage");
		return $this->render('webStudentStageBundle:Stage:index.html.twig');
    }
	public function consulterAction($id)
    {
    	$repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('webStudentStageBundle:Stage');

	// On récupère l'entité correspondant à l'id $id
	$stage = $repository->find($id);

  	// Ou null si aucun stage n'a été trouvé avec l'id $id
 	 if($stage === null)
 	 {
   	 throw $this->createNotFoundException('Stage[id='.$id.'] inexistant.');
  	}
     
  	return $this->render('webStudentStageBundle:Stage:consulter.html.twig', array('mission' => $stage->getMission(),
   		 'note' => $stage->getNote(), 'dateDebut' => $stage->getDateDebut(), 'dateFin' => $stage->getDateFin()
  		));
}
    
	
	public function consulterStageAction()
{
	$repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('webStudentStageBundle:Stage');

    $listeStages = $repository->findAll();
	//$stage = $repository;
     
  	return $this->render('webStudentStageBundle:Stage:ConsulterStage.html.twig', array(
   		 'listeStages' => $listeStages
  		));
}

public function ajouterStageAction()
{
	$stage = new Stage ();
	$form = $this->createForm(new StageType, $stage);
	
	/**
	***	INSTRUCTIONS DE SOUMISSION DU FORMULAIRE
	**/

	// 1. On récupère la requête HTTP
    	$request = $this->get('request');
   
    // 2. On vérifie qu'elle est de type POST
    if ($request->getMethod() == 'POST') {
      // 3. On fait le lien Requête <-> Formulaire
      // À partir de maintenant, la variable $etudiant contient les valeurs entrées dans le 	formulaire par le visiteur
      $form->bind($request);
 
      // On vérifie que les valeurs entrées sont correctes
      if ($form->isValid()) {
        // On enregistre notre objet $etudiant dans la base de données
        $em = $this->getDoctrine()->getManager();
        $em->persist($stage);
        $em->flush();
 
        // On redirige vers la page de visualisation de l'article nouvellement créé
  return $this->redirect($this->generateUrl('Stage_consulter', array('id' => $stage->getId())));
      }
    }
 
    // À ce point là :
    // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
    // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau
 
    return $this->render('webStudentStageBundle:Stage:ajouterStage.html.twig', array(
    'form' => $form->createView(),
   
     ));
  }

}
