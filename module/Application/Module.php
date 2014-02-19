<?php
namespace Application;

class Module
{

    public function getConfig()
    {
        $config = include __DIR__ . '/config/module.config.php';
        $files = glob(__DIR__ . '/config/autoload/*.config.php');
        
        foreach ($files as $file) {
            $config = array_merge_recursive($config, include $file);
        }
        
        return $config;
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
