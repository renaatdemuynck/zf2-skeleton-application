<?php
namespace Application;

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
            __NAMESPACE__ . '\Controller\Index' => __NAMESPACE__ . '\Controller\IndexController'
        )
    ),
    'view_manager' => array(
        'doctype' => 'HTML5',
        'exception_template' => 'error/index',
        'template_map' => array(
            'error/index' => __DIR__ . '/../view/error/index.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view'
        )
    ),
    'translator' => array(
        'locale' => 'en',
        'translation_file_patterns' => array(
            array(
                'type' => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern' => '%s.mo'
            )
        )
    )
);
