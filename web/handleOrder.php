<?php
session_start();
  include("function/function.php");
  if(isset($_GET['add_card'])){
    add_cart($_GET['add_card']);
  }
 

?>

