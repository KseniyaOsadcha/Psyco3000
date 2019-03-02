<?php

$router = $di->getRouter();

//
//// Define your routes here
//
//$router->add(
//    '/:controller/:action',
//    [
//        'controller' => 1,
//        'action'     => 2,
//    ]
//);

$router->add('/:controller', array(
    'controller' => 1,
    'action' => 'index'
));
$router->add('/:controller/:action', array(
    'controller' => 1,
    'action' => 2
));

$router->add('/:controller/:action/:params', array(
    'controller' => 1,
    'action' => 2,
    'params' => 3
));

$router->add('/', array(
        'controller' => 'index',
        'action'     => 'index',
    ))->setName('home-page');

$router->add('/news', array(
            'controller' => 'news',
            'action'     => 'index'
    ))->setName('news');
$router->add('/news/:int', array(
    'controller' => 'news',
    'action' => 'view',
    'id_news' => 1,
))->setName('article-view');

$router->add('/contact', array(
    'controller' => 'feedback',
    'action'     => 'contact'
))->setName('contact');

$router->add('/prices', array(
    'controller' => 'index',
    'action'     => 'prices'
))->setName('prices');
$router->add('/about-us', array(
    'controller' => 'index',
    'action'     => 'aboutUs'
))->setName('about-us');
$router->add('/feedback', array(
    'controller' => 'feedback',
    'action'     => 'index'
))->setName('feedback');
$router->add('/feedback-mail', array(
    'controller' => 'feedback',
    'action'     => 'mail'
))->setName('feedback-mail');
$router->handle();
