<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
        $empl = Employee::find();
        $this->view->employees = $empl;
    }
}

