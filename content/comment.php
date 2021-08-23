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
         

        $CDID = $_REQUEST['CDID'];
        $userID = $_REQUEST['userID'];
    
        $sql1 = "SELECT * FROM tiptop_cdreview WHERE CDID = $CDID and userID = $userID";
        $queryResult1 = mysqli_query($conn, $sql1)
                or die(mysqli_error($conn));

        $row1 = mysqli_fetch_assoc($queryResult1);

        $sql2 = "SELECT * FROM tiptop_cd WHERE CDID = $CDID";
        $queryResult2 = mysqli_query($conn, $sql2)
                or die(mysqli_error($conn));

        $row2 = mysqli_fetch_assoc($queryResult2);
        $reviewDate = $row1['reviewDate'];
        $reviewText = $row1['reviewText'];
        $CDTitle = $row2['CDTitle'];

        
       
        

        mysqli_free_result($queryResult1);
        mysqli_free_result($queryResult2);
        

    ?>

      <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="index.php"><img class="img-fluid" src="/KF7013/assets/images/header.jpg" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
              <?php echo("<h3 class='text-light mb-5 fs-4'>CD Title: $CDTitle</h3>");              
              echo("<form action='/KF7013/content/do_comment.php' method='post'>");
                    echo("<div class='form-group'>");
                    echo("<input type='hidden' class='form-control' id='reviewDate' name='reviewDate' value='$reviewDate' readonly>");
                    echo("</div>");

                    echo("<div class='form-group'>");
                    echo("<label for='reviewText'>ReviewText:</label>");

                    echo("<input type='text' class='form-control' id='reviewText' name='reviewText' value='$reviewText' required>");  

                    echo("</div>");

                    echo("<div class='form-group'>");
                    echo("<input type='hidden' class='form-control' id='CDID' name='CDID' value= '$CDID' readonly>");
                    echo("</div>");
   
                                       

                    echo("<button type='submit' class='btn btn-secondary'>Submit</button>");
                echo("</form>");
                ?>
            </div>
          </div>
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