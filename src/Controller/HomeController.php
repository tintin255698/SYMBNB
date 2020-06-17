<?php

namespace App\Controller;



use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller {

    /**
     * @Route("/hello/{prenom}/age/{age}", name="hello")
     * @Route("/hello", name="hello_base")
     * @Route("/hello/{prenom}", name="hello_prenom")
     * Montre la page qui dit Hello
     */

    public function hello($prenom = "anonyme", $age){
        return $this->render(
                'hello.html.twig',
                [
                    'prenom' => $prenom,
                    'age' => $age
                ]);


    }

    /**
     * @Route("/", name="homepage")
     */

    public function home (){

        $prenoms = ['Lior' =>31, 'Joseph'=>57, 'Anne'=>45];

        return $this->render(
            'home.html.twig',
        ['title'=>'Bonjour a tous',
            'age' => 31,
            'tableau'=>$prenoms
        ]);
    }

}