<?php

namespace Multiple\Frontend;

use Phalcon\Loader;
use Phalcon\Mvc\View;
use Phalcon\DiInterface;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\ModuleDefinitionInterface;


use Phalcon\Mvc\View\Engine\Php as PhpEngine;
use Phalcon\Mvc\View\Engine\Volt as VoltEngine;
use Phalcon\Flash\Session as Flash;

class Module implements ModuleDefinitionInterface
{
    /**
     * Register a specific autoloader for the module
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $loader = new Loader();

        $loader->registerNamespaces(
            [
                'Multiple\Frontend\Controllers' => '../app/frontend/controllers/',
                'Multiple\Frontend\Models'      => '../app/frontend/models/',
            ]
        );

        $loader->register();
    }

    /**
     * Register specific services for the module
     */
    public function registerServices(DiInterface $di)
    {
        // Registering a dispatcher
        $di->set(
            'dispatcher',
            function () {
                $dispatcher = new Dispatcher();

                $dispatcher->setDefaultNamespace('Multiple\Frontend\Controllers');

                return $dispatcher;
            }
        );

        // Registering the view component
//        $di->set(
//            'view',
//            function () {
//                $view = new View();
//
//                $view->setViewsDir('../app/frontend/views/');
//
//                return $view;
//            }
//        );

        $di['view'] = function () {

            $view = new View();

            $view->registerEngines(array(
                ".volt" => 'volt'
            ));
            $view->setViewsDir(__DIR__ . '/views/');
            $view->setLayoutsDir('../views/layouts/');
            $view->setLayout('index');
            return $view;
        };

        $di->set('volt', function ($view, $di) {
//            echo __DIR__;
//            die;
            $volt = new VoltEngine($view, $di);

            $volt->setOptions(array(
                "compiledPath" => __DIR__ . "/cache/",
                'compileAlways' => true
            ));
            $compiler = $volt->getCompiler();
            $compiler->addFunction('strtotime', 'strtotime');
            return $volt;
        }, true);


    }
}

