<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();
//
//$loader = new \Phalcon\Loader();
//
///**
// * We're a registering a set of directories taken from the configuration file
// */
//$loader->registerDirs(
//    [
//        $config->application->modelsDir
//    ]
//);
//$loader->registerClasses([
//    'BackendRoutes'         => '../app/config/BackendRoutes.php',
//    'FrontendRoutes' => '../app/config/FrontendRoutes.php',
//]);
//$loader->registerNamespaces([
//
//]);
//$loader->register();
