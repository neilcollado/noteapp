<?php include "components/header.php"; ?>

<body>

<?php include "components/navbar.php"; ?>

<div class="container mt-5">

<div class="container mt-5 w-50 mx-auto">

<div class="card" style="width: 100%;">
  <img src="..." class="card-img-top" alt="task header image">
  <div class="card-body">
    <h5 class="card-title"><?php echo $data['task']->taskName; ?></h5>
    <p class="card-text"><?php echo $data['task']->taskDesc ?></p>
    <p class="card-text"> Author Name: <?php echo $data['user']->firstName . " " . $data['user']->lastName  ?></p>
  </div>
  <ul class="list-group list-group-flush">
    <!-- insert for loop here for subtask -->
    <li class="list-group-item">An item</li>
    <li class="list-group-item">A second item</li>
    <li class="list-group-item">A third item</li>
  </ul>
  <div class="card-body d-flex justify-content-end">
    <a href="<?php echo BASEURL; ?>/taskController/editTask/<?php echo $data->id; ?>" class="btn btn-warning">Edit</a>
    <a href="<?php echo BASEURL; ?>/taskController/deleteTask/<?php echo $data->id; ?>" class="btn btn-danger">Delete</a>
  </div>
</div>
</div>

   <?php include "components/footer.php"; ?>
</body>
</html>