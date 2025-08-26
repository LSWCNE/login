<?php
session_start();
require 'db.php';
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { header('Location: main.php'); exit; }
if (!isset($_SESSION['user_id'])) { header('Location: login.php'); exit; }

$id = intval($_POST['id'] ?? 0);
$title = trim($_POST['title'] ?? '');
$content = trim($_POST['content'] ?? '');

if ($id <= 0 || $title === '' || $content === '') exit('입력값 오류');

$stmt = $pdo->prepare("SELECT user_id FROM posts WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch();
if (!$row) exit('게시글 없음');
if ($row['user_id'] != $_SESSION['user_id']) exit('권한 없음');

$ustmt = $pdo->prepare("UPDATE posts SET title = ?, content = ? WHERE id = ?");
$ustmt->execute([$title, $content, $id]);

header("Location: view.php?id={$id}");
exit;
