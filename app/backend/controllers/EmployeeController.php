<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 11.04.2019
 * Time: 13:15
 */

namespace Multiple\Backend\Controllers;
use Multiple\Backend\Models\Employee;
use Phalcon\Paginator\Adapter\Model;


class EmployeeController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        if (!$this->session->has('id-employee') && $this->session->get('id-employee') != null)
            return $this->response->redirect($this->url->get(['for' => 'login']));
    }
    public function indexAction()
    {
        $this->assets->addJs('/admin/js/paginate.js');
        $id_role = $this->session->get('id-role');
        if ($id_role != 2 && $id_role != 3 ){
            $this->flash->error('У вас нет доступа к этой странице!');
            return $this->response->redirect($this->url->get(['for'=>'admin-index']));
        }

        $employee= Employee::find();
        $total_count = $employee->count();
        $limit = 6;
        $total_pages = ceil($total_count / $limit);
        $current_page = 1;
        if ($this->request->isPost() && $this->request->isAjax()) {
            $current_page = $this->request->has('page') ? $this->request->getPost('page') : 1;
            $paginator = new Model(
                [
                    'data' => $employee,
                    'limit' => 6,
                    'page' => $current_page
                ]
            );
            $content = '';
            $items = $paginator->getPaginate()->items;
            $content .= $this->view->getPartial('employee/employee', ['employees' => $items, 'total_pages' => $total_pages, 'limit' => $limit, 'total_count' => $total_count, 'current_page' => $current_page]);
            $response = [
                'status' => true,
                'content' => $content
            ];
            return $this->response->setJsonContent($response);
        }
        $paginator = new Model(
            [
                'data' => $employee,
                'limit' => 6,
                'page' => $current_page
            ]
        );
        $this->view->employees = $paginator->getPaginate()->items;
        $this->view->current_page = $current_page;
        $this->view->total_count = $total_count;
        $this->view->total_pages = $total_pages;
        $this->view->limit = $limit;
    }
    public function accountAction()
    {
        $id_employee = $this->session->get('id-employee');
        $employee = Employee::findFirst($id_employee);
        if ($this->request->isPost()) {
            $post = $this->request->getPost();
            if ($employee->save($post)) {
                $this->flash->success('Обновление прошло успешно!');
            }
        }
        $this->view->employee = $employee;
    }
}