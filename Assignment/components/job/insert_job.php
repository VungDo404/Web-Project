<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = 'MyResume';

    // Create a connection
    $conn = mysqli_connect($servername, $username, $password, $databasename);

// Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    // $sql = "TRUNCATE TABLE jobs";
    // mysqli_query($conn, $sql);
    $sql = "INSERT INTO jobs (job_name, company_name, salary, location, image, reg_date, job_description, company_address)
    VALUES ('Software Engineer', 'ABC Technologies', '$100,000', 'New York', 'https://picsum.photos/id/230/300/300', 
        '2023-12-31', 
        'We are seeking a talented and experienced Software Engineer to join our dynamic development team. As a Software Engineer, you will be responsible for designing, developing, and implementing high-quality software solutions. You will collaborate with cross-functional teams to analyze user requirements, translate them into technical specifications, and deliver robust software applications.',
         '123 Main Street, New York, NY'),
           ('Data Analyst', 'XYZ Analytics', '$60,000', 'Town ABC', 'https://picsum.photos/id/231/300/300', '2023-12-15', 
           'We are seeking a skilled Data Analyst to join our team at XYZ Analytics. In this role, you will be responsible for analyzing and interpreting complex data sets to provide actionable insights and support data-driven decision-making. The ideal candidate should have strong analytical skills, proficiency in data manipulation and visualization tools, and the ability to communicate findings effectively.',
           '123 Main Street'),
           ('Marketing Specialist', 'Marketing Co.', '$70,000', 'Metropolis', 'https://picsum.photos/id/232/300/300', '2023-12-25',
           'Join our dynamic Marketing team at Marketing Co. as a Marketing Specialist. In this role, you will be responsible for planning and executing marketing campaigns, conducting market research, and analyzing consumer trends. The ideal candidate should have a strong understanding of digital marketing strategies, excellent communication skills, and a passion for creativity and innovation.',
           '10 Market Square'),
           ('Software Engineer', 'ABC Tech', '$80,000', 'City XYZ', 'https://picsum.photos/id/233/300/300', '2024-4-1',
           'ABC Tech is looking for a talented Software Engineer to join our development team. As a Software Engineer, you will be involved in the design, development, and maintenance of our software applications. The ideal candidate should have strong programming skills, experience with modern web development frameworks, and a passion for building scalable and efficient software solutions.',
           '100 First Street'),
           ('Data Analyst', 'XYZ Analytics', '$60,000', 'Town ABC', 'https://picsum.photos/id/234/300/300','2024-6-1',
           'Are you a detail-oriented individual with a passion for data analysis? Join our team at XYZ Analytics as a Data Analyst. In this role, you will be responsible for collecting, cleaning, and analyzing data to identify trends and patterns. You will also collaborate with cross-functional teams to develop data-driven solutions and provide insights to support business objectives.',
           '456 Elm Avenue'),
           ('Marketing Specialist', 'Marketing Co.', '$70,000', 'Metropolis', 'https://picsum.photos/id/235/300/300', '2023-12-31',
           'Marketing Co. is seeking a talented Marketing Specialist to join our team. As a Marketing Specialist, you will be responsible for developing and implementing marketing strategies, managing social media campaigns, and analyzing marketing performance metrics. The ideal candidate should have strong project management skills, a creative mindset, and a deep understanding of digital marketing trends.',
           '30 Central Avenue')
           ";

// Execute the query
if ($conn->query($sql) === TRUE) {
    echo "Data inserted or updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>