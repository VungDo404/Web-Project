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
    $sql = "SELECT * FROM experience WHERE resume_id = '$resume_id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $experience = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $experience[] = ['valid' => true, 'name' => $row['name'], 'id' => $row['experience_id'], 'description' => $row['description'], 'address' => $row['address']];
        }
        echo json_encode($experience);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to retrieve experience records']);
    }
} else {
    // Handle invalid requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the database connection
mysqli_close($conn);
?>
