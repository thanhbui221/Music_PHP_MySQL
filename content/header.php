
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top" data-navbar-on-scroll="data-navbar-on-scroll">
    <div class="container"><a class="navbar-brand d-inline-flex" href="index.php"><img class="d-inline-block" src="/KF7013/assets/images/TipTop_logo.png" alt="logo" /><span class="text-1000 fs-3 fw-bold ms-2 text-gradient">TipTop Music</span></a>
      <div class="collapse navbar-collapse border-top border-lg-0 my-2 mt-lg-0" id="navbarSupportedContent">

        <?php
        session_start();
        if(array_key_exists('userName', $_SESSION )){
          $userName = $_SESSION['userName'];
          echo("<button class='btn btn-white shadow-warning text-warning'><i class='fas fa-user me-2'></i>Hello, $userName</button>");
          echo("<div class='d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0'>");
          echo("</div>");
          if($_SESSION['admin'] == "N"){
            echo("<div class='d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0 '>");
            echo("<a class='btn btn-white shadow-warning text-warning' href='comments.php'>Your comments</a>");
            echo("</div>");
          }else if($_SESSION['admin'] == "Y"){
            echo("<div class='d-flex mt-4 mt-lg-0 ms-lg-auto ms-xl-0 '>");
            echo("<a class='btn btn-white shadow-warning text-warning' href='users.php'>List of users</a>");
            echo("<a class='btn btn-white shadow-warning text-warning' href='signup.php'> <i class='fas fa-user me-2'></i>Add a new user</a>");
            echo("</div>");
          }
          echo("<a class='btn btn-white shadow-warning text-warning' href='logout.php'> <i class='fas fa-user me-2'></i>Log out</a>");
        }else{
          echo("<a class='btn btn-white shadow-warning text-warning' href='login.php'> <i class='fas fa-user me-2'></i>Log in</a>");
        }

        echo("<a class='btn btn-white shadow-warning text-warning' href='category.php'>Music categories</a>");
        echo("<a class='btn btn-white shadow-warning text-warning' href='discussion.html'>Critical Discussion</a>");
        ?>  
        
      </div>
    </div>
</nav>