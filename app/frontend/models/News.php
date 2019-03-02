<?php
namespace Multiple\Frontend\Models;

class News extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_news;

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var string
     */
    public $abbreviated_text;

    /**
     *
     * @var string
     */
    public $text;

    /**
     *
     * @var string
     */
    public $date_add;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("psyco_db");
        $this->setSource("news");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'news';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return News[]|News|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return News|\Phalcon\Mvc\Model\ResultInterface
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return [
            'id_news' => 'id_news',
            'title' => 'title',
            'abbreviated_text' => 'abbreviated_text',
            'text' => 'text',
            'date_add' => 'date_add'
        ];
    }

}
