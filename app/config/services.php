<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Session as Flash;
use Phalcon\Cache\Frontend\Data as FrontData;
use Models\Context;
use Models\Converter;
/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

//$di->set(
//    'context',
//    function () {
//        return Context::getContext();
//    }
//);
/**
 * The URL component is used to generate all kind of urls in the application
 */
//$di->setShared('url', function () {
//    $config = $this->getConfig();
//
//    $url = new UrlResolver();
//    $url->setBaseUri($config->application->baseUri);
//
//    return $url;
//});
/**
 * The URL component is used to generate all kind of urls in the application
 */
//$di->setShared('url', function () {
//    $config = $this->getConfig();
//    $url = new UrlManager();
//    $url->setBaseUri($config->application->baseUri);
//    return $url;
//});
/**
 * Setting up the view component
// */

/**
 * Database connection is created based in the parameters defined in the configuration file
 */

$di->setShared('db', function () {

    $config = $this->getConfig();
    return new \Phalcon\Db\Adapter\Pdo\Mysql(
        [
            'host' => $config->database->host,
            'username' => $config->database->username,
            'password' => $config->database->password,
            'dbname' => $config->database->dbname,
            'charset' => $config->database->charset
        ]
    );
});
/**
 * If the configuration specify the use of metadata adapter use it or use memory otherwise
 */
$di->setShared('modelsMetadata', function () {
    return new MetaDataAdapter();
});

/**
 * Register the session flash service with the Twitter Bootstrap classes
 */
$di->set('flash', function () {
    return new Flash([
        'error'   => 'alert alert-danger',
        'success' => 'alert alert-success',
        'notice'  => 'alert alert-info',
        'warning' => 'alert alert-warning'
    ]);
});

$di->set(
    "flashDirect",
    function () {
        $flashDirect = new \Phalcon\Flash\Direct([
            "error" => "alert alert-danger",
            "success" => "alert alert-success alert-dismissable",
            "notice" => "alert alert-info",
            "warning" => "alert alert-warning",
        ]);
        $flashDirect->setImplicitFlush('<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>');
        $flashDirect->setAutoescape(false);

        return $flashDirect;
    }
);



/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});
