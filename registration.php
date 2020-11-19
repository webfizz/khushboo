<?php
  include "includes/withyouDB.php";
  $showAlert = false;
  $showError = false;

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];
    
    //$exists=false;

    //check whether the email of two users are same
    $existsSql = "SELECT * FROM `user` WHERE email = '$email' ";
    $result = mysqli_query($con, $existsSql);
    $numExistsRows = mysqli_num_rows($result);
    if($numExistsRows > 0){
      //$exists = true;
      $showError = "Email Already Exists";
    }
    else{
      //exists = false;
      if(($password == $cpassword)){
        $hash = password_hash($password,PASSWORD_DEFAULT);
        $sql = "INSERT INTO `user` (`name`, `email`, `password`) VALUES ('$name', '$email', '$hash')";
        $result = mysqli_query($con, $sql);
        if ($result){
          $showAlert = true;
        }
      }
      else{
        $showError = "Passwords do not match";
      }
    } 
  }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Custom css-->
    <link rel="stylesheet" href="css/form-style.css?v=<?php echo time(); ?>" type="text/css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
   <!-- Navigation starts-->
   <nav class="navbar navbar-inverse">
       <div class="container">
            <div class="navbar-header">
              <!--Responsive Menu-->
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navi">
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
              </button>
                <a href="" class="navbar-brand"><img src="img/WithYou.png"></a> 
            </div>
            <div class="collapse navbar-collapse" id="navi">
              <ul class="nav navbar-nav navbar-right">
              <?php 
                            $query = "SELECT * FROM categories";
                            $select_all_categories_query = mysqli_query($con, $query);

                            while($row = mysqli_fetch_assoc ($select_all_categories_query)){
                                $cat_title = $row['cat_title'];
                                echo "<li><a href='#'>{$cat_title}</a></li>";
                            }
                    ?>
              </ul>
            </div>
        <div>    
   </nav>
   <!--Navigation ends-->

   <?php
      if($showAlert){
        echo '<div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Account has been created Successfully.
              </div>';
      }
      if($showError){
        echo '<div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Error!</strong>' . $showError.'
              </div>';
      }
    ?>

   <div class="container form-container" style="padding: 0% 30%;">
    <h3>Join our community</h3>
      <form action="registration.php" method="post">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" name="name" id="name" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" required>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" id="pasword" required>
        </div>
        <div class="form-group">
          <label for="cpassword">Confirm Password</label>
          <input type="password" class="form-control" name="cpassword" id="cpassword" required>
          <small id="cpass" class="form-text text-muted">Password should match.</small>
        </div>
        <button type="submit" class="btn btn-primary" name="register">Submit</button>

        <p>Already a member?<a href="login.php"><b>Login</b></a></p>
      </form>
  </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>