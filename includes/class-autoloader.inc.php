<?php

spl_autoload_register('newAutoloader');

function newAutoloader($classname) {
  $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

  if(strpos($url, 'resource') == true) {
    $path = '../../classes/';
  } else {
    $path = 'classes/';
  }

  $ext = '.class.php';
  $fullPath = $path.$classname.$ext;

  if(!file_exists($fullPath)) {
    return false;
  } 

  include_once $fullPath;
}