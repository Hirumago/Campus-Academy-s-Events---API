<?php

namespace App\Controller;


use App\Entity\Event;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class EventController extends BaseController
{


    /**
     * @Route("/event/{id}", name="event_show", methods={"GET", "HEAD"})

     * @param $id
     * @return Response
     */
    public function showAction($id)
    {

        $event = $this->getDoctrine()->getManager()->getRepository(Event::class)->findBy(array('idEvent' => $id));
        $data = $this->serialize($event);
        $response = new Response($data);
        $response->headers->set('Content-Type', 'application/json');

        return $response;
    }

    /**
     * @Route("/event", name="event_create" , methods={"POST"})
     * @param Request $request
     * @return Response
     */
    public function createAction(Request $request)
    {
        $data = $request->getContent();
        $event = $this->deserialize($data, 'App\Entity\Event');
        $em = $this->getDoctrine()->getManager();
        $em->persist($event);
        $em->flush();

        return new Response('', Response::HTTP_CREATED);
    }




}
