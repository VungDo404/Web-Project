<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = 'MyResume';
        // Create connection
        $connection = new mysqli($servername, $username, $password);
        $sql = "CREATE DATABASE IF NOT EXISTS MyResume";
        mysqli_query($connection, $sql);
        $conn = mysqli_connect($servername, $username, $password,$databasename);
        ///////////////////////////////
        $users = "CREATE TABLE IF NOT EXISTS users (
            user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(30) NOT NULL,
            `password` VARCHAR(255)  NOT NULL,
            user_level VARCHAR(30) NOT NULL,
            
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        mysqli_query($conn, $users);
        $hashed_password = password_hash('123456', PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (email,`password`, user_level, name)
        VALUES ('user@gmail.com', '$hashed_password', 'USER', 'user');";
        mysqli_query($conn, $sql);
        //////////////
        $resumes = "CREATE TABLE IF NOT EXISTS resumes (
            resume_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            age INT,
            user_id INT(6) UNSIGNED,
            gender VARCHAR(10) NOT NULL DEFAULT 'male',
            description VARCHAR(30) NOT NULL,
            FOREIGN KEY (user_id) REFERENCES users(user_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $resumes)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        $phones = "CREATE TABLE IF NOT EXISTS phones (
            phone_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            phone_number VARCHAR(10) NOT NULL,
            resume_id INT UNSIGNED,
            FOREIGN KEY (resume_id) REFERENCES resumes(resume_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $phones)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        $degrees = "CREATE TABLE IF NOT EXISTS degrees (
            degree_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            description VARCHAR(10) NOT NULL,
            resume_id INT UNSIGNED,
            FOREIGN KEY (resume_id) REFERENCES resumes(resume_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $degrees)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        mysqli_close($conn);
    ?>