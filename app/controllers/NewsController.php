<?php

namespace app\controllers;
use app\core\Controller;

class NewsController extends Controller
{
    public function showAction()
    {
        $this->view->render('Страница новостей');
    }
}