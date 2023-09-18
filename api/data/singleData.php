<?php
require('../config.php');
require('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['status']) && isset($_GET['id'])) { // Corrected the parentheses
        $status = $_GET['status']; // Fixed the variable name
        $id = $_GET['id'];
        if($status === 'edit') {
            $sql = "SELECT * FROM users WHERE id = $id";
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
    }
}

