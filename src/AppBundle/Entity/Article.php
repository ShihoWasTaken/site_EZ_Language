<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity
 * @ORM\Table(name="article")
 * @ORM\InheritanceType("SINGLE_TABLE") 
 */
abstract class Article
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(name="French_title", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     */
    protected $french_title;

    /**
     * @ORM\Column(name="English_title", type="string", length=200, nullable=false)
     * @Assert\NotBlank
     */
    protected $english_title;

    /**
     * @ORM\Column(name="French_html", type="text",nullable=true)
     */
    protected $french_html;

    /**
     * @ORM\Column(name="English_html", type="text", nullable=true)
     */
    protected $english_html;


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
     * Set frenchTitle
     *
     * @param string $frenchTitle
     *
     * @return Article
     */
    public function setFrenchTitle($frenchTitle)
    {
        $this->french_title = $frenchTitle;

        return $this;
    }

    /**
     * Get frenchTitle
     *
     * @return string
     */
    public function getFrenchTitle()
    {
        return $this->french_title;
    }

    /**
     * Set englishTitle
     *
     * @param string $englishTitle
     *
     * @return Article
     */
    public function setEnglishTitle($englishTitle)
    {
        $this->english_title = $englishTitle;

        return $this;
    }

    /**
     * Get englishTitle
     *
     * @return string
     */
    public function getEnglishTitle()
    {
        return $this->english_title;
    }

    /**
     * Set frenchHtml
     *
     * @param string $frenchHtml
     *
     * @return Article
     */
    public function setFrenchHtml($frenchHtml)
    {
        $this->french_html = $frenchHtml;

        return $this;
    }

    /**
     * Get frenchHtml
     *
     * @return string
     */
    public function getFrenchHtml()
    {
        return $this->french_html;
    }

    /**
     * Set englishHtml
     *
     * @param string $englishHtml
     *
     * @return Article
     */
    public function setEnglishHtml($englishHtml)
    {
        $this->english_html = $englishHtml;

        return $this;
    }

    /**
     * Get englishHtml
     *
     * @return string
     */
    public function getEnglishHtml()
    {
        return $this->english_html;
    }
}
