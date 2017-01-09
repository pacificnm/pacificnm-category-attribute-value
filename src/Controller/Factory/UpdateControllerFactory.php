<?php

namespace Pacificnm\CategoryAttributeValue\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeValue\Controller\UpdateController;

class UpdateControllerFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \Pacificnm\CategoryAttributeValue\Controller\UpdateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();

        $service = $realServiceLocator->get('Pacificnm\CategoryAttributeValue\Service\ServiceInterface');

        $form = $realServiceLocator->get('Pacificnm\CategoryAttributeValue\Form\Form');

        return new UpdateController($service, $form);
    }


}

