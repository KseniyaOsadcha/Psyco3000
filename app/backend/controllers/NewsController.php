<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 07.05.2019
 * Time: 20:48
 */

namespace Multiple\Backend\Controllers;


use Multiple\Backend\Models\News;
use Phalcon\Paginator\Adapter\Model;

class NewsController extends ControllerBase
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
        $this->assets->addJs('/admin/js/news.js?v=3');
    }

    public function indexAction()
    {
        $this->assets->addJs('/admin/js/paginate.js');
        $news = News::find(['order' => 'id_news DESC']);

        $total_count = $news->count();
        $limit = 6;
        $total_pages = ceil($total_count / $limit);
        $current_page = 1;
        if ($this->request->isPost() && $this->request->isAjax()) {
            $current_page = $this->request->has('page') ? $this->request->getPost('page', ['striptags', 'trim']) : 1;

            $paginator = new Model(
                [
                    'data' => $news,
                    'limit' => 6,
                    'page' => $current_page
                ]
            );
            $content = '';
            $items = $paginator->getPaginate()->items;
            $content .= $this->view->getPartial('news/index', ['news' => $items, 'total_pages' => $total_pages, 'limit' => $limit, 'total_count' => $total_count, 'current_page' => $current_page]);
            $response = [
                'status' => true,
                'content' => $content
            ];
            return $this->response->setJsonContent($response);
        }
        $paginator = new Model(
            [
                'data' => $news,
                'limit' => 6,
                'page' => $current_page
            ]
        );
        $this->view->news = $paginator->getPaginate()->items;
        $this->view->current_page = $current_page;
        $this->view->total_count = $total_count;
        $this->view->total_pages = $total_pages;
        $this->view->limit = $limit;
    }

    public function addArticleAction()
    {
        if ($this->request->isPost()) {
            $post = $_POST;
            $news = new News();
            if (!$news->save($post))
                $this->flash->error('Упс что-то пошло не так(');
            else {
                $this->flash->success('Успешно!');
                return $this->response->redirect($this->url->get(['for' => 'news']));
            }
        }
    }

    public function editArticleAction()
    {
        $id_news = $this->dispatcher->getParam('id_news');
        $article = News::findFirst($id_news);

        if ($this->request->isPost()) {
            $post = $_POST;
            if (!$article->save($post))
                $this->flash->error('Упс что-то пошло не так(');
            else {
                $this->flash->success('Успешно!');
                return $this->response->redirect($this->url->get(['for' => 'news']));
            }
        }
        $this->view->article = $article;
    }
    public function viewArticleAction()
    {
        $id_news = $this->dispatcher->getParam('id_news');
        $article = News::findFirst($id_news);
        $this->view->article = $article;
    }
    public function changeValidStatusAction()
    {
        if ($this->request->isPost() && $this->request->isAjax()) {
            $status = $this->request->getPost('status');
            $id_news = $this->request->getPost('id_news');
            $article = News::findFirst($id_news);
            $article->is_valid = $status;
            if ($article->save()) {
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

}