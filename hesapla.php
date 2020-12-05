<!DOCTYPE html>
<html>
<head>

	<link rel="stylesheet" type="text/css" href="css/hesapla2.css">
  <link rel="stylesheet" type="text/css" href="css/carreg1.css">
	<title></title>
</head>
<body>
<nav>
    <p>Parking Management</p>

    <ul>

      <li><a href="home.php">Home</a></li>
      <li><a href="#">Register Car </a>
          <ul>

            <li><a  href="hesapla.php">Calculate Price</a></li>
            <li><a href="car.php">Register Car Form</a></li>
            


          </ul>

      </li>
      <li><a href="slot.php">Available Slots</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li ><a href="index.php">Logout</a></li>
      

 </ul>




  </nav>
<div>
<h1>Vehicle Hour : $10</h1><br><hr>
<h1>Comercial Hour : $15</h1><br><hr>
<h1>Truck Hour : $30</h1><br><hr>
</div>
	<table>
		
<form action="" method="post" style="margin-top:15px;">

	<tr>
		<td>Kullanıcı Adı :</td>
		<td><input type="text" name="name"/></td>

	</tr>
	<tr>
		<td>Plaka :</td>
		<td><input type="text" name="plaka"/></td>

	</tr>

	<tr>
		<td>Anlık tarih</td>
		<td><input type="date" name="anliktarih"/></td>

	</tr>

	<tr>
		<td>Giris tarih:</td>
		<td><input type="time" name="giristarih"/></td>

	</tr>
	<tr>
		<td>cikis tarih:</td>
		<td><input type="time" name="cikistarih"/></td>

	</tr>

	<tr>
		<td>Slot seç:</td>
		<td>
			<select name="slot">
				<option  value="1">1</option>
				<option  value="2">2</option>
				<option  value="3">3</option>
				<option  value="4">4</option>
				<option  value="5">5</option>
				<option  value="6">6</option>
				<option  value="7">7</option>
				<option  value="8">8</option>
				<option  value="9">9</option>
				<option  value="10">10</option>
			</select>
		</td>

	</tr>

	<tr>
		<td>Slot seç:</td>
		<td>
			 <select name="tur" > 
		<option value="Vehicle">Vehicle</option>
		<option value="Commercial">Commercial</option>
		<option value="Truck">Truck</option>

		</select>

		</td>

	</tr>

   

    
	<td><input type="submit" name="gonder" value="Sorgula"> 
		<input type="reset" name="temizle" value="Temizle">	</td>	
		</tr>




</form>

	</table>

<?php

  $baglanti = mysqli_connect("localhost","root","");
  mysqli_select_db($baglanti,"projectdatabase");  



if(isset($_POST["name"]) && isset($_POST["plaka"])&& isset($_POST["anliktarih"]) && isset($_POST["giristarih"]) && isset($_POST["cikistarih"])  &&  isset($_POST["tur"]))
{

  $name=$_POST["name"];
  $plaka=$_POST["plaka"];
  $anliktarih=$_POST["anliktarih"];
  $giristarih=$_POST["giristarih"];
  $cikistarih=$_POST["cikistarih"];
  $slot=$_POST["slot"];
  $tur=$_POST["tur"];
 
if($name<>"" && $plaka<>"" && $anliktarih<>"" && $giristarih<>"" && $cikistarih<>"")
{
  



  $sql =  "SELECT * FROM rezerve2 WHERE anliktarih='$anliktarih'  and cikistarih>='$giristarih' and slot=$slot";
  	$result = mysqli_query($baglanti,$sql);
    $row_cnt = $result->num_rows;
    
    if($row_cnt<1){
$sql="INSERT INTO rezerve2(name,plaka,anliktarih,giristarih,cikistarih,slot,tur) VALUES ('$name','$plaka','$anliktarih','$giristarih','$cikistarih',$slot,'$tur');";
  
  if(mysqli_query($baglanti,$sql))
  {
    echo "Kayit Basarili.";
  
    
  }
  else
  {
    echo "Kayit Basarisiz.";
  }
    } else  {
    echo "Seçilen  saatlerde slot dolu";	
    }
    
}
else
{
		echo "Tüm alanları doldurun.";
		
}
   





}

if($_POST){
$tarihbir = $_POST["anliktarih"] . " ". $_POST["cikistarih"];
$tarihiki = $_POST["anliktarih"] . " ". $_POST["giristarih"];
$dakikafark = abs(strtotime($tarihbir) - strtotime($tarihiki));


	

if ($tur == "Vehicle") {
  echo "<br>Odenecek Tutar : ".((($dakikafark/60)*10)/60)."$";
} elseif ($tur == "Commercial") {
  echo "<br>Odenecek Tutar : ".((($dakikafark/60)*15)/60)."$";
}elseif ($tur == "Truck") {
   echo "<br>Odenecek Tutar : ".((($dakikafark/60)*30)/60) ."$";
}else{
  echo "Seçim yapmadın.";
}
} 



?>
</body>
