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

    // Retrieve certificate records
    $select_certificate_query = "SELECT * FROM degrees WHERE resume_id = '$resume_id'";
    $result = mysqli_query($conn, $select_certificate_query);

    if ($result) {
        $certificates = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $certificates[] = ['valid' => true, 'name' => $row['name'], 'id' => $row['degree_id'], 'description' => $row['description']];
        }
        echo json_encode($certificates);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to retrieve certificate records']);
    }
} else {
    // Handle invalid requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the database connection
mysqli_close($conn);
?>
