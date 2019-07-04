<?php

namespace Multiple\Backend\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Client extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_client;

    /**
     *
     * @var string
     */
    public $name;
    /**
     *
     * @var string
     */
    public $phone;
    /**
     *
     * @var integer
     */
    public $id_employee;

    /**
     *
     * @var string
     */
    public $diagnosis;

    /**
     *
     * @var string
     */
    public $client_notes;
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
        $this->setSource("client");
        $this->hasOne('id_employee', 'Multiple\Backend\Models\Employee', 'id_employee', ['alias' => 'empl']);

    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'client';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client[]|Client|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Client|\Phalcon\Mvc\Model\ResultInterface
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
            'id_client' => 'id_client',
            'name' => 'name',
            'phone' => 'phone',
            'id_employee' => 'id_employee',
            'diagnosis' => 'diagnosis',
            'client_notes' => 'client_notes',
            'date_add' => 'date_add'
        ];
    }

    public function createClient($data)
    {
        $this->name = $data['name'];
        $this->id_employee = $data['id_employee'];
        if ($this->save()) {
            return $this->id_client;
        }
        else{
            return 0;
//            foreach ($this->getMessages() as $message) {
//                    echo($message);
//                }
//            die;
        }
    }
}
