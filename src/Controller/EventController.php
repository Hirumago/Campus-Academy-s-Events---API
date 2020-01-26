<?php

namespace App\Controller;


use App\Entity\Event;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/event")
 */
class EventController extends BaseController
{

    /**
     * @Rest\View()
     * @Get("/list")
     */
    public function listAction()
    {

        $users = $this->getDoctrine()->getRepository(Event::class)->findAll();
        return $users;
    }

    /**
     * @Route("/new", name="new", methods={"POST"})
     * @param Request $request
     * @return JsonResponse
     */
    public function new(Request $request)
    {

        $data = $request->getContent();
        $user = $this->deserialize($data, "App\Entity\Event");

        if ($user) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new JsonResponse(array("message" => "User crée", Response::HTTP_CREATED));
        }
        return new JsonResponse(array("message" => "deserialisation echoué"));
    }

    /**
     * @Rest\View()
     * @Get(
     *     path = "/{id}",
     *     name = "show",
     *     requirements = {"id"="\d+"})
     * @param string $id
     * @return object|null
     */
    public function show($id)
    {
        $event = $this->getDoctrine()->getManager()->getRepository(Event::class)->findOneBy(array("idEvent" => $id));
        return $event;
    }


    /**
     * @Route("/edit/{id}", name="edit", methods={"PUT"})
     * @param $id
     * @param Request $request
     * @return object|null
     */
    public function updateEvent(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $d = $request->getContent();
        if (!empty($d)) {
            $dbEvent = $em->getRepository(Event::class)->find($id);
            $event = $this->deserialize($d, "App\Entity\Event");
            $em->merge($event);
            $em->flush();
            return new JsonResponse(array("message" => "Event modifié"));
        } else {
            return new JsonResponse(array("message" => "requete invalide", Response::HTTP_NOT_MODIFIED));
        }

    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/delete/{id}")
     * @param Request $request
     * @return Response
     */
    public function delete($id, Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $event = $entityManager->getRepository(Event::class)->find($id);;
        if ($event) {
            $entityManager->remove($event);
            $entityManager->flush();
            return new JsonResponse(array("messsage" => "event supprimé", Response::HTTP_OK));
        }

        return new JsonResponse("false");
    }
}
