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
    $firstName = $record['firstName'];
    $lastName = $record['lastName'];
    $gender = $record['Gender'];
    $age = $record['Age'];
    $email = $record['Email'];
    $address = $record['Address'];
    $description = $record['Description'];
    $skills = $record['Skills'];
    $certificates = $record['certificates'];
    $phones = $record['phones'];
    $projects = $record['projects'];
    
    $experience = $record['experience'];
    if($resume_id == ''){
        echo 1;
        $sql = "INSERT INTO resumes (first_name,last_name ,age, gender, address, email, user_id, description, skills) VALUES ('$firstName','$lastName' ,'$age', '$gender', '$address', '$email', '$user_id', '$description', '$skills')";
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
        

        // insert projects
        if(!empty($projects)){
            foreach ($projects as $project) {
                $valid_project = $project['valid'];
                $project_description = $project['description'];
                $project_name = $project['name'];
                $project_url = $project['url'];
                if($valid_project === 'true'){
                    $sql = "INSERT INTO projects (name, description,url ,resume_id) VALUES ('$project_name', '$project_description', '$project_url','$resume_id')";
                    mysqli_query($conn, $sql);
                }
            }
        }

        // insert experience 
        if(!empty($experience)){
            foreach ($experience as $exp) {
                $valid_experience = $exp['valid'];
                $experience_description = $exp['description'];
                $experience_name = $exp['name'];
                $experience_address = $exp['address'];
                if($valid_experience === 'true'){
                    $sql = "INSERT INTO experience (name, description,address ,resume_id) VALUES ('$experience_name', '$experience_description','$experience_address','$resume_id')";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }else {
        
        $sql = "UPDATE resumes 
            SET first_name='$firstName', last_name='$lastName',age=$age, gender='$gender', address='$address', email='$email', description='$description', skills='$skills' 
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

        if(!empty($projects)){
            
            foreach ($projects as $project) {
                $valid_project = $project['valid'];
                $project_description = $project['description'];
                $project_name = $project['name'];
                $project_url = $project['url'];
                $project_id = $project['id'];
                if($valid_project === 'true'){
                    if($project_id === ''){
                        $sql = "INSERT INTO projects (name, description,url ,resume_id) VALUES ('$project_name', '$project_description', '$project_url','$resume_id')";
                        mysqli_query($conn, $sql);
                    }else{
                        $sql = "UPDATE projects 
                        SET name='$project_name', description='$project_description', url='$project_url'
                        WHERE resume_id = $resume_id AND project_id = $project_id";
                        mysqli_query($conn, $sql);
                    }
                    
                }else{
                    $sql = "DELETE FROM projects WHERE project_id=$project_id";
                    mysqli_query($conn, $sql);
                }
            }
        }

        if(!empty($experience)){
            foreach ($experience as $exp) {
                $valid_experience = $exp['valid'];
                $experience_description = $exp['description'];
                $experience_name = $exp['name'];
                $experience_address = $exp['address'];
                $experience_id = $exp['id'];
                if($valid_experience === 'true'){
                    if($experience_id === ''){
                        $sql = "INSERT INTO experience (name, description,address ,resume_id) VALUES ('$experience_name', '$experience_description','$experience_address','$resume_id')";
                        mysqli_query($conn, $sql);
                    }else{
                        $sql = "UPDATE experience 
                        SET name='$experience_name', description='$experience_description', address='$experience_address'
                        WHERE resume_id = $resume_id AND experience_id = $experience_id";
                        mysqli_query($conn, $sql);
                    }
                    
                }else{
                    $sql = "DELETE FROM experience WHERE experience_id=$experience_id";
                    mysqli_query($conn, $sql);
                }
            }
        }
    }
    mysqli_close($conn);
?>