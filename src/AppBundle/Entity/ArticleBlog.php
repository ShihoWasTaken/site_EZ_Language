<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="article_blog")
 */
class ArticleBlog
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
     * @ORM\Column(name="Name", type="string", length=255)
     */
    private $name;

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
    * @ORM\OneToOne(targetEntity="User")
     */
    private $user;

    /**
     * @ORM\Column(name="LastUpdateDate", type="datetime")
     * */
    private $lastUpdateDate;



    /**
    * @ORM\PrePersist
    * @ORM\PreUpdate
    */
    public function updateLastUpdateDate()
    {
        $date = date_create();
        date_timestamp_set($date, time());
        $this->lastUpdateDate = $date;
    }

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
     * Set name
     *
     * @param string $name
     *
     * @return ArticleBlog
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
     * Set frenchTitle
     *
     * @param string $frenchTitle
     *
     * @return ArticleBlog
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
     * @return ArticleBlog
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
     * @return ArticleBlog
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
     * @return ArticleBlog
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
     * Set lastUpdateDate
     *
     * @param \DateTime $lastUpdateDate
     *
     * @return ArticleBlog
     */
    public function setLastUpdateDate($lastUpdateDate)
    {
        $this->lastUpdateDate = $lastUpdateDate;

        return $this;
    }

    /**
     * Get lastUpdateDate
     *
     * @return \DateTime
     */
    public function getLastUpdateDate()
    {
        return $this->lastUpdateDate;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return ArticleBlog
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
