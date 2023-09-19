<?php
require_once('../models/homeModel.php');

class quizController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new homeModel($db);
    }

    public function quizProcess()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['answer']) && isset($_POST['qn_num'])) {
                $user_ans=$_POST['answer'];
                // some function has to be written to verify the ans
                // and return if correct or wrong

                // Update qn num
                $qn_num = $_POST['qn_num'];   
                $qn_num++;

                // fetch the next qn
                $qa = $this->model->fetchQuestion($qn_num);
                if ($qa == null) {
                    include('views/finish_test.php');
                } else {
                    $options=array();
                    $question=$qa[0]['question'];
                    $options[0]=$qa[0]['opa'];
                    $options[1]=$qa[0]['opb'];
                    $options[2]=$qa[0]['opc'];
                    $options[3]=$qa[0]['opd'];
                    include('views/Question_display.php');
                }
            }
            
        }
    }
}
