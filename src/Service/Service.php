<?php

namespace Pacificnm\CategoryAttributeValue\Service;

use Pacificnm\CategoryAttributeValue\Entity\Entity;
use Pacificnm\CategoryAttributeValue\Mapper\MysqlMapperInterface;

class Service implements ServiceInterface
{

    protected $mapper = null;

    /**
     * Service Construct
     *
     * @param MysqlMapperInterface $mapper
     */
    public function __construct(MysqlMapperInterface $mapper)
    {
        $this->mapper = $mapper;
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Service\ServiceInterface::getAll()
     */
    public function getAll(array $filter)
    {
        return $this->mapper->getAll($filter);
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Service\ServiceInterface::get()
     */
    public function get($id)
    {
        return $this->mapper->get($id);
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Service\ServiceInterface::save()
     */
    public function save(Entity $entity)
    {
        return $this->mapper->save($entity);
    }

    /**
     * {@inheritDoc}
     *
     * @see \Pacificnm\CategoryAttributeValue\Service\ServiceInterface::delete()
     */
    public function delete(Entity $entity)
    {
        return $this->mapper->delete($entity);
    }


}

