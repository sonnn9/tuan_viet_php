<?php
include 'layouts/user.php';
$del = new Users();
$result = $del->del_user($_GET);
if(!$result) {
    echo "Not delete!";
}else{
    header('Location: http://'.$_SERVER['SERVER_NAME'].'/tuan_viet_php/shopnew/admin/crud/users/list.php');
}

