<?php
    // define('HOST', "localhost");
    // define('USER', "root");
    // define('PASSWORD', "");
    // define('DB_NAME', "form_manager");

    // $conn = new mysqli(HOST, USER, PASSWORD, DB_NAME);

    // if ($conn->connect_error) {
    // die("Connection failed: " . $conn->connect_error);
    // }

    // Existing code to establish a MySQL database connection

define('HOST', "localhost");
define('USER', "root");
define('PASSWORD', "");

$conn = new mysqli(HOST, USER, PASSWORD);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$databaseName = "form_manager";

$sql = "CREATE DATABASE IF NOT EXISTS $databaseName";

if ($conn->query($sql) === TRUE) {
    $conn->select_db($databaseName);
    
$sql = 'CREATE TABLE users (
    id bigint NOT NULL AUTO_INCREMENT,
    form_setting_id bigint,
    submission_code varchar(50) NOT NULL,
    email varchar(150) DEFAULT NULL,
    full_name varchar(150),
    first_name varchar(150) DEFAULT NULL,
    last_name varchar(150) DEFAULT NULL,
    organization varchar(100) DEFAULT NULL,
    designation varchar(100) DEFAULT NULL,
    country varchar(100) DEFAULT NULL,
    subject varchar(200) DEFAULT NULL,
    form_contents text,
    ip varchar(130) DEFAULT NULL,
    user_agent text,
    from_location text,
    admin_reply varchar(500) DEFAULT NULL,
    tags varchar(200) DEFAULT NULL,
    send_copy_to_yourself tinyint(1) DEFAULT 0,
    is_read tinyint(1) DEFAULT 0,
    current_status varchar(50) DEFAULT "submitted",
    created datetime DEFAULT current_timestamp(),
    updated datetime DEFAULT NULL,
    PRIMARY KEY (id)
);';

$checkTableQuery = "SHOW TABLES LIKE 'users'";
$result = $conn->query($checkTableQuery);

if ($result->num_rows == 0) {
    if ($conn->query($sql) === TRUE) {
        // table create successfull
    }
}


}


?>