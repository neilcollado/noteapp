<?php
  include 'includes/class-autoloader.inc.php';

  if(isset($_POST['submit'])) {
    $id_to_delete = $_POST['id_to_delete'];
    TaskCtr::deleteTask($id_to_delete);
    header("Location: index.php?delete=success");
  } else {

  }