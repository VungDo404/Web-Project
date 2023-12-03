<?php
$servername = "localhost";
$username = "root";
$password = "";
$databasename = 'MyResume';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $resume_id = isset($_POST['resume_id']) ? $_POST['resume_id'] : '';

    // Validate and sanitize input as needed

    // Retrieve phone records
    $select_phone_query = "SELECT * FROM phones WHERE resume_id = '$resume_id'";
    $result = mysqli_query($conn, $select_phone_query);

    if ($result) {
        $phones = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $phones[] = ['valid' => true, 'number' => $row['phone_number'], 'id' => $row['phone_id'],];
        }
        echo json_encode($phones);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to retrieve phone records']);
    }
} else {
    // Handle invalid requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

mysqli_close($conn);
?>