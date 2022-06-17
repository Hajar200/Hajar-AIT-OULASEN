<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body style="margin: 50px; margin-top:100px">
    <button type="button" class="btn btn-warning" style="margin-left: 85%; width:100px"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
</svg><a href="Ajouter_Transaction.php"> Ajouter</a></button>
        <h1>List of transactions</h1>
        <br>
        <table class="table">
            <thead>
            <tr>
                <th>idTransaction</th>
                <th>Date</th>
                <th>Libelle</th>
                <th>Recettes</th>
                <th>Depenses</th>
                <th>Solde</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
             <?php
            include("configuration.php");
            $db = new Connect;
            $transaction = array();
            $req = $db -> prepare("SELECT * FROM transaction");
            $req->execute();
            while($OutputData= $req->fetch(PDO :: FETCH_ASSOC)){
            $transaction[$OutputData['idtransaction']]=array(
                'idtransaction'  => $OutputData['idtransaction'],
                'Date' => $OutputData['Date'],
                'libelle' =>$OutputData['libelle'],
                'recettes' =>$OutputData['recettes'],
                'depenses' =>$OutputData['depenses'],
                'solde' =>$OutputData['solde']
            );
        }
          foreach($transaction as $key => $value){ 
    ?> 
    <tr>
         <td><?= $value["idtransaction"]; ?></td>
         <td><?= $value["Date"]; ?></td>
         <td><?= $value["libelle"]; ?></td>
         <td><?= $value["recettes"]; ?></td>
         <td><?= $value["depenses"]; ?></td>
         <td><?= $value["solde"]; ?></td>
         <td>
         <a href="#" class="link-warning">Update</a>
         <a href="#" class="link-warning">Delete</a>
         </td>
    </tr>
       <?php
        }
        ?>
            </tbody>
        </table>
    </body>
</html>