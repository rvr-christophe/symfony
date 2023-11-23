<?php

nameSpace App\Controller;

use App\Entity\Users;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
        $user = new Users();
        $form=$this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()) {
            $userInfos = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($userInfos);
            $entityManager->flush();

            return new Response(("Formulaire validé."));
        }

        return $this->render('form.html.twig', ['form'=>$form->createView()]);
    }
 }
 