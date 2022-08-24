<?php

class TaskView extends Task{
  
  public function __construct(){
    
  }

  public static function fetchAll($id) {
    $self = new self();
    return $self->getAllTask($id);
  }

  public static function fetchOne($id) {
    $self = new self();
    return $self->getTask($id);
  }
}