<?php
namespace Multiple\Backend\Models;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;
class ReceptionView extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id;

    /**
     *
     * @var integer
     */
    public $id_office;

    /**
     *
     * @var string
     */
    public $office_name;

    /**
     *
     * @var integer
     */
    public $id_employee;

    /**
     *
     * @var string
     */
    public $empl_name;

    /**
     *
     * @var integer
     */
    public $id_client;

    /**
     *
     * @var string
     */
    public $client_name;

    /**
     *
     * @var string
     */
    public $day;

    /**
     *
     * @var string
     */
    public $time;

    /**
     *
     * @var integer
     */
    public $is_payed;

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("psyco_db");
        $this->setSource("reception_view");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'reception_view';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return ReceptionView[]|ReceptionView|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return ReceptionView|\Phalcon\Mvc\Model\ResultInterface
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
            'id' => 'id',
            'id_office' => 'id_office',
            'office_name' => 'office_name',
            'id_employee' => 'id_employee',
            'empl_name' => 'empl_name',
            'id_client' => 'id_client',
            'client_name' => 'client_name',
            'day' => 'day',
            'time' => 'time',
            'is_payed' => 'is_payed'
        ];
    }

}
