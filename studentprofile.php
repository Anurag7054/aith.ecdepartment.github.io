<?php
session_start();
if(!isset($_SESSION['user'])){
    header('location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="CSS/studentprofile.css">

    <title>Electronics Department AITH Kanpur</title>
</head>

<body>
    <?php
    include('header/header.php');
    ?>
    <!-- Contect Us Start -->

    <section>
        <?php
        include("database/dbconn.php");

        $email = $_SESSION['user'];

        $view_users_query = "select * from studentinfo where email='$email'"; //select query for viewing users.  
        $run = mysqli_query($conn, $view_users_query); //here run the sql query.  

        while ($row = mysqli_fetch_array($run)) //while look to fetch the result and store in a array $row.  
        {
            $user_id = $row[0];
            $user_name = $row[1];
            $user_email = $row[2];
            $user_number = $row[3];
            $user_pass = $row[4];
            $user_image = $row[5];
            $user_profession = $row[6];
            $user_ranking = $row[7];
            $user_experiance = $row[8];
            $user_bio = $row[9];
            $user_rate = $row[10];
            $user_projects = $row[11];
            $user_english= $row[12];
            $user_aviability = $row[13];

        ?>

            <div class="container emp-profile">
                <form method="post" action="#" enctype="multipart/form-data" >
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-img">
                            <img src="<?php echo 'dbimg/student/'.$user_image; ?>" width="100px" height="100px" class="img-responsive" alt="">
                         
                          
                        
                           <div class="file btn btn-lg btn-primary">
                                    Change Photo
                                    <input type="file" name="file" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="profile-head">
                                <h5>
                                    <?php echo $user_name;  ?>
                                </h5>
                                <h6>
                                <?php echo $user_profession;  ?>
                                </h6>
                                <p class="proile-rating">RANKINGS : <span> <?php echo $user_ranking;  ?></span></p>
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item ">
                                        <a class="nav-link active " id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-2"><a href="stuupdateprofile.php">
                                <input type="submit" class="profile-edit-btn" name="studentupdateprofile" value="Edit Profile" />
                        </div>

                        <?php 
                        if (isset($_POST['studentupdateprofile'])) {
                            echo "<script>window.open('stuupdateprofile.php','_self')</script>";
                        }
                        ?>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="profile-work">
                            <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <br />
                                <a href="changepass.php">Change Password</a><br />
                                <hr>
                                <a href="logout.php">LOGOUT</a><br />
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="tab-content profile-tab" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>User Id</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_id; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Name</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_name;  ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Email</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_email; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Phone</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_number; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Profession</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_profession; ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Experience</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_experiance; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Hourly Rate</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_rate; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Total Projects</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_projects; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>English Level</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_english; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Availability</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p><?php echo $user_aviability; ?></p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label>Your Bio</label><br />
                                            <p><?php echo $user_bio; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        <?php } ?>
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