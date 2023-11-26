<?php  
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);
    
    $email =  isset($_POST["email"]) ? $_POST["email"] : '';
    $password = isset($_POST["password"]) ? $_POST["password"] : '';
    if(strlen($email) === 0 or strlen($password) === 0){
        echo '<script type ="text/JavaScript"> alert("Username/Password must not be empty!"); window.location.href = "http://localhost/index.php?page=login"; </script>' ;
    }
    if(strlen($password) > 255)
        echo '<script type ="text/JavaScript"> alert("Length of password must be less than 255"); window.location.href = "http://localhost/index.php?page=login"; </script>' ;
    $sql = "SELECT user_id,email, `password`, user_level,name FROM users WHERE email='$email'";
    $result = $conn->query($sql);
    $row = mysqli_fetch_assoc($result); 
    if(!empty($row)){
        $hashed_password =  $row['password'];
        $name = $row['name'];
        $user_level = $row['user_level'];
        $user_id = $row['user_id'];
        session_start();
        if(password_verify($password, $hashed_password)){
            setcookie("name", $name, time() + 86400);
            setcookie("user_id", $user_id, time() + 86400);
            $_SESSION["user_id"] = $user_id;
            header("Location: http://localhost/setting.php");
        }
        $_SESSION["email"] = $email;
        echo '<script type ="text/JavaScript"> alert("Incorrect email or password!"); window.location.href = "http://localhost/login_page.php"; </script>' ;
    }else{
        session_start();
        $_SESSION["email"] = $email;
        echo '<script type ="text/JavaScript"> alert("Incorrect email or password!"); window.location.href = "http://localhost/login_page.php"; </script>' ;   
    }
    
    mysqli_close($conn);
?>