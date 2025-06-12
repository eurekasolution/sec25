<?php
// 세션 설정
session_save_path(__DIR__ . '/sess');
session_start();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>로그인 예제</title>
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body {
      height: 100%;
    }
    .wrapper {
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }
    main {
      flex: 1;
    }
  </style>
</head>
<body>
<div class="wrapper">

  <!-- 상단 Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">홈페이지</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto">
          <!-- 메뉴1 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menu1" role="button" data-bs-toggle="dropdown">
              메뉴1
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu1-1">메뉴1-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu1-2">메뉴1-2</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu1-3">메뉴1-3</a></li>
            </ul>
          </li>
          <!-- 메뉴2 -->
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="menu2" role="button" data-bs-toggle="dropdown">
              메뉴2
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu2-1">메뉴2-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu2-2">메뉴2-2</a></li>
            </ul>
          </li>
        </ul>

        <!-- 로그인/로그아웃 영역 -->
        <div class="d-flex align-items-center">
        <?php if (isset($_SESSION['username'])): ?>
          <span class="text-white me-3"><?php echo htmlspecialchars($_SESSION['username']); ?>님</span>
          <a href="index.php?cmd=logout" class="btn btn-outline-light btn-sm">로그아웃</a>
        <?php else: ?>
          <form class="d-flex" method="post" action="index.php?cmd=login">
            <input class="form-control form-control-sm me-1" type="text" name="name" placeholder="ID" required>
            <input class="form-control form-control-sm me-1" type="password" name="pass" placeholder="PW" required>
            <button class="btn btn-outline-light btn-sm" type="submit">로그인</button>
          </form>
        <?php endif; ?>
        </div>
      </div>
    </div>
  </nav>

  <!-- 본문 영역 -->
  <main class="container mt-4">
    <?php
    $cmd = $_GET['cmd'] ?? '';

    if ($cmd === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = $_POST['name'] ?? '';
        $pw = $_POST['pass'] ?? '';

        // 실제 사용 시 DB 체크해야 함
        if ($id === 'admin' && $pw === '1234') {
            $_SESSION['username'] = '홍길동';
            echo "<div class='alert alert-success'>로그인 성공</div>";
        } else {
            echo "<div class='alert alert-danger'>로그인 실패</div>";
        }
    } elseif ($cmd === 'logout') {
        session_unset();
        session_destroy();
        echo "<div class='alert alert-info'>로그아웃되었습니다.</div>";
    } elseif ($cmd) {
        $file = $cmd . '.php';
        if (file_exists($file)) {
            include($file);
        } else {
            echo "<div class='alert alert-danger'>파일을 찾을 수 없습니다: <strong>{$file}</strong></div>";
        }
    } else {
        include('init.php');
    }
    ?>
  </main>

  <!-- 하단 고정 푸터 -->
  <footer class="bg-light text-center text-muted py-3 border-top">
    <small>한국생산성본부 보안 강의</small>
  </footer>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
