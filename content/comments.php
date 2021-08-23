<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>TipTop Music</title>


    <link rel="shortcut icon" type="image/x-icon" href="/KF7013/assets/images/TipTop_icon.ico">
    <meta name="theme-color" content="#ffffff">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="/KF7013/assets/Stylesheets/theme.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>

  <body>
    <main class="main" id="top">
      <?php 
      include("header.php");  
      include("dbconn.php");
   
      ?>

      <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="index.php"><img class="img-fluid" src="/KF7013/assets/images/header.jpg" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
              <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Welcome to TipTop Music</h1>
              <h1 class="text-800 mb-5 fs-4">"TipTop Music - a retro music club and fanzine"</h1>
            </div>
          </div>
        </div>
      </section>

      <br></br>

      <?php
      if (array_key_exists('userID', $_REQUEST )){
        $userID = $_REQUEST['userID'];
        $userName = $_REQUEST['userName'];

      }else{
        $userID = $_SESSION['userID'];
        $userName = $_SESSION['userName'];
      }
      $sql1 = "SELECT * FROM tiptop_cdreview WHERE userID = $userID";
  
      $queryResult1 = mysqli_query($conn, $sql1)
              or die(mysqli_error($conn));
      
      ?>

      <section id="testimonial">
        <div class="container">
          <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
              <?php echo("<h5 class='fw-bold fs-3 fs-lg-5 lh-sm mb-3'>All reviews of $userName </h5>"); ?>
            </div>
          </div>
          <div class="row gx-2">
            <?php
            while($row1=mysqli_fetch_assoc($queryResult1)){
              echo("<div class='col-sm-6 col-md-4 col-lg-3 h-100 mb-5'>");
              echo("<div class='card-body'>");
              $CDID = $row1['CDID'];
              $sql2 = "SELECT CDTitle FROM tiptop_cd WHERE CDID = $CDID";

              $queryResult2 = mysqli_query($conn, $sql2)
                or die(mysqli_error($conn));
              $row2=mysqli_fetch_assoc($queryResult2);
              $CDTitle = $row2['CDTitle'];
              echo("<p><a href='song.php?CDID=$CDID'>$CDTitle</a></p>");
              echo("</div>");
              echo("</div>");

              echo("<div class='col-sm-6 col-md-4 col-lg-3 h-100 mb-5'>");
              echo("<div class='card-body'>");
              $reviewDate = $row1['reviewDate'];
              $reviewText = $row1['reviewText'];
              echo("<p class='text-bold'>$reviewDate<p>");
              echo("<p class='text-bold'>$reviewText<p>");
              echo("</div>");
              echo("</div>");
              
              echo("<div class='col-sm-6 col-md-4 col-lg-3 h-100 mb-5'>");
              echo("<div class='card-body'>");
              echo("<p class='text-light'>");
              if($_SESSION['admin'] == 'N'){
                echo("<a href ='\KF7013\content\comment.php?userID=$userID&CDID=$CDID'>Edit</a>");
              }else{
                echo("<p>You dont have permission to edit this review</p>");
              }
              echo("</p>");
              echo("</div>");
              echo("</div>");

              echo("<div class='col-sm-6 col-md-4 col-lg-3 h-100 mb-5'>");
              echo("<div class='card-body'>");
              echo("<p class='text-light'>");
              if($_SESSION['admin'] == 'N'){
                echo("<a href ='\KF7013\content\delete_cmt.php?userID=$userID&CDID=$CDID'>Delete</a>");
              }else{
                echo("<p>You dont have permission to delete this review</p>");
              }
              echo("</div>");
              echo("</div>");
            }
            ?>
            
            
            
          </div>
        </div>
      </section>

      <?php include "footer.html"; 
      mysqli_close($conn);?>
      
     

    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">
  </body>
  </html>