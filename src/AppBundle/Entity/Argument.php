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
    protected $id;

    /**
     * @ORM\Column(name="Id_fonction", type="integer")
     */
    protected $id_fonction;

    /**
    * @ORM\OneToOne(targetEntity="FunctionType")
     */
    protected $type;

    /**
     * @ORM\Column(name="Name", type="string", length=16)
     */
    protected $name;

    /**
     * @ORM\Column(name="French_description", type="text")
     */
    protected $french_description;

    /**
     * @ORM\Column(name="English_description", type="text")
     */
    protected $english_description;

    /**
     * @ORM\Column(name="IsReturn", type="boolean")
     */
    protected $isReturn;
}
