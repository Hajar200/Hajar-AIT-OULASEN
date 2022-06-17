<?php
	session_start();
	@$login=$_POST["login"];
	@$password=$_POST["password"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		include("configuration.php");
        $db = new Connect;
		$res=$db->prepare("select * from users where login=? and password=? limit 1");
		$res->setFetchMode(PDO::FETCH_ASSOC);
		$res->execute(array($login,md5($password)));
		$tab=$res->fetchAll();
		if(count($tab)==0)
			$message="<li>Mauvais login ou mot de passe!</li>";
		else{
			$_SESSION["autoriser"]="oui";
			$_SESSION["nomPrenom"]=strtoupper($tab[0]["name"]);
			header("location:transaction_table.php");
		}
	}
?>
<!DOCYTPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body onLoad="document.fo.login.focus()">
		<header>
			Welcome
			<a href="index.php">Register</a>
		</header>
		<form name="fo" method="post" action="">
			<div class="label">Login</div>
			<input type="text" name="login" value="<?php echo $login?>" />
			<div class="label">Password</div>
			<input type="password" name="password" />
			<input type="submit" name="valider" value="Login" />
		</form>
		<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>
	</body>
</html>