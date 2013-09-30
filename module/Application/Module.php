<?php
namespace Application;

class Module
{

    public function getConfig()
    {
        return array(
            'router' => array(
                'routes' => array(
                    'home' => array(
                        'type' => 'literal',
                        'options' => array(
                            'route' => '/',
                            'defaults' => array(
                                'controller' => __NAMESPACE__ . '\Controller\Index',
                                'action' => 'index'
                            )
                        )
                    )
                )
            ),
            'controllers' => array(
                'invokables' => array(
                    'Application\Controller\Index' => 'Application\Controller\IndexController'
                )
            ),
            'view_manager' => array(
                'doctype' => 'HTML5',
                'exception_template' => 'error/index',
                'template_map' => array(
                    'error/index' => __DIR__ . '/view/error/index.phtml'
                ),
                'template_path_stack' => array(
                    __DIR__ . '/view'
                )
            )
        );
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__
                )
            )
        );
    }

}
