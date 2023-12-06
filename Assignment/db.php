<?php
        $servername = "localhost";
        $username = "root";
        $password = "Victor231!?";
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
        // $hashed_password = password_hash('123456', PASSWORD_DEFAULT);
        // $sql = "INSERT INTO users (email,`password`, user_level)
        // VALUES ('user@gmail.com', '$hashed_password', 'USER');";
        // mysqli_query($conn, $sql);
        //////////////
        $resumes = "CREATE TABLE IF NOT EXISTS resumes (
            resume_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            age INT,
            gender VARCHAR(10),
            address VARCHAR(100),
            email VARCHAR(50),
            user_id INT(6) UNSIGNED,
            description TEXT,
            skills TEXT,
            experience VARCHAR(100),
            FOREIGN KEY (user_id) REFERENCES users(user_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $resumes)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        //
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
            name VARCHAR(50) NOT NULL,
            description VARCHAR(10) NOT NULL,
            resume_id INT UNSIGNED,
            FOREIGN KEY (resume_id) REFERENCES resumes(resume_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $degrees)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }

        // create table job
        $jobs = "CREATE TABLE IF NOT EXISTS jobs (
            job_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            job_name VARCHAR(50) NOT NULL,
            company_name VARCHAR(50) NOT NULL,
            salary VARCHAR(20) NOT NULL,
            location VARCHAR(50) NOT NULL,
            image VARCHAR(50) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $jobs)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }

        mysqli_close($conn);



        // insert data
        //include_once("../Assignment/components/job/insert_job.php");
    ?>