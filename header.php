<!DOCTYPE html>
<html>
  <head>
    <title>Pocket Library - Online Library</title>
    <meta charset="utf-8">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/circle.less" rel="stylesheet" type="text/less">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="js/bootstrap.min.js" ></script>
    <script src="js/less.min.js" ></script>
    <script src="js/jquery.validate.min.js" ></script>
    <script type="text/javascript" src="//platform-api.sharethis.com/js/sharethis.js#property=592e95739f0427001184001b&product=inline-share-buttons" async></script>
    <script>
    $(document).ready(function() {
      $("#registerForm").validate({
       rules: {
        registerPassword: {
          required: true,
          minlength: 6
        } ,
        registerPasswordVerify: {
          required: true,
          minlength: 6,
         	equalTo: "#registerPassword"
          }
       },
        messages:{
          registerPassword: {
            required:"the password is required",
            minlength: "Your password must be at least 5 characters long"
          },
          registerPasswordVerify: {
            required: "Please provide a password",
  					minlength: "Your password must be at least 5 characters long",
  					equalTo: "Please enter the same password as above"
          }
        }
      });
    });
    </script>
  </head>
  <body>
