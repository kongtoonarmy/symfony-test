<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Author;

class AuthorController extends Controller
{
    /**
     * @Route("/author", name="author")
     */
    public function indexAction(Request $request)
    {
        // create a task and give it some dummy data for this example
        $author = new Author();
        $author->setName('Enter your name');

        $form = $this->createFormBuilder($author)
            ->add('name', TextType::class, array(
                'attr' => array(
                    'maxlength' => 4
                )
            ))
            ->add('email', EmailType::class)
            ->add('save', SubmitType::class, array('label' => 'Create Post'))
            ->getForm();

        $form->handleRequest($request);

        $validator = $this->get('validator');
        $errors = $validator->validate($author);
        //$errors = $validator->validate($author, null, array('registration'));

        if (count($errors) > 0) {

            return $this->render('author/validation.html.twig', array(
                'errors' => $errors,
            ));
        }
        return new Response('The author is valid! Yes!');

    }
}
