<?php

namespace app\controllers;
use app\core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        if (!empty($_SESSION['email'])) {
            $this->view->redirect('mycloud');
        } else {
            $this->view->redirect('account/login');
        }
    }

    public function about_meAction()
    {
        $this->view->render('Страница контактов');
    }

}