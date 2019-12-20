<?php

namespace App\Controller;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\Post;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
    /**
     * @Rest\Post("/users")
     * @Rest\View
     * @ParamConverter("user", converter="fos_rest.request_body")
     */

    public function new(User $user) : User
    {
        /*$em = $this->getDoctrine()->getManager();
        $em->persist($user);
        $em->flush();

        return $user;*/
        dump($user);
        return $user;
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
     * @Route("/{idUser}/edit", name="user_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_index');
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idUser}", name="user_delete", methods={"DELETE"})
     */
    public function delete(Request $request, User $user): Response
    {
        if ($this->isCsrfTokenValid('delete'.$user->getIdUser(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('user_index');
    }
}
