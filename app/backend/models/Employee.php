<?php
namespace Multiple\Backend\Models;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Employee extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_employee;

    /**
     *
     * @var integer
     */
    public $id_role;

    /**
     *
     * @var string
     */
    public $firstname;

    /**
     *
     * @var string
     */
    public $lastname;

    /**
     *
     * @var string
     */
    public $email;

    /**
     *
     * @var string
     */
    public $phone;

    /**
     *
     * @var string
     */
    public $password;

    /**
     *
     * @var string
     */
    public $profession;

    /**
     *
     * @var string
     */
    public $education;

    /**
     *
     * @var string
     */
    public $experience;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new EmailValidator(
                [
                    'model'   => $this,
                    'message' => 'Please enter a correct email address',
                ]
            )
        );

        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("psyco_db");
        $this->setSource("employee");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'employee';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Employee[]|Employee|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Employee|\Phalcon\Mvc\Model\ResultInterface
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
            'id_employee' => 'id_employee',
            'id_role' => 'id_role',
            'firstname' => 'firstname',
            'lastname' => 'lastname',
            'email' => 'email',
            'phone' => 'phone',
            'password' => 'password',
            'profession' => 'profession',
            'education' => 'education',
            'experience' => 'experience'
        ];
    }

}
