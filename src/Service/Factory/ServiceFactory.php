<?php

namespace Pacificnm\CategoryAttributeValue\Service\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeValue\Service\Service;

class ServiceFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return Pacificnm\CategoryAttributeValue\Service\Service
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $mapper = $serviceLocator->get('Pacificnm\CategoryAttributeValue\Mapper\MysqlMapperInterface');

        return new Service($mapper);
    }


}

