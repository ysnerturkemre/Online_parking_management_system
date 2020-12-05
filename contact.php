
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Contact</title>

<link rel="stylesheet" type="text/css" href="css/hesapla.css">
<link rel="stylesheet" type="text/css" href="css/contact.css">

<!-- Font -->
<link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,900" rel="stylesheet">

 <link rel="stylesheet" type="text/css" href="css/carreg1.css">
</head>
<body>

  <nav>
    <p>Parking Management</p>

    <ul>

      <li><a href="home.php">Home</a></li>
      <li><a href="#">Register Car </a>
          <ul>

            <li><a href="hesapla.php">Calculate Price</a></li>
            <li><a href="carform.php">Register Car Form</a></li>
            


          </ul>

      </li>
      <li><a href="slot.php">Available Slots</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li ><a href="index.php">Logout</a></li>

 </ul>



  </nav>

  <form action="" method="post">

<div class="wrapper">
  <div class="title">
    <h1>Contact Us</h1>
  </div>

 
  <div class="contact-form">
    <div class="input-fields">
      <input type="text" class="input" name="name" placeholder="Name">
      <input type="mail" class="input" name="email"  placeholder="Email Address">
      <input type="text" class="input" name="form" placeholder="Phone">
      <input type="text" class="input" name="subject" placeholder="Subject">
    </div>
    <div class="msg">
      <textarea name="message" placeholder="Message"></textarea>
      
    </div>
  </div>
<td><input type="submit" name="gonder" value="Send Message"> 
    <input type="reset" name="temizle" value="Clean"> </td> 
    </tr>


</div>

</form>



<?php

  $baglanti = mysqli_connect("localhost","root","");
  mysqli_select_db($baglanti,"projectdatabase");  


if(isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["subject"]) && isset($_POST["message"]))
{

  $name=$_POST["name"];
  $email=$_POST["email"];
  $subject=$_POST["subject"];
  $message=$_POST["message"];

  if(isset($_POST["gonder"]))
  {
$sql="INSERT INTO contact(name,email,subject,message) VALUES ('$name','$email','$subject','$message')";

  if(mysqli_query($baglanti,$sql))
  {


    
    echo "SENT SUCCESSFULLY";
    echo "<a href=home.php><button>Ana Sayfaya Git</button></a>";
  }
  else
  {
    echo "Kayit Basarisiz.";
  }


}
}
?>

</body>
</html>

