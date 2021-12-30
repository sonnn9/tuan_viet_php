<?php
	include "categorie.php";
	$categorie = new categorie();
$result=$categorie->del_categories($_GET);
if (!$result){
    echo "not deleta!";
}else{
    header('Location:http://localhost/tuan_viet_php/shopnew/admin/crud/categories/list.php');
}
?>