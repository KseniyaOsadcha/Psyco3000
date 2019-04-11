<?php

namespace Multiple\Backend\Controllers;

use Models\Context;
use Multiple\Backend\Models\Employee;

class IndexController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
    }

    public function indexAction()
    {
//     $ff = $this->security->hash('1Arsinica');
//     echo ($ff);
//     die;
        if (!$this->session->has('id-employee'))
            return $this->response->redirect($this->url->get(['for' => 'login']));
////        $this->session->remove('id-employee');
//          $name = $this->session->get('id-employee');
    }
    public function loginAction()
    {
        if ($this->request->isPost()) {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');
            $employee = Employee::findFirstByEmail($email);
            if ($employee) {
                if ($this->security->checkHash($password, $employee->password)) {
                    $this->session->set('id-employee', $employee->id_employee);
                    $this->session->set('id-role', $employee->id_role);

                    $this->flash->success('Добро пожаловать, ' . $employee->firstname);
                    return $this->response->redirect($this->url->get(['for'=>'admin-index']));

                } else {
                    $this->flash->error('Неверный пароль');
                }
            } else {
                $this->flash->error('Неверный Email');
            }
//            $new = $this->security->hash($password);


        }
    }
    public function registerAction()
    {
        if ($this->request->isPost()) {
            $fname = $this->request->getPost('firstname');
            $lname = $this->request->getPost('lastname');
            $email = $this->request->getPost('email');
            $is_reg = Employee::findFirstByEmail($email);
            $password = $this->request->getPost('password');
            $s_password = $this->request->getPost('second_password');
            if ($password != $s_password) {
                $this->flash->error('Пароли не совпадают');
            } elseif (strlen($password) < 6) {
                $this->flash->error('Пароль должен содержать больше 6 символов');
            } elseif (trim($fname) == "" || trim($lname) == "") {
                $this->flash->error('Все поля должны быть заполнены');
            } elseif ($is_reg) {
                $this->flash->error('Пользователь с таким Email уже существует');
            } else {
                $employee = new Employee();
                $employee->firstname = $fname;
                $employee->lastname = $lname;
                $employee->email = $email;
                $employee->password = $this->security->hash($password);
                if ($employee->save()) {
//                    $this->session->remove('id-employee');
//                    $this->session->remove('id-role');

                    $this->session->set('id-employee', $employee->id_employee);
                    $this->session->set('id-role', $employee->id_role);


                    $this->flash->success('Регистрация прошла успешно!');
                    $this->flash->success('Добро пожаловать, ' . $employee->firstname);
                    return $this->response->redirect($this->url->get(['for'=>'admin-index']));

                } else {
                    foreach ($employee->getMessages() as $message) {
                        $this->flash->error($message);
                    }
//                    $this->flash->error('проверьте правильность введенных данных');
                }
            }
        }
    }

    public function logoutAction()
    {
        $this->session->remove('id-employee');
        $this->session->remove('id-role');
        return $this->response->redirect($this->url->get(['for' => 'login']));

    }
}

