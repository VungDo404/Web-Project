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
    $sql = "SELECT * FROM projects WHERE resume_id = '$resume_id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        $projects = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $projects[] = ['valid' => true, 'name' => $row['name'], 'id' => $row['project_id'], 'description' => $row['description'], 'url' => $row['url']];
        }
        echo json_encode($projects);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to retrieve projects records']);
    }
} else {
    // Handle invalid requests
    echo json_encode(['status' => 'error', 'message' => 'Invalid request method']);
}

// Close the database connection
mysqli_close($conn);
?>
