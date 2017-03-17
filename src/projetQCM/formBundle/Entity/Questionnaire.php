<?php

namespace projetQCM\formBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Questionnaire
 *
 * @ORM\Table(name="questionnaire")
 * @ORM\Entity(repositoryClass="projetQCM\formBundle\Repository\QuestionnaireRepository")
 */
class Questionnaire
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;


    /**
     * @ORM\ManyToOne(targetEntity="Formulaire", inversedBy="questionnaires")
     * @ORM\JoinColumn(name="formulaire_id", referencedColumnName="id")
     */
    private $formulaire;



    /**
     * @ORM\OneToMany(targetEntity="Reponse", mappedBy="questionnaire")
     */
    private $reponses;

    public function __construct()
    {
        $this->reponses = new ArrayCollection();
    }




    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set titre
     *
     * @param string $titre
     *
     * @return Questionnaire
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Add reponse
     *
     * @param \projetQCM\formBundle\Entity\Reponse $reponse
     *
     * @return Questionnaire
     */
    public function addReponse(\projetQCM\formBundle\Entity\Reponse $reponse)
    {
        $this->reponses[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \projetQCM\formBundle\Entity\Reponse $reponse
     */
    public function removeReponse(\projetQCM\formBundle\Entity\Reponse $reponse)
    {
        $this->reponses->removeElement($reponse);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponses()
    {
        return $this->reponses;
    }

    /**
     * Set formulaire
     *
     * @param \projetQCM\formBundle\Entity\Formulaire $formulaire
     *
     * @return Questionnaire
     */
    public function setFormulaire(\projetQCM\formBundle\Entity\Formulaire $formulaire = null)
    {
        $this->formulaire = $formulaire;

        return $this;
    }

    /**
     * Get formulaire
     *
     * @return \projetQCM\formBundle\Entity\Formulaire
     */
    public function getFormulaire()
    {
        return $this->formulaire;
    }
}