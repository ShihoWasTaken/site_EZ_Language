<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="category")
 */
class Category
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
     * @ORM\Column(name="French_label", type="string", length=255)
     */
    private $french_label;

    /**
     * @ORM\Column(name="English_label", type="string", length=255)
     */
    private $english_label;

    /**
     * @ORM\OneToMany(targetEntity="EZFunction", mappedBy="category")
     */
    private $EZFunctions;

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
     * Set frenchLabel
     *
     * @param string $frenchLabel
     *
     * @return Category
     */
    public function setFrenchLabel($frenchLabel)
    {
        $this->french_label = $frenchLabel;

        return $this;
    }

    /**
     * Get frenchLabel
     *
     * @return string
     */
    public function getFrenchLabel()
    {
        return $this->french_label;
    }

    /**
     * Set englishLabel
     *
     * @param string $englishLabel
     *
     * @return Category
     */
    public function setEnglishLabel($englishLabel)
    {
        $this->english_label = $englishLabel;

        return $this;
    }

    /**
     * Get englishLabel
     *
     * @return string
     */
    public function getEnglishLabel()
    {
        return $this->english_label;
    }

    /**
     * Add EZFunction
     *
     * @param \AppBundle\Entity\EZFunction $EZFunction
     *
     * @return Category
     */
    public function addEZFunction(\AppBundle\Entity\EZFunction $EZFunction)
    {
        $this->EZFunctions[] = $EZFunction;

        return $this;
    }

    /**
     * Remove EZFunction
     *
     * @param \AppBundle\Entity\EZFunction $EZFunction
     */
    public function removeEZFunction(\AppBundle\Entity\EZFunction $EZFunction)
    {
        $this->EZFunctions->removeElement($EZFunction);
    }

    /**
     * Get eZFunctions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEZFunctions()
    {
        return $this->EZFunctions;
    }
}
