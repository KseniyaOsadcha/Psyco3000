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

$router
    ->add(
        '/',
        [
            'controller' => 'index',
            'action'     => 'index',
        ]
    )
    ->setName('home-page');
$router->add('/news', array(
            'controller' => 'news',
            'action'     => 'index'
    ))->setName('news');

$router->handle();

