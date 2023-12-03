<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $phone_number = isset($_POST['phone_number']) ? $_POST['phone_number'] : '';
    $resume_id = isset($_POST['resume_id']) ? $_POST['resume_id'] : '';

    // Validate and sanitize input as needed

    // Insert phone record
    $insert_phone_query = "INSERT INTO phones (phone_number, resume_id) VALUES ('$phone_number', '$resume_id')";
    $result = mysqli_query($conn, $insert_phone_query);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Phone added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add phone']);
    }
} else {
    // Handle invalid requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

    mysqli_close($conn);
?>
