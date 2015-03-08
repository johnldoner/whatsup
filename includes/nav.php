    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="../" class="navbar-brand">What's Up?</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <li><a href="../contacts">My Contacts</a></li>
            <li><a href="../journal">My Journal</a></li>
            <li><a href="../help/">Feeling Down?</a></li>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Welcome, <?php echo $_SESSION['username']; ?><span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li><a href="../logout.php">Logout</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>