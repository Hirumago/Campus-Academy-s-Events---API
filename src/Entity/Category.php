<?php

namespace App\Entity;

/**
 * Class Category
 * @package App\Entity
 * @ORM\Entity(repositoryClass="App\Repository\CategoryRepository")
 */
class Category{

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\column(type="integer", name="id_category",nullable=false)
     */
     private $idCategory;

     /**
      * @ORM\Column(type="string", name="label_category", nullable=false)
      */
     private $labelCategory;
}
