<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');

  $data = json_decode(file_get_contents("php://input"),true);

  $student_id = $data['sid'];

  // $student_id = isset($_GET['sid']) ? $_GET['sid'] : die();

  include "config.php";

  $sql = "SELECT * FROM stdinfo WHERE id = {$student_id}";

  $result = mysqli_query($conn,$sql) or die("sql : Query Unsuccessful.");

  if (mysqli_num_rows($result) > 0) {
    $output = mysqli_fetch_all($result,MYSQLI_ASSOC);
    echo json_encode($output);
  }else {
    echo json_encode(['message' => 'No Record Found', 'status' => false]);
  }
?>
