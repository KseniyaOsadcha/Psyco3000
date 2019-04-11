<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 24.02.2019
 * Time: 21:34
 */
namespace Multiple\Frontend\Controllers;


use Multiple\Frontend\Models\News;

class NewsController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->assets->addCss('/css/news.css?v=1');
    }

    public function indexAction()
    {
        $news = News::find();
        $this->view->news = $news;
    }
    public function viewAction()
    {
        $id_news = $this->dispatcher->getParam('id_news');
        $article = News::findFirst($id_news);
        $this->view->article = $article;
    }
}
