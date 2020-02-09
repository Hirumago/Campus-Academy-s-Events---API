<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use JMS\Serializer\SerializerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Json;

/**
 * @Route("/user")
 */
class UserController extends BaseController
{

    /**
     * @Rest\View()
     * @Get("/list")
     */
    public function listAction(){

        $users = $this->getDoctrine()->getRepository(User::class)->findAll();
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
        $user = $this->deserialize($data,  "App\Entity\User");

        if ($user){
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return new JsonResponse(array("message" => "User crée", Response::HTTP_CREATED));
        }
        return new JsonResponse(array("message"=> "deserialisation echoué"));
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
        $user = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(array("idUser"=>$id));
        return $user;
    }


    /**
     * @Route("/edit/{id}", name="edit", methods={"PUT"})
     * @param $id
     * @param Request $request
     * @return object|null
     */
    public function updateUser(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $d = $request->getContent();
        if (!empty($d)) {
            $dbuser = $em->getRepository(User::class)->find($id);
            $user = $this->deserialize($d, "App\Entity\User");
            $em->merge($user);
            $em->flush();
            return new JsonResponse(array("message" => "User modifié"));
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
    public function delete($id,Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user= $entityManager->getRepository(User::class)->find($id);;
        if ($user) {
            $entityManager->remove($user);
            $entityManager->flush();
            return new JsonResponse(array("messsage" => "user supprimé", Response::HTTP_OK));
        }

        return new JsonResponse("false");
    }
}
