<?php
namespace Application;

use Zend\Mvc\MvcEvent;
use Locale;

class Module
{

    public function onBootstrap(MvcEvent $e)
    {
        $lang = isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) ? $_SERVER['HTTP_ACCEPT_LANGUAGE'] : 'en';
        $locale = Locale::getPrimaryLanguage(Locale::acceptFromHttp($lang));
        $translator = $e->getApplication()->getServiceManager()->get('translator');
        $translator->setLocale($locale);
    }

    public function getConfig()
    {
        $config = include __DIR__ . '/config/module.config.php';
        $files = glob(__DIR__ . '/config/autoload/*.config.php');
        
        foreach ($files as $file) {
            $config = array_replace_recursive($config, include $file);
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

    public function getServiceConfig()
    {
        return array(
            'aliases' => array(
                'translator' => 'MvcTranslator',
                'entitymanager' => 'Doctrine\ORM\EntityManager'
            )
        );
    }

}
