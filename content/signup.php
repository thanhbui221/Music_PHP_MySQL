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
    <link href="/KF7013/assets/stylesheets/theme.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  </head>

  <body>
    <main class="main" id="top">
    <?php 
    include("header.php");
    ?>

    <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner" href="index.php"><img class="img-fluid" src="/KF7013/assets/images/header.jpg" alt="hero-header" /></a></div>
            <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                <form action="/KF7013/content/user_signup.php">
                    <div class="form-group">
                        <label for="uame">Username:</label>
                        <input type="text" class="form-control" id="uname" placeholder="Enter username" name="uname" required>
                    </div>
                    <div class="form-group">
                        <label for="fname">First name:</label>
                        <input type="text" class="form-control" id="fname" placeholder="Enter first name" name="fname" required>
                    </div>
                    <div class="form-group">
                        <label for="lname">Last name:</label>
                        <input type="text" class="form-control" id="lname" placeholder="Enter last name" name="lname" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
                    </div>
                    <div class="form-group">
                        <label for="source">Source:</label>
                        <select type="text" class="form-control" id="source" name="source">
                            <option value="TipTop" selected>TipTop</option>
                            <option value="Yahoo!">Yahoo!</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Microsoft">Microsoft</option>
                            <option value="Google">Google</option>
                        </select>       
                    </div>
                    <div class="form-group">
                        <label for="admin">Admin Role?:</label>
                        <label class="checkbox-inline form-control"><input type="checkbox" value="Y" id="admin" name="admin">Yes</label>
                        <label class="checkbox-inline form-control"><input type="checkbox" value="N" id="admin" name="admin">No</label>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>  
                    </div>
                    <button type="submit" class="btn btn-secondary">Sign up</button>
                </form>
            </div>
          </div>
        </div>
      </section>
      <br></br>

      <?php include "footer.html"; ?>
    </main>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200;300;400;600;700;900&amp;display=swap" rel="stylesheet">
  </body>
  </html>