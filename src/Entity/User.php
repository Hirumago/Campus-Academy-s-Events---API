<?php

namespace  App\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User
{

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

    public function setIdUser()
    {
        $this->IdUser;
    }

    /**
     * @return mixed
     */
    public function getLastNameUser()
    {
        return $this->LastNameUser;
    }

    /**
     * @param mixed $lastNameUser
     */

    public function setLastNameUser()
    {
        $this->LastNameUser;
    }

    /**
     * @return mixed
     */
    public function getFirstNameUser()
    {
        return $this->idFirstNameUser;
    }

    /**
     * @param mixed $firstNameUser
     */

    public function setFirstNameUser()
    {
        $this->FirstNameUser;
    }

    /**
     * @return mixed
     */
    public function getPasswordUser()
    {
        return $this->PasswordUser;
    }

    /**
     * @param mixed $passwordUser
     */

    public function setPasswordUser()
    {
        $this->PasswordUser;
    }

    /**
     * @return mixed
     */
    public function getRoleUser()
    {
        return $this->RoleUser;
    }


    /**
     * @param mixed $roleUser
     */

    public function setRoleUser()

    {
        $this->RoleUser;
    }

    /**
     * @return mixed
     */
    public function getEmailUser()
    {
        return $this->EmailUser;
    }


    /**
     * @param mixed $emailUser
     */

    public function setEmailUser()
    {
        $this->EmailUser;
    }

}