<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use AppBundle\Entity\Article as Article;

/**
 * @ORM\Entity
 * @ORM\Table(name="tutorial")
 */
class Tutorial extends Article
{
    /**
    * @ORM\ManyToOne(targetEntity="Tutorial")
    * @ORM\JoinColumn(name="tuto_next_id", referencedColumnName="id")
     */
    protected $tuto_next;
    
    
    /**
    * @ORM\ManyToOne(targetEntity="Tutorial")
    * @ORM\JoinColumn(name="tuto_prev_id", referencedColumnName="id")
     */
    protected $tuto_prev;
    


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
