<?php
/**
 * Created by PhpStorm.
 * User: Andrew Kuzmenko
 * Date: 27.04.2017
 * Time: 17:51
 */

namespace Models;

use Phalcon\Http\Request;


class Context extends BaseModel
{
    /* @var Context */
    protected static $instance;

    /** @var Request */
    protected $request;


    public static function getContext()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Context();
        }
        return self::$instance;
    }

    /**
     * @return Request
     */
    public function getRequest()
    {
        if (!($this->request)) {
            $this->request = $this->getDI()->getRequest();
        }
        return $this->request;
    }

}