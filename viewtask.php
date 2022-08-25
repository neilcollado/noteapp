<?php
  include 'includes/class-autoloader.inc.php';
  include 'includes/header.inc.php';

  if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $task = TaskView::fetchOne($id);
  } else {
    echo "no id";
  }
?>

<body>

  

  <div class="container mt-5 w-50 mx-auto">

    <div class="card" style="width: 100%;">
      <img src="..." class="card-img-top" alt="task header image">
      <div class="card-body">
        <h5 class="card-title"><?php echo $task['taskname'] ?></h5>
        <p class="card-text"><?php echo $task['taskdesc'] ?></p>
      </div>
      <ul class="list-group list-group-flush">
        <!-- insert for loop here for subtask -->
        <li class="list-group-item">An item</li>
        <li class="list-group-item">A second item</li>
        <li class="list-group-item">A third item</li>
      </ul>
      <div class="card-body d-flex justify-content-end">
        <a href="editTask.php?id=<?php echo $task['id'] ?>" class="btn btn-warning">Edit</a>
        <form action="deletetask.php" method="POST">
          <input type="hidden" name="id_to_delete" value="<?php echo $task['id'] ?>">
          <input type="submit" name="submit" value="Delete" class="btn btn-danger ms-2">
        </form>
      </div>
    </div>
  </div>

</body>
</html>
