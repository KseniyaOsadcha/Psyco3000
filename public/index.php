<?php

use Phalcon\Mvc\Router;
use Phalcon\Mvc\Application;
use Phalcon\Di\FactoryDefault;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Session\Factory;




error_reporting(E_ALL);

define('BASE_PATH', dirname(__DIR__));
define('APP_PATH', BASE_PATH . '/app');

try {


$di = new FactoryDefault();
    /**
     * Read services
     */
    include APP_PATH . '/config/services.php';

    /**
     * Get config service for use in inline setup below
     */
//    $config = $di->getConfig();

    /**
     * Include Autoloader
     */
//    include APP_PATH . '/config/loader.php';



// Start the session the first time when some component request the session service
$di->setShared(
    'session',
    function () {
        $session = new Session();

        $session->start();

        return $session;
    }
);

$di->set(
    'router',
    function () {
        $router = new Router();

        $router->setDefaultModule('frontend');

        $router->add('/:module/:controller', array(
            'module'     => 1,
            'controller' => 2,
            'action' => 'index'
        ));
        $router->add('/:module/:controller/:action', array(
            'module'     => 1,
            'controller' => 2,
            'action' => 3
        ));

        $router->add('/:module/:controller/:action/:params', array(
            'module'     => 1,
            'controller' => 2,
            'action' => 3,
            'params' => 4
        ));

        //backend
        $router->add('/admin/login', array(
            'module'     => 'backend',
            'controller' => 'index',
            'action'     => 'login',
        ))->setName('login');
        $router->add('/admin/register', array(
            'module'     => 'backend',
            'controller' => 'index',
            'action'     => 'register',
        ))->setName('register');
        $router->add('/admin/logout', array(
            'module'     => 'backend',
            'controller' => 'index',
            'action'     => 'logout',
        ))->setName('logout');
        $router->add('/admin/index', array(
            'module'     => 'backend',
            'controller' => 'index',
            'action'     => 'index',
        ))->setName('admin-index');
        $router->add('/admin/feedbacks', array(
            'module'     => 'backend',
            'controller' => 'feedback',
            'action'     => 'index',
        ))->setName('admin-feedbacks');

        $router->add('/admin/employees', array(
            'module'     => 'backend',
            'controller' => 'employee',
            'action'     => 'index',
        ))->setName('admin-employees');
        $router->add('/admin/account', array(
            'module'     => 'backend',
            'controller' => 'employee',
            'action'     => 'account',
        ))->setName('account');

        //frontend
        $router->add('/', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'index',
        ))->setName('home-page');

        $router->add('/news', array(
            'module'     => 'frontend',
            'controller' => 'news',
            'action'     => 'index'
        ))->setName('news');
        $router->add('/news/:int', array(
            'module'     => 'frontend',
            'controller' => 'news',
            'action' => 'view',
            'id_news' => 1,
        ))->setName('article-view');

        $router->add('/contact', array(
            'module'     => 'frontend',
            'controller' => 'feedback',
            'action'     => 'contact'
        ))->setName('contact');

        $router->add('/prices', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'prices'
        ))->setName('prices');
        $router->add('/about-us', array(
            'module'     => 'frontend',
            'controller' => 'index',
            'action'     => 'aboutUs'
        ))->setName('about-us');
        $router->add('/feedback', array(
            'module'     => 'frontend',
            'controller' => 'feedback',
            'action'     => 'index'
        ))->setName('feedback');
        $router->add('/feedback-mail', array(
            'module'     => 'frontend',
            'controller' => 'feedback',
            'action'     => 'mail'
        ))->setName('feedback-mail');
        return $router;
    }
);


$application = new Application($di);

// Register the installed modules
$application->registerModules(
    [
        'frontend' => [
            'className' => 'Multiple\Frontend\Module',
            'path'      => '../app/frontend/Module.php',
        ],
        'backend'  => [
            'className' => 'Multiple\Backend\Module',
            'path'      => '../app/backend/Module.php',
        ]
    ]
);

//    $application = new \Phalcon\Mvc\Application($di);

    echo str_replace(["\n","\r","\t"], '', $application->handle()->getContent());

} catch (\Exception $e) {
    echo $e->getMessage() . '<br>';
    echo '<pre>' . $e->getTraceAsString() . '</pre>';
}

//
//try {
//    // Handle the request
//    $response = $application->handle();
//
//    $response->send();
//} catch (\Exception $e) {
//    echo $e->getMessage();
//}

