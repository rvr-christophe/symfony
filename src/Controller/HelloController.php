<?php

nameSpace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HelloController extends AbstractController{

    function hello() {
        $title = "Utilisateurs";
        $users = ["leo", "tom", "Harry"];
        return $this->render('hello.html.twig', 
            ['title' => $title, 'array'=> $users]);
    }

}