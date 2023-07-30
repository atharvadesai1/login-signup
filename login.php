<?php 
    $login=0;
    $invalid=0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'connect.php';
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "Select * from `userdata` where email='$email' and password='$password'";
        $result = mysqli_query($cona,$sql);

        if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
                // echo 'Logged in sucessfully';
                $login=1;
                session_start();
                $_SESSION['email']=$email;
                header('location:home.php');
            }
            else{
                $invalid=1;
            }
        }

    }   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="assets/css/login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="bkg"></div> 

        <?php 
            if($login){
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Congratulations!</strong> You sucessfully login.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        <?php 
            if($invalid){
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Sorry!</strong> The account does not exist, try signup.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        <div class="container pd-1 w-25 px-3">
            <h1 class="text-white">LOGIN FORM</h1>
            <div class="login_box">
                <form action="login.php" method="post">
                    <div class="text_box"><p><img src="imagess/user.png" alt="account" width="13px">&nbsp;&nbsp;Email or Phone</p>
                        <input type="email or number" placeholder="Enter your Email id or Phone number" name="email" required>
                    </div>
                    <div class="text_box"><p><img src="imagess/lock.png" alt="account" width="13px">&nbsp;&nbsp;Password</p>
                        <input type="password" placeholder="Enter you password" name="password" required>
                    </div><br>
                    <div class="submit_box">
                        <input type="submit" value="LOGIN">
                    </div>
                    <div class="forgot_password">   
                        <a href="#">Forgot Password ?</a>   
                    </div><br>

                    <div class="orlogin_box">
                        <p>Or Login With</p><br>
                        <div class="social_media">
                            <!-- <div class="facebook">
                                <button href="#" class="fab fa-facebook-f">Facebook</span>
                                </button>
                            </div> -->
                            <div class="google">
                                <button style="color: white;" href="#" class="fab fa-facebook-f"><center><img src="imagess/icons8-google-20.png" alt="google" width="14px">&nbsp;GOOGLE
                                </button></center>
                            </div>
                        </div> 
                    </div> <br><br><br><br>
                    <div class="signup">
                        <p>Don't have an account ?  <a href="signup.php" target="_blank">Sign up now</a></p><br><br>
                    </div>
                </form> 
            </div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>

