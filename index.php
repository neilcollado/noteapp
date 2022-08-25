<?php
  include 'includes/header.inc.php';
  include 'includes/class-autoloader.inc.php';
?>

<body>

 <div class="container mt-5">
  <div class="d-flex justify-content-between align-items-center">
    <h2>Task list</h2>
    <a href="resource/task/addtask.php" class="btn btn-success">Create Task</a>
  </div>

  <div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
    <!-- display all task -->
    <?php $tasks = TaskView::fetchAll(0);
      foreach($tasks as $task): ?>
    <div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="task header image">
        <div class="card-body">
          <h5 class="card-title"><?php echo $task['taskname'] ?></h5>
          <p class="card-text"><?php echo $task['taskdesc'] ?></p>
          <p class="card-text"><small class="text-muted">Created: <?php echo $task['created_at'] ?></small></p>
        </div>
        <div class="card-footer ">
          <div class="d-flex justify-content-between">
            <small class="text-muted d-flex align-items-center">Last updated <?php echo $task['modified_at'] ?></small>
            <a href="resource/task/viewtask.php?id=<?php echo $task['id']?>" class="btn btn-primary">Expand</a>
          </div>
        </div>
      </div>
    </div>  
    <?php endforeach ?>
  </div>

 </div>
 
</body>
</html>