<?php
require('../config.php');
require('../db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Set the parameter values
    $id = $data['id'];
    $code = $data['code'];
    $fullName = $data['fullName'];
    $email = $data['email'];
    $organization = $data['organization'];
    $designation = $data['designation'];
    $country = $data['country'];
    
    // Prepare the statement
    $stmt = $conn->prepare("UPDATE users SET submission_code=?, email=?, full_name=?, organization=?, designation=?, country=? WHERE id=?");
    
    // Bind parameters
    $stmt->bind_param("sssssss", $code, $email, $fullName, $organization, $designation, $country, $id);
    
    // Execute the statement
    if ($stmt->execute()) {
        echo json_encode(['status'=>'true', 'message'=> 'Data update success']);
    } else {
        echo json_encode(['status'=>'false', 'message'=> 'Data update problem']);
    }
    
    // Close the statement
    $stmt->close();
}

