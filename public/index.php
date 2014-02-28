<?php

 /*** error reporting on ***/
 error_reporting(E_ALL);

 /*** define the site path ***/
 $site_path = realpath(dirname(__FILE__));
 $back_path = str_replace("\public","",$site_path);
 define ('__SITE_PATH', $back_path);

 /*** include the init.php file ***/
 include __SITE_PATH . '/includes/init.php';

 /*** load the router ***/
 $registry->router = new router($registry);

 /*** set the controller path ***/
 $registry->router->setPath (__SITE_PATH . '/controller');

 /*** load up the template ***/
 $registry->template = new template($registry);

 /*** load the controller ***/
 $registry->router->loader();
