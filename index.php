<?php
  include 'includes/header.inc.php';
  include 'includes/class-autoloader.inc.php';
?>

<body>

 <div class="container mt-5">
  <div class="d-flex justify-content-between">
    <h2>Task list</h2>
    <a href="addtask.php" class="btn btn-primary">Add Task</a>
  </div>

  <div class="d-flex flex-row">
  <?php
    $tasks = TaskView::fetchAll(0);
    foreach($tasks as $task):    
      echo "<div class='d-flex flex-column'>
              <div class='p-2'>" . $task['taskname'] . "</div>
              <div class='p-2'>" . $task['taskdesc'] . "</div>
              <div class='d-flex'><a class='btn btn-primary' href='viewtask.php?id=".$task['id']."'>View</a></div>
            </div>";
    endforeach ?>
  </div>
 </div>
 
</body>
</html>