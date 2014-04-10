<?php

namespace webStudent\ConnexionBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use webStudent\ConnexionBundle\Entity\Membre;
use webStudent\ConnexionBundle\Form\ConnexionType;

class ConnexionController extends Controller
{
    public function indexAction()
    {
        $membre = new Membre ();
        $form = $this->createForm(new ConnexionType, $membre);

        // 1. On récupère la requête HTTP
        $request = $this->get('request');

        // 2. On vérifie qu'elle est de type POST
        if ($request->getMethod() == 'POST') {
            // 3. On fait le lien Requête <-> Formulaire
            $form->bind($request);

            // On vérifie que les valeurs entrées sont correctes
            if ($form->isValid()) {
                // on va chercher en BDD si on a un membre
        		$odbMembre = $this->getDoctrine()
                    ->getManager()
                    ->getRepository('webStudentConnexionBundle:Membre');

                // On récupère l'entité correspondant à le login $login
                $leMembre = $odbMembre->findOneBy(
                    array(
                        'login'=>$membre->getLogin(),
                        'password'=>$membre->getPassword(),
                        );

                // si on a un membre valide on redirige
                if($membre !== null){
                    return $this->redirect($this->generateUrl('Stage_accueil'));
                }
            }
        }

        // si on a pas quite la fonction avant, on affiche le form de connexion
        return $this->render('webStudentConnexionBundle:Connexion:connexion.html.twig',
            array(
                'form' => $form->createView(),
            ) );
    }

}
