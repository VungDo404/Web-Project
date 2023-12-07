<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

// Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO jobs (job_name, company_name, salary, location, image)
    VALUES ('Software Engineer', 'ABC Tech', '$80,000', 'City XYZ', 'https://picsum.photos/id/230/300/300'),
           ('Data Analyst', 'XYZ Analytics', '$60,000', 'Town ABC', 'https://picsum.photos/id/231/300/300'),
           ('Marketing Specialist', 'Marketing Co.', '$70,000', 'Metropolis', 'https://picsum.photos/id/232/300/300'),
           ('Software Engineer', 'ABC Tech', '$80,000', 'City XYZ', 'https://picsum.photos/id/233/300/300'),
           ('Data Analyst', 'XYZ Analytics', '$60,000', 'Town ABC', 'https://picsum.photos/id/234/300/300'),
           ('Marketing Specialist', 'Marketing Co.', '$70,000', 'Metropolis', 'https://picsum.photos/id/235/300/300')";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted or updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>