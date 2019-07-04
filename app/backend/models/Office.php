<?php
namespace Multiple\Backend\Models;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
class Office extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_office;

    /**
     *
     * @var string
     */
    public $short_name;

    /**
     *
     * @var string
     */
    public $adress;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("psyco_db");
        $this->setSource("office");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'office';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Office[]|Office|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Office|\Phalcon\Mvc\Model\ResultInterface
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
            'id_office' => 'id_office',
            'short_name' => 'short_name',
            'adress' => 'adress'
        ];
    }

}
