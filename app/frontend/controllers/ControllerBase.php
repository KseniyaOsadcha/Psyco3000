<?php
namespace Multiple\Frontend\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets->addCss('/vendor/bootstrap/css/bootstrap.min.css')
            ->addCss('/css/layouts.css?v=2');
        $this->assets->addJs('/vendor/jquery/jquery.min.js')
            ->addJs('/vendor/bootstrap/js/bootstrap.min.js')
            ->addJs('/js/layouts.js?v=1');
        $this->tag->appendTitle(' | NewSens');
    }
}
