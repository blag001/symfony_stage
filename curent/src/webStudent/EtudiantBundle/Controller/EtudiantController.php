<?php

namespace webStudent\EtudiantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use webStudent\EtudiantBundle\Entity\Section;
use webStudent\EtudiantBundle\Entity\Utilisateur;
use webStudent\EtudiantBundle\Entity\Etudiant;

class EtudiantController extends Controller
{
    public function indexAction()
    {
        //return $this->render('webStudentEtudiantBundle:Default:index.html.twig', array('name' => $name));
		return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');
    }
	    public function aurevoirAction($name)
    {
        //return $this->render('webStudentEtudiantBundle:Default:index.html.twig', array('name' => $name));
		return $this->render('webStudentEtudiantBundle:Etudiant:aurevoir.html.twig');
    }
	public function consulterAction($id)
    {
    // $id vaut 5 si l'on a appelé l'URL /Etudiant/stage/5
    // Ici, on récupèrera depuis la base de données l'étudiant correspondant à l'id $id
    // Puis on passera l'etudiant à la vue pour qu'elle puisse l'afficher
    return new Response("Affichage de l'étudiant d'id : ".$id.".");
    }
	
	public function afficherAction($promo,$id)
    {
    return new Response("Affichage de l'étudiant d'id : ".$id."Affichage de la promo de l'étudiant:".$promo);
    }


	public function ajouterSectionAction()
{
   	// Etape 0 – creation de l'objet Section
	$section = new Section();
   	$section->setCode('SIO');
   	$section->setLibelle('BTS Services informatique aux organisations');


	// Etape 1 On récupère l'EntityManager
  	 $em = $this->getDoctrine()->getManager();
 
	// Étape 2 : On « persiste » l'entité
    	$em->persist($section);
   
  	 // Étape 3 : On « flush » tout ce qui a été persisté avant
   	 $em->flush();
   
	return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');
	}
	public function consulterSectionAction($id)
{
	$repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('webStageEtudiantBundle:Section');

	// On récupère l'entité correspondant à l'id $id
	$section = $repository->find($id);

  	// Ou null si aucune section n'a été trouvé avec l'id $id
 	 if($section === null)
 	 {
   	 throw $this->createNotFoundException('Section[id='.$id.'] inexistant.');
  	}
     
  	return $this->render('webStageEtudiantBundle:Etudiant:index.html.twig', array(
   		 'id' => $section->getNom()
  		));
}
	public function ajouterEtudiantAction()
{
   	// Etape 0 – creation de l'objet Section
	$section = new Section();
   	$section->setCode('AM');
   	$section->setLibelle('Assistant Manager');
	$etudiant = new Etudiant();
   	$etudiant->setCode('123');
	$etudiant->setSection($section);
	$etudiant->setNom('Phillipe');
	$etudiant->setPrenom('Viens ici');


	// Etape 1 On récupère l'EntityManager
  	 $em = $this->getDoctrine()->getManager();
 
	// Étape 2 : On « persiste » l'entité
	$em->persist($section);
    	$em->persist($etudiant);
   
  	 // Étape 3 : On « flush » tout ce qui a été persisté avant
   	 $em->flush();
   
	return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig');
	}
	public function findAction($nom)
	{
		$repository = $this->getDoctrine()
						   ->getManager()
						   ->getRepository('webStudentEtudiantBundle:Etudiant');
		// Onrécupère l'entité correspondant à l'id $id
		$etudiant = $repository->rechercherEtudiant($nom);
		return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig', array(
		$etudiant = $repository->rechercherEtudiant($nom)
			));
	}
	public function showAction($id)
	{
		$etudiant = $this->getDoctrine()
			->getRepository('webStudentEtudiantBundle:Etudiant');
		if (!$etudiant){
			throw $this->createNotFoundException(
				'Aucun etudiant trouvé pour cet id:'.$id
			);
		}
		return $this->render('webStudentEtudiantBundle:Etudiant:index.html.twig', array(
		'id' => $id-getId()
			));
	}
public function consulterEtudiantAction()
{
	$repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('webStudentEtudiantBundle:etudiant');

    $listeEtudiants = $repository->findAll();
	//$etudiant = $repository;
     
  	return $this->render('webStudentEtudiantBundle:etudiant:ConsulterEtudiant.html.twig', array(
   		 'listeEtudiants' => $listeEtudiants
  		));
}
public function consulterEtudiantInfosAction($code)
{
	$repository = $this->getDoctrine()
                   ->getManager()
                   ->getRepository('webStudentEtudiantBundle:etudiant');
    $etudiant = $repository->findByCode($code);
     //var_dump($etudiant);
	//$etudiant = $repository;
     
  	return $this->render('webStudentEtudiantBundle:etudiant:ConsulterInfosEtudiant.html.twig', array(
   		 'etudiant' => $etudiant
  		));
}
}