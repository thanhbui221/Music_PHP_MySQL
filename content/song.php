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
        session_start();

        $CDID = $_GET['CDID'];
    
        $sql1 = "SELECT * FROM tiptop_cd WHERE CDID = $CDID";
        $queryResult1 = mysqli_query($conn, $sql1)
                or die(mysqli_error($conn));

        $row = mysqli_fetch_assoc($queryResult1);
        $CDYear = $row['CDYear'];
        $CDTitle = $row['CDTitle'];
        $pubID = $row['pubID'] ;
        $catID = $row['catID'];
        $CDPrice = $row['CDPrice'];

        $sql2 = "SELECT * FROM tiptop_category WHERE catID = $catID";
        $queryResult2 = mysqli_query($conn, $sql2)
                or die(mysqli_error($conn));
        $row2 = mysqli_fetch_assoc($queryResult2);
        $catDesc = $row2['catDesc'];

        $sql3 = "SELECT * FROM tiptop_publisher WHERE pubID = '$pubID'";
        $queryResult3 = mysqli_query($conn, $sql3)
                or die(mysqli_error($conn));
        $row3 = mysqli_fetch_assoc($queryResult3);
        $pubName = $row3['pubName'];
        $location = $row3['location'];

        $sql4 = "SELECT * FROM tiptop_artist, tiptop_artistcd WHERE tiptop_artistcd.CDID = $CDID
        and tiptop_artist.artistID = tiptop_artistcd.artistID";
        $queryResult4 = mysqli_query($conn, $sql4)
                or die(mysqli_error($conn));
        $row4 = mysqli_fetch_assoc($queryResult4);
        $artistName = $row4['artistName'];

        mysqli_free_result($queryResult1);
        mysqli_free_result($queryResult2);
        mysqli_free_result($queryResult3);
        mysqli_free_result($queryResult4);
        

    ?>

      <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="index.php"><img class="img-fluid" src="/KF7013/assets/images/header.jpg" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
              <?php echo("<h3 class='text-light mb-5 fs-4'>CD Title: $CDTitle</h3>");
              echo("<h4 class='text-light'>Artist: $artistName</h4>");
              echo("<h4 class='text-light'>Category: $catDesc</h4>");
              echo("<h4 class='text-light'>Publisher: $pubName ($location)</h4>");
              echo("<h4 class='text-light'>Price: $CDPrice $</h4>");
              $notreview = false;
              $notadmin = false;
              if (array_key_exists('userName', $_SESSION )){
                if ($_SESSION['admin'] == "N"){
                  $notadmin = true;
                  $userID = $_SESSION['userID'];
                  $sql5 = "SELECT * FROM tiptop_cdreview WHERE userID = $userID AND CDID = $CDID";
                  $queryResult5 = mysqli_query($conn, $sql5)
                    or die(mysqli_error($conn));
                 
                  if($queryResult5->num_rows === 0){
                    $notreview = true;
                    echo("<a class='btn btn-secondary shadow-warning text-warning' href='comment.php?userID=$userID&CDID=$CDID'> Add a review</a>");
                  
                  }
                  mysqli_free_result($queryResult5);
                }
              }
              
              
              ?>
            </div>
          </div>
        </div>
      </section>


      <section id="testimonial">
        <div class="container">
          <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
              <?php
              if ($notreview == false & array_key_exists('userID', $_SESSION) & $notadmin == true){
                echo("<h5 class='fw-bold fs-3 fs-lg-5 lh-sm mb-3'>Your reivew</h5>");

              }
              ?>
              
            </div>
          </div>
          <div class="row gx-2">
          <?php
         
          if ($notreview == false & array_key_exists('userID', $_SESSION) & $notadmin == true){
          
            $sql6 = "SELECT * FROM `tiptop_cdreview` WHERE CDID = $CDID and userID = $userID";
            $queryResult6 = mysqli_query($conn, $sql6)
            or die(mysqli_error($conn));

            $row6 = mysqli_fetch_assoc($queryResult6);
            mysqli_free_result($queryResult6);

            $reviewDate = $row6['reviewDate'];
            $reviewText = $row6['reviewText'];


            echo("<div class='col-sm-6 col-md-4 col-lg-3 h-100 mb-5'>");
            echo ("<div class='card-body'>");
            echo("<div class='d-flex align-items-center mb-3'>");
            echo("<div class='flex-1'>");
            echo("<p'>$reviewDate</p>");
            echo("</div>");
            echo("</div>");
            echo("</div>");
            echo("</div>");

            echo("<div class='col-sm-6 col-md-4 col-lg-3 h-100 mb-5'>");
            echo ("<div class='card-body'>");
            echo("<div class='d-flex align-items-center mb-3'>");
            echo("<div class='flex-1'>");
            echo("<p'>$reviewText</p>");
            echo("</div>");
            echo("</div>");
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
    </section>
    

      <br></br>
      <br></br>
      



      <?php include "footer.html"; 
      mysqli_close($conn);?>
      
     

    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">
  </body>
  </html>