<?php

namespace AppBundle\Entity;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Mapping\ClassMetadata;

class Contact
{
    /**
    * @Assert\NotBlank()
    */
    protected $name;

    /**
    * @Assert\NotBlank()
    */
    protected $email;

    /**
    * @Assert\NotBlank()
    */
    protected $subject;

    /**
    * @Assert\NotBlank()
    */
    protected $body;

    protected $sendCopy;

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new Assert\NotBlank());

        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'message' => 'Veuillez rentrer une adresse valide svp'
        )));

        $metadata->addPropertyConstraint('subject', new Assert\NotBlank());
        $metadata->addPropertyConstraint('subject', new Assert\Length(array(
            'min'        => 4,
            'max'        => 32,
            'minMessage' => 'Your subject must be at least {{ limit }} characters long',
            'maxMessage' => 'Your subject cannot be longer than {{ limit }} characters',
        )));

        $metadata->addPropertyConstraint('body', new Assert\Length(array(
            'min'        => 50,
            'max'        => 500,
            'minMessage' => 'Your text must be at least {{ limit }} characters long',
            'maxMessage' => 'Your text cannot be longer than {{ limit }} characters',
        )));
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function setSubject($subject)
    {
        $this->subject = $subject;
    }

    public function getBody()
    {
        return $this->body;
    }

    public function setBody($body)
    {
        $this->body = $body;
    }

    public function getSendCopy()
    {
        return $this->sendCopy;
    }

    public function setSendCopy($sendCopy)
    {
        $this->sendCopy = $sendCopy;
    }
}
