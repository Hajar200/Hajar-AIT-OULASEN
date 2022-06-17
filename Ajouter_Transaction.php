<?php
	@$Date=$_POST["Date"];
    @$Libelle=$_POST["Libelle"];
	@$Recettes=$_POST["Recettes"];
	@$Depenses=$_POST["Depenses"];
    @$Solde=$_POST["Solde"];
	@$valider=$_POST["valider"];
	if(isset($valider)){
			    include("configuration.php");
                $db = new Connect;
				$ins=$db->prepare("insert into transaction(Date,libelle,recettes,depenses,solde) values(?,?,?,?,?)");
				$ins->execute(array($Date,$Libelle,$Recettes,$Depenses,$Solde));
                echo 'Ajout de transaction a été effectué avec succes !';
	}
?>
<!DOCTYPE html>
<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
 <body>
 <form style="margin:100px; width:600px; " name="fo" method="post" action="" enctype="multipart/form-data">
  <div class="form-group">
    <label >Date</label>
    <input  name="Date" class="form-control" placeholder="Date" value="<?php echo $Date?>">
  </div>
  <div class="form-group">
    <label>Libelle</label>
    <input name="Libelle" class="form-control" placeholder="Libelle" value="<?php echo $Libelle?>">
  </div>
  <div class="form-group">
    <label>Recettes</label>
    <input name="Recettes" class="form-control" placeholder="Recettes" value="<?php echo $Recettes?>">
  </div>
  <div class="form-group">
    <label>Depenses</label>
    <input name="Depenses" class="form-control" placeholder="Depenses" value="<?php echo $Depenses?>">
  </div>
  <div class="form-group">
    <label>Solde</label>
    <input name="Solde" class="form-control" placeholder="Solde" value="<?php echo $Solde?>">
  </div>
  <input type="submit" name="valider" value="Ajouter" />
</form>
</body>
</html>
