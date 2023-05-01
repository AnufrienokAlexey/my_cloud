<?php

namespace app\controllers;
use app\core\Controller;

class MycloudController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Мое хранилище');
    }

}