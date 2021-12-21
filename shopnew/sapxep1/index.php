<!doctype html>
<html>
<head>
    <title>Sắp xếp</title>
</head>
<body>
<?php
if (isset($_POST['btn_sapxep'])){
    $numbers = array($_POST['so1'], $_POST['so2'], $_POST['so3'], $_POST['so4'], $_POST['so5'], $_POST['so6'], $_POST['so7'], $_POST['so8'], $_POST['so9'], $_POST['so10'], );

    if (isset($_POST['sx']) && $_POST['sx'] == "1"){
    sort($numbers);
    echo "Danh sach tang dan: <br>";
    for ($i = 0; $i < count($numbers); $i++){
        echo $numbers[$i]."<br>";
    }
    }elseif (isset($_POST['sx']) && $_POST['sx'] == "2"){
        rsort($numbers);
        echo "Danh sach giam dan: <br>";
        for ($i = 0; $i < count($numbers); $i++) {
            echo $numbers[$i]."<br>";
        }
    }else{
        echo "Moi ban chon cach sap xep!";
    }
}
?>
    <div>///////////////////////////////////////</div>
    <form action="index.php" method="post">
        <div><label>Số thứ 1: </label><input type="number" name="so1" value="0"></div>
        <div><label>Số thứ 2: </label><input type="number" name="so2" value="0"></div>
        <div><label>Số thứ 3: </label><input type="number" name="so3" value="0"></div>
        <div><label>Số thứ 4: </label><input type="number" name="so4" value="0"></div>
        <div><label>Số thứ 5: </label><input type="number" name="so5" value="0"></div>
        <div><label>Số thứ 6: </label><input type="number" name="so6" value="0"></div>
        <div><label>Số thứ 7: </label><input type="number" name="so7" value="0"></div>
        <div><label>Số thứ 8: </label><input type="number" name="so8" value="0"></div>
        <div><label>Số thứ 9: </label><input type="number" name="so9" value="0"></div>
        <div><label>Số thứ 10: </label><input type="number" name="so10" value="0"></div>
        <div>
            <label>Tăng dần</label><input type="radio" name="sx" value="1">
            <label>Giảm dần</label><input type="radio" name="sx" value="2">
        </div>
        <div><input type="submit" name="btn_sapxep" value="Sắp xếp"></div>
    </form>
    <div>///////////////////////////////////////</div>
</body>
</html>