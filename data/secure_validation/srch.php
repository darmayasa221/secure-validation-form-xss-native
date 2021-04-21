<?php
require 'functionsv.php';
$key = $_GET["keyword"];
$query = "SELECT * FROM user WHERE fullName LIKE '%$keyword%'";
$srch = query($query);
?>
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