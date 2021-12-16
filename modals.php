<div id="loginModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
      <div class="modal-body">
        <h2 class="lead text-center cl-white">Login</h2>
      <form action="index.php" method="post">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-envelope"></span>
            <input name="login-email"type="email" class="form-control" id="loginEmail" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-lock"></span>
            <input name="login-password" type="password" class="form-control" id="loginPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <button type="submit" name="Login" class="btn btn-primary btn-block">Login</button>
          <button data-target="#forgotModal" data-toggle="modal" data-dismiss="modal" name="PasswordChange" class="btn btn-primary btn-block">Forgot Password</button>
        </div>
      </form>
      </div>
  </div>
  </div>
</div>

<div id="registerModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-body">
      <h2 class="lead text-center cl-white">Register</h2>
      <form id="registerForm" action="index.php" method="post">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user"></span>
            <input name="registerName" type="text" class="form-control" id="registerName" placeholder="Name">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-user"></span>
            <input name="registerSurname" type="text" class="form-control" id="registerSurname" placeholder="Surname">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon  glyphicon glyphicon-user"></span>
            <input name="registerUsername" type="text" class="form-control" id="registerUsername" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-envelope"></span>
            <input name="registerEmail" type="email" class="form-control" id="registerEmail" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-lock"></span>
            <input name="registerPassword" type="password" class="form-control" id="registerPassword" placeholder="Password">
          </div>
        </div>
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-addon glyphicon glyphicon-lock"></span>
            <input name="registerPasswordVerify" type="password" class="form-control" id="registerPasswordVerify" placeholder="Verify Password">
          </div>
        </div>
        <div class="form-group">
              <button type="submit" name="Register" class="btn btn-primary btn-block">Create Account</button>
        </div>
      </form>
    </div>
  </div>
  </div>
</div>

<div id="forgotModal" class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <h2 class="text-center lead cl-white">Forgot Password</h2>
        <form action="index.php" method="post">
          <div class="form-group">
            <div class="input-group">
              <span class="input-group-addon glyphicon glyphicon-envelope"></span>
              <input type="text" class="form-control" id="emailForgotPassword" placeholder="Email">
            </div>
          </div>
          <div class="form-group">
            <button type="submit" name="ForgotPassword" class="btn btn-primary btn-block">Send Email</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
