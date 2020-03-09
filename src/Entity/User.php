<?php

namespace  App\Entity;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Id;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * Class User
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserRepository")
 */
class User implements UserInterface
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
     * @ORM\Column(type="json",name="role_user",length=20,nullable=false)
     */
    private $roleUser = [];

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

    /**
     * @see UserInterface
     */
    public function getPassword()
    {
        return $this->passwordUser;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        return null;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string)$this->emailUser;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roleUser;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roleUser): self
    {
        $this->roleUser = $roleUser;

        return $this;
    }



}