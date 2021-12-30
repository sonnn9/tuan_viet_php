<?php
class User {
    public $conn;

    function __construct()
    {
      
		$conn = new mysqli('localhost', 'root', '', 'myadmin');
		if ($conn->connect_error) {
			die("Connection failed: . $conn->connect_error");
		}
        $this->conn = $conn;
    }

    function add_user($post, $file) {
        $user = $post['username'];
		$password = $post['password'];
		$fullname = $post['fullname'];
		$email = $post['email'];
		$phone = $post['phone'];
		$date_created = $post['date_created'];
		$target_dir = $_SERVER['DOCUMENT_ROOT'] . "/tuan_viet_php/upload/avatar/";
		$target_file = $target_dir . basename($file["avatar"]["name"]);
		$avartar = "/upload/avatar/abc";
        $errors = [];
	


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
			$sql = "INSERT INTO users (username, password, fullname, email, phone, date_created, avatar) VALUES ('" . $user . "', '" . $password . "', '" . $fullname . "','" . $email . "','" . $phone . "','" . $date_created . "','".$avartar."')";
            if ($this->conn->query($sql) === TRUE) {
				return ['success' => 1];
			} else {
                return ['error' => 'connec_err'];

			}
		} else {
            return ['error' => $errors];
        }
    }

    function edit_user() {
        return "add user";
    }

    function delete_user() {
        return "add user";
    }

    function list_users() {
    
		$sql = "SELECT * FROM users";
		$result = $this->conn->query($sql);
        return $result->fetch_all();
    }
}