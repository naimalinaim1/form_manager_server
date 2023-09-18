<?php
// create user
if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    
    $sql = "INSERT INTO users (submission_code, email, full_name, organization, designation, country) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $code, $email, $fullName, $organization, $designation, $country);

    // Set the parameter values
    $code = $data['code'];
    $fullName = $data['fullName'];
    $email = $data['email'];
    $organization = $data['organization'];
    $designation = $data['designation'];
    $country = $data['country'];

// Execute the prepared statement
if ($stmt->execute()) {
    echo json_encode(['status'=>'true', 'message'=> 'Data insert success']);
}
else {
    echo json_encode(['status'=>'false', 'message'=> $stmt->error]);
}

// Close the statement and connection
$stmt->close();
}

?>