<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: login.php");
  exit;
}
require 'function.php';

$source = query("SELECT * FROM user");
if (isset($_POST["search"])) {
  $source = srch($_POST["keyword"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Document</title>
</head>

<body>
  <div class="mx-2 min-h-screen bg-gray-50 flex flex-col ">
    <div class="max-w-md w-full- mx-auto font-semibold">
      if you can't found, and here you can found it...
    </div>
    <div class="shadow-2xl max-w w-full mx-auto mt-5 bg-white p-8 border border-gray-300">
      <a href="comment.php">Logout</a>
      <form action="" method="POST">
        <input class="w-4/5 p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl" type="text" name="keyword" autocomplete="off" autofocus placeholder="search here...">
        <button class="p-2 btn_rgs btn_register duration-500 w-1/6  px-4 bg-blue-500 rounded-md text-white text-sm" type="submit" name="search">Hold Me</button>
      </form>
    </div>
    <div class="shadow-2xl max-w w-full mx-auto mt-5 bg-white p-8 border border-gray-300">
      <table class="table-fixed">
        <thead>
          <tr>
            <th class="w-1">ID</th>
            <th class="w-1/2">Full Name</th>
            <th class="w-1/2">Email</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <?php $i = 1; ?>
          <?php foreach ($source as $key) : ?>
            <tr>
              <td> <?= $i; ?></td>
              <td><?= $key["fullName"]; ?></td>
              <td><?= $key["email"]; ?></td>
            </tr>
            <?php $i++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>