<?php

namespace Data\Photo;

class MultipleUpload {

    public static $image_name;
    private static $extension = array("jpeg", "jpg", "png", "gif", "png");
    private static $bytes = 1024;
    private static $allowedKB = 1000;
    private static $totalBytes = 0;
    private static $errors = [];
    private static $uploadThisFile = true;
    private static $file_destination = "";

    public final static function MultipleUpload(array $files, $limit = 1, $file_des = "uploads"): bool {
        if (isset($file_des) && !empty($file_des))
            self::$file_destination = htmlentities($file_des);

        self::$totalBytes = self::$allowedKB * self::$bytes;
        if (isset($files) == false) {
            echo "<b>Please, Select the files to upload!!!</b>";
            return false;
        }
        foreach ($files["tmp_name"] as $key => $tmp_name) {
            $file_name = $files["name"][$key];
            $file_tmp = $files["tmp_name"][$key];
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            if (!in_array(strtolower($ext), self::$extension)) {
                array_push(self::$errors, "File type is invalid. Name:- " . $file_name);
                self::$uploadThisFile = false;
            }
            if ($files["size"][$key] > self::$totalBytes) {
                array_push(self::$errors, "File size must be less than 100KB. Name:- " . $file_name);
                self::$uploadThisFile = false;
            }
            if (file_exists(SITE_ROOT . DS . self::$file_destination . DS . $files["name"][$key])) {
                array_push(self::$errors, "File is already exist. Name:- " . $file_name);
                self::$uploadThisFile = false;
            }
            if (self::$uploadThisFile) {
                $filename = basename($file_name, $ext);
                $newFileName = $filename . $ext;
                $this->image_name = $newFileName;
                move_uploaded_file($files["tmp_name"][$key], SITE_ROOT . DS . self::$file_destination . DS . $newFileName);
                //todo db insert

                for ($i = 0; $i <= $limit; $i++) {
                    if ($i === 1) {
                        self::$image_name = $newFileName;
                    }
                    if ($i === $limit) {
                        return true;
                    }
                }
            }
        }
        return self::$uploadThisFile;
    }

    public static final function upload_error() {
        $count = count(self::$errors);
        if ($count != 0) {
            foreach (self::$errors as $error) {
                echo $error . "<br/>";
            }
        }
    }

}
