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
  ':personas_kods'    => "%" . $_GET['personas_kods'] . "%",
  ':valsts'   => "%" . $_GET['valsts'] . "%",
  ':pilseta'   => "%" . $_GET['pilseta'] . "%",
  ':iela'   => "%" . $_GET['iela'] . "%",
  ':pasta_indekss'   => "%" . $_GET['pasta_indekss'] . "%",
  ':talrunis'   => "%" . $_GET['talrunis'] . "%",
  ':epasts'   => "%" . $_GET['epasts'] . "%",
  ':lietotajs_kods'   => "%" . $_GET['lietotajs_kods'] . "%"
 );
 //$query = "SELECT * FROM lietotajs WHERE kods LIKE :kods AND username LIKE :username AND password LIKE :password AND avatar LIKE :avatar ORDER BY kods DESC";
 $query = "SELECT * FROM klients ORDER BY kods DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'kods'    => $row['kods'],   
   'vards'  => $row['vards'],
   'uzvards'   => $row['uzvards'],
   'personas_kods'   => $row['personas_kods'],
   'valsts'   => $row['valsts'],
   'pilseta'   => $row['pilseta'],
   'iela'   => $row['iela'],
   'pasta_indekss'   => $row['pasta_indekss'],
   'talrunis'   => $row['talrunis'],
   'epasts'   => $row['epasts'],
   'lietotajs_kods'    => $row['lietotajs_kods']
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
  ':personas_kods'    => $_POST["personas_kods"],
  ':valsts'    => $_POST["valsts"],
  ':pilseta'    => $_POST["pilseta"],
  ':iela'    => $_POST["iela"],
  ':pasta_indekss'    => $_POST["pasta_indekss"],
  ':talrunis'    => $_POST["talrunis"],
  ':epasts'    => $_POST["epasts"],
  ':lietotajs_kods'    => $_POST["lietotajs_kods"]
 );

 $query = "INSERT INTO klients (kods, vards, uzvards, personas_kods, valsts, pilseta, iela, pasta_indekss, talrunis, epasts, lietotajs_kods)
 VALUES (:kods, :vards, :uzvards, :personas_kods, :valsts, :pilseta, :iela, :pasta_indekss, :talrunis, :epasts, :lietotajs_kods)";
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
  ':valsts'   => $_PUT['valsts'],
  ':pilseta'   => $_PUT['pilseta'],
  ':iela'   => $_PUT['iela'],
  ':pasta_indekss'   => $_PUT['pasta_indekss'],
  ':talrunis'   => $_PUT['talrunis'],
  ':epasts'   => $_PUT['epasts'],
  ':lietotajs_kods'   => $_PUT['lietotajs_kods']
 );
 $query = "
 UPDATE klients 
 SET kods = :kods, 
 vards = :vards, 
 uzvards = :uzvards, 
 personas_kods = :personas_kods,
 valsts = :valsts, 
 pilseta = :pilseta,
 iela = :iela,
 pasta_indekss = :password, 
 talrunis = :talrunis, 
 epasts = :epasts, 
 lietotajs_kods = :lietotajs_kods 
 WHERE kods = :kods
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM klients WHERE kods = '".$_DELETE["kods"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>