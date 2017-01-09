<?php

namespace Pacificnm\CategoryAttributeValue\Mapper;

use Zend\Hydrator\HydratorInterface;
use Zend\Db\Adapter\AdapterInterface;
use Zend\Db\Sql\Update;
use Zend\Db\Sql\Insert;
use Zend\Db\Sql\Delete;
use Pacificnm\Mapper\AbstractMysqlMapper;
use Pacificnm\CategoryAttributeValue\Entity\Entity;

class MysqlMapper extends AbstractMysqlMapper implements MysqlMapperInterface
{

    /**
     * Mysql Mapper Construct
     *
     * @param AdapterInterface $readAdapter
     * @param AdapterInterface $writeAdapter
     * @param HydratorInterface $hydrator
     * @param Entity $prototype
     */
    public function __construct(AdapterInterface $readAdapter, AdapterInterface $writeAdapter, HydratorInterface $hydrator, Entity $prototype)
    {
        $this->hydrator = $hydrator;
            
        $this->prototype = $prototype;
            
        parent::__construct($readAdapter, $writeAdapter);
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Mapper\MysqlMapperInterface::getAll()
     */
    public function getAll(array $filter)
    {
        $this->select = $this->readSql->select('category_attribute_value');
                    
        $this->joinCategoryAttribute()->joinCategory();
        
        $this->filter($filter); 
        
        if (array_key_exists('pagination', $filter)) {
            if ($filter['pagination'] == 'off') {  
                return $this->getRows();    
            }
        }

        return $this->getPaginator();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Mapper\MysqlMapperInterface::get()
     */
    public function get($id)
    {
        $this->select = $this->readSql->select('category_attribute_value');

        $this->joinCategoryAttribute()->joinCategory();
        
        $this->select->where(array(
            'category_attribute_value.category_attribute_value_id = ?' => $id  
        ));
                    
        return $this->getRow();
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Mapper\MysqlMapperInterface::save()
     */
    public function save(Entity $entity)
    {
        $postData = $this->hydrator->extract($entity);
                    
        if ($entity->getCategoryAttributeValueId()) {
            $this->update = new Update('category_attribute_value'); 
                
            $this->update->set($postData);  
                
            $this->update->where(array(
                'category_attribute_value.category_attribute_value_id = ?' => $entity->getCategoryAttributeValueId()
            ));
                    
            $this->updateRow();            
        } else {
            $this->insert = new Insert('category_attribute_value'); 
                
            $this->insert->values($postData);
                
            $id = $this->createRow();
                
            $entity->setCategoryAttributeValueId($id);        
        }
                    
        return $this->get($entity->getCategoryAttributeValueId());
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Mapper\MysqlMapperInterface::delete()
     */
    public function delete(Entity $entity)
    {
        $this->delete = new Delete('category_attribute_value');
        
        $this->delete->where(array(
             'category_attribute_value.category_attribute_value_id = ?' => $entity->getCategoryAttributeValueId()
        ));
                 
        return $this->deleteRow();
    }

    /**
     * Filters and search
     *
     * @param array $filter
     * @return \CategoryAttributeValue\Mapper\MysqlMapper
     */
    protected function filter(array $filter)
    {
        if(array_key_exists('categoryId', $filter) && strlen($filter['categoryId']) > 0) {
            $this->select->where(array(
                'category_attribute_value.category_id = ?' => $filter['categoryId']
            ));
            
        }
        return $this;
    }
    
    /**
     * 
     * @return \Pacificnm\CategoryAttributeValue\Mapper\MysqlMapper
     */
    protected function joinCategoryAttribute()
    {
        $this->select->join('category_attribute', 'category_attribute.category_attribute_id = category_attribute_value.category_attribute_id', array(
            'category_attribute_type',
            'category_attribute_name',
            'category_attribute_active'
        ), 'left');
        
        return $this;
    }
    
    /**
     * 
     * @return \Pacificnm\CategoryAttributeValue\Mapper\MysqlMapper
     */
    protected function joinCategory()
    {
        $this->select->join('category', 'category.category_id = category_attribute_value.category_id', array(
            'category_name',
            'category_slug',
            'category_parent_id',
            'category_root_id',
            'category_level',
            'category_active'
        ), 'left');
       
        return $this;
    }


}

