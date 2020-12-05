<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/carreg1.css">
	<link rel="stylesheet" type="text/css" href="css/slot.css">
	<title></title>
</head>
<body >
<nav>
    <p>Parking Management</p>

    <ul>

      <li><a href="home.php">Home</a></li>
      <li><a href="#">Register Car </a>
          <ul>

            <li><a  href="hesapla.php">Calculate Price</a></li>
            <li><a href="carform.php">Register Car Form</a></li>
            


          </ul>

      </li>
      <li><a href="slot.php">Available Slots</a></li>
      <li><a href="contact.php">Contact</a></li>
      <li ><a href="index.php">Logout</a></li>

 </ul>




  </nav>

<div class="a">
	<table class="c">
		
<form  action="" method="post" style="margin-top:15px;">

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

	<td><input class="button" type="submit" name="gonder" value="Sorgula"> <br>
		<input class="button" type="reset" name="temizle" value="Temizle">	</td>	
		</tr>

</form>

	</table>

	</div>


<script>
// Get the elements with class="column"
var elements = document.getElementsByClassName("column");

// Declare a loop variable
var i;

// List View
function listView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "100%";
  }
}

// Grid View
function gridView() {
  for (i = 0; i < elements.length; i++) {
    elements[i].style.width = "50%";
  }
}

/* Optional: Add active class to the current button (highlight it) */
var container = document.getElementById("btnContainer");
var btns = container.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
  btns[i].addEventListener("click", function() {
    var current = document.getElementsByClassName("active");
    current[0].className = current[0].className.replace(" active", "");
    this.className += " active";
  });
}
</script>
<?php

  $baglanti = mysqli_connect("localhost","root","");
  mysqli_select_db($baglanti,"projectdatabase");  



if(isset($_POST["name"]) && isset($_POST["plaka"])&& isset($_POST["anliktarih"]) && isset($_POST["giristarih"]) && isset($_POST["cikistarih"]))
{

  $name=$_POST["name"];
  $plaka=$_POST["plaka"];
  $anliktarih=$_POST["anliktarih"];
  $giristarih=$_POST["giristarih"];
  $cikistarih=$_POST["cikistarih"];
  $slot=$_POST["slot"];

if($name<>"" && $plaka<>"" && $anliktarih<>"" && $giristarih<>"" && $cikistarih<>"")
{
  /*
  $sql="INSERT INTO rezerve2(name,plaka,anliktarih,giristarih,cikistarih) VALUES ('$name','$plaka','$anliktarih','$giristarih','$cikistarih');";
  
  if(mysqli_query($baglanti,$sql))
  {
    echo "Kayit Basarili.";
  
    
  }
  else
  {
    echo "Kayit Basarisiz.";
  }

    $sql =  "SELECT * FROM rezerve2 WHERE anliktarih='$anliktarih' and giristarih<='$giristarih' and cikistarih>='$cikistarih' and slot=$slot";
*/
  $sql =  "SELECT * FROM rezerve2 WHERE anliktarih='$anliktarih'  and cikistarih>='$giristarih' and slot=$slot";
  	$result = mysqli_query($baglanti,$sql);
    $row_cnt = $result->num_rows;
    echo $sql;
    if($row_cnt<1){
$sql="INSERT INTO rezerve2(name,plaka,anliktarih,giristarih,cikistarih,slot) VALUES ('$name','$plaka','$anliktarih','$giristarih','$cikistarih',$slot);";
  
  if(mysqli_query($baglanti,$sql))
  {
    
    "<script>alert('Kayit Basarili.');</script>";
    
  }
  else
  {
    "<script>alert('Kayit Basarisız.');</script>";
  }
    } else  {
    echo "Seçilen  saatlerde slot dolu".$row_cnt;	
    }
    
}
else
{
		echo "Tüm alanları doldurun.";
}
   
}
?>
</body>
</html>