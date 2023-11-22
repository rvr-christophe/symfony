<?php

nameSpace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController{
    /**
     * @Route("hello/{_locale}")
     */
    function hello(Request $request)
    {
        $locale = $request->getLocale();
        return new Response('Bonjour '. $locale);
    }

    /**
     * @Route("hello/{param}", name="helloParam")
     */
    function helloDefault($param)
    {
        return new Response('Hello ' . $param .' !');
    }

    /**
     * @Route("hello")
     */
    function helloSansRien()
    {
        return new Response('Hello ');
    }

    

    /**function hello(Request $request)  
    {
        $params = $request->query->all();
        $string = "Les paramètres sont : <br />";

        foreach($params as $key => $value) 
        {
            $string = $string . '-' . $key . ':' . $value . '<br />';
            return new Response($string);
        }
    }*/

    
}