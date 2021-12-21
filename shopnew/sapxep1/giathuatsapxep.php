<?php
$arr_numbers = array($_POST['1'], $_POST['2'], $_POST['3'], $_POST['4'], $_POST['5'], $_POST['6'], $_POST['7'], $_POST['8'], $_POST['9'], $_POST['10']);
if ($_POST['sapxep'] == "1") {
    sort($arr_numbers);
    echo "<br>Dãy số theo thứ t tăng dần: <br>";
    for ($i = 0; $i < count($arr_numbers); $i++) {
        echo $arr_numbers[$i] . "<br>";
    }
}else{
    rsort($arr_numbers);
    echo "<br>Dãy số từ bé đến lớn: <br>";
    for ($i = 0; $i < count($arr_numbers); $i++) {
        echo $arr_numbers[$i] . "<br>";
    }
}