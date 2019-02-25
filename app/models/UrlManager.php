<?php

namespace Models;

use Phalcon\Mvc\Url;

class UrlManager extends Url
{
    public $domain_url;

    public function __construct()
    {
        $this->domain_url = Configuration::get('DOMAIN');
    }
    public function get($uri = null, $absolute = null, $args = null, $baseUri = null) {
        $url = parent::get($uri,$args,$absolute,$baseUri);
        if ($absolute){
            $url = $this->domain_url.$url;
        }
        return $url;
    }


}