<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class Author
{
    protected $name;
    protected $email;

    /**
     * @Assert\Choice(
     *     choices = { "male", "female", "other" },
     *     message = "Choose a valid gender."
     * )
     */
    public $gender;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(min=3)
     */
    private $firstName;

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

    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('name', new NotBlank());
        $metadata->addPropertyConstraint('email', new NotBlank());
    }
}