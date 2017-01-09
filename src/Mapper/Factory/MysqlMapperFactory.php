<?php

namespace Pacificnm\CategoryAttributeValue\Mapper\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Hydrator\Aggregate\AggregateHydrator;
use Pacificnm\CategoryAttributeValue\Hydrator\Hydrator;
use Pacificnm\CategoryAttributeValue\Entity\Entity;
use Pacificnm\CategoryAttributeValue\Mapper\MysqlMapper;

class MysqlMapperFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeValue\Mapper\MysqlMapper
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $hydrator = new AggregateHydrator();
                    
        $hydrator->add(new Hydrator());  
                    
        $prototype = new Entity();
                    
        $writeAdapter = $serviceLocator->get('db1');
                    
        $readAdapter = $serviceLocator->get('db2');
                    
        return new MysqlMapper($readAdapter, $writeAdapter, $hydrator, $prototype);
    }


}

