<?php

class Users
{
    public $conn;

    function __construct()
    {
        $this->conn = new mysqli('localhost', 'root', '', 'myadmin');
        if ($this->conn->connect_error) {
            die("Connection failed: . $this->conn->connect_error");
        }
    }

    function add_user($post, $file)
    {
        $user = $post['username'];
        $password = $post['password'];
        $fullname = $post['fullname'];
        $email = $post['email'];
        $phone = $post['phone'];
        $date_created = $post['date_created'];
        $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/tuan_viet_php/upload/avatar/";
        $target_file = $target_dir . basename($file["avatar"]["name"]);
        $avartar = "/upload/avatar/" . $file["avatar"]["name"];
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($file["avatar"]["tmp_name"]);
        if ($check == false) {
            $error['avatar'] = 1;
        }
        if (file_exists($target_file)) {
            $error['avatar'] = 1;

        }
        if ($_FILES["avatar"]["size"] > 500000) {
            $error['avatar'] = 1;

        }
        if (isset($error['avatar'])) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($file["avatar"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($file["avatar"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }


        if (strlen($user) <= 3 || strlen($user) > 20 || !ctype_alnum($user)) {
            $errors['username'] = 1;
        }
        if (strlen($password) < 6) {
            $errors['password'] = 1;
        }

        if (strlen($fullname) <= 10) {
            $errors['fullname'] = 1;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 1;
        }
        if (strlen($phone) < 10) {
            $errors['phone'] = 1;
        }
        if (strlen($date_created) <= 5) {
            $errors['date_created'] = 1;
        }
        if ($errors == []) {
            $sql = "INSERT INTO users (username, password, fullname, email, phone, date_created, avartar) VALUES ('" . $user . "', '" . $password . "', '" . $fullname . "','" . $email . "','" . $phone . "','" . $date_created . "','" . $avartar . "')";
            if ($this->conn->query($sql) === TRUE) {
                return ['success' => 1];
            } else {
                return ['error' => 'connect_err'];
            }
        }else{
            return ['error' => $errors];
        }

    }

    function edit_user()
    {

    }

    function del_user()
    {

    }

    function list_user()
    {
        $sql = "SELECT * FROM users";
        return $this->conn->query($sql);
    }
}
