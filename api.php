<?php
require_once 'config/db.php';
// insert doc_types
if($_POST['type_name']?? null){
  $sql = "INSERT INTO doc_types (id,type_name) VALUES (?,?)";
  $stmt = $db->prepare($sql);
  
  $id = time();
  $type_name = $_POST['type_name'];
  $stmt->bind_param('is',$id,$type_name);
  $stmt->execute();
  
  $sql = "SELECT * FROM doc_types where id =$id";
  $results = $db->query($sql);
  $row = $results->fetch_assoc();

  header('Content-Type: application/json');
  $data = [
    'status' => 'success',
    'id' => $id,
    'data'=> $row
  ];
  header('Content-Type: application/json');
  echo json_encode($data);
  exit();

}

// select user
$sql = "SELECT * FROM users ";
$result = $db->query($sql);
$row = $result->fetch_all(MYSQLI_ASSOC);

header('Content-Type: application/json');
echo json_encode($row);