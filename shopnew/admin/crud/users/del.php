<?php
$id = $_GET['id'];
$conn_del = new mysqli('localhost', 'root','','myadmin');
if($conn_del->connect_error){
    die("Connection failed: ".$conn_del->connect_error);
}
$sql_del = "DELETE FROM users WHERE id=" . $id;
$result = $conn_del->query($sql_del);
if(!$result) {
    echo "Not delete!";
}else{
    header('Location: http://localhost/tuan_viet_php/shopnew/admin/crud/users/list.php');
}
$conn_del->close();
