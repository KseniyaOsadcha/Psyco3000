<?php

use Phalcon\Mvc\Router\Group as RouterGroup;
use Phalcon\Mvc\Router;

class FrontendRoutes extends RouterGroup
{
    public function __construct($config = null)
    {
        parent::__construct($config);
        $this->initalize();
    }

    public function initalize()
    {

        $this->setPaths(
            [
                "module" => "frontend",
            ]
        );

        $this->add('/:controller', array(
            'controller' => 1,
            'action' => 'index'
        ));
        $this->add('/:controller/:action', array(
            'controller' => 1,
            'action' => 2
        ));
        $this->add('/:controller/:action/:params', array(
            'controller' => 1,
            'action' => 2,
            'params' => 3
        ));
        $this
            ->add(
                '/',
                [
                    'controller' => 'index',
                    'action'     => 'index',
                ]
            )
            ->setName('home-page');
        $this->add('/news', array(
            'controller' => 'news',
            'action'     => 'index'
        ))->setName('news');    }
}