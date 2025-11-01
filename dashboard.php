<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: auth.php");
    exit;
}

$user = $_SESSION["username"];
$role = $_SESSION["role"];
?>

<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>داشبورد - فیت‌پاور</title>
  <link rel="stylesheet" href="style.css">
</head>
<body style="background:#111;color:white;">
  <header>
    <div class="logo">🏋️ فیت‌پاور</div>
    <nav>
      <ul>
        <li><a href="index.html">خانه</a></li>
        <li><a href="services.html">خدمات</a></li>
        <li><a href="coaches.html">مربیان</a></li>
        <li><a href="contact.html">تماس با ما</a></li>
        <li><a href="logout.php" style="color:#ff6600;">خروج</a></li>
      </ul>
    </nav>
  </header>

  <section class="services">
    <h2>👋 سلام <?php echo $user; ?> </h2>

    <?php if ($role == "client"): ?>
      <p>خوش اومدی مشتری عزیز! از منوی زیر برنامه تمرینی‌ت رو ببین.</p>
      <a href="monthly.html" class="btn">برنامه ماهانه</a>
    <?php else: ?>
      <p>سلام مربی محترم! می‌تونی مشتری‌هات رو مدیریت کنی و برنامه‌ها رو تنظیم کنی.</p>
      <div class="cards">
        <div class="card">
          <h3>لیست مشتری‌ها</h3>
          <p>در حال حاضر مشتری‌های فعال در باشگاه.</p>
        </div>
        <div class="card">
          <h3>افزودن برنامه تمرینی</h3>
          <p>ایجاد برنامه جدید برای مشتری خاص.</p>
        </div>
      </div>
    <?php endif; ?>
  </section>

  <footer>
    <p>© 2025 فیت‌پاور</p>
  </footer>
</body>
</html>
