<?php

$db_conn = new mysqli("db", "root", "root", "gsc");

if($db_conn->errno) {
    echo $db_conn->error;
    exit;
}

// 새로운 레코드를 생성
$std_id = $_POST['std_id'];
$id = $_POST['id'];
$password = $_POST['password'];
$name = $_POST['name'];
$age = $_POST['age'];
$birth = $_POST['birth'];
$sql = "insert into student(std_id, id, password, name, age, birth) 
        values('$std_id', '$id', '$password', '$name', $age, '$birth')";

$result = $db_conn->query($sql);
if ($result) {
    echo "<hr><br>레코드 삭제 성공<br><hr>";
} else {
    echo "<hr><br>레코드 삭제 실패<br><hr>";
}
$db_conn->close();
