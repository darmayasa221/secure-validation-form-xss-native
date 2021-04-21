<?php
session_start();
require 'functionsv.php';
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];
  $result = mysqli_query($conn, "SELECT email FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  if ($key === hash('sha256', $row['email'])) {
    $_SESSION['login'] = true;
  }
}
if (isset($_POST["login"])) {
  $email = $_POST["email"];
  $password = $_POST["password"];
  $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
  if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {
      $_SESSION["login"] = true;
      if (isset($_POST["remember"])) {
        setcookie('id', $row['id'], time() + 60);
        setcookie('key', hash('sha256', $row['email']), time() + 60);
      }
      header("location: datasv.php");
      exit;
    }
  }
  $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Login</title>
</head>

<body>
  <div class="mx-2 min-h-screen bg-gray-50 flex flex-col justify-center">
    <div class="max-w-md w-full- mx-auto font-semibold">Login Here</div>
    <div class="shadow-2xl max-w-md w-full mx-auto mt-4 bg-white p-8 border border-gray-300">
      <?php if (isset($error)) : ?>
        <p>Try !</p>
      <?php endif; ?>
      <form action="" method="POST">
        <div>
          <label class="text-sm font-black text-gray-600 block" for="email">Email</label>
          <input class="w-full p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl transform hover:-translate-y-1 focus:-translate-y-1" type="text" name="email" id="email">
        </div>
        <div>
          <label class="text-sm font-black text-gray-600 block" for="password">Password</label>
          <input class="w-full p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl transform hover:-translate-y-1 focus:-translate-y-1" type="password" name="password" id="password">
        </div>
        <div>
          <input class="p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl focus:-translate-y-1" type="checkbox" name="remember" id="remember">
          <label class="p-2 mt-1 text-sm font-black text-gray-600 " for="remember">Remember Me</label>
        </div>
        <div>
          <button class="p-2 btn_rgs btn_register duration-500 w-full py-2 px-4 bg-blue-500 hover:bg-green-500 rounded-md text-white text-sm" type="submit" name="login">login!</button>
        </div>
        <div class="text-center">
          <a class="font-medium text-sm text-blue-500 hover:text-blue-700" href="registersv.php">
            Register?
          </a>
        </div>
      </form>
    </div>
  </div>
</body>

</html>