<?php

namespace  App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Id;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer",name="id_user",nullable=false)
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
     * @ORM\Column(type="string",name="email_user",length=30,nullable=false)
     */
    private $emailUser;

    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param mixed $idUser
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return mixed
     */
    public function getLastnameUser()
    {
        return $this->lastnameUser;
    }

    /**
     * @param mixed $lastnameUser
     */
    public function setLastnameUser($lastnameUser)
    {
        $this->lastnameUser = $lastnameUser;
    }

    /**
     * @return mixed
     */
    public function getFirstnameUser()
    {
        return $this->firstnameUser;
    }

    /**
     * @param mixed $firstnameUser
     */
    public function setFirstnameUser($firstnameUser)
    {
        $this->firstnameUser = $firstnameUser;
    }

    /**
     * @return mixed
     */
    public function getPasswordUser()
    {
        return $this->passwordUser;
    }

    /**
     * @param mixed $passwordUser
     */
    public function setPasswordUser($passwordUser)
    {
        $this->passwordUser = $passwordUser;
    }

    /**
     * @return mixed
     */
    public function getRoleUser()
    {
        return $this->roleUser;
    }

    /**
     * @param mixed $roleUser
     */
    public function setRoleUser($roleUser)
    {
        $this->roleUser = $roleUser;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->emailUser;
    }

    /**
     * @param mixed $emailUser
     */
    public function setEmailUser($emailUser)
    {
        $this->emailUser = $emailUser;
    }



}