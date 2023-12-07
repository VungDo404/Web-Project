<nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Jobless</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="http://localhost/Assignment/home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/Assignment/components/cv/setting.php">Create CV</a>
                </li>
            </ul>
            <div class="d-inline my-2 my-lg-0">
                <?php 
                    if(isset($_COOKIE["user_id"])){
                        echo '<a class="btn btn-outline-primary me-2" href="http://localhost/Assignment/components/logout/logout.php">Log out</a>';
                    }else{
                        echo '<a class="btn btn-outline-primary me-2" href="http://localhost/Assignment/components/login/login_page.php">Log in</a>';
                        echo '<a class="btn btn-primary" href="http://localhost/Assignment/components/register/register.php">Sign up</a>';
                    }
                ?>

            </div>
        </div>
    </div>
</nav>