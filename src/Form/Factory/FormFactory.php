<?php

namespace Pacificnm\CategoryAttributeValue\Form\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeValue\Form\Form;

class FormFactory
{

    /**
     * @param ServiceLocatorInterface $serviceLocator
     * @return \CategoryAttributeValue\Form\Form
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $attributeService = $serviceLocator->get('Pacificnm\CategoryAttribute\Service\ServiceInterface');
        
        $optionService = $serviceLocator->get('Pacificnm\CategoryAttributeOption\Service\ServiceInterface');
        
        return new Form($attributeService, $optionService);
    }


}

