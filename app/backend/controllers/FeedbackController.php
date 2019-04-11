<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 10.04.2019
 * Time: 23:24
 */

namespace Multiple\Backend\Controllers;


use Multiple\Backend\Models\Feedback;
use Phalcon\Paginator\Adapter\Model;

class FeedbackController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        if (!$this->session->has('id-employee'))
            return $this->response->redirect($this->url->get(['for' => 'login']));
        $id_role = $this->session->get('id-role');
        if ($id_role != 2 && $id_role != 3 ){
            $this->flash->error('У вас нет доступа к этой странице!');
            return $this->response->redirect($this->url->get(['for'=>'admin-index']));
        }
    }

    public function indexAction()
    {
        $this->assets->addJs('/admin/js/paginate.js');

        $feedback = Feedback::find(['order' => 'id_feedback DESC']);
        $total_count = $feedback->count();
        $limit = 6;
        $total_pages = ceil($total_count / $limit);
        $current_page = 1;
        if ($this->request->isPost() && $this->request->isAjax()) {
            $current_page = $this->request->has('page') ? $this->request->getPost('page') : 1;
            $paginator = new Model(
                [
                    'data' => $feedback,
                    'limit' => 6,
                    'page' => $current_page
                ]
            );
            $content = '';
            $items = $paginator->getPaginate()->items;
            $content .= $this->view->getPartial('feedback/feedback', ['feedbacks' => $items, 'total_pages' => $total_pages, 'limit' => $limit, 'total_count' => $total_count, 'current_page' => $current_page]);
            $response = [
                'status' => true,
                'content' => $content
            ];
            return $this->response->setJsonContent($response);
        }
        $paginator = new Model(
            [
                'data' => $feedback,
                'limit' => 6,
                'page' => $current_page
            ]
        );
        $this->view->feedbacks = $paginator->getPaginate()->items;
        $this->view->current_page = $current_page;
        $this->view->total_count = $total_count;
        $this->view->total_pages = $total_pages;
        $this->view->limit = $limit;
    }
}