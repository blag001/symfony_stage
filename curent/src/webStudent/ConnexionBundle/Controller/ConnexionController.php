<?php

namespace webStudent\ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use webStudent\EntrepriseBundle\Entity\Connexion;
use webStudent\EntrepriseBundle\Form\ConnexionType;

class ConnexionController extends Controller
{
    public function indexAction()
    {
        //return $this->render('webStudentEntrepriseBundle:Default:index.html.twig', array('name' => $name));
		return $this->render('webStudentEntrepriseBundle:Entreprise:index.html.twig');
    }

        // toutes en entreprises
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
        // consulter une entreprise
    public function consulterAction($id)
    {
        $repository = $this->getDoctrine()
            ->getManager()
            ->getRepository('webStudentEntrepriseBundle:Entreprise');

        // On récupère l'entité correspondant à l'id $id
        $entreprise = $repository->find($id);

        // Ou null si aucune entreprise n'a été trouvé avec l'id $id
        if($entreprise === null){
            throw $this->createNotFoundException('Entreprise[id='.$id.'] inexistant.');
        }

        return $this->render('webStudentEntrepriseBundle:Entreprise:consulter.html.twig',
            array(
                'raisonSocial'   => $entreprise->getRaisonSocial(),
                'rue'            => $entreprise->getRue(),
                'codePostal'     => $entreprise->getCodePostal(),
                'ville'          => $entreprise->getVille(),
                'telephone'      => $entreprise->getTelephone(),
                'mail'           => $entreprise->getMail(),
                )
            );
    }
        // ajouter une entreprise
    public function ajouterEntrepriseAction()
    {
        $entreprise = new Entreprise ();
        $form = $this->createForm(new EntrepriseType, $entreprise);

        /**
        *** INSTRUCTIONS DE SOUMISSION DU FORMULAIRE
        **/

        // 1. On récupère la requête HTTP
        $request = $this->get('request');

        // 2. On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // 3. On fait le lien Requête <-> Formulaire
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes
            if ($form->isValid()) {
                // On enregistre notre objet $etudiant dans la base de données
                $em = $this->getDoctrine()->getManager();
                $em->persist($entreprise);
                $em->flush();

                // On redirige vers la page de visualisation de l'article nouvellement créé
                return $this->redirect($this->generateUrl('Entreprise_consulter', array('id' => $entreprise->getId())));
            }
        }

        // À ce point là :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire n'est pas valide, donc on l'affiche de nouveau

        return $this->render('webStudentEntrepriseBundle:Entreprise:ajouterEntreprise.html.twig', array(
            'form' => $form->createView(),
            ));
    }

}
