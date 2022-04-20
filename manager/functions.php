<?php 
session_start();
function getManagerID(){
  $id = $_SESSION['user_id'];
  return $id;
}

?>