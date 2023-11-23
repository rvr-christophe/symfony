<?php

nameSpace App\Controller;

use App\Entity\Post;
use App\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

 Class PostController extends AbstractController 
 {
    /**
    * @Route("/post")
    */

    function createPostform(Request $request)
    {
        $post = new Post();
        $form=$this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if($form->isSubmitted()&&$form->isValid()) {
            $imageFile = $form->get('image')->getData();

            if ($imageFile instanceof UploadedFile) {
                // Récupérez l'extension du fichier
                $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
                $extension = $imageFile->getClientOriginalExtension();
    
                // Vous pouvez utiliser $extension comme bon vous semble
                // ...
    
                // Gérez le téléchargement et la sauvegarde du fichier
                $uploadsDirectory = $this->getParameter('kernel.project_dir') . '/public/uploads';
                $imageFileName = md5(uniqid()) . '.' . $extension;
                $imageFile->move($uploadsDirectory, $imageFileName);
    
                // Sauvegardez le chemin du fichier dans l'entité
                $post->setImage($imageFileName);
            }


            //$postInfos = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($post);
            $entityManager->flush();

            return new Response(("Article ajouté."));
        }

        return $this->render('form.html.twig', ['form'=>$form->createView()]);
    }
 }
 