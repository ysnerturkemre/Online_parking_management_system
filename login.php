<?php

	include ("Db.php");

	if($_POST["login-button"])
	{
		$name =$_POST["usname"];
		$pass =$_POST["pas"];


		$query  = $con->query("SELECT * FROM users WHERE username='$name' && pass='$pass'",PDO::FETCH_ASSOC);
		if ( $say = $query -> rowCount() ){

			if( $say > 0 ){
				session_start();
				$_SESSION['oturum']=true;
				$_SESSION['name']=$name;
				$_SESSION['pass']=$pass;

				print 'Hoş geldiniz '.$name;
				echo '
					<a href="logout.php">çıkış yap</a>
				';

			}else{
				echo "oturum açılmadı hata";
			}
		}else{
			echo "<h1>Kullanıcı adı veya şifre hatalı</h1>";
			echo '
				<form action="giris_yap.php" method="post">
					<input type="text" name="name"/>
					<input type="password" name="pass"/>
					<input type="submit" />
				</form>
			';
		}
	}else{
		
        header("location:home.php");
        echo'<script type="text/javascript">alert("Login Success")</script>';
		
	}

?>