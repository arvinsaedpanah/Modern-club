<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$weight = $_POST['weight'];
$height = $_POST['height'];
$email = $_POST['email'];

// تعیین نوع برنامه بر اساس وزن
if ($weight < 70) {
  $program = "افزایش حجم و قدرت با تمرکز بر حرکات ترکیبی";
} elseif ($weight >= 70 && $weight <= 90) {
  $program = "برنامه تعادلی برای تقویت عضله و چربی‌سوزی";
} else {
  $program = "برنامه کاهش وزن با تمرکز بر تمرینات هوازی";
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>برنامه تمرینی شما</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>
    <div class="logo">🏋️ فیت‌پاور</div>
  </header>

  <section class="services">
    <h2>برنامه تمرینی شخصی شما</h2>
    <p><strong>نام:</strong> <?php echo $fname . " " . $lname; ?></p>
    <p><strong>وزن:</strong> <?php echo $weight; ?> کیلوگرم</p>
    <p><strong>قد:</strong> <?php echo $height; ?> سانتی‌متر</p>
    <p><strong>ایمیل:</strong> <?php echo $email; ?></p>

    <div class="card">
      <h3>پیشنهاد تمرینی:</h3>
      <p><?php echo $program; ?></p>
    </div>
  </section>

  <footer>
    <p>© 2025 فیت‌پاور</p>
  </footer>
</body>
</html>