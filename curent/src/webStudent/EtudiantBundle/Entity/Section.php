<?php

namespace webStudent\EtudiantBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Section
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="webStudent\EtudiantBundle\Entity\SectionRepository")
 */
 
 
class Section
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
     * @ORM\Column(name="code", type="string", length=8)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=80)
     */
    private $libelle;

    /**
     * Get id
     *
     * @return integer 
     */
	 /**
	 *@ORM\OneToMany(targetEntity="webStudent\EtudiantBundle\Entity\Utilisateur",
mappedBy="Utilisateur")
	*@ORM\JoinColumn(nullable=false)
	*/
	private $utilisateurs;
	
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param string $code
     * @return Section
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
     * Set libelle
     *
     * @param string $libelle
     * @return Section
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    
        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->utilisateurs = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add utilisateurs
     *
     * @param \webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs
     * @return Section
     */
    public function addUtilisateur(\webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs)
    {
        $this->utilisateurs[] = $utilisateurs;
    
        return $this;
    }

    /**
     * Remove utilisateurs
     *
     * @param \webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs
     */
    public function removeUtilisateur(\webStudent\EtudiantBundle\Entity\Utilisateur $utilisateurs)
    {
        $this->utilisateurs->removeElement($utilisateurs);
    }

    /**
     * Get utilisateurs
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUtilisateurs()
    {
        return $this->utilisateurs;
    }
}