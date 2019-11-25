<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
use DateTime;
/**
 * class UserEvent
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\UserEventRepository")
 */
class UserEvent{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer", name="id_user_event", nullable=false)
     */
    private $id;
    /**
     * @var \User
     * @ORM\ManyToOne(targetEntity="App\Entity\User")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", nullable=false)
     */
    private $idUser;

    /**
     * @var \Event
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
     * @return \User
     */
    public function getIdUser(): \User
    {
        return $this->idUser;
    }

    /**
     * @param \User $idUser
     */
    public function setIdUser(\User $idUser)
    {
        $this->idUser = $idUser;
    }

    /**
     * @return \Event
     */
    public function getIdEvent(): \Event
    {
        return $this->idEvent;
    }

    /**
     * @param \Event $idEvent
     */
    public function setIdEvent(\Event $idEvent)
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
    public function setRegistrationDate(DateTime $registrationDate)
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
    public function setNotify($notify)
    {
        $this->notify = $notify;
    }


}