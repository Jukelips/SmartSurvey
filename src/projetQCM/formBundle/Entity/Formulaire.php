<?php

namespace projetQCM\formBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formulaire
 *
 * @ORM\Table(name="formulaire")
 * @ORM\Entity(repositoryClass="projetQCM\formBundle\Repository\FormulaireRepository")
 */
class Formulaire
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
     * @ORM\Column(name="q", type="string", length=255)
     */
    private $q;

    /**
     * @var string
     *
     * @ORM\Column(name="r", type="string", length=255)
     */
    private $r;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    protected $title;


    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="formulaire")
     */
    protected $questions;


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
     * Set q
     *
     * @param string $q
     *
     * @return Formulaire
     */
    public function setQ($q)
    {
        $this->q = $q;

        return $this;
    }

    /**
     * Get q
     *
     * @return string
     */
    public function getQ()
    {
        return $this->q;
    }

    /**
     * Set r
     *
     * @param string $r
     *
     * @return Formulaire
     */
    public function setR($r)
    {
        $this->r = $r;

        return $this;
    }

    /**
     * Get r
     *
     * @return string
     */
    public function getR()
    {
        return $this->r;
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return Formulaire
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->questions = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add question
     *
     * @param \projetQCM\formBundle\Entity\Question $question
     *
     * @return Formulaire
     */
    public function addQuestion(\projetQCM\formBundle\Entity\Question $question)
    {
        $this->questions[] = $question;

        return $this;
    }

    /**
     * Remove question
     *
     * @param \projetQCM\formBundle\Entity\Question $question
     */
    public function removeQuestion(\projetQCM\formBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestions()
    {
        return $this->questions;
    }
}
