<?php

namespace App\Entity;

/**
 * Class Event
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\column(type="integer")
     */
    private $id;

    

}
