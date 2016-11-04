<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="argument")
 */
class Argument
{

    public function __construct()
    {
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="EZFunction", inversedBy="arguments")
     * @ORM\JoinColumn(name="cezfunction_id", referencedColumnName="id")
     */
    private $EZFunction;

    /**
    * @ORM\ManyToOne(targetEntity="FunctionType")
    * @ORM\JoinColumn(name="functiontype_id", referencedColumnName="id")
     */
    private $type;

    /**
     * @ORM\Column(name="Name", type="string", length=16)
     */
    private $name;

    /**
     * @ORM\Column(name="French_description", type="text")
     */
    private $french_description;

    /**
     * @ORM\Column(name="English_description", type="text")
     */
    private $english_description;

    /**
     * @ORM\Column(name="IsReturn", type="boolean")
     */
    private $isReturn;

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
     * Set idFonction
     *
     * @param integer $idFonction
     *
     * @return Argument
     */
    public function setIdFonction($idFonction)
    {
        $this->id_fonction = $idFonction;

        return $this;
    }

    /**
     * Get idFonction
     *
     * @return integer
     */
    public function getIdFonction()
    {
        return $this->id_fonction;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Argument
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set frenchDescription
     *
     * @param string $frenchDescription
     *
     * @return Argument
     */
    public function setFrenchDescription($frenchDescription)
    {
        $this->french_description = $frenchDescription;

        return $this;
    }

    /**
     * Get frenchDescription
     *
     * @return string
     */
    public function getFrenchDescription()
    {
        return $this->french_description;
    }

    /**
     * Set englishDescription
     *
     * @param string $englishDescription
     *
     * @return Argument
     */
    public function setEnglishDescription($englishDescription)
    {
        $this->english_description = $englishDescription;

        return $this;
    }

    /**
     * Get englishDescription
     *
     * @return string
     */
    public function getEnglishDescription()
    {
        return $this->english_description;
    }

    /**
     * Set isReturn
     *
     * @param boolean $isReturn
     *
     * @return Argument
     */
    public function setReturn($isReturn)
    {
        $this->isReturn = $isReturn;

        return $this;
    }

    /**
     * Get isReturn
     *
     * @return boolean
     */
    public function isReturn()
    {
        return $this->isReturn;
    }

    /**
     * Set type
     *
     * @param \AppBundle\Entity\FunctionType $type
     *
     * @return Argument
     */
    public function setType(\AppBundle\Entity\FunctionType $type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return \AppBundle\Entity\FunctionType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set eZFunction
     *
     * @param \AppBundle\Entity\EZFunction $eZFunction
     *
     * @return Argument
     */
    public function setEZFunction(\AppBundle\Entity\EZFunction $eZFunction = null)
    {
        $this->EZFunction = $eZFunction;

        return $this;
    }

    /**
     * Get eZFunction
     *
     * @return \AppBundle\Entity\EZFunction
     */
    public function getEZFunction()
    {
        return $this->EZFunction;
    }
}
