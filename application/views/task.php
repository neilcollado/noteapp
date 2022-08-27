<?php include "components/header.php"; ?>

<body>

<?php include "components/navbar.php"; ?>

<div class="container mt-5">

<?php $this->flash('deletedTask', 'alert alert-danger') ?>
<?php $this->flash('TaskUpdated', 'alert alert-warning') ?>
<?php $this->flash('dataEmpty', 'alert alert-success') ?>
<?php $this->flash('taskAdded', 'alert alert-success') ?>

<div class="row row-cols-1 row-cols-md-3 g-4 mt-5">
    <!-- display all task -->
    <?php if(!empty($data)): ?>
    <?php foreach($data as $data): ?>

    <div div class="col">
      <div class="card">
        <img src="..." class="card-img-top" alt="task header image">
        <div class="card-body">
          <h5 class="card-title"><?php echo ucwords($data->taskName); ?></h5>
          <p class="card-text"><?php echo ucwords($data->taskDesc); ?></p>
          <p class="card-text"><small class="text-muted">Author Name: <?php echo ucwords($data->author);?></small></p>
          <p class="card-text"><small class="text-muted">Created: <?php echo $data->created_at ?></small></p>
          
        </div>
        <div class="card-footer ">
          <div class="d-flex justify-content-between">
            <small class="text-muted d-flex align-items-center">Last updated <?php echo $task['modified_at'] ?></small>
            <a href="<?php echo BASEURL; ?>/taskController/viewTask/<?php echo $data->id; ?>" class="btn btn-success">Modify</a>
          </div>
        </div>
      </div>
    </div> 

    <?php endforeach ?>
  </div>

  <?php endif; ?> 
 </div>

   <?php include "components/footer.php"; ?>
</body>
</html>