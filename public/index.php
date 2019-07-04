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
        $router->add('/:module/:controller/:action/:params/:params2', array(
            'module'     => 1,
            'controller' => 2,
            'action' => 3,
            'params' => 4,
            'params2' => 5,
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
        $router->add('/admin/feedback/filter', array(
            'module'     => 'backend',
            'controller' => 'feedback',
            'action' => 'filter',
        ));
        $router->add('/admin/feedback/update-status', array(
            'module'     => 'backend',
            'controller' => 'feedback',
            'action' => 'updateStatus'
        ))->setName('feedback-update-status');

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
        $router->add('/admin/employee/view/:int', array(
            'module'     => 'backend',
            'controller' => 'employee',
            'action'     => 'view',
            'id_employee' => 1
        ))->setName('employee-view');
        $router->add('/admin/employee/photo/:int', array(
            'module'     => 'backend',
            'controller' => 'employee',
            'action'     => 'photo',
            'id_employee' => 1
        ))->setName('employee-photo');
        $router->add('/admin/reception', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action'     => 'index',
        ))->setName('reception');
        $router->add('/admin/reception/concrete-day/:int/:int', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action' => 'concreteDay',
            'id_month' => 1,
            'id_day' => 2
        ))->setName('reception-concrete-day');
//        $router->add('/admin/reception/concrete-day-test', array(
//            'module'     => 'backend',
//            'controller' => 'reception',
//            'action' => 'concreteDayTest',
//        ))->setName('reception-concrete-day-test');
        $router->add('/admin/reception/create', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action'     => 'createReception',
        ))->setName('create-reception');
        $router->add('/admin/reception/create-new', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action'     => 'createNewReception',
        ))->setName('create-new-reception');

        $router->add('/admin/reception/:int', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action'     => 'editReception',
            'id_reception' => 1,
        ))->setName('edit-reception');
        $router->add('/admin/reception/all', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action'     => 'allReception',
        ))->setName('all-receptions');
        $router->add('/admin/reception/filter', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action' => 'filterAllReceptions',
        ));
        $router->add('/admin/reception/change-payed-status', array(
            'module'     => 'backend',
            'controller' => 'reception',
            'action' => 'changePayedStatus',
        ));


        $router->add('/admin/clients', array(
            'module'     => 'backend',
            'controller' => 'client',
            'action'     => 'index',
        ))->setName('clients');
        $router->add('/admin/clients/filter', array(
            'module'     => 'backend',
            'controller' => 'client',
            'action' => 'filter',
        ));
        $router->add('/admin/client/:int', array(
            'module'     => 'backend',
            'controller' => 'client',
            'action' => 'updateClient',
            'id_client' => 1
        ))->setName('update-client');

        $router->add('/admin/clients/add', array(
            'module'     => 'backend',
            'controller' => 'client',
            'action' => 'addClient',
        ))->setName('add-client');


        $router->add('/admin/news', array(
            'module'     => 'backend',
            'controller' => 'news',
            'action'     => 'index',
        ))->setName('news');
        $router->add('/admin/article/:int', array(
            'module'     => 'backend',
            'controller' => 'news',
            'action' => 'editArticle',
            'id_news' => 1
        ))->setName('edit-article');

        $router->add('/admin/article/add', array(
            'module'     => 'backend',
            'controller' => 'news',
            'action' => 'addArticle',
        ))->setName('add-article');
        $router->add('/admin/article/view/:int', array(
            'module'     => 'backend',
            'controller' => 'news',
            'action' => 'viewArticle',
            'id_news' => 1
        ))->setName('view-article');
        $router->add('/admin/news/change-valid-status', array(
            'module'     => 'backend',
            'controller' => 'news',
            'action' => 'changeValidStatus',
        ));


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

