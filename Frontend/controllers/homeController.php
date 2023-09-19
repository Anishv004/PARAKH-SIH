<?php
require_once('models/homeModel.php');
require_once('router.php');

class homeController
{
    private $model;

    public function __construct($db)
    {
        $this->model = new homeModel($db);
    }
    public function processForm()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_FILES["csvFile"])) {
                if ($_FILES["csvFile"]["error"] == UPLOAD_ERR_OK) {
                    $csvFile = $_FILES["csvFile"]["tmp_name"];
                    $this->model->dataInsertion($csvFile);
                    include('views/test_start_page.php');
                } else {
                    echo "Error code: " . $_FILES["csvFile"]["error"];
                }
            }
            if (isset($_POST['skip_upload'])) {
                include('views/test_start_page.php');
            }
            if (isset($_POST['test_start'])) {
                $qn_num = 1;
                $qa = $this->model->fetchQuestion($qn_num);
                if ($qa == null) {
                    include('views/finish_test.php');
                } else {
                    $options = array();
                    $qn_id = $qa[0]['id'];
                    $question = $qa[0]['question'];
                    $options[0] = $qa[0]['opa'];
                    $options[1] = $qa[0]['opb'];
                    $options[2] = $qa[0]['opc'];
                    $options[3] = $qa[0]['opd'];

                    include('views/Question_display.php');
                }
            }
            if (isset($_POST['answer']) && isset($_POST['qn_num'])) {
                $user_ans = $_POST['answer'];
                $qn_id = $_POST['qn_id'];

                // Validate user answer
                $res = $this->model->validateUserAns($qn_id, $user_ans);

                // Update Percentile
                $this->model->updatePerc($qn_id, $res);

                // Update qn num
                $qn_num = $_POST['qn_num'];
                $qn_num++;

                // fetch the next qn
                $qa = $this->model->fetchQuestion($qn_num);
                if ($qa == null) {
                    include('views/finish_test.php');
                } else {
                    $options = array();
                    $qn_id = $qa[0]['id'];
                    $question = $qa[0]['question'];
                    $options[0] = $qa[0]['opa'];
                    $options[1] = $qa[0]['opb'];
                    $options[2] = $qa[0]['opc'];
                    $options[3] = $qa[0]['opd'];
                    
                    include('views/Question_display.php');
                }
            }
        }
    }
}
