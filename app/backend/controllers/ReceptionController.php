<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 18.04.2019
 * Time: 23:35
 */

namespace Multiple\Backend\Controllers;


use Multiple\Backend\Models\Client;
use Multiple\Backend\Models\Employee;
use Multiple\Backend\Models\Reception;
use Multiple\Backend\Models\ReceptionView;
use Phalcon\Mvc\View\Simple as View;
use Phalcon\Paginator\Adapter\Model;

class ReceptionController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        if (!$this->session->has('id-employee'))
            return $this->response->redirect($this->url->get(['for' => 'login']));
        if ($this->session->get('id-role') == 4) {
            $this->flash->error('У вас нет доступа к этой странице!');
            return $this->response->redirect($this->url->get(['for' => 'admin-index']));
        }
        $this->assets->addCss('/admin/css/reception.css?v=2');
        $this->assets->addJs('/admin/js/reception.js?v=4');
    }

    public function indexAction()
    {
        date_default_timezone_set('Europe/Kiev');
        $first_day_of_month = date("Y-m") . '-01 00:00:01';
        $curent_day = date("d");
        $curent_month = date("F");
        $curent_month_id = date("m");
        $start_month_day = date("w", strtotime($first_day_of_month));
        $month_day_count = date('t');
        $cells_count = ($month_day_count + $start_month_day - 1);

        if ($this->request->isPost() && $this->request->isAjax()) {
            $id_month = $this->request->getPost('id_month');
            if ($id_month < 10) $id_month = '0' . intval($id_month);
            if ($id_month < 1) $id_month = 12;
            if ($id_month > 12) $id_month = '01';
            $data = '2019-' . $id_month . '-' . $curent_day . ' 00:00:09';
            $first_day_of_month = date("Y-m", strtotime($data)) . '-01 00:00:01';
            $curent_month_id = $id_month;
            $curent_month = date("F", strtotime($data));
            $start_month_day = date("w", strtotime($first_day_of_month));
            $month_day_count = date('t', strtotime($data));
            $cells_count = ($month_day_count + $start_month_day - 1);

            $content = $this->view->getPartial('reception/calendar', ['curent_day' => $curent_day, 'curent_month_id' => $curent_month_id, 'curent_month' => $curent_month, 'start_month_day' => $start_month_day, 'cells_count' => $cells_count]);
            $response = [
                'status' => true,
                'content' => $content
            ];
            return $this->response->setJsonContent($response);
        }


        $this->view->curent_day = $curent_day;
        $this->view->curent_month = $curent_month;
        $this->view->curent_month_id = $curent_month_id;
        $this->view->start_month_day = $start_month_day;
        $this->view->cells_count = $cells_count;
    }

    public function concreteDayAction()
    {
        $id_month = $this->dispatcher->getParam('id_month');
        $id_day = $this->dispatcher->getParam('id_day');
        $day = date('Y-m-d', strtotime('2019-' . $id_month . '-' . $id_day));
        $condition = 'day = "' . $day . '"';
        $receptions = Reception::find(
            [
                'conditions' => $condition,
            ]
        );
        // временные рамки для таблици
        $offices = [
            1 => '',
            2 => '',
            3 => ''
        ];
        $times = [];
        $start_time = date('G:i', strtotime('8:00'));
        for ($item = 1; $item < 31; $item++) {
            $times[$start_time] = $offices;
            $start_time = date('G:i', strtotime($start_time) + strtotime('00:30:00'));
        }
        $id_doctor = 0;
        if ($this->session->get('id-role') == 1) {
            $id_doctor = $this->session->get('id-employee');
        }
        // формирование таблици
        foreach ($receptions as $reception) {
            if ($id_doctor == 0 || $id_doctor == $reception->id_employee) {
                if ($reception->time != '08:00:00')
                    $times[date('G:i', strtotime($reception->time) - strtotime('0:30:00'))][$reception->id_office] = '<td class="bg-light"></td>';
                if ($reception->time != '22:30:00')
                    $times[date('G:i', strtotime($reception->time) + strtotime('0:30:00'))][$reception->id_office] = '<td class="bg-light"></td>';
                $client = Client::findFirst($reception->id_client);
                $employee = Employee::findFirst($reception->id_employee);
                $times[date('G:i', strtotime($reception->time))][$reception->id_office] =
                    '<td class="bg-light"><a class="concrete_cell" data-month="' . $id_month . '" data-day="' . $id_day . '"
                   data-time="' . date('G:i', strtotime($reception->time)) . '" data-id_reception="' . $reception->id_reception . '" data-office="' . $reception->id_office . '"
                   data-client="' . $client->name . '"
                   href="#">' . $employee->firstname . '</a></td>';
            } else {
                if ($reception->time != '08:00:00')
                    $times[date('G:i', strtotime($reception->time) - strtotime('0:30:00'))][$reception->id_office] = '<td class="bg-light"></td>';
                if ($reception->time != '22:30:00')
                    $times[date('G:i', strtotime($reception->time) + strtotime('0:30:00'))][$reception->id_office] = '<td class="bg-light"></td>';
                $times[date('G:i', strtotime($reception->time))][$reception->id_office] = '<td class="bg-light">Занято</td>';
            }
        }
        $this->view->curent_month = $id_month;
        $this->view->curent_day = $id_day;
        $this->view->day = $day;
        $this->view->times = $times;
    }

    public function editReceptionAction()
    {
        $id_reception = $this->dispatcher->getParam('id_reception');
        $reception = Reception::findFirst($id_reception);

        $times = [];
        $starttime = date('G:i', strtotime('8:00'));
        for ($item = 1; $item < 31; $item++) {
            $times[$item] = $starttime;
            $starttime = date('G:i', strtotime($starttime) + strtotime('00:30:00'));
        }

        if ($this->session->get('id-role') != 1) {
            $clients = Client::find(['order' => 'id_client DESC']);
            $employees = Employee::find(['conditions' => 'id_role < 3']);
            $this->view->employees = $employees;
        } else {
            $id_empl = $this->session->get('id-employee');
            $clients = Client::find(['conditions' => 'id_employee =' . $id_empl, 'order' => 'id_client DESC']);
            $this->view->id_empl = $id_empl;
        }

        $this->view->reception = $reception;
        $this->view->clients = $clients;
        $this->view->times = $times;
    }

    //только формочка (не отвечает за добавление)
    public function createReceptionAction()
    {
//            return $this->response->redirect($this->url->get(['for' => 'doc-create-reception']));
        if ($this->session->get('id-role') != 1) {
            $clients = Client::find(['order' => 'id_client DESC']);
            $employees = Employee::find(['conditions' => 'id_role < 3']);
            $this->view->employees = $employees;
        } else {
            $id_empl = $this->session->get('id-employee');
            $clients = Client::find(['conditions' => 'id_employee =' . $id_empl, 'order' => 'id_client DESC']);
            $this->view->id_empl = $id_empl;
        }

        //время
        $times = [];
        $starttime = date('G:i', strtotime('8:00'));
        for ($item = 1; $item < 31; $item++) {
            $times[$item] = $starttime;
            $starttime = date('G:i', strtotime($starttime) + strtotime('00:30:00'));
        }

        if ($this->request->isPost()) {
            $time = $this->request->getPost('selected_time');
            $day = $this->request->getPost('selected_day');
            $office = $this->request->getPost('selected_office');
            $month = $this->request->getPost('selected_month');
            if ($month < 10) $month = '0' . intval($month);
            if ($day < 10) $day = '0' . intval($day);
            $date = '2019-' . $month . '-' . $day;
            $this->view->date = $date;
            $this->view->selected_time = $time;
            $this->view->selected_office = $office;
        }
        $this->view->times = $times;
        $this->view->clients = $clients;
    }

    // создание новой записи
    public function createNewReceptionAction()
    {
        if ($this->request->isPost()) {
            $post = $_POST;
            if (trim($post['new_client']) != '') {
                $client = new Client();
                $post['client'] = $client->createClient(['name' => $post['new_client'], 'id_employee' => $post['employee']]);
            }
            if ($post['client'] != 0) {
                $client = Client::findFirst($post['client']);
                if ($client->id_employee == $post['employee']) {
                    if (trim($post['id_reception']) != '') {
                        $reception = Reception::findFirst($post['id_reception']);
                        $response = $reception->createOrEdit($post, false, $post['id_reception']);
                    } else {
                        $reception = new Reception();
                        $response = $reception->createOrEdit($post, true, 0);
                    }
                } else {
                    $response = [
                        'status' => false,
                        'content' => 'У этого пациента другой лечащий врач! Если вы хотите поменять врача отредактируйте этого клиента в разделе "Клиенты"'
                    ];
                }
            } else {
                $response = [
                    'status' => false,
                    'content' => 'Вы не выбрали клиента'
                ];
            }
            if ($response['status'] == true) {
                $response = [
                    'status' => true,
                    'content' => $this->url->get(['for' => 'reception-concrete-day', 'id_month' => date('m', strtotime($reception->day)), 'id_day' => date('d', strtotime($reception->day))])
                ];
            }
            return $this->response->setJsonContent($response);
        }
    }

    public function allReceptionAction()
    {
        $this->assets->addJs('/admin/js/paginate.js');
        //массив времени
        $times = [];
        $starttime = date('G:i', strtotime('8:00'));
        for ($item = 1; $item < 31; $item++) {
            $times[$item] = $starttime;
            $starttime = date('G:i', strtotime($starttime) + strtotime('00:30:00'));
        }
        $id_doc = 0;
        if ($this->session->get('id-role') == 1) {
            $id_doc = $this->session->get('id-employee');
            $employees = Employee::findFirst($id_doc);
            $receptions = Reception::find(['order' => 'id_reception DESC', 'conditions' => 'id_employee = ' . $id_doc]);
            $clients = Client::find(['conditions' => 'id_employee = ' . $id_doc]);

        } else {
            $employees = Employee::find(['conditions' => 'id_role < 3']);
            $receptions = Reception::find(['order' => 'id_reception DESC']);
            $clients = Client::find();

        }

        $total_count = $receptions->count();
        $limit = 6;
        $total_pages = ceil($total_count / $limit);
        $current_page = 1;
        if ($this->request->isPost() && $this->request->isAjax()) {
            $current_page = $this->request->has('page') ? $this->request->getPost('page') : 1;
        }
        $paginator = new Model(
            [
                'data' => $receptions,
                'limit' => 6,
                'page' => $current_page
            ]
        );
        $this->view->receptions = $paginator->getPaginate()->items;
        $this->view->employees = $employees;
        $this->view->clients = $clients;
        $this->view->current_page = $current_page;
        $this->view->total_count = $total_count;
        $this->view->total_pages = $total_pages;
        $this->view->limit = $limit;
        $this->view->times = $times;
        $this->view->id_doc = $id_doc;

    }

    public function changePayedStatusAction()
    {
        if ($this->request->isPost() && $this->request->isAjax()) {
            $status = $this->request->getPost('status');
            $id_reception = $this->request->getPost('id_reception');
            $reception = Reception::findFirst($id_reception);
            $reception->is_payed = $status;
            if ($reception->save()) {
                $status = true;
                $message = 'Операция прошла успешно!';
            } else {
                $status = false;
                $message = 'Что-то пошло не так!';
            }
            $response = [
                'status' => $status,
                'content' => $message
            ];
            return $this->response->setJsonContent($response);
        }
    }

    public function filterAllReceptionsAction()
    {
        $this->assets->addJs('/admin/js/paginate.js');

        if ($this->request->isPost() && $this->request->isAjax()) {
            $employee = $this->request->getPost('employee');
            $office = $this->request->getPost('office');
            $date = $this->request->getPost('date');
            $time = $this->request->getPost('time');
            $client = $this->request->getPost('client');
            $is_payed = $this->request->getPost('is_payed');
            $current_page = $this->request->has('page') ? $this->request->getPost('page', ['striptags', 'trim']) : 1;
            //id == 6 =>
            $filter = '';
            $where_conditions = [];

            if (!empty($employee) && $employee != 0) {
                $where_conditions[] = 'id_employee = ' . $employee;
            }
            if (!empty($office) && $office != 0) {
                $where_conditions[] = 'id_office = ' . $office;
            }
            if (!empty($date)) {
                $where_conditions[] = 'day = "' . $date . '"';
            }
            if (!empty($time) && $time != 0) {
                $where_conditions[] = 'time = "' . $time . '"';
            }
            if (!empty($client) && $client != 0) {
                $where_conditions[] = 'id_client = ' . $client;
            }
            if (!empty($is_payed) && $is_payed != 0) {
                $where_conditions[] = 'is_payed = ' . $is_payed;
            }
            if (!empty($where_conditions)) {
                $filter .= implode(' AND ', $where_conditions);
            }
            $receptions = Reception::find(['conditions' => $filter]);

            if ($this->session->get('id-role') == 1)
                $id_doc = $this->session->get('id-employee');
            else
                $id_doc = 0;
            $params = json_encode(['employee' => $employee, 'office' => $office, 'date' => $date, 'time' => $time, 'client' => $client, 'is_payed' => $is_payed]);
            $total_count = count($receptions);
            $limit = 6;
            $total_pages = ceil($total_count / $limit);

            $paginator = new Model(
                [
                    'data' => $receptions,
                    'limit' => 6,
                    'page' => $current_page
                ]
            );
            $content = '';
            $items = $paginator->getPaginate()->items;

            $content .= $this->view->getPartial('reception/receptionsTable', ['params' => $params, 'id_doc' => $id_doc, 'receptions' => $items, 'total_pages' => $total_pages, 'limit' => $limit, 'total_count' => $total_count, 'current_page' => $current_page]);
            $response = [
                'status' => true,
                'content' => $content
            ];
            return $this->response->setJsonContent($response);
        }
    }
}