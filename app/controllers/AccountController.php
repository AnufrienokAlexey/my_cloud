<?php

namespace app\controllers;
use app\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        $this->view->redirect('/');
    }

    public function registerAction()
    {
        if (isset($_POST['email']) AND ($_POST['email'] != '')) {
            $users = $this->model->getUsers();
            foreach ($users as $user) {
                if ($user['email'] === $_POST['email']) {
                    $_SESSION['email_exist'] = 'Такой email уже существует';
                    $this->view->render('Регистрация');
                    break;
                } else {
                    if (!empty($_POST['password']) AND !empty($_POST['password_confirm']) ) {
                        if ($_POST['password'] === $_POST['password_confirm']) {
                            $_SESSION['success_register'] = 'Вы успешно зарегистрировались. Теперь можно авторизоваться';
                            $this->view->redirect('login');
                        }
                    } else {
//                        debug($_SESSION);
                        $_SESSION['password_not_match'] = 'Пожалуйста, проверьте правильность заполнения всех полей';

                        $this->view->redirect('register');
                    }
                }
            }
        } else {
            $this->view->render('Регистрация');
        }
    }
}