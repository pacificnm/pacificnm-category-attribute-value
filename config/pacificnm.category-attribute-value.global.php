<?php 
return array(
    'module' => array(
        'CategoryAttributeValue' => array(
            'name' => 'CategoryAttributeValue',
            'version' => '1.0.0',
            'install' => array(
                'require' => array(),
                'sql' => 'sql/category-attribute-value.sql'
            )
        )
    ),
    'controllers' => array(
        'factories' => array(
            'Pacificnm\CategoryAttributeValue\Controller\ConsoleController' => 'Pacificnm\CategoryAttributeValue\Controller\Factory\ConsoleControllerFactory',
            'Pacificnm\CategoryAttributeValue\Controller\CreateController' => 'Pacificnm\CategoryAttributeValue\Controller\Factory\CreateControllerFactory',
            'Pacificnm\CategoryAttributeValue\Controller\DeleteController' => 'Pacificnm\CategoryAttributeValue\Controller\Factory\DeleteControllerFactory',
            'Pacificnm\CategoryAttributeValue\Controller\IndexController' => 'Pacificnm\CategoryAttributeValue\Controller\Factory\IndexControllerFactory',
            'Pacificnm\CategoryAttributeValue\Controller\RestController' => 'Pacificnm\CategoryAttributeValue\Controller\Factory\RestControllerFactory',
            'Pacificnm\CategoryAttributeValue\Controller\UpdateController' => 'Pacificnm\CategoryAttributeValue\Controller\Factory\UpdateControllerFactory',
            'Pacificnm\CategoryAttributeValue\Controller\ViewController' => 'Pacificnm\CategoryAttributeValue\Controller\Factory\ViewControllerFactory'
        )
    ),
    'service_manager' => array(
        'factories' => array(
            'Pacificnm\CategoryAttributeValue\Service\ServiceInterface' => 'Pacificnm\CategoryAttributeValue\Service\Factory\ServiceFactory',
            'Pacificnm\CategoryAttributeValue\Mapper\MysqlMapperInterface' => 'Pacificnm\CategoryAttributeValue\Mapper\Factory\MysqlMapperFactory',
            'Pacificnm\CategoryAttributeValue\Form\Form' => 'Pacificnm\CategoryAttributeValue\Form\Factory\FormFactory',
        )
    ),
    'router' => array(
        'routes' => array(
            'category-attribute-value-create' => array(
                'pageTitle' => 'Category Attribute Value',
                'pageSubTitle' => 'New',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-value-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category/[:categoryId]/category-attribute-value/create',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeValue\Controller\CreateController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-value-delete' => array(
                'pageTitle' => 'Category Attribute Value',
                'pageSubTitle' => 'Delete',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-value-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute-value/delete/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeValue\Controller\DeleteController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-value-index' => array(
                'pageTitle' => 'Category Attribute Value',
                'pageSubTitle' => 'Home',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-value-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'literal',
                'options' => array(
                    'route' => '/admin/category-attribute-value',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeValue\Controller\IndexController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-value-rest' => array(
                'pageTitle' => 'Category Attribute Value',
                'pageSubTitle' => 'Rest',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-value-index',
                'icon' => 'fa fa-gear',
                'layout' => 'rest',
                'type' => 'segment',
                'options' => array(
                    'route' => '/api/category-attribute-value[/:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeValue\Controller\RestController'
                    )
                )
            ),
            'category-attribute-value-update' => array(
                'pageTitle' => 'Category Attribute Value',
                'pageSubTitle' => 'Edit',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-value-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute-value/update/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeValue\Controller\UpdateController',
                        'action' => 'index'
                    )
                )
            ),
            'category-attribute-value-view' => array(
                'pageTitle' => 'Category Attribute Value',
                'pageSubTitle' => 'View',
                'activeMenuItem' => 'admin-index',
                'activeSubMenuItem' => 'category-attribute-value-index',
                'icon' => 'fa fa-gear',
                'layout' => 'admin',
                'type' => 'segment',
                'options' => array(
                    'route' => '/admin/category-attribute-value/view/[:id]',
                    'defaults' => array(
                        'controller' => 'Pacificnm\CategoryAttributeValue\Controller\ViewController',
                        'action' => 'index'
                    )
                )
            )
        )
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'category-attribute-value-console-index' => array(
                    'options' => array(
                        'route' => 'category-attribute-value',
                        'defaults' => array(
                            'controller' => 'Pacificnm\CategoryAttributeValue\Controller\ConsoleController',
                            'action' => 'index'
                        )
                    )
                )
            )
        ),
    ),
    'view_manager' => array(
        'controller_map' => array(
            'Pacificnm\CategoryAttributeValue' => true
        ),
        'template_map' => array(
            'pacificnm/category-attribute-value/create/index' => __DIR__ . '/../view/category-attribute-value/create/index.phtml',
            'pacificnm/category-attribute-value/delete/index' => __DIR__ . '/../view/category-attribute-value/delete/index.phtml',
            'pacificnm/category-attribute-value/index/index' => __DIR__ . '/../view/category-attribute-value/index/index.phtml',
            'pacificnm/category-attribute-value/update/index' => __DIR__ . '/../view/category-attribute-value/update/index.phtml',
            'pacificnm/category-attribute-value/view/index' => __DIR__ . '/../view/category-attribute-value/view/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'acl' => array(
        'default' => array(
            'guest' => array(),
            'administrator' => array(
                'category-attribute-value-create',
                'category-attribute-value-delete',
                'category-attribute-value-index',
                'category-attribute-value-update',
                'category-attribute-value-view'
            )
        )
    ),
    'menu' => array(
        'default' => array()
    ),
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Admin',
                'route' => 'admin-index',
                'useRouteMatch' => true,
                'pages' => array(
                    array(
                        'label' => 'Category Attribute Value',
                        'route' => 'category-attribute-value-index',
                        'useRouteMatch' => true,
                        'pages' => array(
                            array(
                                'label' => 'View',
                                'route' => 'category-attribute-value-view',
                                'useRouteMatch' => true,
                                'pages' => array(
                                    array(
                                        'label' => 'Edit',
                                        'route' => 'category-attribute-value-update',
                                        'useRouteMatch' => true,
                                    ),
                                    array(
                                        'label' => 'Delete',
                                        'route' => 'category-attribute-value-delete',
                                        'useRouteMatch' => true,
                                    )
                                )
                            ),
                            array(
                                'label' => 'New',
                                'route' => 'category-attribute-value-create',
                                'useRouteMatch' => true,
                            )
                        )
                    )
                )
            )
        )
    )
);