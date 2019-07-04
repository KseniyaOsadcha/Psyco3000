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
        $this->tag->setTitle('Центр психотерапии и психиатрии');
        $this->tag->setDescription(
            'Консультация психологов. Доступные цены. Индивидуальный подход'
        );

        $empl = Employee::find('id_role < 3');
        $this->view->employees = $empl;
    }

    public function pricesAction()
    {
        $this->tag->setTitle('Консультация психолога цены');
        $this->tag->setDescription(
            'Услуги квалифицированных и опытных специалистов. Цена от 500 гривен за консультацию.'
        );
    }

    public function aboutUsAction()
    {
        $this->tag->setDescription(
            'Психолог, Гештальт-терапевт, психиатр. Доступные цены. Оболонь, Соломеский район'
        );
        $this->tag->setTitle('О нас');
        $empl = Employee::find('id_role < 3');
        $this->view->employees = $empl;
    }
}

