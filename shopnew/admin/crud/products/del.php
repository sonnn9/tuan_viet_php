<?php
$id = $_GET['id'];
include 'layouts/products.php';
$del = new Products;
$result = $del->del_products($id);
if(!$result) {
    echo "Not delete!";
}else{
    header('Location: http://'.$_SERVER['SERVER_NAME'].'/tuan_viet_php/shopnew/admin/crud/products/list.php');
}
