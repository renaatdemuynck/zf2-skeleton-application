<?php

// Make paths relative to the application root
chdir(dirname(__DIR__));

// Configure autoloader
require_once 'Zend/Loader/AutoloaderFactory.php';
Zend\Loader\AutoloaderFactory::factory(array(
    'Zend\Loader\StandardAutoloader' => array(
        'autoregister_zf' => true
    )
));

// Configure the application
$config = include 'config/application.config.php';

// Run the application!
Zend\Mvc\Application::init($config)->run();
