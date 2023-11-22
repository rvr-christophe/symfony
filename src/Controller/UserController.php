<?php

nameSpace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 Class UserController extends AbstractController 
 {
    /**
    * @Route("/user")
    */

    function createUserform(Request $request)
    {
        $user = new User();
        $form=$this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()) {
            return new Response(("Formulaire validé."));
        }

        return $this->render('form.html.twig', ['form'=>$form->createView()]);
    }
 }
 