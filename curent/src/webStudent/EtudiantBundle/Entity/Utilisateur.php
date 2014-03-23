<?php

namespace webStudent\EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Utilisateur
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="webStudent\EtudiantBundle\Entity\UtilisateurRepository")
 *
 * @ORM\InheritanceType("JOINED")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"etudiant" = "Etudiant", "enseignant" = "Enseignant"})
 * 
 */
class Utilisateur
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=5)
     */
    private $code;
	
	 /**
     * @ORM\ManyToOne(targetEntity="webStudent\EtudiantBundle\Entity\Section",inversedBy="utilisateurs"))
     * @ORM\JoinColumn(nullable=false)
     */
	private $section;
	  
	 /**
     * @var string
	 *
     * @ORM\Column(name="nom", type="string", length=20)
     */
	 
	 private $nom;
	 
	 	 /**
     * @var string
	 *
     * @ORM\Column(name="prenom", type="string", length=20)
     */
	 
	 private $prenom;

         /**
     * @var string
     *
     * @ORM\Column(name="adresse", type="string", length=100)
     */
     
     private $adresse;
	 
	          /**
     * @var string
     *
     * @ORM\Column(name="tel", type="string", length=20)
     */
     
     private $tel;
	 
	 	          /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=50)
     */
     
     private $mail;
    /**
     * Get id
     *
     * @return integer 
     */
	
    public function getId()
    {
        return $this->id;
    }

        /**
     * Get adresse
     *
     * @return string
     */
    
    public function getAdresse()
    {
        return $this->adresse;
    }
		        /**
     * Get tel
     *
     * @return string
     */
    
    public function getTel()
    {
        return $this->tel;
    }
	
			        /**
     * Get mail
     *
     * @return string
     */
    
    public function getMail()
    {
        return $this->mail;
    }

    /**
     * Set adresse
     *
     * @param string $adresse
     * @return Utilisateur
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;
    
        return $this;
    }
	
	 /**
     * Set tel
     *
     * @param string $tel
     * @return Utilisateur
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    
        return $this;
    }
	
		 /**
     * Set tel
     *
     * @param string $tel
     * @return Utilisateur
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Utilisateur
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set section
     *
     * @param \webStudent\EtudiantBundle\Entity\Section $section
     * @return Utilisateur
     */
    public function setSection(\webStudent\EtudiantBundle\Entity\Section $section)
    {
        $this->section = $section;
    
        return $this;
    }

    /**
     * Get section
     *
     * @return \webStudent\EtudiantBundle\Entity\Section 
     */
    public function getSection()
    {
        return $this->section;
    }
	
	    /**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=20)
     */
    public function getNom()
    {
        return $this->nom;
    }


    /**
     * Set nom
     *
     * @param string $nom
     * @return Utilisateur
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     * @return Utilisateur
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    
        return $this;
    }

    /**
     * Get prenom
     *
     * @return string 
     */
    public function getPrenom()
    {
        return $this->prenom;
    }
}