<?php

//fetch_data.php

include("../../includes/dbconnection_pdo.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':kods'   => "%" . $_GET['kods'] . "%",
  ':vards'   => "%" . $_GET['vards'] . "%",
  ':uzvards'     => "%" . $_GET['uzvards'] . "%",
  ':amats_kods'   => "%" . $_GET['amats_kods'] . "%",
  ':talrunis'   => "%" . $_GET['talrunis'] . "%",
  ':epasts'   => "%" . $_GET['epasts'] . "%",
  ':parole'   => "%" . $_GET['parole'] . "%",
  ':piekluves_limenis'   => "%" . $_GET['piekluves_limenis'] . "%",
  ':avatar'    => "%" . $_GET['avatar'] . "%"
 );
 //$query = "SELECT * FROM lietotajs WHERE kods LIKE :kods AND username LIKE :username AND password LIKE :password AND avatar LIKE :avatar ORDER BY kods DESC";
 $query = "SELECT * FROM darbinieks ORDER BY kods DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'kods'    => $row['kods'],   
   'vards'  => $row['vards'],
   'uzvards'   => $row['uzvards'],
   'personas_kods'    => $row['personas_kods'],  
   'amats_kods'    => $row['amats_kods'],  
   'talrunis'    => $row['talrunis'],  
   'epasts'    => $row['epasts'],  
   'parole'    => $row['parole'],  
   'piekluves_limenis'    => $row['piekluves_limenis'],  
   'avatar'    => $row['avatar']
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':kods'  => $_POST['kods'],
  ':vards'  => $_POST["vards"],
  ':uzvards'    => $_POST["uzvards"],
  ':personas_kods'  => $_POST['personas_kods'],
  ':amats_kods'  => $_POST['amats_kods'],
  ':talrunis'  => $_POST['talrunis'],
  ':epasts'  => $_POST['epasts'],
  ':parole'  => $_POST['parole'],
  ':piekluves_limenis'  => $_POST['piekluves_limenis'],
  ':avatar'   => $_POST["avatar"]
 );

 $query = "INSERT INTO darbinieks (kods, vards, uzvards, personas_kods, amats_kods, talrunis, epasts, parole, piekluves_limenis, avatar)
 VALUES (:kods, :vards, :uzvards, :personas_kods, :amats_kods, :talrunis, :epasts, :parole, :piekluves_limenis, :avatar)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':kods'   => $_PUT['kods'],
  ':vards' => $_PUT['vards'],
  ':uzvards' => $_PUT['uzvards'],
  ':personas_kods'   => $_PUT['personas_kods'],
  ':amats_kods'   => $_PUT['amats_kods'],
  ':talrunis'   => $_PUT['talrunis'],
  ':epasts'   => $_PUT['epasts'],
  ':parole'   => $_PUT['parole'],
  ':piekluves_limenis'   => $_PUT['piekluves_limenis'],
  ':avatar'   => $_PUT['avatar']
 );
 $query = "
 UPDATE darbinieks 
 SET kods = :kods, 
 vards = :vards, 
 uzvards = :uzvards, 
 personas_kods = :personas_kods,
 amats_kods = :amats_kods, 
 talrunis = :talrunis, 
 epasts = :epasts, 
 parole = :parole, 
 piekluves_limenis = :piekluves_limenis, 
 avatar = :avatar 
 WHERE kods = :kods
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM darbinieks WHERE kods = '".$_DELETE["kods"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>