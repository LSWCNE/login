<?php
session_start();
require 'db.php';
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="utf-8">
  <title>삭제</title>
</head>
<body>
<div>
  <h3>삭제</h3>
  <form action="del_process.php" method="get"></form>
</div>
</body>
</html>