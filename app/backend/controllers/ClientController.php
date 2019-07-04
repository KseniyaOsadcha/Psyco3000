<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 23.04.2019
 * Time: 13:47
 */

namespace Multiple\Backend\Controllers;


use Multiple\Backend\Models\Client;
use Multiple\Backend\Models\Employee;
use Phalcon\Paginator\Adapter\Model;

class ClientController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        if (!$this->session->has('id-employee') || $this->session->get('id-employee') == null)
            return $this->response->redirect($this->url->get(['for' => 'login']));
        if ($this->session->get('id-role') == 4) {
            $this->flash->error('У вас нет доступа к этой странице!');
            return $this->response->redirect($this->url->get(['for' => 'admin-index']));
        }
    }

    public function indexAction()
    {
        $this->assets->addJs('/admin/js/paginate.js');
        if ($this->session->get('id-role') == 1) {
            $clients = Client::find(['conditions' => 'id_employee =' . $this->session->get('id-employee'), 'order' => 'id_client DESC']);
        } else
            $clients = Client::find(['order' => 'id_client DESC']);

        $total_count = $clients->count();
        $limit = 6;
        $total_pages = ceil($total_count / $limit);
        $current_page = 1;
        if ($this->request->isPost() && $this->request->isAjax()) {
            $current_page = $this->request->has('page') ? $this->request->getPost('page') : 1;
        }
        $paginator = new Model(
            [
                'data' => $clients,
                'limit' => 6,
                'page' => $current_page
            ]
        );
        $this->view->clients = $paginator->getPaginate()->items;
        $this->view->current_page = $current_page;
        $this->view->total_count = $total_count;
        $this->view->total_pages = $total_pages;
        $this->view->limit = $limit;
    }

    public function filterAction()
    {
        $this->assets->addJs('/admin/js/paginate.js');

        if ($this->request->isPost() && $this->request->isAjax()) {
            $order = $this->request->getPost('order');
            $current_page = $this->request->has('page') ? $this->request->getPost('page', ['striptags', 'trim']) : 1;
            //id == 6 =>
            if ($order)
                $filter = $order;
            else $filter = 'id_client DESC';
            if ($this->session->get('id-role') == 1)
                $clients = Client::find(['conditions' => 'id_employee =' . $this->session->get('id-employee'), 'order' => $filter]);
            else
                $clients = Client::find(['order' => $filter]);

            $params = json_encode(['order' => $order]);
            $total_count = count($clients);
            $limit = 6;
            $total_pages = ceil($total_count / $limit);

            $paginator = new Model(
                [
                    'data' => $clients,
                    'limit' => 6,
                    'page' => $current_page
                ]
            );
            $content = '';
            $items = $paginator->getPaginate()->items;
            $content .= $this->view->getPartial('client/clients', ['params' => $params, 'clients' => $items, 'total_pages' => $total_pages, 'limit' => $limit, 'total_count' => $total_count, 'current_page' => $current_page]);
            $response = [
                'status' => true,
                'content' => $content
            ];
            return $this->response->setJsonContent($response);
        }
    }

    public function addClientAction()
    {
        if ($this->session->get('id-role') == 1) {
            $id_employee = $this->session->get('id-employee');
            $this->view->id_employee = $id_employee;
        } else {
            $employee = Employee::find(['conditions' => 'id_role < 3']);
            $this->view->employees = $employee;
        }
        if ($this->request->isPost()) {
            $post = $_POST;
            $client = new Client();
           if(!$client->save($post))
               $this->flash->error('Упс что-то пошло не так(');
           else{
               $this->flash->success('Успешно!');
               return $this->response->redirect($this->url->get(['for' => 'clients']));
           }
        }
    }

    public function updateClientAction()
    {
        $id_client = $this->dispatcher->getParam('id_client');

        if ($this->session->get('id-role') != 1) {
            $employee = Employee::find(['conditions' => 'id_role < 3']);
            $this->view->employees = $employee;
        }

        $client = Client::findFirst($id_client);

        if ($this->request->isPost()) {
            $post = $_POST;
            if(!$client->save($post))
                $this->flash->error('Упс что-то пошло не так(');
            else{
                $this->flash->success('Успешно!');
                return $this->response->redirect($this->url->get(['for' => 'clients']));
            }
        }

        $this->view->client = $client;
    }
}