
<?php
  include 'includes/header.inc.php';
  include 'includes/class-autoloader.inc.php';
  ?>

<body>
  <!--Navbar -->
  <nav class="mb-1 navbar navbar-expand-lg navbar-dark success-color">
    <a class="navbar-brand" href="#">Task List</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
      aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a href="resource/task/addtask.php" class="rounded-lg nav-link success-color-dark">Create Task</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-4" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> Profile </a>
          <div class="dropdown-menu dropdown-menu-right dropdown-info" aria-labelledby="navbarDropdownMenuLink-4">
            <a class="dropdown-item" href="#">My account</a>
            <a class="dropdown-item" href="#">Log out</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->

 <div class="container mt-5">
  <div class="row row-cols-1 row-cols-md-3 g-1 mt-5">
    <!-- display all task -->
    <?php $tasks = TaskView::fetchAll(0);
      foreach($tasks as $task): ?>
    <div class="col">
        <!-- Card Narrower -->
        <div class="card card-cascade narrower mb-4 h-60">
          <!-- Card image -->
          <div class="view view-cascade overlay">
            <img class="card-img-top" src="https://mdbootstrap.com/img/Photos/Lightbox/Thumbnail/img%20(147).webp"
              alt="Card image cap">
            <a>
              <div class="mask rgba-white-slight"></div>
            </a>
          </div>

          <!-- Card content -->
          <div class="card-body card-body-cascade">
            <!-- Title -->
            <h2 class="pink-text font-weight-bold card-title"><?php echo $task['taskname'] ?></h2>
            <!-- Text -->
            <p class="card-text"><?php echo $task['taskdesc'] ?></p>
            <a href="resource/task/viewtask.php?id=<?php echo $task['id']?>" class="btn unique-color-dark btn-block">Expand</a>
          </div>
          
          <!-- Card footer -->
          <div class="card-footer text-muted text-center">
            <small>
              <p class="card-text">Created: <?php echo $task['created_at'] ?>
              <p class="card-text teal-text">Last updated <?php echo $task['modified_at'] ?>
            </small>
          </div>

        </div>
        <!-- Card Narrower End-->
        
    </div> 
    <?php endforeach ?>
  </div>
 </div>
 
</body>
</html>