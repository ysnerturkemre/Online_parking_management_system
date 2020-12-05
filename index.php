
<!DOCTYPE html>
<html>

<head>
<title>Login Form </title>
<link rel="stylesheet" type="text/css" href="css/log.css">

<body>
<div id="login" class="loginbox">
    <img src="images/avatar1.png"class="avatar">

    <h1>Login Here</h1>

    <form action="" id="myForm" method="post">
        <p>Username</p>
        <input type="text"  name="kullanici" placeholder="Enter Username">
        <p>Password</p>
        <input type="password" name="sifre" placeholder="Enter Password">
        <input type="submit"   name="login-button" value="Login">
        <a href="#" onclick="forgot()">Forgot Password ?</a><br>
         <a href="kayitol.php">Sign Up</a>
        <a href="admin/index.php" id="adminim" onclick="admin()">I am admin </a> 
        <input class="resetim" onclick="reset()" type="button"  name="" value="Reset Form">

 

    </form>

</div>

<div id="register" class="loginbox">
    <img  src="images/avatar2.png"class="avatar2">

    <h1>Register</h1>

    <form action="" method="post" >
        <p>Username</p>
        <input type="text"  name="username" placeholder="Enter Username">
        <p>Password</p>
        <input type="password"  name="pass" placeholder="Enter Password">
        <p class="conf">Confirm Password</p>
        <input type="password"  name="passrep" placeholder="Confirm Password">
        <p>E-mail</p>
        <input type="email" required name="email" placeholder="Enter E-mail">
        <input type="submit" name="signup" value="Sign Up">
        <a href="" onclick="login()">Have An Account  </a>
        <input class="resetim" onclick="reset()" type="button"  name="" value="Reset Form">
         


    </form>

</div>
<!--
<div id="adminlog" class="loginbox">
    <img src="images/adminavatar.png"class="avatar3">

    <h1>Admin</h1>

    <form action="home.php" method="POST" >
        <p>Username</p>
        <input type="text" required name="" placeholder="Admin Username">
        <p>Password</p>
        <input type="password" required name="" placeholder="Admin Password">
        <input type="submit" name="" value="Login as Admin">
        <a href="#"  onclick="notadmin()">I am not Admin</a><br>
         <input class="resetim" onclick="reset()" type="button"  name="" value="Reset Form">
        
    </form>
</div> -->

<div id="forgotscreen" class="loginbox">
    <img src="forgot.png"class="avatar3">

    <h1>Forgot My Password</h1>

    <form  >
        <p>Enter Your E-mail</p>
        <input type="email" required name="" placeholder="E-mail">
        <input type="submit" name="" value="Reset Password">
        <a href="#" onclick="login()">Have An Account  </a> 

        
    </form>

</div>

<?php

 

$baglanti = mysqli_connect("localhost","root","");
mysqli_select_db($baglanti,"projectdatabase");

if(isset($_POST["kullanici"]) && isset($_POST["sifre"]))
{

    $kullanici=$_POST["kullanici"];
    $sifre=$_POST["sifre"];

    $sql="SELECT username,pass from users where username='$kullanici' and pass='$sifre'";

    $sorgu=mysqli_query($baglanti,$sql);

    $dizi=mysqli_fetch_array($sorgu)or die( mysqli_error($baglanti));;

    if ($dizi!=0) {
        header("location:home.php");
      

    }else{
            echo "basarisiz";
    }


}


?>

<script>



    var loginsc =document.getElementById("login");
    var registersc =document.getElementById("register");
    var adminsc = document.getElementById("adminlog");
    var n = document.getElementById("resetim");
    var forgotsc = document.getElementById("forgotscreen");


function reset(){
   
n.reset();
}

function forgot(){
forgotsc.style.left="50px"
loginsc.style.left="-400000px";
registersc.style.left="-404440px";
adminsc.style.left="-4000000px";
  
}

<!-- 

function register(){
loginsc.style.left="-404440px";
registersc.style.left="50px";
adminsc.style.left="-4000000px";

} 
-->

function login(){
loginsc.style.left="50px";
registersc.style.left="-404440px";
adminsc.style.left="-4000000px";
forgotsc.style.left="-4000000px"


}

function admin(){
   

adminsc.style.left="50px";
loginsc.style.left="-4000040px";
registersc.style.left="-404440px";
}

function notadmin(){
adminsc.style.left="-4000000px";
loginsc.style.left="50px";
registersc.style.left="-404440px";
forgotsc.style.left="-4000000px"

}


      
    </script>
  
</body>
</head>



</html>


