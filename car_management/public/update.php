<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car Form</title>
</head>
<?php include_once 'controller.php'; ?>

<body>
  <form action="controller.php?action=update" method="post">
    <label for="name">Car Name:</label>
    <?php  ?>
    <input type="text" id="name" name="name" required value=""><br><br>
    <label for="company_id">Company Name:</label>
    <select id="company_id" name="company_id" required>
      <?php foreach ($companies as $company): ?>
      <option value="<?php echo $company->getId(); ?>">
        <?php echo $company->getName(); ?>
      </option>
      <?php endforeach; ?>
    </select><br><br>
    <input type="submit" value="Submit">
  </form>
</body>

</html>
<?php

foreach($cars as $car){
  echo "<br>" . $car->getName();
  echo "<br>" . $car->getId();
}

?>