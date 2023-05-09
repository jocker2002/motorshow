<?php

//fetch_data.php

include("../../includes/dbconnection_pdo.php");

$method = $_SERVER['REQUEST_METHOD'];

if($method == 'GET')
{
 $data = array(
  ':kods'   => "%" . $_GET['kods'] . "%",
  ':username'   => "%" . $_GET['username'] . "%",
  ':password'     => "%" . $_GET['password'] . "%",
  ':avatar'    => "%" . $_GET['avatar'] . "%"
 );
 //$query = "SELECT * FROM lietotajs WHERE kods LIKE :kods AND username LIKE :username AND password LIKE :password AND avatar LIKE :avatar ORDER BY kods DESC";
 $query = "SELECT * FROM lietotajs ORDER BY kods DESC";

 $statement = $connect->prepare($query);
 $statement->execute($data);
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output[] = array(
   'kods'    => $row['kods'],   
   'username'  => $row['username'],
   'password'   => $row['password'],
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
  ':username'  => $_POST["username"],
  ':password'    => $_POST["password"],
  ':avatar'   => $_POST["avatar"]
 );

 $query = "INSERT INTO lietotajs (kods, username, password, avatar) VALUES (:kods, :username, :password, :avatar)";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == 'PUT')
{
 parse_str(file_get_contents("php://input"), $_PUT);
 $data = array(
  ':kods'   => $_PUT['kods'],
  ':username' => $_PUT['username'],
  ':password' => $_PUT['password'],
  ':avatar'   => $_PUT['avatar']
 );
 $query = "
 UPDATE lietotajs 
 SET kods = :kods, 
 username = :username, 
 password = :password, 
 avatar = :avatar 
 WHERE kods = :kods
 ";
 $statement = $connect->prepare($query);
 $statement->execute($data);
}

if($method == "DELETE")
{
 parse_str(file_get_contents("php://input"), $_DELETE);
 $query = "DELETE FROM lietotajs WHERE kods = '".$_DELETE["kods"]."'";
 $statement = $connect->prepare($query);
 $statement->execute();
}

?>