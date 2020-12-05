<?php
 $host = "localhost";  
 $user = "root";  
 $password = '';  
 $db_name = "projectdatabase";  
$con=mysqli_connect($host, $user,  $password, $db_name);
if(mysqli_connect_errno()){
echo "Connection Fail".mysqli_connect_error();
}

  ?>
