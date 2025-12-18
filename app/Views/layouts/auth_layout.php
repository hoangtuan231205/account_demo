<?php
$title = $title ?? "Auth";
$content = $content ?? "";
?>
<!doctype html>
<html lang="vi">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width,initial-scale=1" />
  <title><?= htmlspecialchars($title) ?></title>
  <link rel="stylesheet" href="/account_demo/public/assets/css/auth.css">
  <link rel="icon" type="image/png" href="/account_demo/public/image/winmart.png">
</head>
<body>
  <div class="bg">
    <div class="card">
      <div class="left">
        <div class="brand">
          <div class="logo">
            <img src="/account_demo/public/image/winmart.png" alt="WinMart Logo">
          </div>
          <div>
            <div class="name">WINMART</div>
            <div class="tag">Login / Register • MVC PHP</div>
          </div>
        </div>

        <h1 class="headline"><?= htmlspecialchars($title) ?></h1>

        <?php if (!empty($error)): ?>
          <div class="alert"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <div class="switch">
          <a class="link" href="?c=Auth&a=login">Đăng nhập</a>
          <span class="dot">•</span>
          <a class="link" href="?c=Auth&a=register">Đăng ký</a>
        </div>
      </div>

      <div class="right">
        <?php require __DIR__ . '/../' . $content . '.php'; ?>
      </div>
    </div>
  </div>
</body>
</html>
