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
     * @ORM\Column(name="French_label", type="text")
     */
    private $french_label;

    /**
     * @ORM\Column(name="English_label", type="text")
     */
    private $english_label;

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
}
