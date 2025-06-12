<?php
session_save_path(__DIR__ . '/sess');
session_start();
include "db.php";
$conn = connectDB();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>로그인 예제</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    html, body { height: 100%; }
    .wrapper { min-height: 100vh; display: flex; flex-direction: column; }
    main { flex: 1; }
  </style>
</head>
<body>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">홈페이지</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav me-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">메뉴1</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu1-1">메뉴1-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu1-2">메뉴1-2</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu1-3">메뉴1-3</a></li>
            </ul>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">메뉴2</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="index.php?cmd=menu2-1">메뉴2-1</a></li>
              <li><a class="dropdown-item" href="index.php?cmd=menu2-2">메뉴2-2</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- 로그인 UI (navbar 아래 줄) -->
  <div class="container mt-2">
    <?php if (isset($_SESSION['username'])): ?>
      <div class="d-flex justify-content-end align-items-center">
        <span class="me-3"><?php echo htmlspecialchars($_SESSION['username']); ?>님</span>
        <a href="index.php?cmd=logout" class="btn btn-outline-secondary btn-sm">로그아웃</a>
      </div>
    <?php else: ?>
      <form class="d-flex justify-content-end" method="post" action="index.php?cmd=login">
        <input class="form-control form-control-sm me-2" type="text" name="id" placeholder="ID" required>
        <input class="form-control form-control-sm me-2" type="password" name="pass" placeholder="PW" required>
        <button class="btn btn-outline-primary btn-sm" type="submit">로그인</button>
      </form>
    <?php endif; ?>
  </div>

  <!-- 본문 영역 -->
  <main class="container mt-4">
    <?php
    $cmd = $_GET['cmd'] ?? '';

    if ($cmd) {
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

  <!-- Footer -->
  <footer class="bg-light text-center text-muted py-3 border-top">
    <small>한국생산성본부 보안 강의</small>
  </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
