<?php
  include('register.php');
  ob_start();
  session_start();
  $login_failed = false;
  $server_name = "localhost";
  $username = "root";
  $password = "";
  $db_name = "users";
  $table_name = "members";
  if(isset($_POST["Login"])){
    $conn = mysqli_connect($server_name,$username,$password,$db_name);
    $login_username = sqlInjection($conn,$_POST["login-email"]);
    $login_password = sqlInjection($conn,$_POST["login-password"]);
    $sql = "SELECT Username FROM $table_name WHERE Email='$login_username' AND Password='$login_password'";
    $result = mysqli_query($conn,$sql);
    $count = mysqli_num_rows($result);
    if($count == 1){
      $data = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $data["Username"];
      $_SESSION['password'] = $login_password;
      header("location:index.php");
    }else{
    }
    ob_end_flush();
  }
  if(isset($_POST["Register"])){
    $conn = mysqli_connect($server_name,$username,$password,$db_name);
    $register_name = sqlInjection($conn, $_POST["registerName"]);
    $register_surname = sqlInjection($conn, $_POST["registerSurname"]);
    $register_username = sqlInjection($conn, $_POST["registerUsername"]);
    $register_password = sqlInjection($conn, $_POST["registerPassword"]);
    $register_email = sqlInjection($conn, $_POST["registerEmail"]);
    $sql = "INSERT INTO $table_name(Username, Password, Email, Name, Surname) VALUES('$register_username','$register_password','$register_email','$register_name','$register_surname')";
    $result = mysqli_query($conn, $sql);
    if($result){
      $_SESSION['username'] = $register_username;
      $_SESSION['password'] = $register_password;
      header("location:index.php");
    }else{

    }
    ob_end_flush();
  }
  include_once('header.php');
  if(isset($_SESSION['username'])){
    include('nav-registered.php');
  }else{
    include('nav-not-registered.php');
  }
  if(isset($_GET["logout"])){
    session_destroy();
    header("location:index.php");
  }
?>
  <div id="top-content" class="container-fluid">
    <div id="spacer"></div>
    <div class="row">
      <div class="col-sm-6 col-sm-offset-6 text-right cl-white overlay-background"><span id="overlay-txt"><b>POCKET LIBRARY</b></span></div>
    </div>
    <div class="row">
      <div id="bottom-overlay" class="col-sm-7 col-sm-offset-5 text-right cl-white overlay-background"><h1><b>An Online Library to Suit Your Needs.</b></h1></div>
    </div>
  </div>
  <!-- General Search -->
  <div id="searchContainer" class="container-fluid">
      <form class="form-horizontal" action="search.php" method="post">
        <div class="col-sm-10 col-sm-offset-1 input-group">
          <span id="searchIcon" class="input-group-addon glyphicon glyphicon-search"></span>
          <input name="search_query" type="text" class="form-control input-lg" id="searchInput" placeholder="Search for books, music, movies etc.">
          <span class="input-group-btn">
            <button class="btn btn-primary input-lg " type="submit">Search</button>
          </span>
        </div>
      </form>
  </div>
  <!-- Website Site Info -->
  <div class="container-fluid">
    <div class="col-sm-4 text-center border-right cl-white">
      <h2><strong>Join The Community</strong></h2>
      <br>
      <p class="lead">Join the growing community of Pocket Library and start organizing your library today.</p>
      <span class="glyphicon glyphicon-globe icon"></span>
    </div>
    <div class="col-sm-4 text-center border-right cl-white">
      <h2><strong>Create, Edit and Share</strong></h2>
      <br>
      <p class="lead">Easily create a list of your desired library, edit it anytime, share with friends.</p>
      <span class="glyphicon glyphicon-th-list icon"></span>
    </div>
    <div class="col-sm-4 text-center cl-white">
      <h2><strong>Suited For Your Needs</strong></h2>
      <br>
      <p class="lead">Never forget what is in your library, carry your library anywhere with you.</p>
      <span class="glyphicon glyphicon-user icon"></span>
    </div>
  </div>
<?php
  include_once('footer.php');
  include_once('modals.php');?>
