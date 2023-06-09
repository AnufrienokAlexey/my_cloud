<?php

namespace app\controllers;
use app\core\Controller;

class MycloudController extends Controller
{
    public function indexAction()
    {
        $this->getUploadFiles();
        $this->view->render('Мое хранилище');
    }

    public function savefileAction()
    {
        if (isset($_POST['downloaded_file'])) {
            $target_dir = 'app/uploads/'.$_SESSION['email'].'/';
            if (!is_dir($target_dir)) {
                mkdir($target_dir);
            }

            $files = array();
            foreach($_FILES["fileToUpload"] as $k => $l) {
                foreach($l as $i => $v) {
                    $files[$i][$k] = $v;
                }
            }
            $_FILES["fileToUpload"] = $files;

            foreach ($_FILES["fileToUpload"] as $key => $file) {
                if ($file["size"] > 3 * 1024 * 1024) {
                    echo "Извините, загружаемый файл не должен превышать 3 МБ".PHP_EOL;
                    echo '<a href="/">Вернуться</a>';
                    return;
                }
                $target_file = $target_dir . basename($file["name"]);
                move_uploaded_file($file["tmp_name"], "$target_file");
            }

            $this->view->redirect('/');
        }
    }

    public function getUploadFiles()
    {
        $target_dir = 'app/uploads/'.$_SESSION['email'].'/';
        if (!is_dir($target_dir)) {
            mkdir($target_dir);
        }
        $_SESSION['uploaded'] = array_diff(scandir($_SERVER['DOCUMENT_ROOT'].'/'.$target_dir), array('..', '.'));
    }
}