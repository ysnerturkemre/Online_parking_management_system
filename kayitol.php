

<!DOCTYPE html>
<html>

<head>
<title>Login Form </title>

<link rel="stylesheet" type="text/css" href="css/kayitol.css">
<body>


<div id="register" class="loginbox">
    <img  src="images/avatar2.png"class="avatar2">

    <h1>Register</h1>

    <form action="" method="post" >
        <p>Username</p>
        <input type="text"  name="kullanici" placeholder="Enter Username">
        <p>Password</p>
        <input type="password"  name="sifre" placeholder="Enter Password">
        <p class="conf">Confirm Password</p>
        <input type="password"  name="sifre2" placeholder="Confirm Password">
        <p>E-mail</p>
        <input type="email" required name="email" placeholder="Enter E-mail">
        <input type="submit" name="signup" value="Sign Up">
        <a href="" onclick="login()">Have An Account  </a>
        <input class="resetim" onclick="reset()" type="button"  name="" value="Reset Form">
         


    </form>

</div>


<?php

	$baglanti = mysqli_connect("localhost","root","");
	mysqli_select_db($baglanti,"projectdatabase");	


if(isset($_POST["kullanici"]) && isset($_POST["sifre"])&& isset($_POST["sifre2"]) && isset($_POST["email"]) )
{

	$kullanici=$_POST["kullanici"];
	$sifre=$_POST["sifre"];
	$sifre2=$_POST["sifre2"];
	$email=$_POST["email"];
	

if($kullanici<>"" && $sifre<>"" && $sifre2<>"" && $email<>"")
{
if($sifre == $sifre2){
	$sql="INSERT INTO users(username,pass,pasrep,email) VALUES ('$kullanici','$sifre','$sifre2','$email')";
	if(mysqli_query($baglanti,$sql))
	{
		echo "Kayit Basarili.";
		echo "<a href=index.php><button>Giris Sayfasına Git</button></a>";
	}
	else
	{
		echo "Kayit Basarisiz.";
	}
}

else{
	echo "<script>alert('Sifreler ayni degil ');</script>";


  }


}
else
{
    echo'<script type="text/javascript">alert("tüm alanları doldurun")</script>';
		
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



function register(){
loginsc.style.left="-404440px";
registersc.style.left="50px";
adminsc.style.left="-4000000px";

}  

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


