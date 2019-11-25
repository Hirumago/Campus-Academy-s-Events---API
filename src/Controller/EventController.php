<?php

namespace App\Controller;


use App\Entity\Event;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EventController extends Controller{


    /**
     * @Route("/events/{id}", name="events_show")
     */
    public function showAction()
    {
        $article = new Event();
        $article
            ->setTitle('Mon premier article')
            ->setDdescription('Le contenu de mon article.')
        ;
        $data = $this->get('jms_serializer')->serialize($article, 'json');

        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction(){
        return $this->render('product/index.html.twig',[
           'test' => 'test'
        ]);
    }
}
