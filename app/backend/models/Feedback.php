<?php
namespace Multiple\Backend\Models;

use Phalcon\Validation;
use Phalcon\Validation\Validator\Email as EmailValidator;

class Feedback extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    public $id_feedback;

    /**
     *
     * @var string
     */
    public $name;

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
    public $comment;

    /**
     *
     * @var string
     */
    public $date_add;

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
//        $validator = new Validation();
//
//        $validator->add(
//            'email',
//            new EmailValidator(
//                [
//                    'model'   => $this,
//                    'message' => 'Please enter a correct email address',
//                ]
//            )
//        );
//
//        return $this->validate($validator);
    }

    /**
     * Initialize method for model.
     */
    public function initialize()
    {
        $this->setSchema("psyco_db");
        $this->setSource("feedback");
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'feedback';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return Feedback[]|Feedback|\Phalcon\Mvc\Model\ResultSetInterface
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return Feedback|\Phalcon\Mvc\Model\ResultInterface
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
            'id_feedback' => 'id_feedback',
            'name' => 'name',
            'email' => 'email',
            'phone' => 'phone',
            'comment' => 'comment',
            'date_add' => 'date_add'
        ];
    }

}
