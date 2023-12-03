<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);
    $user_id = $_COOKIE["user_id"]; 
    $record = isset($_POST['record']) ? $_POST['record'] : array();
    $resume_id = $record['ID']; 
    $name = $record['Name'];
    $gender = $record['Gender'];
    $age = $record['Age'];
    $email = $record['Email'];
    $address = $record['Address'];
    $description = $record['Description'];
    $experience = $record['Experience'];
    $skills = $record['Skills'];
    $certificates = $record['certificates'];
    $phones = $record['phones'];
    if($resume_id == ''){
        $sql = "INSERT INTO resumes (name, age, gender, address, email, user_id, description, skills, experience) VALUES ('$name', '$age', '$gender', '$address', '$email', '$user_id', '$description', '$skills', '$experience')";
        mysqli_query($conn, $sql);
        // insert phones 
        $resume_id = $conn->insert_id;
        if(!empty($phones)){
            foreach ($phones as $phone) {
                $valid_phone = $phone['valid'];
                $phone_number = $phone['number'];
                if($valid_phone === 'true'){
                    $sql = "INSERT INTO phones (phone_number, resume_id) VALUES ('$phone_number', '$resume_id')";
                    mysqli_query($conn, $sql);
                }
            }
        }
        
        // insert certificate 
        if(!empty($certificates)){
            foreach ($certificates as $certificate) {
                $valid_certificate = $certificate['valid'];
                $certificate_description = $certificate['description'];
                $certificate_name = $certificate['name'];
                if($valid_certificate === 'true'){
                    $sql = "INSERT INTO degrees (name, description, resume_id) VALUES ('$certificate_name', '$certificate_description', '$resume_id')";
                    mysqli_query($conn, $sql);
                }
            }
        }
        
    }else {
        $sql = "UPDATE resumes 
            SET name='$name', age='$age', gender='$gender', address='$address', email='$email', description='$description', skills='$skills', experience='$experience' 
            WHERE user_id=$user_id AND resume_id = $resume_id" ;
        mysqli_query($conn, $sql);
        ////
        if(!empty($phones)){
            foreach ($phones as $phone) {
                $valid_phone = $phone['valid'];
                $phone_number = $phone['number'];
                $phone_id = $phone['id'];
                if($valid_phone === 'true'){
                    if($phone_id === ''){
                        $sql = "INSERT INTO phones (phone_number, resume_id) VALUES ('$phone_number', '$resume_id')";
                        mysqli_query($conn, $sql);
                    }else{
                        $sql = "UPDATE phones 
                        SET phone_number='$phone_number'
                        WHERE resume_id = $resume_id AND phone_id = $phone_id";
                        mysqli_query($conn, $sql);
                    }
                    
                }else {
                    $sql = "DELETE FROM phones WHERE phone_id=$phone_id";
                    mysqli_query($conn, $sql);
                }
            }
        }
        
        ////
        if(!empty($certificates)){
            foreach ($certificates as $certificate) {
                $valid_certificate = $certificate['valid'];
                $certificate_description = $certificate['description'];
                $certificate_name = $certificate['name'];
                $certificate_id = $certificate['id'];
                if($valid_certificate === 'true'){
                    if($certificate_id === ''){
                        $sql = "INSERT INTO degrees (name, description, resume_id) VALUES ('$certificate_name', '$certificate_description', '$resume_id')";
                        mysqli_query($conn, $sql);
                    }else{
                        $sql = "UPDATE degrees 
                        SET name='$certificate_name', description='$certificate_description'
                        WHERE resume_id = $resume_id AND degree_id = $certificate_id";
                        mysqli_query($conn, $sql);
                    }
                    
                }else{
                    $sql = "DELETE FROM degrees WHERE degree_id=$certificate_id";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }
    mysqli_close($conn);
?>