<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
  <link rel="stylesheet" href="CSS/Mycss.css" />
  <title>Electronics Department AITH Kanpur</title>
</head>

<body>
  <?php
  include('header/header.php');
  ?>


  <!-- Contect Us Start -->

  <section class="contect" id="ContectUs">
    <div class="container headings text-center">
      <h1 class="text-center font-weight-bold">Create Your Account 😊 </h1>
      <p class="text-capitlize pt-1">
      <h3>Have already an account<a href="sign.php"> Login here</a></h3>
      </p>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-8 col-10 offset-lg-2 offset-md-2 offset-1">

          <form action="" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <input type="text" class="form-control" placeholder="Enter Your Name" id="username" name="name" autocomplete="off" required>
            </div>
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Enter email" id="email" autocomplete="off" name="email" required>
            </div>

            <div class="form-group">
              <input type="number" class="form-control" placeholder="Enter Your mobile number" id="mobile" autocomplete="off" name="mobile" required>
            </div>
            <div class="form-group">
              <input type="password" class="form-control" placeholder="Enter password" name="password" id="pwd">
            </div>
            <div class="form-group">
              <input type="file" class="form-control" placeholder="Upload Pic" id="pic" autocomplete="off" name="uploadfile" required>
            </div>
            <div class="d-flex justify-content-center form-button">
              <button type="submit" class="btn btn-primary" value="SUBMIT" name="faculty">Faculty</button>
              <button type="submit" class="btn btn-primary" value="SUBMIT" name="student">Student</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Contect Us End  -->
  <!-- Our Pricing End-->

  <?php
  include('footer/footer.php');
  ?>
  <!-- JavaScript Files Start -->

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Jquery Script start-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js" integrity="sha512-CEiA+78TpP9KAIPzqBvxUv8hy41jyI3f2uHi7DGp/Y/Ka973qgSdybNegWFciqh6GrN2UePx2KkflnQUbUhNIA==" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.js" integrity="sha512-+/4Q+xH9jXbMNJzNt2eMrYv/Zs2rzr4Bu2thfvzlshZBvH1g+VGP55W8b6xfku0c0KknE7qlbBPhDPrHFbgK4g==" crossorigin="anonymous"></script>
  <!-- Jquery Script end-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- JavaScript Files End -->

</body>

</html>

<!-- Php Code for database  -->
<?php

include('database/dbconn.php');
// Student data insert into database Start

if (isset($_POST['student'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];


  $checkemail = "select * from studentinfo where email='$email'";
  $run = mysqli_query($conn, $checkemail);

  if (mysqli_num_rows($run) > 0) {
    echo "<script>alert('Email $email is already exist in our database, Please try another one!')</script>";
    exit();
  }

  if ($name == '') {
    echo "<script>alert('Please enter the name')</script>";
    exit();
  }

  if ($password == '') {
    echo "<script>alert('Please enter the password')</script>";
    exit();
  }

  if ($email == '') {
    echo "<script>alert('Please enter the email')</script>";
    exit();
  }
  if ($mobile == '') {
    echo "<script>alert('Please enter the email')</script>";
    exit();
  }
  $fileext = explode('.',$filename);
  $filecheck = strtolower(end($fileext));
  $fileextstored = array('png','jpg','jpeg');
  if(in_array($filecheck,$fileextstored)){
    $folder = "dbimg/student/".$filename;
    $str_pass = password_hash($password,PASSWORD_BCRYPT);
  $insertreg = "insert into studentinfo(name, email, mobile, password,image) values('$name', '$email','$mobile', '$str_pass','$filename')";
  $insertlogin = "insert into studentlogin(email,password) values('$email','$str_pass')";
  $query1 = mysqli_query($conn, $insertreg);

    move_uploaded_file($tempname, $folder);
  }
  
  $query2 = mysqli_query($conn, $insertlogin);
  if ($query1) {
    $_SESSION['user'] = $email;
    
?>
    <script>

      window.open('studentprofile.php', '_self');
    </script>
  <?php
  } else {
  ?>
    <script>
      alert(' Failed Data Not Inserted');
    </script>
  <?php
  }
}


// Student data insert into database End


// Faculty data insert into database Start  


if (isset($_POST['faculty'])) {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $mobile = $_POST['mobile'];
  $password = $_POST['password'];
  $filename = $_FILES["uploadfile"]["name"];
  $tempname = $_FILES["uploadfile"]["tmp_name"];

  $checkemail = "select * from facultyinfo WHERE email='$email'";
  $run = mysqli_query($conn, $checkemail);

  if (mysqli_num_rows($run) > 0) {
    echo "<script>alert('Email $email is already exist in our database, Please try another one!')</script>";
    exit();
  }

  if ($name == '') {
    echo "<script>alert('Please enter the name')</script>";
    exit();
  }

  if ($password == '') {
    echo "<script>alert('Please enter the password')</script>";
    exit();
  }

  if ($email == '') {
    echo "<script>alert('Please enter the email')</script>";
    exit();
  }
  if ($mobile == '') {
    echo "<script>alert('Please enter the email')</script>";
    exit();
  }

  $fileext = explode('.',$filename);
  $filecheck = strtolower(end($fileext));
  $fileextstored = array('png','jpg','jpeg');
  if(in_array($filecheck,$fileextstored)){
    $folder = "dbimg/faculty/".$filename;
    $str_pass = password_hash($password,PASSWORD_BCRYPT);
  $insertreg = "insert into facultyinfo(name, email, mobile, password,image) values('$name', '$email','$mobile', '$str_pass','$filename')";
  $insertlogin = "insert into facultylogin(email,password) values('$email','$str_pass')";
  $query1 = mysqli_query($conn, $insertreg);
  
    move_uploaded_file($tempname, $folder);
  }
  $query2 = mysqli_query($conn, $insertlogin);

  if ($query1) {
    $_SESSION['user'] = $email;
  ?>
    <script>
    
      window.open('facultyprofile.php', '_self');
    </script>
  <?php
  } else {
  ?>
    <script>
      alert(' Failed Data Not Inserted');
    </script>
<?php
  }
}


?>