<?php

namespace App\Entity;

use App\Entity\Category;
use \DateTime;

/**
 * Class Event
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\EventRepository")
 */
class Event{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer",name="id_event", nullable=false)
     */
    private $idEvent;

    /**
     * @ORM\Column(type="string",name="title", length=200, nullable=false)
     */
    private $title;

    /**
     * @ORM\Column(type="string",name="description", length=1000, nullable=false)
     */
    private$description;

    /**
     * @var \DateTime
     * @ORM\Columng(type="datetime", name="start_date",nullable=false)
     */

    private $startDate;

    /**
     * @var \DateTime
     * @ORM\Columng(type="datetime", name="end_date",nullable=false)
     */
    private $endDate;

    /**
     * @ORM\Column(type="string",name="location", length="30", nullable=false)
     */
    private $location;

    /**
     * @ORM\Column(type="boolean", name="private_event",nullable=false)
     */
    private $privateEvent;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="creation_date", nullable=false)
     */
    private $creationDate;

    /**
     * @var \Category
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @JoinColumn(name="id_category", referencedColumnName="id_category", nullable=false)
     */
    private $idCategory;

    /**
     * @var \User
     * @ORM\OneToOne(targetEntity="App\Entity\User")
     * @JoinColumn(name="id_user", referencedColumnName="id_user", nullable=false)
     */
    private $idUser;



}
