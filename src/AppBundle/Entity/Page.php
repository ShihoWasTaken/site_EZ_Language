<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="page")
 */
class Page
{

    public function __construct()
    {
    }

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;


    /**
     * @ORM\Column(name="Name", type="string", length=32)
     */
    protected $name;

    /**
     * @ORM\Column(name="French_text", type="text")
     */
    protected $french_text;

    /**
     * @ORM\Column(name="English_text", type="text")
     */
    protected $english_test;

    /**
    * @ORM\OneToOne(targetEntity="User")
     */
    protected $user;

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
}
