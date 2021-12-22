<?php
$conn = new mysqli('localhost','root','','myadmin');
$id = $_GET['id'];
$sql_del = "DELETE FROM posts where post_id = " .$id ;
$result_del = $conn->query($sql_del);
var_dump($result_del);
?>