<?php
function connectDB() {
    $host = "localhost";
    $user = "kpc";
    $pass = "1111";
    $dbname = "kpc";

    // MySQLi 객체 생성
    $conn = new mysqli($host, $user, $pass, $dbname);

    // 접속 오류 확인
    if ($conn->connect_error) {
        die("데이터베이스 연결 실패: " . $conn->connect_error);
    }

    // 문자셋 설정 (UTF-8 권장)
    $conn->set_charset("utf8");

    return $conn;
}
?>
