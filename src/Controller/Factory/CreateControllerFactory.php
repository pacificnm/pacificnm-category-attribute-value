<?php
namespace Pacificnm\CategoryAttributeValue\Controller\Factory;

use Zend\ServiceManager\ServiceLocatorInterface;
use Pacificnm\CategoryAttributeValue\Controller\CreateController;

class CreateControllerFactory
{

    /**
     *
     * @param ServiceLocatorInterface $serviceLocator            
     * @return \Pacificnm\CategoryAttributeValue\Controller\CreateController
     */
    public function __invoke(ServiceLocatorInterface $serviceLocator)
    {
        $realServiceLocator = $serviceLocator->getServiceLocator();
        
        $service = $realServiceLocator->get('Pacificnm\CategoryAttributeValue\Service\ServiceInterface');
        
        $categoryService = $realServiceLocator->get('Pacificnm\Category\Service\ServiceInterface');
        
        $form = $realServiceLocator->get('Pacificnm\CategoryAttributeValue\Form\Form');
        
        return new CreateController($service, $categoryService, $form);
    }
}

