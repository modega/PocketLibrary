<?php
  function registerMovie($movie_id){
    $server_name = "localhost";
    $dbusername = "root";
    $password = "";
    $db_name = "users";
    $table_name = "lists";
    $username = $_SESSION['username'];
    $conn = mysqli_connect($server_name,$dbusername,$password,$db_name);
    $sql_check_existing = "SELECT Movies FROM $table_name WHERE Username='$username'";
    $check_result = mysqli_query($conn,$sql_check_existing);
    if(mysqli_num_rows($check_result) == 1){
      $movie_array = mysqli_fetch_assoc($check_result);
      $un_movie_array = unserialize($movie_array["Movies"]);
      if(!checkForDupe($movie_id,$un_movie_array)){
        echo "Got Inside";
        array_push($un_movie_array,$movie_id);
        $movie_array_serialized = serialize($un_movie_array);
        $sql_update = "UPDATE $table_name SET Movies='$movie_array_serialized' WHERE  Username='$username'";
        mysqli_query($conn,$sql_update);
      }else{

      }
    }else {
      $movie_array= array();
      array_push($movie_array,$movie_id);
      $se_movie_array = serialize($movie_array);
      $sql_insert = "INSERT INTO $table_name(Username,Movies) VALUES('$username','$se_movie_array')";
      mysqli_query($conn,$sql_insert);
    }
    echo mysqli_error($conn);
  }

  function checkForDupe($id,$db_array){
    $dupe = false;
    for ($i=0; $i < count($db_array); $i++) {
      if($db_array[$i] == $id){
        $dupe = true;
        break;
      }
    }
    return $dupe;
  }

  function getMovieArray($ses_username){
    $server_name = "localhost";
    $dbusername = "root";
    $password = "";
    $db_name = "users";
    $table_name = "lists";
    $username = $ses_username;
    $conn = mysqli_connect($server_name,$dbusername,$password,$db_name);
    $sql_check_existing = "SELECT Movies FROM $table_name WHERE Username='$username'";
    $check_result = mysqli_query($conn,$sql_check_existing);
    if(mysqli_num_rows($check_result) == 1){
      $movie_array = mysqli_fetch_assoc($check_result);
      $un_movie_array = unserialize($movie_array["Movies"]);
    }
    return $un_movie_array;
  }
?>
