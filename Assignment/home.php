<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/home.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
</head>

<body>
    <?php include_once "./components/NavBar.php" ?>
    <!-- Carousel -->
    <div id="carouselExampleInterval" class="carousel slide mt-5" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
                <img src="./img/Carousel/job-banner.jpg" class="w-100" style="height: 337px; object-fit: cover;"
                    alt="...">
            </div>
            <div class="carousel-item" data-bs-interval="2000">
                <img src="./img/Carousel/job-banner2.jpg" class="w-100" style="height: 337px; object-fit: cover;"
                    alt="...">
            </div>
            <div class="carousel-item">
                <img src="./img/Carousel/job-banner3.jpg" class="w-100" style="height: 337px; object-fit: cover;"
                    alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- End Carousel -->

    <!-- Feature job -->
    <div class="container my-2 p-3 rounded shadow">
        <h5 class="">Outstanding career</h5>
        <div class="d-flex flex-row flex-wrap justify-content-evenly gap-3">
            <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center"
                style="width: 10rem; height: 12rem;">
                <img src="./img/PopularJob/1.webp" alt="..." style="height: 80px; object-fit: scale-down;">
                <div>
                    <div class="d-flex flex-row justify-content-center text-center py-0">
                        <div class="text-primary fw-bold mx-1">1,100 </div><span> jobs</span>
                    </div>
                    <p class="fw-bold">Wholesale - Retail - Store management</p>
                </div>
            </div>
            <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center"
                style="width: 10rem; height: 12rem;">
                <img src="./img/PopularJob/6.webp" alt="..." style="height: 80px; object-fit: scale-down;">
                <div>
                    <div class="d-flex flex-row justify-content-center text-center py-0">
                        <div class="text-primary fw-bold mx-1">1,100 </div><span> jobs</span>
                    </div>
                    <p class="fw-bold">Sales - Business</p>
                </div>
            </div>
            <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center"
                style="width: 10rem; height: 12rem;">
                <img src="./img/PopularJob/12.webp" alt="..." style="height: 80px; object-fit: scale-down;">
                <div>
                    <div class="d-flex flex-row justify-content-center text-center py-0">
                        <div class="text-primary fw-bold mx-1">1,100 </div><span> jobs</span>
                    </div>
                    <p class="fw-bold">Marketing</p>
                </div>
            </div>
            <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center"
                style="width: 10rem; height: 12rem;">
                <img src="./img/PopularJob/13.webp" alt="..." style="height: 80px; object-fit: scale-down;">
                <div>
                    <div class="d-flex flex-row justify-content-center text-center py-0">
                        <div class="text-primary fw-bold mx-1">1,100 </div><span> jobs</span>
                    </div>
                    <p class="fw-bold">Science - Technology</p>
                </div>
            </div>
            <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center"
                style="width: 10rem; height: 12rem;">
                <img src="./img/PopularJob/17.webp" alt="..." style="height: 80px; object-fit: scale-down;">
                <div>
                    <div class="d-flex flex-row justify-content-center text-center py-0">
                        <div class="text-primary fw-bold mx-1">1,100 </div><span> jobs</span>
                    </div>
                    <p class="fw-bold">Other occupations</p>
                </div>
            </div>
        </div>
    </div>
    <!-- End feature job -->

    <!-- Feature company -->
    <div class=" container d-flex flex-row my-4 justify-content-evenly gap-3">
        <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center shadow"
            style="width: 12rem; height: 10rem;">
            <img src="./img/Company/orange.webp" alt="..." style="height: 80px; object-fit: scale-down;">
            <div>
                6 currently recruiting position
            </div>
        </div>
        <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center shadow"
            style="width: 12rem; height: 10rem;">
            <img src="./img/Company/edupia.webp" alt="..." style="height: 80px; object-fit: scale-down;">
            <div>
                10 currently recruiting position
            </div>
        </div>
        <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center shadow"
            style="width: 12rem; height: 10rem;">
            <img src="./img/Company/home_credit.webp" alt="..." style="height: 80px; object-fit: scale-down;">
            <div>
                2 currently recruiting position
            </div>
        </div>
        <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center shadow"
            style="width: 12rem; height: 10rem;">
            <img src="./img/Company/ta.webp" alt="..." style="height: 80px; object-fit: scale-down;">
            <div>
                1 currently recruiting position
            </div>
        </div>
        <div class="jobCard d-flex flex-column bg-white rounded p-3 justify-content-center text-center shadow"
            style="width: 12rem; height: 10rem;">
            <img src="./img/Company/vus.webp" alt="..." style="height: 80px; object-fit: scale-down;">
            <div>
                2 currently recruiting position
            </div>
        </div>
    </div>
    <!-- End feature company -->

    <!-- Needed jobs -->
    <div class="border py-4 blue">
        <div class="container">
            <h4>Jobs are urgently recruited</h4>
            <div id="displayJobs" class="row spacing-3 gy-3">
            </div>
        </div>
    </div>
    <!-- End needed jobs -->

    <!-- Banner -->
    <div class="container my-4">
        <div class="row gy-3">
            <div class=" col-sm" style="min-width: 500px;">
                <a href="#"><img class=" jobCard img-fluid rounded" src="./img/Banner/banner-home-create-cv-small.png"
                        alt=""></a>
            </div>
            <div class=" col-sm" style="min-width: 500px;">
                <a href="#"><img class="jobCard img-fluid rounded" src="./img/Banner/banner-home-exploring-small.png"
                        alt=""></a>
            </div>
        </div>

    </div>
    <!-- End banner -->

    <?php include_once "./components/Footer.php" ?>
    <script>
    const apiEndpoint = 'http://localhost/Assignment/components/job/get_jobs.php';
    const display = document.getElementById('displayJobs');

    const getJobs = async () => {
        const response = await fetch(apiEndpoint);
        const songs = await response.json();
        return songs;
    };

    const displayJobs = async () => {
        const jobs = await getJobs();
        let output = '';
        jobs.forEach((job) => {
            output += `
                <div id=${job.job_id} class="col-sm" style="min-width: 500px;">
                    <div class="jobCard border p-4">
                        <div class="mb-2 fw-bold">${job.job_name}</div>
                        <div class="d-flex flex-row rounded">
                            <img src="${job.image}" alt="${job.job_name}"
                                style="height: 80px; object-fit: scale-down;">
                            <div style="margin-left: 10px;">
                                <div>${job.company_name}</div>
                                <div><span><i class="bi bi-cash"></i></span>&nbsp;${job.salary}</div>
                                <div><span><i class="bi bi-geo-alt"></i></i></span>&nbsp;${job.location}</div>
                            </div>
                        </div>
                    </div>
                </div>
        `;
        });
        display.innerHTML = output;
    };

    displayJobs();
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>