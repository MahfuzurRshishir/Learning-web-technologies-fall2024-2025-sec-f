<?php
class FileModel {
    private $uploadDirectory;

    public function __construct() {
        $this->uploadDirectory = __DIR__ . '/../../uploads/';
        if (!is_dir($this->uploadDirectory)) {
            mkdir($this->uploadDirectory, 0777, true);
        }
    }

    public function saveFile($file, $type) {
        $targetPath = $this->uploadDirectory . $type . '_' . basename($file['name']);
        return move_uploaded_file($file['tmp_name'], $targetPath);
    }
}
