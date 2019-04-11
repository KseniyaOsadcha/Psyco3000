<?php
/**
 * Created by PhpStorm.
 * User: Ксения
 * Date: 27.02.2019
 * Time: 18:02
 */
namespace Multiple\Frontend\Controllers;

use Multiple\Frontend\Models\Feedback;

class FeedbackController extends ControllerBase
{
    public function initialize()
    {
        parent::initialize();
        $this->assets->addCss('/css/feedback.css?v=1');
    }

    public function indexAction()
    {
        if ($this->request->isPost()){
            $phone = $this->request->getPost('phone' ,'trim');
            $name = $this->request->getPost('name','trim');
            $comment = $this->request->getPost('comment','trim');
            $email = $this->request->getPost('email','trim');
            $phone = preg_replace('/[^0-9]/iu', '', $phone);
            if($name == '' || strlen($phone) > 12 || strlen($phone) < 7){
                $this->flash->error('Упс! Вы ввели неправильные данные. Пример: Имя: Максим; Телефон: 073 000 00 00');
            }
            else{
                $feedback = new Feedback();
                $feedback->name = $name;
                $feedback->phone = $phone;
                $feedback->email = $email | '';
                $feedback->comment = $comment | '';
                if(!$feedback->save()){
//                echo '<pre>';
//                var_dump($feedback->getMessages());
//                die;
                    $this->flash->error('Упс! Что-то пошло не так! Проверьте правильность данных или позвоните в поддержку');
                }
                else{
//                    $mail = 'Имя: ' . $feedback->name . 'Телефон: ' . $feedback->phone;
                    $this->flash->success('Отправка успешна! Мы свяжемся с вами в течении дня!');
//                    mail("theksenic@gmail.com", "Test", $mail);
                }
            }

        }
    }
    public function contactAction()
    {
        if ($this->request->isPost()){
            $phone = $this->request->getPost('phone' ,'trim');
            $name = $this->request->getPost('name','trim');
            $phone = preg_replace('/[^0-9]/iu', '', $phone);
//            echo '<pre>';
//                var_dump($phone);
//            die;
            if($name == '' || strlen($phone) > 12 || strlen($phone) < 7){
                $this->flash->error('Упс! Вы ввели неправильные данные. Пример: Имя: Максим; Телефон: 073 000 00 00');
            }
            else{
                $feedback = new Feedback();
                $feedback->name = $name;
                $feedback->phone = $phone;
                if(!$feedback->save()){
//                echo '<pre>';
//                var_dump($feedback->getMessages());
//                die;
                    $this->flash->error('Упс! Что-то пошло не так! Проверьте правильность данных или позвоните в поддержку');
                }
                else{
                    $this->flash->success('Отправка успешна! Мы свяжемся с вами в течении дня!');
                }
            }

        }
    }
    public function MailAction(){
//        $mail = 'Имя: Hello';
        if(!mail("theksenic@gmail.com", "Test", "hello")){
            echo '<pre>';
                var_dump('shit');
                die;
        }

    }
}