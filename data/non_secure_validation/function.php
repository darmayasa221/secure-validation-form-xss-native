<?php

$conn = mysqli_connect("localhost", "root", "", "db_secure");

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function reg($data)
{
  global $conn;

  $fullName = strtoupper(stripslashes($data["fullName"]));
  $email = $data["email"];
  $password = $data["password"];
  $confirmPassword = $data["confirmPassword"];

  $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");
  if (mysqli_fetch_assoc($result)) {
    echo "<script>
    alert('email smae');
    </script>";
    return false;
  }

  if ($password !== $confirmPassword) {
    echo "<script> 
            alert('not same');
          </script>";
  } else {
    echo mysqli_error($conn);
  }
  $password = password_hash($password, PASSWORD_DEFAULT);
  mysqli_query($conn, "INSERT INTO user VALUES('', '$fullName', '$email', '$password', '$confirmPassword')");

  return mysqli_affected_rows($conn);
}

function feedback($data)
{
  global $conn;
  $name = $data["name"];
  $comment = $data["comment"];

  mysqli_query($conn, "INSERT INTO feedback VALUES('$name', '$comment')");
  return mysqli_affected_rows($conn);
}

function srch($keyword)
{
  $query = "SELECT * FROM user WHERE
           fullName LIKE '%$keyword%'
           ";
  return query($query);
}
