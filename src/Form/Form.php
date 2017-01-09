<?php
namespace Pacificnm\CategoryAttributeValue\Form;

use Zend\Form\Form as ZendForm;
use Zend\InputFilter\InputFilterProviderInterface;
use Pacificnm\CategoryAttributeValue\Entity\Entity;
use Pacificnm\CategoryAttributeValue\Hydrator\Hydrator;
use Pacificnm\CategoryAttribute\Service\ServiceInterface as AttributeServiceInterface;
use Pacificnm\CategoryAttributeOption\Service\ServiceInterface as OptionServiceInterface;

class Form extends ZendForm implements InputFilterProviderInterface
{

    /**
     *
     * @var AttributeServiceInterface
     */
    protected $attributeService;

    /**
     *
     * @var OptionServiceInterface
     */
    protected $optionService;

    /**
     *
     * @param AttributeServiceInterface $attributeService            
     * @param OptionServiceInterface $optionService            
     * @param string $name            
     * @param array $options            
     */
    public function __construct(AttributeServiceInterface $attributeService, OptionServiceInterface $optionService, $name = 'categoryattributevalue-form', $options = array())
    {
        parent::__construct($name, $options);
        
        $this->attributeService = $attributeService;
        
        $this->optionService = $optionService;
        
        $attributeEntitys = $this->getAttributeEntitys();
        
        foreach ($attributeEntitys as $attributeEntity) {
            if ($attributeEntity->getCategoryAttributeActive() == 1) {
                $this->add($this->getFormElement($attributeEntity->getCategoryAttributeId(), $attributeEntity->getCategoryAttributeType(), $attributeEntity->getCategoryAttributeName()));
            }
        }
        
        $this->add(array(
            'name' => 'submit',
            'type' => 'button',
            'attributes' => array(
                'value' => 'Submit',
                'id' => 'submit',
                'class' => 'btn btn-primary btn-flat'
            )
        ));
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\InputFilter\InputFilterProviderInterface::getInputFilterSpecification()
     */
    public function getInputFilterSpecification()
    {
        return array();
    }

    /**
     *
     * {@inheritdoc}
     *
     * @see \Zend\Form\Element::getAttributes()
     */
    protected function getAttributeEntitys()
    {
        $atributeEntitys = $this->attributeService->getAll(array(
            'pagination' => 'off'
        ));
        
        return $atributeEntitys;
    }

    /**
     * 
     * @param unknown $attributeId
     * @return NULL[]
     */
    protected function getAttributeOptions($attributeId)
    {
        $options = array();
        
        $optionEntitys = $this->optionService->getAll(array(
            'pagination' => 'off',
            'attributeId' => $attributeId
        ));
        
        foreach($optionEntitys as $optionEntity) {
            $options[$optionEntity->getCategoryAttributeOptionValue()] = $optionEntity->getCategoryAttributeOptionDisplay();
        }
        
        return $options;
    }
    
    /**
     *
     * @param string $attributeType            
     * @param string $attributeName            
     * @return string[]|unknown[]|boolean[][]|string[][]|unknown[][]|string[]|unknown[]|unknown[][]|string[][]
     */
    protected function getFormElement($attributeId, $attributeType, $attributeName)
    {
        switch ($attributeType) {
            case 'Boolean':
                return array(
                    'type' => 'Checkbox',
                    'name' => $attributeId,
                    'options' => array(
                        'label' => $attributeName,
                        'use_hidden_element' => true,
                        'checked_value' => '1',
                        'unchecked_value' => '0'
                    ),
                    'attributes' => array(
                        'id' => $attributeId
                    )
                );
                break;
            case 'Textarea':
                return array(
                    'name' => $attributeId,
                    'type' => 'Textarea',
                    'options' => array(
                        'label' => $attributeName
                    ),
                    'attributes' => array(
                        'class' => 'form-control',
                        'id' => $attributeId
                    )
                );
                break;
            case 'Text':
                return array(
                    'name' => $attributeId,
                    'type' => 'Text',
                    'options' => array(
                        'label' => $attributeName
                    ),
                    'attributes' => array(
                        'class' => 'form-control',
                        'id' => $attributeId
                    )
                );
                break;
            case 'Select':
                
                break;
            case 'Hidden':
                
                break;
        }
    }
}

