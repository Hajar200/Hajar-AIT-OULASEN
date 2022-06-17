<?php 
   require_once __DIR__ . '/configuration.php';
  class API {
      function Select(){
          $db = new Connect;
          $users = array();
          $data = $db -> prepare('SELECT * FROM users ORDER BY iduser');
          $data->execute();
          while($OutputData= $data->fetch(PDO :: FETCH_ASSOC)){
              $users[$OutputData['iduser']]= array(
                  'iduser'  => $OutputData['iduser'],
                  'name' => $OutputData['name'],
                  'password' =>$OutputData['password']
              );
          }
          return json_encode($users);
      }
      function SelectTransaction(){
        $db = new Connect;
        $transaction = array();
        $data = $db -> prepare("SELECT * FROM transaction");
        $data->execute();
        while($OutputData= $data->fetch(PDO :: FETCH_ASSOC)){
            $transaction[$OutputData['idtransaction']]= array(
                'idtransaction'  => $OutputData['idtransaction'],
                'Date' => $OutputData['Date'],
                'libelle' =>$OutputData['libelle'],
                'recettes' =>$OutputData['recettes'],
                'depenses' =>$OutputData['depenses'],
                'solde' =>$OutputData['solde']
            );
        }
        return json_encode($transaction);
    }
  }
  //$API = new API;
  header('Content-Type: application/json');
 // echo $API->Select();
?>