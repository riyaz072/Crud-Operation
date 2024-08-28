<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Car List</title>
</head>

<body>
  <h1>Car List</h1>
  <table border="1">
    <tr>
      <th>ID</th>
      <th>Car Name</th>
      <th>Company Name</th>
      <th>Actions</th>
    </tr>
    <?php include_once 'controller.php'; ?>
    <?php foreach ($cars as $car): ?>
    <tr>
      <td><?php echo $car->getId(); ?></td>
      <td><?php echo $car->getName(); ?></td>
      <td><?php echo $companies[$car->getCompanyId()]->getName(); ?></td>
      <td><?php ?>
        <a href="controller.php?action=update&id=<?php echo $car->getId(); ?>">Edit</a>
        <a href="controller.php?action=delete&id=<?php echo $car->getId(); ?>">Delete</a>
        <a href="controller.php?action=view&id=<?php echo $car->getId(); ?>">View</a>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>