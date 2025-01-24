<?php
require_once __DIR__ . '/../models/FileModel.php';

class FileController {
    private $model;

    public function __construct() {
        $this->model = new FileModel();
    }

    public function handleRequest() {
        $response = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $fileTypes = [
                'admit_card' => 'Admit Card',
                'job_result' => 'Job Result',
                'job_notice' => 'Job Notice'
            ];

            foreach ($fileTypes as $fieldName => $fileType) {
                if (!empty($_FILES[$fieldName]['name'])) {
                    if ($this->model->saveFile($_FILES[$fieldName], $fieldName)) {
                        $response['success'][] = "$fileType uploaded successfully.";
                    } else {
                        $response['error'][] = "Failed to upload $fileType.";
                    }
                }
            }
        }

        return $response;
    }
}
