<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

    $user_id = $_COOKIE["user_id"]; 

    
    echo json_encode(array(
        array('ID' => 1, 'Name' => 'Hristo Stoichkov', 'CreatedDate' => '10.01.2001', 'Age'=> 1, 'Email'=>'test@gmail.com', 'Description'=>'None', 'Gender'=>''),
        array('ID' => 2, 'Name' => 'Ronaldo Luis Nazario de Lima', 'CreatedDate' => '10.01.2001','Age'=> 1, 'Email'=>'test@gmail.com', 'Description'=>'None', 'Gender'=>'male'),
        array('ID' => 4, 'Name' => 'David Platt', 'CreatedDate' => '10.01.2001', 'Age'=> 1, 'Email'=>'test@gmail.com', 'Description'=>'None', 'Gender'=>'male')
    ));
?>