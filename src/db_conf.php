<?php

// 1. 연결 설정
$db_conn = new mysqli("db", "root", "root", "gsc");

if($db_conn->connect_errno) {
    echo "DB Error: ".$db_conn->connect_error;
    exit;
}

// 2. SQL 전송
$sql = "select * from student";
$result = $db_conn->query($sql);

if(!$result) {
    echo "Query Error: ".$db_conn->error;
    exit;
}

// 3. 반환 값 처리
// 레코드 단위
while($row = $result->fetch_assoc()) {
    echo $row['std_id']."<br>";
}

// 2차원 배열
$field_info = $result->fetch_field();
foreach ($field_info as $key => $field) {
    echo $key.":".$field."<br>";
}

echo "<hr>";

$field_info = $result->fetch_field();
foreach ($field_info as $key => $field) {
    echo $key.":".$field."<br>";
}

// 4. 연결 종료
$db_conn->close();