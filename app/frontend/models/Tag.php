<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 01.05.2019
 * Time: 13:00
 */

namespace Multiple\Frontend\Models;


class Tag extends \Phalcon\Tag
{
    protected $description;
    protected $keywords;

    public function setDescription($text)
    {
        $this->description = $text;
    }

    public function getDescription()
    {
        if(!$this->description) $this->description = 'Вас приветствует психотерапевтический центр NewSens';
        return '<meta name="description" content="' . $this->description . '">';
    }
    public function setKeywords($text)
    {
        $this->keywords = $text;
    }

    public function getKeywords()
    {
        if(!$this->keywords )
        {$this->keywords = 'New Sense, Психотерепевт, Психолог, Психотерепевт киев, Психолог киев, помощь психолога,
             записаться к психологу, записаться к психотерапевту,
             записаться на прием к психологу, киев психолог цена,
             психолог услуги киев, консультация психолога киев цена,
              гештальт-терапевт киев, психолог Оболонь, лечение депрессии, невроз, проблемы со сном';}

        return '<meta name="keywords" content="' . $this->keywords . '">';
    }
}