<?php

namespace app\controllers;
use app\core\Controller;
use FPDF;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->view->render('Главная страница');
    }

    public function contactAction()
    {
        $this->view->render('Страница контактов');
    }

    public function sendformAction()
    {
        $accessories = implode(' ', $_POST['accessories']);
        $this->model->sendform(
            $_POST['color'],
            $_POST['skin_color'],
            $_POST['handle_color'],
            $_POST['width'],
            $_POST['height'],
            $_POST['opening'],
            $accessories
        );

        $this->view->redirect('/');
    }

    public function getpdfAction()
    {
        $arr = $this->model->getpdf('doors');
//        $arr = array_pop($arr);


//        $header = $this->model->getRow('toy');

//        $result = $db_handle->runQuery("SELECT * FROM toy");
//        $header = $db_handle->runQuery("SELECT `COLUMN_NAME`
//        FROM `INFORMATION_SCHEMA`.`COLUMNS`
//        WHERE `TABLE_SCHEMA`='blog_samples'
//            AND `TABLE_NAME`='toy'");

        require('app/lib/fpdf185/fpdf.php');
        $pdf = new FPDF();
        $pdf->AddPage();
//        $pdf->SetFont('Arial','B',12);
//        foreach($arr as $items) {
//                $pdf->Cell(10,12,$items,1);
//        }
        foreach($arr as $row) {
            foreach ($row as $item) {
                $pdf->SetFont('Arial', '', 12);

                $pdf->Cell(9, 12, $item, 1);
//                $pdf->Ln();
            }

        }
        $pdf->Output();
    }
}