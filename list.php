<?php
  session_start();
  include_once('header.php');
  include('list-register.php');
  include('movie-api.php');
  if(isset($_SESSION['username'])){
    include('nav-registered.php');
  }else{
    include('nav-not-registered.php');
  }
  if(isset($_GET["logout"])){
    session_destroy();
    header("location:index.php");
  }
  $base_thumb_url = "http://image.tmdb.org/t/p/w92/";
  $movies_array = getMovieArray($_GET['user']);
?>
<div class="container-fluid list-container">
  <div class="row">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="table-responsive">
        <table class="table table-striped">
          <caption class="text-center cl-white text-handle">Movie List</caption>
            <thead>
              <tr>
                <th class="text-handle">#</th>
                <th class="text-handle">Image</th>
                <th class="text-handle">Title</th>
                <th class="text-handle">Author/Director</th>
                <th class="text-handle no-border-right">Genre</th>
              </tr>
            </thead>
            <tbody>
              <?php
                for ($i=0; $i < count($movies_array); $i++) {
                  $item_id = $movies_array[$i];
                  $item_detail = get_item_details($item_id);
                  $item_cast = get_item_cast($item_id);
                  $director = get_director($item_cast);
              ?>
              <?php if($i % 2 == 0){?>
              <tr>
                <td class="text-handle cl-grey vert-align"><?php echo (string)($i+1); ?></td>
                <td><img class="img-thumbnail" alt="No Image" src="<?php echo $base_thumb_url . $item_detail["poster_path"]; ?>"></td>
                <td class="text-handle cl-grey vert-align"><?php echo $item_detail["title"];?></td>
                <td class="text-handle cl-grey vert-align"><?php echo $director; ?></td>
                <td class="text-handle no-border-right cl-grey vert-align"><?php
                for ($j=0; $j < count($item_detail["genres"]) ; $j++) {
                  echo get_genre($item_detail["genres"][$j]["id"]).' ';
                }?></td>
              </tr><?php }else{?>
              <tr>
                <td class="text-handle vert-align"><?php echo (string)($i+1); ?></td>
                <td><img class="img-thumbnail" alt="No Image" src="<?php echo $base_thumb_url . $item_detail["poster_path"]; ?>"></td>
                <td class="text-handle vert-align"><?php echo $item_detail["title"];?></td>
                <td class="text-handle vert-align"><?php echo $director; ?></td>
                <td class="text-handle no-border-right vert-align"><?php
                for ($j=0; $j < count($item_detail["genres"]) ; $j++) {
                  echo get_genre($item_detail["genres"][$j]["id"]).' ';
                }?></td>
              </tr>
              <?php }}?>
            </tbody>
        </table>
      </div>
    </div>
  </div>
  <div class="row container-fluid">
    <div class="col-sm-10 col-sm-offset-1">
      <div class="sharethis-inline-share-buttons"></div>
    </div>
  </div>
</div>
<?php
  include_once('footer.php');
?>
