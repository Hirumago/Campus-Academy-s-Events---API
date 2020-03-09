<?php

namespace App\Entity;
use Doctrine\ORM\Mapping as ORM;
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
     * @ORM\Column(type="string",name="location", length=30, nullable=false)
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
     * @var Category
     * @ORM\ManyToOne(targetEntity="App\Entity\Category")
     * @ORM\JoinColumn(name="id_category", referencedColumnName="id_category", nullable=false)
     */
    private $idCategory;

    /**
     * @var UserEvent
     * @ORM\ManyToOne(targetEntity="App\Entity\UserEvent")
     * @ORM\JoinColumn(name="id_user", referencedColumnName="id_user", nullable=true)
     */
    private $idUser;

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
     * @ORM\Column(type="datetime", name="start_date",nullable=false)
     */

    private $startDate;

    /**
     * @var \DateTime
     * @ORM\Column(type="datetime", name="end_date",nullable=false)
     */
    private $endDate;

    /**
     * @return mixed
     */
    public function getIdEvent()
    {
        return $this->idEvent;
    }

    /**
     * @param mixed $idEvent
     */
    public function setIdEvent($idEvent)
    {
        $this->idEvent = $idEvent;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return DateTime
     */
    public function getStartDate(): DateTime
    {
        return $this->startDate;
    }

    /**
     * @param DateTime $startDate
     */
    public function setStartDate(DateTime $startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return DateTime
     */
    public function getEndDate(): DateTime
    {
        return $this->endDate;
    }

    /**
     * @param DateTime $endDate
     */
    public function setEndDate(DateTime $endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param mixed $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return mixed
     */
    public function getPrivateEvent()
    {
        return $this->privateEvent;
    }

    /**
     * @param mixed $privateEvent
     */
    public function setPrivateEvent($privateEvent)
    {
        $this->privateEvent = $privateEvent;
    }

    /**
     * @return DateTime
     */
    public function getCreationDate(): DateTime
    {
        return $this->creationDate;
    }

    /**
     * @param DateTime $creationDate
     */
    public function setCreationDate(DateTime $creationDate)
    {
        $this->creationDate = $creationDate;
    }

    /**
     * @return Category
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * @param \Category $idCategory
     */
    public function setIdCategory(\Category $idCategory)
    {
        $this->idCategory = $idCategory;
    }

    /**
     * @return User
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * @param \UserEvent $idUser
     */
    public function setIdUser(\UserEvent $idUser)
    {
        $this->idUser = $idUser;
    }

}
