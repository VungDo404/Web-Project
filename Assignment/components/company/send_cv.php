<?php
    echo $_POST['user_id'];
    echo $_POST['job_id'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';
     
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    $sql = 'INSERT INTO job_cv(job_id, user_id)
    VALUES ('.$_POST['job_id'].','.$_POST['user_id'].')';
    $result = mysqli_query($conn, $sql);
    Header('Location: http://localhost/Assignment/components/company/company.php?job_id='.$_POST['job_id'].'');
    mysqli_close($conn);
?>