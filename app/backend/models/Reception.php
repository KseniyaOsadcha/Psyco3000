<?php

namespace Multiple\Backend\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Reception extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_reception;

    /**
     *
     * @var integer
     */
    public $id_office;

    /**
     *
     * @var integer
     */
    public $id_employee;

    /**
     *
     * @var integer
     */
    public $id_client;

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
        $this->setSource("reception");
        $this->hasOne('id_employee', 'Multiple\Backend\Models\Employee', 'id_employee', ['alias' => 'employee']);
        $this->hasOne('id_office', 'Multiple\Backend\Models\Office', 'id_office', ['alias' => 'office']);
        $this->hasOne('id_client', 'Multiple\Backend\Models\Client', 'id_client', ['alias' => 'client']);

    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'reception';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reception[]|Reception|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Reception|\Phalcon\Mvc\Model\ResultInterface
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
            'id_reception' => 'id_reception',
            'id_office' => 'id_office',
            'id_employee' => 'id_employee',
            'id_client' => 'id_client',
            'day' => 'day',
            'time' => 'time',
            'is_payed' => 'is_payed'
        ];
    }

    public function createOrEdit($data, $is_create, $id_rec)
    {
        $time = $data['time'] . ':00';
        $time_before = date('H:i:s', (strtotime($time) - strtotime('00:30:00')));
        $time_after = date('H:i:s', (strtotime($time) + strtotime('00:30:00')));

        $day = $data['day'];
        $id_office = $data['office'];
        $id_employee = $data['employee'];
        $id_client = $data['client'];
        $is_payed = $data['is_payed'];

        if ($is_create) {
            $conditions_is_office_free = '(day = "' . $day . '" AND id_office = ' . $id_office . ' AND (time = "' . $time_before . '" OR time = "' . $time . '" OR time = "' . $time_after . '"))';
            $conditions_is_doctor_free = '(day = "' . $day . '" AND id_employee = ' . $id_employee . ' AND (time = "' . $time_before . '" OR time = "' . $time . '" OR time = "' . $time_after . '"))';
        } else {
            $conditions_is_office_free = '(id_reception != ' . $id_rec . ' AND day = "' . $day . '" AND id_office = ' . $id_office . ' AND (time = "' . $time_before . '" OR time = "' . $time . '" OR time = "' . $time_after . '"))';
            $conditions_is_doctor_free = '(id_reception != ' . $id_rec . ' AND day = "' . $day . '" AND id_employee = ' . $id_employee . ' AND (time = "' . $time_before . '" OR time = "' . $time . '" OR time = "' . $time_after . '"))';
        }
        $conditions = $conditions_is_office_free . ' OR ' . $conditions_is_doctor_free;
        $try_find_rec = Reception::find(['conditions' => $conditions]);

        if (count($try_find_rec) != 0) {
            $response = [
                'status' => false,
                'content' => 'В это время идет консультация в этом офисе или у этого врача!'
            ];
        } else {
            $this->id_employee = $id_employee;
            $this->id_client = $id_client;
            $this->id_office = $id_office;
            $this->time = $time;
            $this->day = $day;
            $this->is_payed = $is_payed;
            if (!$this->save()) {
//                foreach ($this->getMessages() as $message) {
//                    echo($message);
//                }
                $response = [
                    'status' => false,
                    'content' => 'Упс что-то пошло не так :('
                ];
            } else {
                $response = [
                    'status' => true
                ];
            }
        }
        return $response;

    }

}
