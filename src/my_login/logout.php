<?php
// logout.php
session_start(); // 세션 사용 중이면 불러오기

// 모든 세션 변수 해제
$_SESSION = [];

// 세션 쿠키도 삭제 (서버와 클라이언트 모두)
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// 세션 완전히 종료
session_destroy();

// 로그인 페이지로 이동
header("Location: login.php");
exit;