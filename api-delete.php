<?php
  header('Content-Type: application/json');
  header('Access-Control-Allow-Origin: *');
  header('Access-Control-Allow-Methods: DELETE');
  header('Access-Control-Allow-Methods: Access-Control-Allow-Methods,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');

  $data = json_decode(file_get_contents("php://input"),true);

  $student_id = $data['sid'];

  include "config.php";

  $sql = "DELETE FROM stdinfo WHERE id = {$student_id}";

  if (mysqli_query($conn,$sql)) {
    echo json_encode(['message' => 'Student Record Deleted.', 'status' => true]);
  }else {
    echo json_encode(['message' => 'Student Record Not Deleted.', 'status' => false]);
  }
?>
