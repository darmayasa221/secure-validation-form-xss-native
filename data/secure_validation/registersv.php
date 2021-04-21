<?php
require 'functionsv.php';

if (isset($_POST["register"])) {
  if (regsv($_POST) > 0) {
    header("Location: loginsv.php");
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../assets/css/error.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <title>Register</title>
</head>

<body>
  <div class="mx-2 min-h-screen bg-gray-50 flex flex-col justify-center">
    <div class="max-w-md w-full- mx-auto font-semibold">Create An Account</div>
    <div class="shadow-2xl max-w-md w-full mx-auto mt-4 bg-white p-8 border border-gray-300">
      <form id="reg" class="space-y-6" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
        <div>
          <p id="error"></p>
          <label class="text-sm font-black text-gray-600 block" for="fullName">Full Name</label>
          <input class="w-full p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl transform hover:-translate-y-1 focus:-translate-y-1" type="text" name="fullName" id="fullName" required>
        </div>
        <div>
          <label class="text-sm font-black text-gray-600 block" for="email">Email</label>
          <input class="w-full p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl transform hover:-translate-y-1 focus:-translate-y-1" type="email" name="email" id="email" required>
        </div>
        <div>
          <label class="text-sm font-black text-gray-600 block" for="password">Password</label>
          <input class="w-full p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl transform hover:-translate-y-1 focus:-translate-y-1" type="password" name="password" id="password" required>
          <div id="message">
            <h3>Password must contain the following:</h3>
            <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
            <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
            <p id="number" class="invalid">A <b>number</b></p>
            <p id="length" class="invalid">Minimum <b>8 characters</b></p>
          </div>
        </div>
        <div>
          <label class="text-sm font-black text-gray-600 block" for="confirmPassword">Confirm Password</label>
          <input class="w-full p-2 border border-gray-300 rounded mt-1 duration-300 hover:shadow-xl transform hover:-translate-y-1 focus:-translate-y-1" type="password" name="confirmPassword" id="confirmPassword" required>
        </div>
        <div>
          <button class="btn_rgs btn_register duration-500 w-full py-2 px-4 bg-blue-500 hover:bg-green-500 rounded-md text-white text-sm" type="submit" name="register">Register</button>
        </div>
        <div class="text-center">
          <a class="font-medium text-sm text-blue-500 hover:text-red-700" href="loginsv.php">
            Back?
          </a>
        </div>
      </form>
    </div>
  </div>
</body>
<script src="../../assets/js/validate.js"></script>

</html>