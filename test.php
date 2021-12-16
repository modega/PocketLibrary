<?php
  include('movie-api.php');
  //$genres_1 = get_genre_list();
  $movie = search("lord of the rings");
  //var_dump($movie["results"][0]["genre_ids"]);
  var_dump($movie);
  //var_dump(json_decode($genres_1,true));
  //var_dump($genres_1);
//  echo get_genre(10749);
//  echo $movie["results"][0]["genre_ids"][0];
  /*$test_array = array();
  array_push($test_array,"1231","543","32","213");
  $array = serialize($test_array);
  echo $array;
  $un_array = unserialize($array);
  for ($i=0; $i < count($un_array); $i++) {
    echo $un_array[$i]."\r\n";
  }*/
  /*$server_name = "localhost";
  $username = "root";
  $password = "";
  $db_name = "users";
  $table_name = "members";
  $conn = mysqli_connect($server_name,$username,$password,$db_name);
  $sql = "SELECT Username FROM $table_name";
  $result = mysqli_query($conn,$sql);
  $count = mysqli_num_rows($result);
  if($count > 0){
    $data = mysqli_fetch_assoc($result);
    echo $data["Username"];
  }*/
  $left_out = (string)(10 %2);
  echo $left_out;
?>
