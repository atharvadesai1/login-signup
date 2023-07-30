<?php 
    $HOSTNAME = 'localhost';
    $USERNAME = 'root';
    $PASSWORD = '';
    $DATABaSE = 'login_signup';

    $cona = mysqli_connect($HOSTNAME,$USERNAME,$PASSWORD,$DATABaSE);

    // if(!$cona){
    //     die(mysqli_error($cona));
    // }
 ?>