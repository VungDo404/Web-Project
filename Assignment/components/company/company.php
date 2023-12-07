<?php
    if(!isset($_COOKIE["user_id"])){
        header("Location: http://localhost/Assignment/components/login/login_page.php");
    }
    else {
        $user_id = $_COOKIE["user_id"];
    }
    if (isset($_GET['job_id'])) {
        $job_id = $_GET['job_id'];
    }

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';
     
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);
    
    
    $sql = "SELECT job_name, company_name, salary, DATE_FORMAT(DATE(reg_date),'%d-%m-%Y') AS reg_date, location,
    job_description, company_address, image 
    FROM jobs WHERE job_id = $job_id"; // Replace '1' with the desired job_id

    $result = mysqli_query($conn, $sql);

// Check if the query executed successfully
if ($result) {
    // Fetch the job details from the result set
    $row = mysqli_fetch_assoc($result);
    
    // Extract the job details
    $jobName = $row['job_name'];
    $companyName = $row['company_name'];
    $salary = $row['salary'];
    $regDate = $row['reg_date'];
    $area = $row['location'];
    $job_desc = $row['job_description'];
    $addr = $row['company_address'];
    $src = $row['image'];
    }
    // Close the result set
    mysqli_free_result($result);

    //Get resume list of user
    $CVs = "SELECT resume_id, DATE_FORMAT(DATE(reg_date),'%d-%m-%Y') AS reg_date from resumes
    WHERE user_id = $user_id";
    $CV_list = mysqli_query($conn, $CVs);

    //Get other jobs
    $sql = "SELECT job_id, company_name, salary, location, job_name, image
    FROM jobs
    WHERE job_id != $job_id";
    $result = mysqli_query($conn, $sql);
    
    mysqli_close($conn);
?> 
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="/Assignment/css/company.css">
    <link rel="stylesheet" href="/Assignment/css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>
<body>  
    <?php include "../NavBar.php";?>
    <div class="container py-4 rounded border shadow" style="margin-top: 80px;"> 
        <div class="row">
            <div class="col-sm-2">
                <?php echo
                    '<img src="'.$src.'"
                    alt="'.$companyName.'" class="img-fluid">'
                ?>
            </div>
            <div class="col-sm-10">
                <?php echo
                    '<h3 style="font-family: Tahoma, Verdana, sans-serif;color: dimgray;
                    font-size: 1em;">
                        '.$companyName.'
                    </h3>
                
                <h1 style="font-weight: bold;font-size: 1.5em;">'.$jobName.'</h1>';
                ?>
                <div class="row">
                    <div class="col-sm-6">
                        <?php echo
                            '<p style="color:rgb(58, 171, 134);font-weight:bolder;">
                            <i class="bi bi-cash"></i></span>&nbsp;
                            Salary : '.$salary.'
                        </p>
                        <p style="color:rgb(58, 171, 134);font-weight:bolder;">
                            <i class="bi bi-calendar"></i>
                            Deadline submission: '.$regDate.'
                        </p>'
                        ?> 
                    </div>
                    <div class="col-sm-6">
                        <?php echo 
                            '<p style="color:rgb(58, 171, 134);font-weight:bolder;">
                            <i class="bi bi-geo-alt"></i>
                            Area: '.$area.'
                        </p>'
                        ?>
                           
                    </div>
                </div>
                
                <button type="button" class="btn" style="background-color: rgb(108, 166, 191);
                color: white;"data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                    <i class="bi bi-bookmark-check-fill"></i>
                    Apply now
                </button>
                
            </div>
        </div>
    </div>
   <!-- Modal send CV -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel"><h5>Select a CV to apply<h5></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="send_cv.php" method="POST" id="cvForm">
                    <?php while ($row = mysqli_fetch_assoc($CV_list)) {
                        $resumeID = $row['resume_id'];
                        $regDate = $row['reg_date'];
                        echo '
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cv_id" id="cv_' . $resumeID . '" value="' . $resumeID . '">
                                <label class="form-check-label" for="cv_' . $resumeID . '">
                                    ID: ' . $resumeID . ' (Registered on: ' . $regDate . ')
                                </label>
                            </div>
                        ';
                    } ?>
                    <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                    <input type="hidden" name="job_id" value="<?php echo $job_id; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary" id="confirmButton" disabled>Confirm</button>
                </div>
            </div>
        </div>
    </div>
    
    
   
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">
                <div class="job_detail">
                    <div class="job_description active"><h5>Job specification</h5></div>
                    <div class="job_description shadow"><h5>Company</h5></div>
                </div>
                <h5> Job description</h5>
                <?php
                    echo $job_desc;
                ?>
                <br><br>
                <h5>Company address</h5>
                <?php
                    echo $addr;
                ?>
            </div>
            <div class="col-md-4">
                <div class="job_description left">
                    <h5 style="bold">Others jobs you may interest</h5>
                    
                        <?php while ($row = mysqli_fetch_assoc($result)) {
                            $jobID = $row['job_id'];
                            $jobName = $row['job_name'];
                            $companyName = $row['company_name'];
                            $salary = $row['salary'];
                            $area = $row['location'];
                            $src = $row['image'];
                        echo 
                        '<a href="company.php?job_id=' . $jobID . '", style="text-decoration: none; color: inherit";>
                            <div class="jobCard border p-4">
                            <div class="mb-2 fw-bold">'.$jobName.'</div>
                            <div class="d-flex flex-row rounded">
                                <img src="'.$src.'" alt="'.$companyName.'"
                                style="height: 80px; object-fit: scale-down;">
                                    <div style="margin-left: 10px;">
                                        <div>'.$companyName.'</div>
                                        <div><span><i class="bi bi-cash"></i></span>&nbsp;'.$salary.'</div>
                                        <div><span><i class="bi bi-geo-alt"></i></i></span>&nbsp;'.$area.'</div>
                                    </div>
                                </div>
                            </div>';
                        }
                        mysqli_free_result($result);
                        ?>
                        
                    </div>
                </div>
        </div>
    </div>
    <!-- Check if any CV has been selected -->
    <script>
        const form = document.getElementById('cvForm');
        const confirmButton = document.getElementById('confirmButton');

        form.addEventListener('change', function() {
            const selectedCV = form.querySelector('input[name="cv_id"]:checked');
            confirmButton.disabled = !selectedCV;
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <?php include "../Footer.php" ?>
</body>    
