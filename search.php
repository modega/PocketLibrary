<?php
  $empty_result = false;
  $counter = 0;
  include_once('header.php');
  session_start();
  if(isset($_SESSION['username'])){
    include('nav-registered.php');
  }else{
    include('nav-not-registered.php');
  }
  include('movie-api.php');
  $results = search($_POST["search_query"]);
  if(isset($results["results"][$counter]["title"])){
    $empty_result = false;
  }else{
    $empty_result= true;
  }
  $base_thumb_url = "http://image.tmdb.org/t/p/w92/";
  ?>
<!-- Search Container -->
<div id="searchContainer-item" class="container-fluid">
    <form class="form-horizontal" action="search.php" method="post">
      <div class="col-sm-10 col-sm-offset-1 input-group">
        <span id="searchIcon" class="input-group-addon glyphicon glyphicon-search"></span>
        <input name="search_query" type="text" class="form-control input-lg" id="searchInput" placeholder="Search for another movie or book">
        <span class="input-group-btn">
          <button class="btn btn-primary input-lg" type="submit">Search</button>
        </span>
      </div>
    </form>
</div>
<!-- Search Results -->
<div class="container-fluid result-container">
  <?php if($empty_result){ ?>
    <div class="row result-row">
      <div id="search-item" class="col-sm-10 col-sm-offset-1">
        <h3 class="text-center cl-white">Sorry, We have come up empty.You should search for another movie or book</h3>
      </div>
    </div>
  <?php }else{
    while($counter < 15) {
      if(isset($results["results"][$counter]["title"])){
    ?>
  <div class="row result-row">
    <div id="search-item" class="col-sm-10 col-sm-offset-1">
      <div class="col-sm-2 no-float border-right">
        <a href="item.php?id=<?php echo $results["results"][$counter]["id"]; ?>">
        <img src="<?php echo $base_thumb_url . $results["results"][$counter]["poster_path"] ?>" class="img-thumbnail" alt="No Image Found">
        </a>
      </div>
      <div class="col-sm-3 no-float border-right">
        <p class="cl-white text-handle"><?php echo $results["results"][$counter]["title"];  ?></p>
      </div>
      <div class="col-sm-3 no-float border-right">
        <p class="text-handle cl-white"><?php echo substr($results["results"][$counter]["overview"],0,strpos($results["results"][0]["overview"],' ',60))."..."; ?></p>
      </div>
      <div class="col-sm-2 no-float border-right">
        <p class="text-handle cl-white"><?php
        for ($i=0; $i < count($results["results"][0]["genre_ids"]) ; $i++) {
          if($i == 2){
            break;
          }
          echo get_genre($results["results"][0]["genre_ids"][$i]).' ';
        }?></p>
      </div>
      <div class="col-sm-2 no-float">
        <p class="cl-white text-handle"><?php echo substr($results["results"][$counter]["release_date"],0,4);  ?></p>
      </div>
    </div>
  </div>
  <?php }else{ break;} $counter++; } } ?>
</div>
<?php
  include_once('footer.php');
  include_once('modals.php');?>
