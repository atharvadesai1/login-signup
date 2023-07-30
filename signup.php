<?php 
    $user=0;
    $success=0;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        include 'connect.php';
        $fname = $_POST['fname'];
        $mname = $_POST['mname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $sql = "Select * from `userdata` where email='$email'";
        $result = mysqli_query($cona,$sql);

        if($result){
            $num = mysqli_num_rows($result);
            if($num>0){
                // echo 'User Already Exist';
                $user=1;
            }
            else{
                $sqlt = "insert into `userdata`(fname,mname,lname,email,password,cpassword) values('$fname','$mname','$lname','$email','$password','$cpassword')";
                $resultt = mysqli_query($cona,$sqlt);
    
                if($resultt){
                    // echo "Data Inserted Sucessfully";
                    $success=1;
                }
                else{
                    die(mysqli_error($cona));
                }
    
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
    <title>Sign in Page</title>
    <link rel="stylesheet" href="assets/css/signin.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> -->
</head>
<body>
    <?php 
        if($user){
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops sorry!</strong> The user already exist try login.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>

    <?php 
        if($success){
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulations!</strong> Data insert sucessfully.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    ?>

    <div class="bkg"></div>
        <div class="container w-50 p-3">
            <h1 class="text-white">SIGN IN FORM</h1>
            <div class="login_box">
                <form action="signup.php" method="post">
                    <div class="divide">      
                        <div class="left_side">
                            <div class="textbox"></div>
                            <div class="text_box"><p>First Name</p>
                                <input type="text" placeholder="Enter your first name" name="fname" required>
                            </div>
                            <div class="text_box"><p>Middle Name</p>
                                <input type="text" placeholder="Enter your middle name" name="mname" required>
                            </div>
                            <div class="text_box"><p>Last Name</p>
                                <input type="text" placeholder="Enter your last name" name="lname" required>
                            </div>
                        </div>                   

                        <div class="right_side">
                            <div class="text_box"><p><img src="imagess/user.png" alt="account" width="13px">&nbsp;&nbsp;Email or Phone</p>
                                <input type="email or number" placeholder="Enter your Email id or Phone number" name="email" required>
                            </div>
                            <div class="text_box"><p><img src="imagess/lock.png" alt="account" width="13px">&nbsp;&nbsp;Password</p>
                                <input type="password" id="password" placeholder="Enter your password" name="password" required>
                            </div>
                            <div class="text_box"><p><img src="imagess/lock.png" alt="account" width="13px  ">&nbsp;&nbsp;Confirm Password</p>
                                <input type="password" placeholder="Confirm you password" id ="confirm_password" name="cpassword" required>
                            </div>
                            <div id="message"></div>
                        </div>

                    </div><br>      
                    <div class="submit_box">
                        <input type="submit" value="SIGN IN">  
                    </div>
                </form> 
            </div> 
        </div>

        <script src="assets/js/login.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
</body>
</html>