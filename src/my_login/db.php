<?php
$db_conn = new mysqli("db", "root", "root", "do_login");
if ($db_conn->connect_errno) {
    die("DB 연결 실패: " . $db_conn->connect_error);
}
$db_conn->set_charset("utf8mb4");
?>
