<?php

use Phalcon\Mvc\View;
use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\Url as UrlResolver;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Mvc\Model\Metadata\Memory as MetaDataAdapter;
use Phalcon\Session\Adapter\Files as SessionAdapter;
use Phalcon\Flash\Direct as Flash;

/**
 * Shared configuration service
 */
$di->setShared('config', function () {
    return include APP_PATH . "/config/config.php";
});

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
//    $url = new \Models\UrlManager();
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

    $di->setShared('view', function () {
        $config = $this->getConfig();
//        echo $config->application->viewsDir ;
//        echo __DIR__ ;
//        die;
        $view = new View();
        $view->setDI($this);
        $view->setViewsDir($config->application->viewsDir);
        $view->setLayoutsDir($config->application->viewsDir . 'layouts/');
        $view->setLayout('index');

        $view->registerEngines([
            '.volt' => function ($view) {
                $config = $this->getConfig();

                $volt = new VoltEngine($view, $this);

                $volt->setOptions([
                    'compiledPath' => $config->application->cacheDir,
                    'compiledSeparator' => '_',
                    'compileAlways' => true
                ]);

                return $volt;
            },
            '.phtml' => PhpEngine::class

        ]);

        return $view;
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
/**
 * Registering a router
 */
$di->setShared('router', function () {
    $router = new \Phalcon\Mvc\Router();
    $router->setDefaultModule('frontend');
    $router->mount(new FrontendRoutes());
    $router->mount(new BackendRoutes());
    $router->removeExtraSlashes(true);
    $router->handle();
    return $router;
});

/**
 * Start the session the first time some component request the session service
 */
$di->setShared('session', function () {
    $session = new SessionAdapter();
    $session->start();

    return $session;
});
