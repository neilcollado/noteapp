<?php

class Task extends Dbh{
  private $taskName;
  private $taskDesc;
  private $author;
  private $isDone;
  private $created_at;
  private $modified_at;

  public function __construct($taskName, $taskDesc, $author) {
    $this->taskName = $taskName;
    $this->taskDesc = $taskDesc;
    $this->author = $author;
  }

  public function verifyTask() {
    if(empty($this->taskName) || empty($this->taskDesc)) {
      if(empty($this->author)) {
        return false;
      }
    } else {
      return true;
    }
  }

  public function getTaskName() {
    return $this->taskName;
  }
  public function setTaskName($taskName) {
    $this->taskName = $taskName;
  }
  public function getTaskDesc() {
    return $this->taskDesc;
  }
  public function setTaskDesc($taskDesc) {
    $this->taskDesc = $taskDesc;
  }
  public function getAuthor() {
    return $this->author;
  }
  public function setAuthor($author) {
    $this->author = $author;
  }

  protected function getAllTask($id) {
    $sql = "SELECT * FROM tasks WHERE author = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
    
    return $results = $stmt->fetchAll();
  }
  protected function getTask($id) {
    $sql = "SELECT * FROM tasks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);

    return $results = $stmt->fetch();
  }
  protected function setTask($taskname, $taskdesc, $author) {
    $sql = "INSERT INTO tasks (taskname, taskdesc, author)
            VALUES(?, ?, ?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$taskname, $taskdesc, $author]);
  }
  protected function modifyTask($taskname, $taskdesc, $author, $date, $id) {
    $sql = "UPDATE tasks SET taskname = ?, taskdesc = ?, author = ?, modified_at = ? WHERE id = ?;";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$taskname, $taskdesc, $author, $date, $id]);
  }
  protected function destroyTask($id) {
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$id]);
  }
  
}