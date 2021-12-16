<?php
  include_once('header.php');
  session_start();
  if(isset($_SESSION['username'])){
    include('nav-registered.php');
  }else{
    include('nav-not-registered.php');
  }
  include('movie-api.php');
  include('list-register.php');
  $item_id = $_GET["id"];
  $item_detail = get_item_details($item_id);
  $base_url = "http://image.tmdb.org/t/p/w500/";
  $item_cast = get_item_cast($item_id);
  $director = get_director($item_cast);
  $trailer_base_url = "http://www.youtube.com/watch?v=";
  $trailer_key = get_item_trailer($item_id);
?>
<?php
  if(isset($_GET["listAdd"])){
    registerMovie($item_id);
  }
?>
<script>
  less.refreshStyles();
  window.randomize = function() {
  $('.radial-progress').attr('data-progress', Math.floor(((<?php echo (float)$item_detail["vote_average"]; ?>)/10)
  * 100));
  }
  setTimeout(window.randomize, 200);
  $('.radial-progress').click(window.randomize);
</script>
<script>
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>
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
<div class="container-fluid" id="itemContainer">
  <div class="col-sm-4">
    <img src="<?php echo $base_url . $item_detail["poster_path"]; ?>" alt="Item Description" id="itemImg">
    <div class="row container-fluid">
      <div class="col-sm-3">
        <div class="radial-progress pull-left" data-progress="0">
      	<div class="circle">
      		<div class="mask full">
      			<div class="fill"></div>
      		</div>
      		<div class="mask half">
      			<div class="fill"></div>
      			<div class="fill fix"></div>
      		</div>
      		<div class="shadow"></div>
      	</div>
      	<div class="inset">
      		<div class="percentage">
      			<div class="numbers"><span>-</span><span>0%</span><span>1%</span><span>2%</span><span>3%</span><span>4%</span><span>5%</span><span>6%</span><span>7%</span><span>8%</span><span>9%</span><span>10%</span><span>11%</span>
              <span>12%</span><span>13%</span><span>14%</span><span>15%</span><span>16%</span><span>17%</span><span>18%</span><span>19%</span><span>20%</span><span>21%</span><span>22%</span><span>23%</span><span>24%</span><span>25%</span>
              <span>26%</span><span>27%</span><span>28%</span><span>29%</span><span>30%</span><span>31%</span><span>32%</span><span>33%</span><span>34%</span><span>35%</span><span>36%</span><span>37%</span><span>38%</span><span>39%</span>
              <span>40%</span><span>41%</span><span>42%</span><span>43%</span><span>44%</span><span>45%</span><span>46%</span><span>47%</span><span>48%</span><span>49%</span><span>50%</span><span>51%</span><span>52%</span><span>53%</span>
              <span>54%</span><span>55%</span><span>56%</span><span>57%</span><span>58%</span><span>59%</span><span>60%</span><span>61%</span><span>62%</span><span>63%</span><span>64%</span><span>65%</span><span>66%</span><span>67%</span>
              <span>68%</span><span>69%</span><span>70%</span><span>71%</span><span>72%</span><span>73%</span><span>74%</span><span>75%</span><span>76%</span><span>77%</span><span>78%</span><span>79%</span><span>80%</span><span>81%</span>
              <span>82%</span><span>83%</span><span>84%</span><span>85%</span><span>86%</span><span>87%</span><span>88%</span><span>89%</span><span>90%</span><span>91%</span><span>92%</span><span>93%</span><span>94%</span><span>95%</span>
              <span>96%</span><span>97%</span><span>98%</span><span>99%</span><span>100%</span>
            </div>
      		</div>
      	</div>
      </div>
      </div>
      <a href="<?php echo $trailer_base_url . $trailer_key ?>" target="_blank" class="col-sm-2 belowImgTags cl-white" data-toggle="tooltip" data-placement="bottom" title="Watch Trailer"><span class="item-icon glyphicon glyphicon-play"></span></a>
      <?php if(isset($_SESSION['username'])){ ?>
        <form method="get">
          <a href="?id=<?php echo $_GET["id"]; ?>&listAdd=true" type="submit" name="listAdd" role="button" class="col-sm-2 belowImgTags cl-white" data-toggle="tooltip" data-placement="bottom" title="Add To Your List"><span class="item-icon glyphicon glyphicon-list"></span></a>);
        </form>
      <?php } ?>
    </div>
  </div>
  <div class="col-sm-8">
    <div class="row">
      <h2 id="item-title" class="cl-white text-handle pull-left"><strong><?php echo $item_detail["title"]; echo " (".substr($item_detail["release_date"],0,4).")";?></strong></h2>
    </div>
    <div class="row">
      <h4 id="item-tagline" class="cl-white pull-left"><strong>"<?php echo $item_detail["tagline"]; ?>"</strong></h4>
    </div>
    <div class="row">
      <div class="col-sm-5 pull-left">
        <h4 class="cl-white">Directed By : <?php echo $director; ?></h4>
      </div>
      <div class="col-sm-3">
        <h4 class="cl-white">
          <?php
          for ($i=0; $i < count($item_detail["genres"]) ; $i++) {
            echo get_genre($item_detail["genres"][$i]["id"]).' ';
          }?>
        </h4>
      </div>
    </div>
    <div class="row">
      <h3 class="cl-white text-handle">Overview</h3>
      <div id="itemDescription" class="panel panel-default">
        <div class="panel-body">
          <p><?php echo $item_detail["overview"]; ?></p>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
  include_once('footer.php');
  include_once('modals.php');
?>
