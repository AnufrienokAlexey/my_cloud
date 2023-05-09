<?php

namespace app\controllers;
use app\core\Controller;

class AccountController extends Controller
{
    public function loginAction()
    {
        if (!empty($_POST['email']) AND !empty($_POST['password'])) {
            $result = $this->model->getEmailAndPassword($_POST['email'], md5($_POST['password']));
            if ($result) {
                $_SESSION['email'] = $_POST['email'];
                $this->view->redirect('/mycloud');
            } else {
                $_SESSION['unsuccessfully_login'] = 'Вы неверно ввели данные. Попробуйте еще раз.';
                $this->view->render('Вход');
            }
        } else {
            $this->view->render('Вход');
        }
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

    public function logoutAction()
    {
        session_destroy();
        $this->view->redirect('/');
    }
}