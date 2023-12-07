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
        // $hashed_password = password_hash('123456', PASSWORD_DEFAULT);
        // $sql = "INSERT INTO users (email,`password`, user_level)
        // VALUES ('user@gmail.com', '$hashed_password', 'USER');";
        // mysqli_query($conn, $sql);
        //////////////
        $resumes = "CREATE TABLE IF NOT EXISTS resumes (
            resume_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            first_name VARCHAR(50) NOT NULL,
            last_name VARCHAR(50) NOT NULL,
            age INT,
            gender VARCHAR(10),
            address VARCHAR(100),
            email VARCHAR(50),
            user_id INT(6) UNSIGNED,
            description TEXT,
            skills TEXT,
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
            description VARCHAR(100) NOT NULL,
            resume_id INT UNSIGNED,
            FOREIGN KEY (resume_id) REFERENCES resumes(resume_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $degrees)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        $projects = "CREATE TABLE IF NOT EXISTS projects (
            project_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            url VARCHAR(500) NOT NULL,
            description VARCHAR(100) NOT NULL,
            resume_id INT UNSIGNED,
            FOREIGN KEY (resume_id) REFERENCES resumes(resume_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $projects)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        $experience = "CREATE TABLE IF NOT EXISTS experience (
            experience_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(50) NOT NULL,
            address VARCHAR(500) NOT NULL,
            description VARCHAR(100) NOT NULL,
            resume_id INT UNSIGNED,
            FOREIGN KEY (resume_id) REFERENCES resumes(resume_id),
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
        if (mysqli_query($conn, $experience)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        $jobs = "CREATE TABLE IF NOT EXISTS jobs (
            job_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            job_name VARCHAR(50) NOT NULL,
            company_name VARCHAR(50) NOT NULL,
            salary VARCHAR(20) NOT NULL,
            location VARCHAR(50) NOT NULL,
            image VARCHAR(255) NOT NULL,
            reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,#the reg_date is deadline date
            job_description VARCHAR(500) NOT NULL,
            company_address VARCHAR (70) NOT NULL
        )";
        if (mysqli_query($conn, $jobs)) {
            
        } else {
            echo "Error creating table: " . mysqli_error($conn);
        }
        ///////////JOB-CV TABLE////////
        $job_CV = "CREATE TABLE IF NOT EXISTS job_cv(
            job_cv_id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            job_id INT UNSIGNED,
            FOREIGN KEY (job_id) REFERENCES jobs(job_id),
            user_id INT UNSIGNED,
            FOREIGN KEY (user_id) REFERENCES users(user_id)
        )";
        if (mysqli_query($conn, $job_CV)) {
        }
        else {
            echo "Error creating". mysqli_error($conn);
        }
        mysqli_close($conn);
        include_once("../Assignment/components/job/insert_job.php");
    ?>