<?php
function search($search_query){
  $page = 1;
  $page_count = 0;
  $query = urlencode($search_query);
  $response = get_data($page, $query);
  $result = null;
  if(isset($response["results"])){
    $page_count = $response["total_pages"];
  }
  for($i = 2; $i <= $page_count; $i++){
    $response_2 = get_data($i, $query);
    $response = array_merge_recursive($response, $response_2);
  }
  $result = $response;
  return $result;
}
function get_data($page, $query){
  $json;
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/search/movie?include_adult=false&page=$page&query=$query&language=en-US&api_key=7ebb8222bcd37e91b7d63655cbefc969",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
    CURLOPT_SSL_VERIFYPEER => false,
  ));
  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);
  if ($err) {
    //echo "cURL Error #:" . $err;
  } else {
    $json = json_decode($response,true);
  }
  return $json;
}
function get_genre_list(){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/genre/movie/list?language=en-US&api_key=7ebb8222bcd37e91b7d63655cbefc969",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
    //Important!! API doesnt return values until this parameter is given.
    CURLOPT_SSL_VERIFYPEER => false,
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);
  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $genre_json = json_decode($response, true);
  }
  return $genre_json;
}

function get_genre($genre_id){
  $genres = get_genre_list();
  $genre = null;
  for ($i = 0; $i < count($genres["genres"]); $i++) {
    if($genre_id === $genres["genres"][$i]["id"]){
      $genre = $genres["genres"][$i]["name"];
      break;
    }
  }
  return $genre;
}

function get_item_details($id){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id?language=en-US&api_key=7ebb8222bcd37e91b7d63655cbefc969",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
    CURLOPT_SSL_VERIFYPEER => false,
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $detail_json = json_decode($response, true);
  }
  return $detail_json;
}

function get_item_cast($id){
  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id/credits?api_key=7ebb8222bcd37e91b7d63655cbefc969",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
    CURLOPT_SSL_VERIFYPEER => false,
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $cast_json = json_decode($response, true);
  }
  return $cast_json;
}

function get_director($cast){
  $director = " ";
  for ($i=0; $i < count($cast["crew"]); $i++) {
    if($cast["crew"][$i]["job"] === "Director"){
      $director = $cast["crew"][$i]["name"];
      break;
    }
  }
  return $director;
}
function get_item_trailer($id){
  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "https://api.themoviedb.org/3/movie/$id/videos?language=en-US&api_key=7ebb8222bcd37e91b7d63655cbefc969",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_POSTFIELDS => "{}",
    CURLOPT_SSL_VERIFYPEER => false,
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  } else {
    $video_json = json_decode($response,true);
  }
  $video_key = $video_json["results"][0]["key"];
  return $video_key;
}
?>
