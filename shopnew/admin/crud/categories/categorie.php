<?php
class categories
{
    public $conn;

    function __construct()
    {

        $conn = new mysqli('localhost', 'root', '', 'myadmin');
        if ($conn->connect_error) {
            die("Connection failed: . $conn->connect_error");
        }
        $this->conn = $conn;
    }

    function add_categorie($post)
    {
        // username
        $username = $post['username'];
        $date_created = $post['date_created'];
        $errors = [];

        if (strlen($username) <= 3) {
            $errors['username'] = 1;
        }

        // date created
        if (strlen($date_created) < 6) {
            $errors['date_created'] =  1;
        }
        // Create connection
        $conn = new mysqli('localhost', 'root', '', 'myadmin');
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        if ($errors == []) {
            $sql = "INSERT INTO categories (category_name,date_created)
            VALUES ('" . $username . "','" . $date_created . "')";
            if ($this->conn->query($sql) === TRUE) {
                return ['success' => 1, 'data' => $post];
            } else {
                return ['error' => 'connec_err'];
            }
        } else {
            return ['error' => $errors, 'data' => $post];
        }
    }

    function detail_categories($id)
    {
        $sql = "SELECT * FROM categories where category_id = " . $id;
        $detail = $this->conn->query($sql);
        $detail = $detail->fetch_array();
        return $detail;
    }

    function edits_post_categories($id, $post)
    {
        $errors = [];
        $username = $post['username'];
        $date_created = $post['date_created'];
        if (strlen($username) <= 3) {
            $errors['username'] = 1;
        }

        if (strlen($date_created) <= 3) {
            $errors['date_created'] = 1;
        }
        if ($errors == []) {
        $sql_update = "update categories set category_name = '" . $username . "',date_created='" . $date_created . "' where category_id = " . $id;
        $result_update = $this->conn->query($sql_update);
        if ($result_update == true) {
            return ['success' => 1, 'data' => $post];
            } else {
                return ['error' => 'connec_err'];
            }
        } else {
            return ['error' => $errors, 'data' => $post];
        }

    }

    function del_categories($GET_id)
    {
        $id = $GET_id['id'];
        $sql_del = "DELETE FROM categories where category_id = " . $id;
        $result_del = $this->conn->query($sql_del);
        return $result_del;
    }
    function list_categories()
    {

        $sql = "SELECT * FROM categories";
        $result = $this->conn->query($sql)->fetch_all();
        return $result;
    }
}
