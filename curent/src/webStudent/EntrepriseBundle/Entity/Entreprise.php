<?php

namespace webStudent\EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entreprise
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="webStudent\EtudiantBundle\Entity\EntrepriseRepository")
 */
class Entreprise
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
     * @ORM\Column(name="raison_social", type="string", length=255)
     */
    private $raisonSocial;

    /**
     * @var string
     *
     * @ORM\Column(name="rue", type="string", length=255)
     */
    private $rue;

    /**
     * @var string
     *
     * @ORM\Column(name="code_postal", type="string", length=10)
     */
    private $codePostal;

    /**
     * @var string
     *
     * @ORM\Column(name="ville", type="string", length=100)
     */
    private $ville;

    /**
     * @var string
     *
     * @ORM\Column(name="telephone", type="string", length=20)
     */
    private $telephone;

    /**
     * @var string
     *
     * @ORM\Column(name="mail", type="string", length=100)
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
     * Set raisonSocial
     *
     * @param string $raisonSocial
     * @return Entreprise
     */
    public function setRaisonSocial($raisonSocial)
    {
        $this->raisonSocial = $raisonSocial;
    
        return $this;
    }

    /**
     * Get raisonSocial
     *
     * @return string 
     */
    public function getRaisonSocial()
    {
        return $this->raisonSocial;
    }

    /**
     * Set rue
     *
     * @param string $rue
     * @return Entreprise
     */
    public function setRue($rue)
    {
        $this->rue = $rue;
    
        return $this;
    }

    /**
     * Get rue
     *
     * @return string 
     */
    public function getRue()
    {
        return $this->rue;
    }

    /**
     * Set codePostal
     *
     * @param string $codePostal
     * @return Entreprise
     */
    public function setCodePostal($codePostal)
    {
        $this->codePostal = $codePostal;
    
        return $this;
    }

    /**
     * Get codePostal
     *
     * @return string 
     */
    public function getCodePostal()
    {
        return $this->codePostal;
    }

    /**
     * Set ville
     *
     * @param string $ville
     * @return Entreprise
     */
    public function setVille($ville)
    {
        $this->ville = $ville;
    
        return $this;
    }

    /**
     * Get ville
     *
     * @return string 
     */
    public function getVille()
    {
        return $this->ville;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     * @return Entreprise
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;
    
        return $this;
    }

    /**
     * Get telephone
     *
     * @return string 
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set mail
     *
     * @param string $mail
     * @return Entreprise
     */
    public function setMail($mail)
    {
        $this->mail = $mail;
    
        return $this;
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
}
