<?php

namespace App\Controller;


use App\Entity\Event;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;



class EventController extends BaseController
{


    /**
     * @Route("/events/{id}", name="events_show")
     * @return Response
     */
    public function showAction()
    {

        $event = $this->getDoctrine()->getManager()->getRepository(Event::class)->findBy(array('idEvent' => 1));
        $data = $this->serialize($event);


        //$data = "{
          // \"Accept-Language\": \"en-US,en;q=0.8\",
           //\"Host\": \"headers.jsontest.com\",
           //\"Accept-Charset\": \"ISO-8859-1,utf-8;q=0.7,*;q=0.3\",
           //\"Accept\": \"text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8\"
           // }";


        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/test", name="test")
     */
    public function testAction()
    {
        return $this->render('test.html.twig', [
            'test' => 'test'
        ]);
    }
}
