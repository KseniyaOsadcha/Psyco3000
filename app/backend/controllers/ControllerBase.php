<?php

namespace Multiple\Backend\Controllers;

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets->addCss('/vendor/bootstrap/css/bootstrap.min.css')
            ->addCss('/admin/css/style.css?v=7');
        $this->assets->addJs('/vendor/jquery/jquery.min.js')
            ->addJs('/admin/js/layouts.js?v=3')
            ->addJs('/vendor/bootstrap/js/bootstrap.min.js');
        if ($this->session->has('id-role'))
            $this->view->id_role = $this->session->get('id-role');
        else $this->view->id_role = 0;
    }
}
