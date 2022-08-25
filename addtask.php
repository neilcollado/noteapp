<?php
  include 'includes/header.inc.php';
  include 'includes/class-autoloader.inc.php';
?>

<body>
  <div class="container mt-5 w-50 mx-auto">
    <h2>Create a new Task</h2>
    <form class="mt-5" action="addingtask.php" method="POST">
      <input type="hidden" name="author" value="0">
      <div class="mb-3">
        <label for="taskname" class="form-label">Task Name</label>
        <input type="text" class="form-control" id="taskname" name="taskname">
      </div>
      <div class="mb-3">
        <label for="taskdesc" class="form-label">Task Description</label>
        <input type="text" class="form-control" id="taskdesc" name="taskdesc">
      </div>
      <input type="submit" name="submit" value="Create Task" class="btn btn-success">
    </form>
  </div>
</body>
</html>