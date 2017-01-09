<?php
namespace Pacificnm\CategoryAttributeValue\Entity;

use Pacificnm\CategoryAttribute\Entity\Entity as AttributeEntity;
use Pacificnm\Category\Entity\Entity as CategoryEntity;

class Entity
{

    /**
     *
     * @var number
     */
    protected $categoryAttributeValueId;

    /**
     *
     * @var number
     */
    protected $categoryId;

    /**
     *
     * @var number
     */
    protected $categoryAttributeId;

    /**
     *
     * @var string
     */
    protected $categoryAttributeValue;

    /**
     *
     * @var CategoryEntity
     */
    protected $categoryEntity;

    /**
     *
     * @var AttributeEntity
     */
    protected $categoryAttributeEntity;

    /**
     *
     * @return the $categoryAttributeValueId
     */
    public function getCategoryAttributeValueId()
    {
        return $this->categoryAttributeValueId;
    }

    /**
     *
     * @return the $categoryId
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     *
     * @return the $categoryAttributeId
     */
    public function getCategoryAttributeId()
    {
        return $this->categoryAttributeId;
    }

    /**
     *
     * @return the $categoryAttributeValue
     */
    public function getCategoryAttributeValue()
    {
        return $this->categoryAttributeValue;
    }

    /**
     *
     * @return the $categoryEntity
     */
    public function getCategoryEntity()
    {
        return $this->categoryEntity;
    }

    /**
     *
     * @return the $categoryAttributeEntity
     */
    public function getCategoryAttributeEntity()
    {
        return $this->categoryAttributeEntity;
    }

    /**
     *
     * @param number $categoryAttributeValueId            
     */
    public function setCategoryAttributeValueId($categoryAttributeValueId)
    {
        $this->categoryAttributeValueId = $categoryAttributeValueId;
    }

    /**
     *
     * @param number $categoryId            
     */
    public function setCategoryId($categoryId)
    {
        $this->categoryId = $categoryId;
    }

    /**
     *
     * @param number $categoryAttributeId            
     */
    public function setCategoryAttributeId($categoryAttributeId)
    {
        $this->categoryAttributeId = $categoryAttributeId;
    }

    /**
     *
     * @param string $categoryAttributeValue            
     */
    public function setCategoryAttributeValue($categoryAttributeValue)
    {
        $this->categoryAttributeValue = $categoryAttributeValue;
    }

    /**
     *
     * @param \Pacificnm\Category\Entity\Entity $categoryEntity            
     */
    public function setCategoryEntity($categoryEntity)
    {
        $this->categoryEntity = $categoryEntity;
    }

    /**
     *
     * @param \Pacificnm\CategoryAttribute\Entity\Entity $categoryAttributeEntity            
     */
    public function setCategoryAttributeEntity($categoryAttributeEntity)
    {
        $this->categoryAttributeEntity = $categoryAttributeEntity;
    }
}

