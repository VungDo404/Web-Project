<?php 
    $servername = "localhost";
    $username = "root";
    $password = "Victor231!?";
    $databasename = 'MyResume';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    $sql = "SELECT * FROM jobs";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Fetch the results into an associative array
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        // Convert the array to JSON
        $json_data = json_encode($data);

        // Output the JSON data
        echo $json_data;
    } else {
        // If no results, you can handle it accordingly
        echo "No data found";
    }

    // Close the connection
    $conn->close();

?>