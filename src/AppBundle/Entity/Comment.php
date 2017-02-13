<?php
// ROUINEB Hamza :
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="comment")
 */
class Comment{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="text")
     * @Assert\NotBlank
     */
    protected $comment;

    /**
     * @ORM\Column(type="datetime", name="posted_at")
     */
    protected $postedAt;

    /**
     * Many Comments have One User.
     * @ORM\ManyToOne(targetEntity="User", inversedBy="comments")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="EZFunction", inversedBy="comments")
     * @ORM\JoinColumn(name="cezfunction_id", referencedColumnName="id")
     */
    private $EZFunction;

    
    
    public function __construct()
    {
        // nothing special to be added
    }

    /**
    * @ORM\PrePersist
    */
    public function prePersistEvent()
    {
        $this->postedAt = new \DateTime();
    }

    /**
    * @ORM\PreUpdate
    */
    public function preUpdateEvent()
    {
        $this->postedAt = new \DateTime();
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

    // generated using doctrine Framework
    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return Comment
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set postedAt
     *
     * @param \DateTime $postedAt
     *
     * @return Comment
     */
    public function setPostedAt($postedAt)
    {
        $this->postedAt = $postedAt;

        return $this;
    }

    /**
     * Get postedAt
     *
     * @return \DateTime
     */
    public function getPostedAt()
    {
        return $this->postedAt;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     *
     * @return Comment
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
