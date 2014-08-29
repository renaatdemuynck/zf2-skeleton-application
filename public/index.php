<?php

// Make paths relative to the application root
chdir(dirname(__DIR__));

// Include Composer autoloader
require_once "vendor/autoload.php";

// Get the current environment (development, testing, staging, production, ...)
// Assume production if environment not defined
define('APP_ENV',  strtolower(getenv('APPLICATION_ENV') ?: 'production'));

// Get the default config file
$config = require 'config/application.config.php';

// Check if the environment config file exists and merge it with the default
$env_config_file = 'config/application.' . APP_ENV . '.config.php';
if (is_readable($env_config_file)) {
    $config = array_replace_recursive($config, require $env_config_file);
}

// Run the application!
Zend\Mvc\Application::init($config)->run();
