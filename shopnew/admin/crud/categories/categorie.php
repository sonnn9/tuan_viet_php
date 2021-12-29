<?php
class categori {
    public $conn;

    function __construct()
    {
      
		$conn = new mysqli('localhost', 'root', '', 'myadmin');
		if ($conn->connect_error) {
			die("Connection failed: . $conn->connect_error");
		}
        $this->conn = $conn;
    }

    function add_categori($post) {
            // username
    $username = $post['username'];
    $date_created = $post['date_created'];
     $errors=[];

    if (strlen($username) <= 3) {
        $errors['username'] = 1;
    }

    // date created
if (strlen($date_created) < 6) {
        $errors['date_created'] =  1;
    }
             // Create connection
             $conn = new mysqli('localhost', 'root','','myadmin');
             // Check connection
             if ($conn->connect_error) {
                 die("Connection failed: " . $conn->connect_error);
             }
             if ($errors == []) {
                 $sql = "INSERT INTO categories (category_name,date_created )
            VALUES ('" . $username . "','" . $date_created . "')";
                 if ($this->conn->query($sql) === TRUE) {
                    return ['success' => 1];
                } else {
                    return ['error' => 'connec_err'];
    
                }
            } else {
                return ['error' => $errors];
            }
    } 

    function edit_categori() {
        return "add categori";
    }

    function delete_categori() {
        return "add categori";
    }

    function list_categories() {
    
		$sql = "SELECT * FROM posts";
		$result = $this->conn->query($sql)->fetch_all();
        return $result;
    }
}