<?php

/**
 * LavaLust - PHP Framework For Web Artisans
 *
 * @package  LavaLust
 * @author   LavaLust Dev Team
 */

define('ENVIRONMENT', getenv('CI_ENV') ?: 'development');

switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;

    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        if (version_compare(PHP_VERSION, '5.3', '>=')) {
            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        } else {
            error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
        }
        break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', true, 503);
        echo 'The application environment is not set correctly.';
        exit(1);
}

// Path to the system folder
$system_path = realpath(__DIR__ . '/../system') ?: __DIR__ . '/../system';

// Path to the app folder
$application_folder = realpath(__DIR__ . '/../app') ?: __DIR__ . '/../app';

// Path to the views folder
$view_folder = '';

/*
 * --------------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * --------------------------------------------------------------------
 */

if (!is_dir($system_path)) {
    header('HTTP/1.1 503 Service Unavailable.', true, 503);
    echo 'Your system folder path does not appear to be set correctly. Please check.';
    exit(3);
}

/*
 * --------------------------------------------------------------------
 *  Now load the bootstrap file
 * --------------------------------------------------------------------
 */

define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', str_replace('\\', '/', $system_path) . '/');
define('APPPATH', str_replace('\\', '/', $application_folder) . '/');
define('VIEWPATH', $view_folder);

require_once BASEPATH . 'core/CodeIgniter.php';
