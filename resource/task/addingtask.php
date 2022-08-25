<?php
  include '../../includes/class-autoloader.inc.php';

  if(isset($_POST['submit'])) {
    $taskname = $_POST['taskname'];
    $taskdesc = $_POST['taskdesc'];
    $author = $_POST['author']; //hard coded will change later

    $task = new Task($taskname, $taskdesc, $author);
    if(!$task->verifyTask()) {
      echo "Error Creating Task.";
    } else {
      TaskCtr::createTask($taskname, $taskdesc, $author);
      header("Location: ../../index.php?create=success");
    }
  } else {
    header("Location: ../../index.php");
  }
