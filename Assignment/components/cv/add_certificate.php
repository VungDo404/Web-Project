<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $description = isset($_POST['description']) ? $_POST['description'] : '';
    $resume_id = isset($_POST['resume_id']) ? $_POST['resume_id'] : '';

    // Validate and sanitize input as needed

    // Insert certificate record
    $insert_certificate_query = "INSERT INTO degrees (description, resume_id) VALUES ('$description', '$resume_id')";
    $result = mysqli_query($conn, $insert_certificate_query);

    if ($result) {
        echo json_encode(['status' => 'success', 'message' => 'Certificate added successfully']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to add certificate']);
    }
} else {
    // Handle invalid requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

    mysqli_close($conn);
?>
