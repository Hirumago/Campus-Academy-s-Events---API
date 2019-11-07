<?php

namespace App\Entity;

use DateTime;
/**
 * class UserEvent
 * @package App\Entity
 * @ORM\Entity(RepositoryClass="App\Repository\UserEventRepository")
 */
class UserEvent{

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
}