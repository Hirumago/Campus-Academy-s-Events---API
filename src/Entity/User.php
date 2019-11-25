<?php

namespace  App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\column(type="integer",name="id_user",nullable=false)
     */
    private $idUser;


    /**
     * @ORM\Column(type="string",name="lastname_user",length=20,nullable=false)
     */
    private $lastnameUser;

    /**
     * @ORM\Column(type="string",name="firstname_user",length=20,nullable=false)
     */
    private $firstnameUser;

    /**
     * @ORM\Column(type="string",name="password_user",length=20,nullable=false)
     */
    private $passwordUser;

    /**
     * @ORM\Column(type="string",name="role_user",length=20,nullable=false)
     */
    private $roleUser;

    /**
     * @ORM\Column(type="string",name="email_user",length=20,nullable=false)
     */
    private $emailUser;






}


