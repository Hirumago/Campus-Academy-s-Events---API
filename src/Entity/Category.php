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

    /**
     * @return mixed
     */
    public function getIdCategory()
    {
        return $this->idCategory;
    }

    /**
     * @param mixed $idCategory
     */
    public function setIdCategory($idCategory)
    {
        $this->idCategory = $idCategory;
    }

    /**
     * @return mixed
     */
    public function getLabelCategory()
    {
        return $this->labelCategory;
    }

    /**
     * @param mixed $labelCategory
     */
    public function setLabelCategory($labelCategory)
    {
        $this->labelCategory = $labelCategory;
    }


}
