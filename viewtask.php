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
    <h2><?php echo $task['taskname'] ?></h2>
    <p><?php echo $task['taskdesc'] ?></p>
    <p><?php echo $task['author'] ?></p>
    <p><?php echo $task['isDone'] ?></p>
    <p><?php echo $task['created_at'] ?></p>
    <p><?php echo $task['modified_at'] ?></p>
    <a href="editTask.php?id=<?php echo $task['id'] ?>" class="btn btn-warning">Edit</a>
    <a href="deleteTask.php" class="btn btn-danger">Delete</a>
  </div>
</body>
</html>
