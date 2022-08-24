<?php

class TaskCtr extends Task {
  
  public function __construct() {
    
  }

  public static function createTask($taskname, $taskdesc, $author) {
    $self = new self();
    $self->setTask($taskname, $taskdesc, $author);
  }
  public static function updateTask($taskname, $taskdesc, $author, $id) {
    $self = new self();
    date_default_timezone_set('Asia/Manila');
    $date = date('Y-m-d');
    $self->modifyTask($taskname, $taskdesc, $author, $date, $id);
  }
  public static function deleteTask($id) {
    $self = new self();
    $self->destroyTask($id);
  }
}