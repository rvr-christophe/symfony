<?php

nameSpace App\Controller;

use App\Service\Greeter;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController{

    /**
     * @Route("hello")
     */
    function hello(Greeter $greeter)
    {
        $message = $greeter->greet();
        return new Response($message);
    }

    
}