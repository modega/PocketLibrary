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
  if(isset($_POST["Contact"])){
    $name = $_POST["name"];
    $subject = $_POST["subject"];
    $email = $_POST["email"];
    $content = $_POST["content"];
    $contact_email = "e202325@metu.edu.tr";
    $sent_from = "From: $name<$email>\r\nReturn Path: $email";
    if(mail($contact_email, $subject,$content,$sent_from)){
      echo "Message Sent";
    }
  }
?>
  <div class="container-fluid border-top">
    <div class="row">
      <h2 class="col-sm-10 col-sm-offset-1 text-center cl-white border-bottom">Got any suggestions, couldn't find something you were looking for <strong>contact us!.</strong></h2>
    </div>
    <div class="row margin-top">
      <div class="container-fluid col-sm-5 col-sm-offset-1 border-right">
        <form id="contactForm" action="contact.php" method="post">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-user"></span>
              <input type="text" class="form-control" name="name" id="name" placeholder="Please Enter Your Name">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-envelope"></span>
              <input type="text" class="form-control" name="email" id="email" placeholder="Please Enter Your Email">
            </div>
          </div>
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-align-justify"></span>
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Please Enter A Subject">
            </div>
          </div>
          <div class="form-group">
              <textarea type="textarea" class="form-control vresize" rows="8" name="content" id="content" placeholder="What do you contact us for?"></textarea>
          </div>
          <div class="form-group pull-right">
            <button type="reset"class="btn btn-lg btn-primary">Reset</button>
            <button type="submit" name="Contact" class="btn btn-lg btn-primary">Submit</button>
          </div>
        </form>
      </div>
      <div class="container-fluid col-sm-5">
        <p class="text-handle cl-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed id euismod augue, eget viverra tortor. Integer imperdiet cursus tortor nec finibus. Aliquam gravida nibh sed lorem tempus, vitae ultrices ipsum aliquet. Fusce vel posuere neque, vitae placerat lorem. Suspendisse potenti. Donec hendrerit pellentesque luctus. Sed lacinia enim tempus fringilla maximus. Nullam facilisis nisl eget sapien ultrices, convallis pretium diam ultricies. Aenean purus lorem, convallis nec nisl id, volutpat volutpat urna. </p>
      </div>
    </div>
  </div>
<?php
  include_once('footer.php');
  include_once('modals.php');?>
