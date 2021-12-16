<?php
  function sqlInjection($conn,$var){
    $var = stripslashes($var);
    $var = mysqli_real_escape_string($conn, $var);
    return $var;
  }
?>
