<?php
namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Employee;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $empl = Employee::find('id_role = 2');
        $this->view->employees = $empl;
    }

    public function pricesAction()
    {
    }
    public function aboutUsAction()
    {
        $empl = Employee::find();
        $this->view->employees = $empl;
    }
}

