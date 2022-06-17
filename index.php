<?php
	@$name=$_POST["name"];
    @$password=$_POST["password"];
	@$login=$_POST["login"];
	@$repass=$_POST["repass"];
	@$valider=$_POST["valider"];
	$message="";
	if(isset($valider)){
		if(empty($name)) $message="<li>Non invalide!</li>";
		if(empty($login)) $message.="<li>Login invalide!</li>";
		if(empty($password)) $message.="<li>Mot de passe invalide!</li>";
		if($password!=$repass) $message.="<li>Mots de passe non identiques!</li>";	
		if(empty($message)){
			include("configuration.php");
            $db = new Connect;
			$req=$db->prepare("select iduser from users where login=? limit 1");
			$req->setFetchMode(PDO::FETCH_ASSOC);
			$req->execute(array($login));
			$tab=$req->fetchAll();
			if(count($tab)>0)
				$message="<li>Login existe déjà!</li>";
			else{
				$ins=$db->prepare("insert into users(name,password,date,login) values(?,?,now(),?)");
				$ins->execute(array($name,md5($password),$login));
				header("location:transaction_table.php");
			}
		}
	}
?>
<!DOCYTPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
	</head>
	<body>
		<header>
            Welcome
			<a href="login.php">Login</a>
		</header>
		<form name="fo" method="post" action="" enctype="multipart/form-data">
			<div class="label">Name</div>
			<input type="text" name="name" value="<?php echo $name?>" />
			<div class="label">Login</div>
			<input type="text" name="login" value="<?php echo $login?>" />
			<div class="label">Password</div>
			<input type="password" name="password" />
			<div class="label">Confirm PASSWORD</div>
			<input type="password" name="repass" />
			<input type="submit" name="valider" value="Register" />
		</form>
		<?php if(!empty($message)){ ?>
		<div id="message"><?php echo $message ?></div>
		<?php } ?>
	</body>
</html>