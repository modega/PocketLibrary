<nav class="navbar navbar-default">
  <div id="nav-container" class="container-fluid">
    <a class="navbar-brand" href="index.php">
      <img id="brand-image" src="img/pocket-logo.png" alt="brand logo">
      <h3 class="navbar-text nav-text">Pocket Library</h3>
    </a>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav navbar-left">
        <li><a href="list.php?user=<?php if(isset($_SESSION["username"])){ echo $_SESSION['username']; } ?>" class="navbar-text nav-text text-center">Movie List</a></li>
        <li><a class="navbar-text nav-text text-center">Book List</a></li>
        <li><a href="faq.php" class="navbar-text nav-text text-center">FAQ</a></li>
        <li><a href="contact.php" class="navbar-text nav-text text-center">Contact Us</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a class="navbar-text nav-text text-center">Logged in as <?php echo $_SESSION['username']; ?></a></li>
        <li><a class="navbar-text nav-text text-center" type="submit" href="index.php?logout">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
