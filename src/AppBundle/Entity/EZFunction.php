<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="EZFunction")
 */
class EZFunction
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
     * @ORM\Column(name="Name", type="string")
     */
    protected $name;

    /**
     * @ORM\Column(name="French_label", type="text")
     */
    protected $french_label;

    /**
     * @ORM\Column(name="English_label", type="text")
     */
    protected $english_label;

    /**
    * @ORM\OneToOne(targetEntity="Category")
    */
    protected $category;

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
