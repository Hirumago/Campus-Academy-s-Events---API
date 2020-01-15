<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
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
     * @Rest\View()
     * @Rest\Put("/edit/{id}")
     * @param $id
     * @param Request $request
     * @return object|null
     */
    public function updateUser(Request $request, string $id)
    {
        $Dbuser = $this->getDoctrine()->getManager()->getRepository(User::class)->findOneBy(array("idUser"=> $id));

        if (empty($Dbuser)) {
            return new JsonResponse("user n'existe pas en base");
        }
        else {
            $form = $this->createForm(UserType::class, $Dbuser);
            $form->submit($request->request->all());
            $form->handleRequest($request);

            if ($form->isValid()) {
                $d = $request->getContent();
                $user = $this->deserialize($d, "App\Entity\User");
                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return new JsonResponse(array("message" => "User modifié"));
            }
            else{
                return new JsonResponse(array("message" => "Formulaire invalide", Response::HTTP_NOT_MODIFIED));
            }
        }
    }

    /**
     * @Rest\View(statusCode=Response::HTTP_NO_CONTENT)
     * @Rest\Delete("/delete/{id}")
     * @param Request $request
     * @return Response
     */
    public function delete(Request $request): Response
    {
        $entityManager = $this->getDoctrine()->getManager();
        $user= $entityManager->getRepository(User::class)->find($request->get('id'));;
        if ($user) {
            $entityManager->remove($user);
            $entityManager->flush();
            return new JsonResponse("true");
        }

        return new JsonResponse("false");
    }
}
