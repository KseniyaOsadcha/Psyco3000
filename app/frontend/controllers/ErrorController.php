<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 04.05.2019
 * Time: 13:57
 */

namespace Multiple\Frontend\Controllers;


class ErrorController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }
    public function show404Action()
    {
        $this->response->setStatusCode(404, 'Not Found');
    }

}