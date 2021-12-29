<?php
class post {
    public $conn;

    function __construct()
    {
      
		$conn = new mysqli('localhost', 'root', '', 'myadmin');
		if ($conn->connect_error) {
			die("Connection failed: . $conn->connect_error");
		}
        $this->conn = $conn;
    }

    function add_post() {
        return "add post";
    }

    function edit_post() {
        return "add post";
    }

    function delete_post() {
        return "add post";
    }

    function list_posts() {
    
		$sql = "SELECT * FROM posts";
		$result = $this->conn->query($sql)->fetch_all();
        return $result;
    }
}