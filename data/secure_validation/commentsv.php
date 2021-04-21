<?php
session_start();
if (!isset($_SESSION["login"])) {
  header("Location: loginsv.php");
  exit;
}
require 'functionsv.php';

if (isset($_POST["feedback"])) {
  if (feedbacksv($_POST) > 0) {
  }
}
$source = querysv("SELECT * FROM feedback");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Coment</title>
</head>

<body>
  <div class="mx-2 min-h-screen bg-gray-50 flex flex-col ">
    <div class="max-w-md w-full- mx-auto font-semibold">
      Please Input Your Comment Here...
    </div>
    <div class="shadow-2xl max-w w-full mx-auto mt-5 bg-white p-8 border border-gray-300">
      <a href="../../index.html">Back</a>
      <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <input class="w-4/5 p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl" type="text" name="name" id="name" autocomplete="off" autofocus placeholder="Your Name">
        <textarea class="w-full p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl" name="comment" id="comment" placeholder="Comment Here"></textarea>
        <button class="p-2 btn_rgs btn_register duration-500 w-1/6  px-4 bg-blue-500 rounded-md text-white text-sm" type="submit" name="feedback">Send</button>
      </form>
    </div>
    <div class="shadow-2xl max-w w-full mx-auto mt-5 bg-white p-8 border border-gray-300">
      <?php foreach ($source as $key) : ?>
        <div class="bg-gray-50 mb-2 flex">
          <div class="pr-4 border-r-2">
            <img src="../../assets/img/icon1.png" alt="person" width="50" height="50">
            <p class="text-sm font-semibold"><?= $key["name"]; ?></p>
          </div>
          <div class="pl-4">
            <p class="font-semibold">coment</p>
            <p class="font-extralight"><?= $key["comment"]; ?></p>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</body>

</html>