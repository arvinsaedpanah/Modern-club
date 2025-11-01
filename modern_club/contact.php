<?php
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];
?>

<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>پیام ارسال شد</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <section class="services">
    <h2>✅ پیام شما با موفقیت ارسال شد!</h2>
    <p><strong>نام:</strong> <?php echo $name; ?></p>
    <p><strong>ایمیل:</strong> <?php echo $email; ?></p>
    <p><strong>متن پیام:</strong> <?php echo nl2br($message); ?></p>
    <a href="index.html" class="btn">بازگشت به صفحه اصلی</a>
  </section>
</body>
</html>