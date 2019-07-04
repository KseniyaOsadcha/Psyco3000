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
        $this->assets->addCss('/css/news.css?v=2');
    }

    public function indexAction()
    {
        $this->tag->setDescription(
            'Мы регулярно обновляем наш блог, пополняя его полезными и интересными статьями.'
        );
        $this->tag->setTitle('Блог');
        $news = News::find(['conditions' => 'is_valid = 2', 'order'=>'id_news DESC']);
        $this->view->news = $news;
    }
    public function viewAction()
    {
        $id_news = $this->dispatcher->getParam('id_news');
        $article = News::findFirst($id_news);
        $this->tag->setTitle($article->title);
        $this->tag->setDescription($article->abbreviated_text);
        $this->view->article = $article;
    }
}
