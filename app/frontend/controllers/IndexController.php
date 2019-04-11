<?php
namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Employee;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->assets->addCss('/css/index.css?v=1');
    }

    public function indexAction()
    {
        $empl = Employee::find('id_role < 3');
        $this->view->employees = $empl;
    }

    public function pricesAction()
    {
    }
    public function aboutUsAction()
    {
        $empl = Employee::find('id_role < 3');
        $this->view->employees = $empl;
    }
}

