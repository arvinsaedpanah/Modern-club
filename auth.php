<?php
session_start();

// ثبت‌نام
if (isset($_POST['register'])) {
    $role = $_POST['role'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = password_hash(trim($_POST['password']), PASSWORD_DEFAULT);
    $data = "$role|$username|$email|$password\n";
    file_put_contents("users.txt", $data, FILE_APPEND);
    echo "<script>alert('ثبت‌نام با موفقیت انجام شد! اکنون وارد شوید.');</script>";
}

// ورود
if (isset($_POST['login'])) {
    $role = $_POST['role'];
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $lines = file("users.txt");

    foreach ($lines as $line) {
        list($storedRole, $storedUser, $storedEmail, $storedHash) = explode("|", trim($line));
        if ($storedUser == $username && password_verify($password, $storedHash) && $storedRole == $role) {
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            header("Location: dashboard.php");
            exit;
        }
    }
    $error = "❌ اطلاعات وارد شده نادرست است.";
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
  <meta charset="UTF-8">
  <title>ورود و ثبت‌نام - فیت‌پاور</title>
  <link rel="stylesheet" href="style.css">
  <style>
    .container {display:flex;justify-content:space-around;align-items:flex-start;padding:50px;}
    form{width:45%;background:#222;padding:20px;border-radius:12px;box-shadow:0 0 10px #111;}
    form h2{text-align:center;color:#ff6600;}
    label{display:block;margin-top:10px;color:white;}
    input,select{width:100%;padding:8px;border-radius:6px;border:none;margin-top:5px;}
    .btn{background:#ff6600;color:white;padding:10px 15px;border:none;margin-top:15px;width:100%;border-radius:6px;cursor:pointer;}
    .btn:hover{background:#ff8533;}
    p{text-align:center;color:white;}
  </style>
</head>
<body style="background:#111;color:white;">

  <header>
    <div class="logo">🏋️ فیت‌پاور</div>
  </header>

  <section class="container">
    <!-- فرم ورود -->
    <form method="POST">
      <h2>🔐 ورود</h2>
      <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
      <label>نوع کاربر:</label>
      <select name="role" required>
        <option value="client">مشتری</option>
        <option value="coach">مربی</option>
      </select>
      <label>نام کاربری:</label>
      <input type="text" name="username" required>
      <label>رمز عبور:</label>
      <input type="password" name="password" required>
      <button type="submit" name="login" class="btn">ورود</button>
    </form>

    <!-- فرم ثبت‌نام -->
    <form method="POST">
      <h2>🧍 ثبت‌نام</h2>
      <label>نوع حساب:</label>
      <select name="role" required>
        <option value="client">مشتری</option>
        <option value="coach">مربی</option>
      </select>
      <label>نام کاربری:</label>
      <input type="text" name="username" required>
      <label>ایمیل:</label>
      <input type="email" name="email" required>
      <label>رمز عبور:</label>
      <input type="password" name="password" required>
      <button type="submit" name="register" class="btn">ثبت‌نام</button>
    </form>
  </section>
</body>
</html>
