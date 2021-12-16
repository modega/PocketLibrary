<?php
  session_start();
  include('register.php');
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
  <div class="container-fluid border-top">
    <div class="col-sm-10 col-sm-offset-1 cl-white">

    </div>
  </div>
<?php
  include_once('footer.php');
  include_once('modals.php');
?>
