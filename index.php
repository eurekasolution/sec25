<?php
// index.php
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>PHP 홈페이지</title>
  <!-- Bootstrap 5 CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- Navbar 시작 -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">홈페이지</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">

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
    </div>
  </div>
</nav>
<!-- Navbar 끝 -->

<!-- 콘텐츠 영역 -->
<div class="container mt-4">
  <?php
    $cmd = isset($_GET['cmd']) ? $_GET['cmd'] : '';

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
</div>

<!-- 푸터 -->
<footer class="bg-light text-center text-muted py-3 mt-5 border-top">
  <small>한국생산성본부 보안 강의</small>
</footer>

<!-- Bootstrap JS (Popper 포함) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
