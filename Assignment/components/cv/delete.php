<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    $user_id = $_COOKIE["user_id"];
    $resume_id = isset($_POST['id']) ? $_POST['id'] : '';

    if (!empty($resume_id)) {
        // Use mysqli_real_escape_string to prevent SQL injection
        $resume_id = mysqli_real_escape_string($conn, $resume_id);

        // Perform the deletion queries
        $sql_phones = "DELETE FROM phones WHERE resume_id=$resume_id";
        $sql_degrees = "DELETE FROM degrees WHERE resume_id=$resume_id";
        $sql_projects = "DELETE FROM projects WHERE resume_id=$resume_id";
        $sql_experience = "DELETE FROM experience WHERE resume_id=$resume_id";
        $sql_resumes = "DELETE FROM resumes WHERE resume_id=$resume_id";
        
        mysqli_query($conn, $sql_phones);
        mysqli_query($conn, $sql_degrees);
        mysqli_query($conn, $sql_resumes);

        // Check for errors
        if (mysqli_error($conn)) {
            echo 'Error deleting records: ' . mysqli_error($conn);
        } else {
            
        }
    } else {
        echo 'Invalid resume ID';
    }

    // Close the connection
    mysqli_close($conn);
?>