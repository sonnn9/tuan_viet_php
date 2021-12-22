<?php
$conn = new mysqli('localhost','root','','myadmin');
$id = $_GET['id'];
$sql_del = "DELETE FROM categories where category_id = " .$id ;
$result_del = $conn->query($sql_del);
?>