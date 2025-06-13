<?php
$id = $_POST['id'] ?? '';
$pass = $_POST['pass'] ?? '';

// 보안 해제 버전: 직접 문자열로 SQL 작성 (※ 테스트용만 사용, 실제 운영에서는 매우 위험)
$sql = "SELECT * FROM users WHERE id = '$id' AND pass = '$pass'";
                                    //xyz' or 2>1 limit  -- 
                                    //id = 'xyz' or 2>1 -- ' AND pass = '$pass'
$result = mysqli_query($conn, $sql);
 
echo "sql = $sql<br>";
if ($row = mysqli_fetch_array($result)) {
    $_SESSION['username'] = $row['name'];
    $_SESSION['id'] = $row['id'];
    echo "<script>
            alert('성공했습니다.'); 
            location.href='index.php';
        </script>";
} else {
    echo "<script>
            alert('아이디와 비번을 확인하세요')b; 
            location.href='index.php';
        </script>";
}

?>