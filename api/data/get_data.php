<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $sql = "SELECT * FROM users";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
      $data = [];
      while ($row = $result->fetch_assoc()) {
          $data[] = $row;
      }
      echo json_encode(['status' => 'true', 'data' => $data]);
  } else {
      echo json_encode(['status' => 'false', 'message' => 'No data found']);
  }
}

?>