<?php

/* * * include the controller class ** */
include __SITE_PATH . '/application/' . 'controller_base.class.php';

/* * * include the registry class ** */
include __SITE_PATH . '/application/' . 'registry.class.php';

/* * * include the router class ** */
include __SITE_PATH . '/application/' . 'router.class.php';

/* * * include the template class ** */
include __SITE_PATH . '/application/' . 'template.class.php';

/* * * auto load model classes ** */

function autoload_model($class_name) {
    $filename = strtolower($class_name) . '.php';
    $file = __SITE_PATH . '/model/' . $filename;

    if (file_exists($file) == false) {
        return false;
    }
    include ($file);
} 

/*
 * auto load from the model folder
 */
spl_autoload_extensions('.php, .class.php');
spl_autoload_register('autoload_model');

/*
 * Load classes on request from vendor/composer folder
 */
!file_exists(__SITE_PATH.'/vendor/autoload.php') ? : require_once __SITE_PATH.'/vendor/autoload.php';



/* * ******************************************************
 * Load classes based on namespace psr-0
 */

// holds namespace values 
include 'psr0.php';

/**
 * Go through names spaces and create an array of possible folders to search for class file
 */
function psr0_autoload($class) {
    $map = psr0values();
    $classFolders = array();
    $filename = strtolower($class) . '.php';

    //set all the folders to check
    foreach ($map as $namespace => $path) {
        $dir = setPath($namespace, $path);
        $dir === false ? : array_push($classFolders, $dir);
    }

    //loop and include file if found
    foreach ($classFolders as $folder) {
        $file = $folder . '/' . $filename;
        !file_exists($file) ? : include ($file);
    }
}

/*
 * Turn namespaces into directories
 */

function setPath($prefix, $paths) {
    $loadDir = $paths . '/' . $prefix;
    return file_exists($loadDir) ? $loadDir : false;
}

spl_autoload_register('psr0_autoload');




/* * * a new registry object ** */
$registry = new registry;

/* * * create the database registry object ** */
// $registry->db = db::getInstance();

