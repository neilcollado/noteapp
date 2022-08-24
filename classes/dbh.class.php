<?php

class Dbh {

  protected function connect() {
    try {
      $username = "root";
      $password = "";
      $dbh = new PDO('mysql:host=localhost;dbname=noteapp', $username, $password);
      return $dbh;
    } catch (PDOExecption $e) {
      print "Error!: " . $e-getMessage() . "</br>";
      die();
    }
  }
}