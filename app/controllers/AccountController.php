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
        if (!empty($_POST['email'])) {
            $result = $this->model->getEmail($_POST['email']);
            if ($result) {
                $_SESSION['email_exist'] = 'Такой email уже существует';
                $this->view->redirect('register');
            } else {
                if (!empty($_POST['password']) AND !empty($_POST['password_confirm']) ) {
                    if ($_POST['password'] === $_POST['password_confirm']) {
                        $this->model->addUser($_POST['email'], $_POST['password']);
                        $_SESSION['success_register'] = 'Вы успешно зарегистрировались. Теперь можно авторизоваться';
                        $this->view->redirect('login');
                    } else {
                        $_SESSION['wrong_password'] = 'Пароли не совпадают!';
                        $this->view->redirect('register');
                    }
                } else {
                    $_SESSION['password_not_match'] = 'Пожалуйста, проверьте правильность заполнения всех полей';
                    $this->view->redirect('register');
                }
            }
        } else {
            $this->view->render('Регистрация');
        }
    }
}