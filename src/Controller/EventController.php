<?php

namespace App\Controller;


use App\Entity\Event;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;



class EventController extends BaseController
{


    /**
     * @Route("/events/{id}", name="events_show")
     * @Method({"POST"})
     * @return Response
     */
    public function showAction()
    {

        $event = $this->getDoctrine()->getManager()->getRepository(Event::class)->findBy(array('idEvent' => 1));
        $data = $this->serialize($event);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }


}
