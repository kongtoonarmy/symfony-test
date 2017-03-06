<?php
namespace AppBundle\Entity;

use Symfony\Component\Validator\Mapping\ClassMetadata;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints as Assert;

class User
{
    public static function loadValidatorMetadata(ClassMetadata $metadata)
    {
        $metadata->addPropertyConstraint('email', new Assert\Email(array(
            'groups' => array('registration'),
        )));

        $metadata->addPropertyConstraint('password', new Assert\NotBlank(array(
            'groups' => array('registration'),
        )));
        $metadata->addPropertyConstraint('password', new Assert\Length(array(
            'min'    => 7,
            'groups' => array('registration'),
        )));

        $metadata->addPropertyConstraint('city', new Assert\Length(array(
            "min" => 3,
        )));
    }
}