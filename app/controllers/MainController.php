<?php

namespace app\controllers;
use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        if (empty($_SESSION['user'])) {
            $this->view->render('Главная страница');
        } else {
            echo 'redirect $session';
        }
    }

    public function about_meAction()
    {
        $this->view->render('Страница контактов');
    }

}