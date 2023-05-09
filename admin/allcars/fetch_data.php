<?php

//fetch_data.php

include("../../includes/dbconnection_pdo.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':kods'  => "%" . $_GET['kods'],   
  ':piegadata_noliktava'  =>  "%" . $_GET['piegadata_noliktava'] . "%",
  ':valsts_kods'   => "%" . $_GET['valsts_kods'] . "%",
  ':automasinas_marka_kods'    => "%" . $_GET['automasinas_marka_kods'] . "%",
  ':modelis'    => "%" . $_GET['modelis'] . "%",
  ':izlaiduma_gads'    => "%" . $_GET['izlaiduma_gads'] . "%",
  ':krasa_kods'    => "%" . $_GET['krasa_kods'] . "%",
  ':virsbuves_tips_kods'    => "%" . $_GET['virsbuves_tips_kods'] . "%",
  ':piedzinas_tips_kods'    => "%" . $_GET['piedzinas_tips_kods'] . "%",
  ':parnesumkarbas_tips_kods'    => "%" . $_GET['parnesumkarbas_tips_kods'] . "%",
  ':durvju_skaits'    => "%" . $_GET['durvju_skaits'] . "%",
  ':sedvietu_skaits '    => "%" . $_GET['sedvietu_skaits '] . "%",
  ':dzineja_tips_kods'    => "%" . $_GET['dzineja_tips_kods'] . "%",
  ':degvielas_padeves_sistemas_tips_kods'    => "%" . $_GET['degvielas_padeves_sistemas_tips_kods'] . "%",
  ':dzineja_novietojuma_tips_kods'    => "%" . $_GET['dzineja_novietojuma_tips_kods'] . "%",
  ':dzineja_tilpums'    => "%" . $_GET['dzineja_tilpums'] . "%",
  ':VIN'    => "%" . $_GET['VIN'] . "%",
  ':preces_cena'    => "%" . $_GET['preces_cena'] . "%",
  ':attels'    => "%" . $_GET['attels'] . "%"
 );
 //$query = "SELECT * FROM lietotajs WHERE kods LIKE :kods AND username LIKE :username AND password LIKE :password AND avatar LIKE :avatar ORDER BY kods DESC";
 $query = "SELECT * FROM prece ORDER BY kods DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'kods'    => $row['kods'],   
   'piegadata_noliktava'  => $row['piegadata_noliktava'],
   'valsts_kods'   => $row['valsts_kods'],
   'automasinas_marka_kods'    => $row['automasinas_marka_kods'],
   'modelis'    => $row['modelis'],
   'izlaiduma_gads'    => $row['izlaiduma_gads'],  
   'krasa_kods'    => $row['krasa_kods'],  
   'virsbuves_tips_kods'    => $row['virsbuves_tips_kods'],  
   'piedzinas_tips_kods'    => $row['piedzinas_tips_kods'],  
   'parnesumkarbas_tips_kods'    => $row['parnesumkarbas_tips_kods'],  
   'durvju_skaits'    => $row['durvju_skaits'],  
   'sedvietu_skaits '    => $row['sedvietu_skaits '],  
   'dzineja_tips_kods'    => $row['dzineja_tips_kods'],  
   'degvielas_padeves_sistemas_tips_kods'    => $row['degvielas_padeves_sistemas_tips_kods'],  
   'dzineja_novietojuma_tips_kods'    => $row['dzineja_novietojuma_tips_kods'],
   'dzineja_tilpums'    => $row['dzineja_tilpums'],  
   'VIN'    => $row['VIN'],  
   'preces_cena'    => $row['preces_cena'],
   'attels'    => $row['attels']
  );
 }
 header("Content-Type: application/json");
 echo json_encode($output);
}

if($method == "POST")
{
 $data = array(
  ':kods'  => $_POST['kods'],   
  ':piegadata_noliktava'  => $_POST['piegadata_noliktava'],
  ':valsts_kods'   => $_POST['valsts_kods'],
  ':automasinas_marka_kods'    => $_POST['automasinas_marka_kods'],
  ':modelis'    => $_POST['modelis'],
  ':izlaiduma_gads'    => $_POST['izlaiduma_gads'],  
  ':krasa_kods'    => $_POST['krasa_kods'],  
  ':virsbuves_tips_kods'    => $_POST['virsbuves_tips_kods'],  
  ':piedzinas_tips_kods'    => $$_POST['piedzinas_tips_kods'],  
  ':parnesumkarbas_tips_kods'    => $_POST['parnesumkarbas_tips_kods'],  
  ':durvju_skaits'    => $_POST['durvju_skaits'],  
  ':sedvietu_skaits '    => $_POST['sedvietu_skaits '],  
  ':dzineja_tips_kods'    => $_POST['dzineja_tips_kods'],  
  ':degvielas_padeves_sistemas_tips_kods'    => $_POST['degvielas_padeves_sistemas_tips_kods'],  
  ':dzineja_novietojuma_tips_kods'    => $_POST['dzineja_novietojuma_tips_kods'],
  ':dzineja_tilpums'    => $_POST['dzineja_tilpums'],  
  ':VIN'    => $_POST['VIN'],  
  ':preces_cena'    => $_POST['preces_cena'],
  ':attels'    => $_POST['attels']
 );

 $query = "INSERT INTO lietotajs (kods, username, password, avatar) VALUES (:kods, :username, :password, :avatar)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':kods'  => $_PUT['kods'],   
  ':piegadata_noliktava'  => $_PUT['piegadata_noliktava'],
  ':valsts_kods'   => $_PUT['valsts_kods'],
  ':automasinas_marka_kods'    => $_PUT['automasinas_marka_kods'],
  ':modelis'    => $_PUT['modelis'],
  ':izlaiduma_gads'    => $_PUT['izlaiduma_gads'],  
  ':krasa_kods'    => $_PUT['krasa_kods'],  
  ':virsbuves_tips_kods'    => $_PUT['virsbuves_tips_kods'],  
  ':piedzinas_tips_kods'    => $$_PUT['piedzinas_tips_kods'],  
  ':parnesumkarbas_tips_kods'    => $_PUT['parnesumkarbas_tips_kods'],  
  ':durvju_skaits'    => $_PUT['durvju_skaits'],  
  ':sedvietu_skaits '    => $_PUT['sedvietu_skaits '],  
  ':dzineja_tips_kods'    => $_PUT['dzineja_tips_kods'],  
  ':degvielas_padeves_sistemas_tips_kods'    => $_PUT['degvielas_padeves_sistemas_tips_kods'],  
  ':dzineja_novietojuma_tips_kods'    => $_PUT['dzineja_novietojuma_tips_kods'],
  ':dzineja_tilpums'    => $_PUT['dzineja_tilpums'],  
  ':VIN'    => $_PUT['VIN'],  
  ':preces_cena'    => $_PUT['preces_cena'],
  ':attels'    => $_PUT['attels']
 );
 $query = "
 UPDATE prece 
 SET kods = :kods, 
 piegadata_noliktava = :piegadata_noliktava, 
 valsts_kods = :valsts_kods, 
 automasinas_marka_kods = :automasinas_marka_kods
  modelis = :modelis, 
 izlaiduma_gads = :izlaiduma_gads, 
 krasa_kods = :krasa_kods, 
 virsbuves_tips_kods = :virsbuves_tips_kods, 
 piedzinas_tips_kods = :piedzinas_tips_kods, 
 parnesumkarbas_tips_kods = :parnesumkarbas_tips_kods, 
 durvju_skaits = :durvju_skaits, 
 sedvietu_skaits = :sedvietu_skaits, 
 degvielas_padeves_sistemas_tips_kods = :degvielas_padeves_sistemas_tips_kods, 
 dzineja_novietojuma_tips_kods = :dzineja_novietojuma_tips_kods, 
 dzineja_tilpums = :dzineja_tilpums,
 VIN = :VIN, 
 preces_cena = :preces_cena, 
 attels = :attels
 WHERE kods = :kods
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM prece WHERE kods = '".$_DELETE["kods"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>