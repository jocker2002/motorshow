<?php

//fetch_data.php

include("../../includes/dbconnection_pdo.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':kods'   => "%" . $_GET['kods'] . "%",
  ':klients_kods'   => "%" . $_GET['klients_kods'] . "%",
  ':datums'   => "%" . $_GET['datums'] . "%",
  ':laiks'     => "%" . $_GET['laiks'] . "%",
  ':piegades_veids_kods'   => "%" . $_GET['piegades_veids_kods'] . "%",
  ':maksajuma_veids_kods'   => "%" . $_GET['maksajuma_veids_kods'] . "%",
  ':cena'   => "%" . $_GET['cena'] . "%",
  ':darbinieks_kods'   => "%" . $_GET['darbinieks_kods'] . "%"
 );
 //$query = "SELECT * FROM lietotajs WHERE kods LIKE :kods AND username LIKE :username AND password LIKE :password AND avatar LIKE :avatar ORDER BY kods DESC";
 $query = "SELECT * FROM prece ORDER BY klients_kods DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'kods'    => $row['kods'],  
   'klients_kods'    => $row['klients_kods'],   
   'datums'  => $row['datums'],
   'laiks'   => $row['laiks'],
   'piegades_veids_kods'    => $row['piegades_veids_kods'],  
   'maksajuma_veids_kods'    => $row['maksajuma_veids_kods'],  
   'cena'    => $row['cena'],  
   'darbinieks_kods'    => $row['darbinieks_kods'] 
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':kods'  => $_POST['kods'],
  ':klients_kods'  => $_POST['klients_kods'],
  ':datums'  => $_POST["datums"],
  ':laiks'    => $_POST["laiks"],
  ':piegades_veids_kods'  => $_POST['piegades_veids_kods'],
  ':maksajuma_veids_kods'  => $_POST['maksajuma_veids_kods'],
  ':cena'  => $_POST['cena'],
  ':darbinieks_kods'  => $_POST['darbinieks_kods']
 );

 $query = "INSERT INTO prece (kods, klients_kods, datums, laiks, piegades_veids_kods, maksajuma_veids_kods, cena, darbinieks_kods)
 VALUES (:kods, :klients_kods, :datums, :laiks, :piegades_veids_kods, :maksajuma_veids_kods, :cena, :darbinieks_kods)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':kods'   => $_PUT['kods'],
  ':klients_kods'   => $_PUT['klients_kods'],
  ':datums' => $_PUT['datums'],
  ':laiks' => $_PUT['laiks'],
  ':piegades_veids_kods'   => $_PUT['piegades_veids_kods'],
  ':maksajuma_veids_kods'   => $_PUT['maksajuma_veids_kods'],
  ':cena'   => $_PUT['cena'],
  ':darbinieks_kods'   => $_PUT['darbinieks_kods']
 );
 $query = "
 UPDATE prece 
 SET kods = :klients_kods,
 klients_kods = :klients_kods, 
 datums = :datums, 
 laiks = :laiks, 
 piegades_veids_kods = :piegades_veids_kods,
 maksajuma_veids_kods = :maksajuma_veids_kods, 
 cena = :cena, 
 darbinieks_kods = :darbinieks_kods
 WHERE kods = :kods
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM prece WHERE klients_kods = '".$_DELETE["klients_kods"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>