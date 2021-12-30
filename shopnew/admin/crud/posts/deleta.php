<?php

include "post.php";
$post = new posts();
$result=$post->deleta_post($_GET);
if (!$result){
    echo "not deleta!";
}else{
    header('Location:http://localhost/tuan_viet_php/shopnew/admin/crud/posts/list.php');
}
?>