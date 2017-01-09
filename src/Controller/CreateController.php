<?php

namespace Pacificnm\CategoryAttributeValue\Controller;

use Zend\View\Model\ViewModel;
use Pacificnm\Controller\AbstractApplicationController;
use Pacificnm\CategoryAttributeValue\Service\ServiceInterface;
use Pacificnm\CategoryAttributeValue\Form\Form;
use Pacificnm\Category\Service\ServiceInterface as CategoryServiceInterface;
use Pacificnm\CategoryAttributeValue\Entity\Entity;

class CreateController extends AbstractApplicationController
{

    /**
     * 
     * @var ServiceInterface
     */
    protected $service;

    /**
     * 
     * @var CategoryServiceInterface
     */
    protected $categoryService;
    
    /**
     * 
     * @var Form
     */
    protected $form;

    /**
     * 
     * @param ServiceInterface $service
     * @param CategoryServiceInterface $categoryService
     * @param Form $form
     */
    public function __construct(ServiceInterface $service,  CategoryServiceInterface $categoryService, Form $form)
    {
        $this->service = $service;

        $this->categoryService = $categoryService;
        
        $this->form = $form;
    }

    /**
     * {@inheritdoc}
     *
     * @see \Pacificnm\Controller\AbstractApplicationController::indexAction()
     */
    public function indexAction()
    {
        parent::indexAction();

        $request = $this->getRequest();

        $id = $this->params()->fromRoute('categoryId', null);
        
        $categoryEntity = $this->categoryService->get($id);
        
        if(! $categoryEntity) {
            $this->flashMessenger()->addErrorMessage("Can not find category");
            
            return $this->redirect()->toRoute('category-index');
        }
        
        if ($request->isPost()) {
        	$postData = $request->getPost();

        	$this->form->setData($postData);

        	if ($this->form->isValid()) {
        		$formElements = $this->form->getData();

        		foreach($formElements as $key => $formElement) {
        		    if($key != 'submit') {
        		      $entity = new Entity();
        		      
        		      $entity->setCategoryAttributeId($key);
        		      $entity->setCategoryAttributeValue($formElement);
        		      $entity->setCategoryId($categoryEntity->getCategoryId());
        		      
        		      $categoryAttributeValueEntity = $this->service->save($entity);
        		    }
        		}
        		
        		$this->getEventManager()->trigger('category-attribute-value-create', $this, array(
        			'a$messageuthId' => $this->identity()->getAuthId(),
        			'requestUrl' => $this->getRequest()->getUri(),
        			'categoryAttributeValueEntity' => $entity
        		));

        		$this->flashMessenger()->addSuccessMessage('Object was saved');

        		return $this->redirect()->toRoute('category-view', array(
        			'id' => $categoryEntity->getCategoryId()
        		));
        	}
        }
        
        

        return new ViewModel(array(
        	'form' => $this->form
        ));
    }


}

