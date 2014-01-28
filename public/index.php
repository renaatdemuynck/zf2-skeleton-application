<?php

// Make paths relative to the application root
chdir(dirname(__DIR__));

// Include Composer autoloader
require_once "vendor/autoload.php";

// Configure the application
$config = include 'config/application.config.php';

// Run the application!
Zend\Mvc\Application::init($config)->run();
