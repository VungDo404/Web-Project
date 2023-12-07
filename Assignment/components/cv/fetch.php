<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    $user_id = $_COOKIE["user_id"]; 
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
    $offset = ($page - 1) * $limit;

    $totalRecordsQuery = "SELECT COUNT(*) as count FROM resumes WHERE user_id='$user_id'";
    $totalRecordsResult = mysqli_query($conn, $totalRecordsQuery);
    $totalRecords = mysqli_fetch_assoc($totalRecordsResult)['count'];

    $sql = "SELECT * FROM resumes LIMIT $offset, $limit WHERE user_id='$user_id'";
    $result = mysqli_query($conn, $sql);
    $records = array(); 
    while ($row = $result->fetch_assoc()){
        $records[] = array(
            'ID' => $row['resume_id'],
            'firstName' => $row['first_name'],
            'lastName' => $row['last_name'],
            'Age' => $row['age'],
            'Gender' => $row['gender'],
            'Address' => $row['address'],
            'Email' => $row['email'],
            'About' => $row['description'],
            'Skills' => $row['skills'],
            'CreatedDate' => $row['reg_date'],
        );
      }
    mysqli_close($conn);
    $response = array(
        'total' => $totalRecords,
        'records' => $records,
    );
    echo json_encode($response);
?>