<?php
class Users{

    private $hostname = 'localhost';
    private $userhost = 'root';
    private $passhost = '';
    private $dbname = 'myadmin';
    private $conn = NULL;
    private $result = NULL;
    private $errors = [];
    private $user = '';
    private $password = '';
    private $fullname = '';
    private $email = '';
    private $phone = '';
    private $date_created = '';
    function connect()
    {
        // Nếu chưa kết nối thì thực hiện kết nối
        if (!$this->__conn){
            // Kết nối
            $this->__conn = mysqli_connect('localhost', 'root', '', 'myadmin') or die ('Lỗi kết nối');

            // Xử lý truy vấn UTF8 để tránh lỗi font
            mysqli_query($this->__conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
        }
    }


if (isset($_POST['btn_addUser'])) {
            $user = $_POST['username'];
            $password = $_POST['password'];
            $fullname = $_POST['fullname'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $date_created = $_POST['date_created'];
            $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/tuan_viet_php/upload/avatar/";
            $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
            $avartar = "/upload/avatar/" . $_FILES["avatar"]["name"];
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["avatar"]["tmp_name"]);
            if ($check == false) {
                echo "File is not an image.";
                $uploadOk = 0;
            }
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }
            if ($_FILES["avatar"]["size"] > 500000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            if ($uploadOk == 0) {
                $error['avatar'] = 1;
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file)) {
                    echo "The file " . htmlspecialchars(basename($_FILES["avatar"]["name"])) . " has been uploaded.";
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
                if ($conn->query($sql) === TRUE) {
                    echo "A new user has been created!";
                } else {
                    echo "Error: " . $sql;
                }
            }
        }

    }
