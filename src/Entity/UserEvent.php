<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use  App\Entity\Envent;
use  App\Entity\User;
use DateTime;
/**
 * class UserEvent
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserEventRepository")
 */
class UserEvent{


    /**
     * @var User
     * @ORM\OneToOne(targetEntity="App\Entity\User", cascade={"persist"})
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", nullable=false)
     */
    private $idUser;

    /**
     * @var Event
     * @ORM\Id
     * @ORM\OneToOne(targetEntity="App\Entity\Event")
     * @ORM\JoinColumn(name="id_event", referencedColumnName="id_event", nullable=false)
     */
    private $idEvent;

    /**
     * @var \DateTime
     * @ORM\Column(name="registration_date", type="datetime", nullable=false)
     */
    private $registrationDate;

    /**
     * @ORM\Column(name="notify", type="boolean", nullable=false)
     */
    private $notify;

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
    public function setIdUser($idUser): void
    {
        $this->idUser = $idUser;
    }

    /**
     * @return Event
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * @param Event $idEvent
     */
    public function setIdEvent(Event $idEvent): void
    {
        $this->idEvent = $idEvent;
    }

    /**
     * @return DateTime
     */
    public function getRegistrationDate(): DateTime
    {
        return $this->registrationDate;
    }

    /**
     * @param DateTime $registrationDate
     */
    public function setRegistrationDate(DateTime $registrationDate): void
    {
        $this->registrationDate = $registrationDate;
    }

    /**
     * @return mixed
     */
    public function getNotify()
    {
        return $this->notify;
    }

    /**
     * @param mixed $notify
     */
    public function setNotify($notify): void
    {
        $this->notify = $notify;
    }






}
