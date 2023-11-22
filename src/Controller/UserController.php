<?php

NameSpace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("user")
 */

 Class UserController extends AbstractController 
 {
    function createUserform()
    {
        $user = new User();
        $form=$this->createFormBuilder($user)
            ->add('name')
            ->add('email')
            ->getForm();
        return $this->render('form.html.twig', ['form'=>$form->createView()]);
    }
 }
 