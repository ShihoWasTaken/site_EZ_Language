<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="tutorial")
 */
class Tutorial
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
    * @ORM\ManyToOne(targetEntity="Tutorial")
    * @ORM\JoinColumn(name="tuto_next_id", referencedColumnName="id")
     */
    private $tuto_next;
    
    
    /**
    * @ORM\ManyToOne(targetEntity="Tutorial")
    * @ORM\JoinColumn(name="tuto_prev_id", referencedColumnName="id")
     */
    private $tuto_prev;
    

    /**
     * @ORM\Column(name="French_title", type="string", length=255)
     */
    private $french_title;
    
    
      /**
     * @ORM\Column(name="English_title", type="string", length=255)
     */
    private $english_title;
    
    /**
     * @ORM\Column(name="French_html", type="text")
     */
    private $french_html;

    
    /**
     * @ORM\Column(name="English_html", type="text")
     */
    private $english_html;


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
     * @return Tutorial
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
     * @return Tutorial
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
     * @return Tutorial
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
     * @return Tutorial
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

    /**
     * Set tutoNext
     *
     * @param \AppBundle\Entity\Tutorial $tutoNext
     *
     * @return Tutorial
     */
    public function setTutoNext(\AppBundle\Entity\Tutorial $tutoNext = null)
    {
        $this->tuto_next = $tutoNext;

        return $this;
    }

    /**
     * Get tutoNext
     *
     * @return \AppBundle\Entity\Tutorial
     */
    public function getTutoNext()
    {
        return $this->tuto_next;
    }

    /**
     * Set tutoPrev
     *
     * @param \AppBundle\Entity\Tutorial $tutoPrev
     *
     * @return Tutorial
     */
    public function setTutoPrev(\AppBundle\Entity\Tutorial $tutoPrev = null)
    {
        $this->tuto_prev = $tutoPrev;

        return $this;
    }

    /**
     * Get tutoPrev
     *
     * @return \AppBundle\Entity\Tutorial
     */
    public function getTutoPrev()
    {
        return $this->tuto_prev;
    }
}
