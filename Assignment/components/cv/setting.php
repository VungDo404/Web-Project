<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 4 Table</title>
    <meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="../../css/preview.css">
    <link href='https://fonts.googleapis.com/css?family=Lato:400,300,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>
<style>
    #dialog{
        width: 60vw !important;
        max-height: 100%;
        overflow: auto;
    }
</style>
<body>
    <?php
        if(!isset($_COOKIE["user_id"])){
            header("Location: http://localhost/Assignment/components/login/login_page.php");
        }
    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-9">
                <form class="form-inline">
                    <input id="txtName" type="text" placeholder="Name..." class="form-control mb-2 mr-sm-2 mb-sm-0" />
                    
                    <button id="btnSearch" type="button" class="btn btn-default">Search</button> &nbsp;
                    <button id="btnClear" type="button" class="btn btn-default">Clear</button>
                </form>
            </div>
            <div class="col-3">
                <button id="btnAdd" type="button" class="btn btn-default pull-right">Add New Record</button>
            </div>
        </div>
        <div class="row" style="margin-top: 10px">
            <div class="col-12">
                <table id="grid"></table>
            </div>
        </div>
    </div>

    <div id="dialog" style="display: none">
        <input type="hidden" id="ID" />
        <form class="col-sm-12" id='form-cv'>
            <div class="form-group">
                <label for="firstName">First Name</label>
                <input type="text" class="form-control" id="firstName" minlength='2' name="firstName" required>
            </div>
            <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" class="form-control" id="lastName" minlength='2' name="lastName" required>
            </div>
            <div class="form-group">
                <label for="Age">Age</label>
                <input type="text" class="form-control" id="Age" name="Age" required>
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input class="form-control" type="text" placeholder="user@example.com" id="Email" name="Email" required>
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input class="form-control" type="text" id="Address" name="Address" required>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label>Your skills</label>
                    <textarea id='Skills' class="form-control" name="Skills" required></textarea>
                </div>
            </div>
            <fieldset class="form-group">
                <div class="row" id="Gender">
                <legend class="col-form-label col-sm-2 pt-0 mr-1">Gender</legend>
                <div class="col-sm-10">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="male" checked>
                        <label class="form-check-label">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="female">
                        <label class="form-check-label">
                            Female
                        </label>
                    </div>
                </div>
                </div>
            </fieldset>
            <div class="form-group">
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-phone">
                    Add phone number here
                </button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-certificate">
                    Add your certificates here
                </button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-experience">
                    Add your experience here
                </button>
                <button type="button" class="btn btn-light" data-toggle="modal" data-target="#modal-project">
                    Add your projects here
                </button>
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label>About</label>
                    <textarea id='About' class="form-control" rows="5" placeholder="My Bio" name="About" required></textarea>
                </div>
            </div>
            <button type="button" id="btnSave" class="btn btn-default">Save</button>
            <button type="button" id="btnCancel" class="btn btn-default">Cancel</button>
            <span class='preview'></span>
        </form>
        <div class="modal fade" id="modal-phone" role="dialog"  data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Phone</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="container ">
                        <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card rounded-3">
                            <div class="card-body p-4">
                                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2" id='phone-form' >
                                <div class="col-12">
                                    <div class="form-outline">
                                    <input type="text" id="form1" class="form-control my-3" placeholder='Enter your phone number here' name="Phone"/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" id='save1'>Add</button>
                                </div>
                                </form>

                                <table class="table mb-4">
                                <thead>
                                    <tr>
                                    <th scope="col">Number</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id='phone-body'>
                                </tbody>
                                </table>

                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-certificate" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Certificate</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="container ">
                        <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card rounded-3">
                            <div class="card-body p-4">
                                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                    <input type="text" id="form2" class="form-control" placeholder="Name of the certificate" />
                                    <textarea id='Cert' class="form-control my-3" placeholder="About the certificate"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" id='save2'>Add</button>
                                </div>
                                </form>

                                <table class="table mb-4 accordion table2">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id='certificate-body'>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-project" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Project</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="container ">
                        <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card rounded-3">
                            <div class="card-body p-4">
                                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                    <input type="text" id="project-name" class="form-control" placeholder="Name of the project" />
                                    <input type="text" id="project-url" class="form-control my-3" placeholder="The link to your project" />
                                    <textarea id='project-description' class="form-control my-3" placeholder="About the project"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" id='save3'>Add</button>
                                </div>
                                </form>

                                <table class="table mb-4">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id='project-body'>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="modal-experience" role="dialog" data-backdrop="static">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Experience</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <div class="container ">
                        <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card rounded-3">
                            <div class="card-body p-4">
                                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                    <input type="text" id="experience-name" class="form-control" placeholder="Name of the company you've worked at" />
                                    <input type="text" id="experience-address" class="form-control my-3" placeholder="The location" />
                                    <textarea id='experience-description' class="form-control my-3" placeholder="How long you've been in that work"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" id='save4'>Add</button>
                                </div>
                                </form>

                                <table class="table mb-4">
                                <thead>
                                    <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody id='experience-body'>
                                </tbody>
                                </table>
                            </div>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
<div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="container">
        <div class="header">
            <div class="full-name">
            <span class="first-name"></span> 
            <span class="last-name"></span> 
            </div>
            <div class="contact-info">
                <span class="email">Email: </span>
                <span class="email-val"></span>
                <span class="separator"></span>
                <span class="phone">Contact me via these/this phone-number(s): </span>
                <span class="phone-val"></span>
                <span class="address">Address: </span>
                <span class="address-val"></span>
            </div>
            
            <div class="about">
                <span class="position">About </span>
                <span class="desc">
                    
                </span>
            </div>
        </div>
        <div class="details">
        <div class="section">
                <div class="section__title">
                    Basic Information
                </div>
                <div class="section__list">
                    <span class="section__list-item">
                        <span class='age'>Age: </span>
                        <span class='age-val'> </span>
                    </span>
                    <span class="section__list-item">
                        <span class='gender'>Gender: </span>
                        <span class='gender-val'> </span>
                    </span>
                </div>
            </div>
            <div class="section">
            <div class="section__title">Experience</div>
            <div class="section__list experience">
                

            </div>
            </div>
            <div class="section">
                <div class="section__title">Education</div>
                <div class="section__list education">
                    <div class="section__list-item">
                    <div class="left">
                        <div class="name">Sample Institute of technology</div>
                        <div class="addr">San Fr, CA</div>
                        <div class="duration">Jan 2011 - Feb 2015</div>
                    </div>
                    <div class="right">
                        <div class="name">Fr developer</div>
                        <div class="desc">did This and that</div>
                    </div>
                    </div>
                    <div class="section__list-item">
                    <div class="left">
                        <div class="name">Akount</div>
                        <div class="addr">San Monica, CA</div>
                        <div class="duration">Jan 2011 - Feb 2015</div>
                    </div>
                    <div class="right">
                        <div class="name">Fr developer</div>
                        <div class="desc">did This and that</div>
                    </div>
                    </div>

                </div>
            </div>
            <div class="section">
                <div class="section__title">Projects</div> 
                <div class="section__list project">
                    
                    
                    
                </div>
            </div>
            <div class="section">
                <div class="section__title">Skills</div>
                <div class="skills">

                </div>
            </div>
            
        </div>
    </div>
    </div>
    </div>
</div>
</div>

    <script type="text/javascript">
        let grid, dialog;
        // let phones = [{valid:true,number:'123', id:''}]; 
        // let certificates = [{valid:true,description:'something', name:'', id:''}];
        // let projects = [{valid:true,description:'something', name:'', id:'', url:''}];
        // let experience = [{valid:true,description:'something', name:'', id:'', address:''}];
        let phones = []; 
        let certificates = [];
        let projects = [];
        let experience = [];
        function isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        }
        function isValidAge(age) {
            return !isNaN(parseInt(age, 10));
        }
        function isValidPhoneNumber(phoneNumber) {
            const phoneRegex = /^0\d{9}$/;
            return phoneRegex.test(phoneNumber);
        }

        function Edit(e) {
            $('#ID').val(e.data.record.ID);
            $('#firstName').val(e.data.record.firstName);
            $('#lastName').val(e.data.record.lastName);
            $('#Age').val(e.data.record.Age);
            $('#Email').val(e.data.record.Email);
            $('#About').val(e.data.record.About);
            $('#Skills').val(e.data.record.Skills);
            $('#Address').val(e.data.record.Address);
            
            // $.ajax()
            $.ajax({
                url: 'load_phone.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    phones = JSON.parse(response);
                    renderPhones();
                }
            });

            $.ajax({
                url: 'load_certificate.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    certificates = JSON.parse(response);
                    renderCertificates();
                }
            });
            $.ajax({
                url: 'load_project.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    projects = JSON.parse(response);
                    console.log(projects)
                    renderProject();
                },
        
            });
            $.ajax({
                url: 'load_experience.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    experience = JSON.parse(response);
                    renderExperience();
                },
            });
            
            dialog.open();

        }
        function Preview(e){
            $('.bd-example-modal-lg').modal('show');
            console.log(e.data.record.firstName, e.data.record.lastName)
            $('.first-name').text(e.data.record.firstName); 
            $('.last-name').text(e.data.record.lastName); 
            $('.email-val').text(e.data.record.Email); 
            $.ajax({
                url: 'load_phone.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    phones = JSON.parse(response);
                    let phoneNumbers = ''; 
                    for(phone in phones){
                        phoneNumbers += phone.number ; 
                    }
                    if(phoneNumbers !== ''){
                        $('.phone-val').show();
                        $('.phone').show();
                        $('.phone-val').text(phoneNumbers);
                    }else{
                        $('.phone-val').hide();
                        $('.phone').hide();
                    }
                }
            });

            $.ajax({
                url: 'load_certificate.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    certificates = JSON.parse(response);
                    let education = ''; 
                    console.log(certificates)
                    certificates.forEach((certificate,index) => {
                    if(index % 2 === 0){
                        education += `
                            <div class="section__list-item">
                                <div class="left">
                                    <div class="name">${certificate.name}</div>
                                    <div class="addr">${certificate.description}</div>
                                </div>`;
                        if(index === certificates.length - 1) education += '</div>'; 
                    }else{
                        education += `
                                <div class="right">
                                    <div class="name">${certificate.name}</div>
                                    <div class="addr">${certificate.description}</div>
                                </div>
                            </div>`;
                    }
                    });
                    $('.education').html(education);
                }
            });

            $.ajax({
                url: 'load_experience.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    experience = JSON.parse(response);
                    let html = ''; 
                    experience.forEach((exp,index) => {
                    if(index % 2 === 0){
                        html += `
                            <div class="section__list-item">
                                <div class="left">
                                    <div class="name">${exp.name}</div>
                                    <div class="addr">${exp.address}</div>
                                    <div class="duration">${exp.description}</div>
                                </div>`;
                        if(index === experience.length - 1) html += '</div>'; 
                    }else{
                        html += `
                                <div class="right">
                                    <div class="name">${exp.name}</div>
                                    <div class="addr">${exp.address}</div>
                                    <div class="duration">${exp.description}</div>
                                </div>
                            </div>`;
                    }
                    });
                    $('.experience').html(html);
                }
            });

            $.ajax({
                url: 'load_project.php',
                method: 'POST',
                data: { resume_id: e.data.record.ID },
                success: function (response) {
                    projects = JSON.parse(response);
                    let html = ''; 
                    projects.forEach((project,index) => {
                        html += `
                        <div class="section__list-item">
                            <div class="name">${project.name}</div>
                            <div class="text">${project.description} 
                            <a href="/${project.url}">link</a>
                            </div>
                        </div>`;
                    });
                    $('.project').html(html);
                }
            });
            
            $('.address-val').text(e.data.record.Address);
            $('.gender-val').text(e.data.record.Gender);
            $('.age-val').text(e.data.record.Age);
            $('.skills').text(e.data.record.Skills);
            $('.desc').text(e.data.record.About);
            
            console.log(e.data.record)
        }
        function Save() {
            let record = {
                ID: $('#ID').val(),
                firstName: $('#firstName').val(),
                lastName: $('#lastName').val(),
                Gender: $('#Gender input:radio:checked').val(),
                Age: $('#Age').val(),
                Email: $('#Email').val(),
                Description: $('#About').val(),
                Skills: $('#Skills').val(),
                Address: $('#Address').val(),
            };
            record.phones = phones; 
            record.certificates = certificates; 
            record.projects = projects; 
            record.experience = experience;
            console.log(record)
            if (!record.firstName) {
                alert('Name cannot be empty. Please enter a name.');
                return; 
            }
            if (!record.Age) {
                alert('Age cannot be empty.');
                return; 
            }
            if (!isValidAge(record.Age)){
                alert('Invalid age. Please enter a valid number for age.');
                return;
            }
            if (!record.Email) {
                alert('Email cannot be empty.');
                return; 
            }
            if (!isValidEmail(record.Email)){
                alert('Invalid email address. Please enter a valid email.');
                return;
            }
            if (!record.Description) {
                alert('Description cannot be empty.');
                return; 
            }
            if (!record.Skills) {
                alert('Skills cannot be empty.');
                return; 
            }
            if (!record.Address) {
                alert('Address cannot be empty.');
                return; 
            }
            $.ajax({ url: 'upsert.php', data: { record: record }, method: 'POST' })
                .done(function (response) {
                    console.log(response)
                    phones = []; 
                    certificates = []; 
                    experience = [];
                    projects = [];
                    dialog.close();
                    grid.reload();
                })
                .fail(function () {
                    alert('Failed to save.');
                    dialog.close();
                });
        }
        function Delete(e) {
            if (confirm('Are you sure?')) {
                $.ajax({ url: 'delete.php', data: { id: e.data.id }, method: 'POST' })
                    .done(function (res) {
                        grid.reload();
                    })
                    .fail(function () {
                        alert('Failed to delete.');
                    });
            }
        }
        function DeleteProject(index) {
            projects[index].valid = false;
            renderProject();
        }

        function DeleteExperience(index) {
            experience[index].valid = false;
            renderExperience();
        }
        function renderProject() {
            $('#project-name').val('');
            $('#project-url').val('');
            $('#project-description').val('');
            let html = ''; 
            projects.forEach(function (project, index) {
                if (project.valid) {
                    html += `<tr><td>${project.name}</td><td><button type="button" class="btn btn-danger" onclick="DeleteProject(${index})">Delete</button></td></tr>`;
                }
            });
            $('#project-body').html(html);
        }

        function renderExperience() {
            $('#experience-name').val('');
            $('#experience-address').val('');
            $('#experience-description').val('');
            // let experience = [{valid:true,description:'something', name:'', id:'', address:''}];
            let html = '';
            experience.forEach(function (exp, index) {
                if (exp.valid) {
                    html += `<tr><td>${exp.name}</td><td><button type="button" class="btn btn-danger" onclick="DeleteExperience(${index})">Delete</button></td></tr>`;
                    
                }
            });
            $('#experience-body').html(html);
        }
        function DeleteProject(index) {
            projects[index].valid = false;
            renderProject();
        }

        function DeleteExperience(index) {
            experience[index].valid = false;
            renderExperience();
        }
        function renderPhones() {
            $('#form1').val('');
            let html = ''; 
            phones.forEach(function (phone, index) {
                if (phone.valid) {
                    html += `<tr><td>${phone.number}</td><td><button type="button" class="btn btn-danger" onclick="DeletePhone(${index})">Delete</button></td></tr>`;
                }
            });
            $('#phone-body').html(html);
        }

        function renderCertificates() {
            $('#form2').val('');
            $('#Cert').val('');
            // let certificates = [{valid:true,description:'something', name:'', id:''}];
            let html = '';
            certificates.forEach(function (certificate, index) {
                if (certificate.valid) {
                    html += `<tr><td>${certificate.name}</td><td><button type="button" class="btn btn-danger" onclick="DeleteCertificate(${index})">Delete</button></td></tr>`;
                    
                }
            });
            $('#certificate-body').html(html);
        }
        function DeletePhone(index) {
            phones[index].valid = false;
            renderPhones();
        }

        function DeleteCertificate(index) {
            certificates[index].valid = false;
            renderCertificates();
        }
        $('#modal-phone').on('show.bs.modal', function (e) {
            renderPhones();
        })
        $('#modal-certificate').on('show.bs.modal', function (e) {
            renderCertificates();
        })
        $('#modal-experience').on('show.bs.modal', function (e) {
            renderExperience();
        })
        $('#modal-project').on('show.bs.modal', function (e) {
            renderProject();
        })
        $(document).ready(function () {
            grid = $('#grid').grid({
                primaryKey: 'ID',
                dataSource: 'fetch.php',
                uiLibrary: 'bootstrap4',
                columns: [
                    { field: 'ID', width: 48 },
                    { field: 'firstName', sortable: true },
                    { field: 'CreatedDate', sortable: true },
                    { title: '', field: 'Preview', width: 45, type: 'icon', icon: 'fa fa-eye', tooltip: 'Preview', events: { 'click': Preview } },
                    { title: '', field: 'Edit', width: 42, type: 'icon', icon: 'fa fa-pencil', tooltip: 'Edit', events: { 'click': Edit } },
                    { title: '', field: 'Delete', width: 42, type: 'icon', icon: 'fa fa-remove', tooltip: 'Delete', events: { 'click': Delete } }
                ],
                pager: { limit: 2, sizes: [2, 5, 10, 100] }
            });
            dialog = $('#dialog').dialog({
                uiLibrary: 'bootstrap4',
                iconsLibrary: 'fontawesome',
                autoOpen: false,
                modal: true, 
                resizable: true
            });
            $('#btnAdd').on('click', function () {
                $('#ID').val('');
                $('#firstName').val('');
                $('#lastName').val('');
                $('#Age').val('');
                $('#Email').val('');
                $('#About').val('');
                $('#Skills').val('');
                $('#Address').val('');
                phones = []; 
                certificates = [];
                experience = [];
                projects = [];
                dialog.open('Add Resume');
            });
            $('#btnSave').on('click', Save);
            $('#btnCancel').on('click', function () {
                phones = []; 
                certificates = []; 
                experience = [];
                projects = [];
                dialog.close();
            });
            $('#btnSearch').on('click', function () {
                grid.reload({ firstName: $('#txtName').val() });
            });
            $('#btnClear').on('click', function () {
                $('#txtName').val('');
                grid.reload({ firstName: '' });
            });
            $('#save1').on('click', function (e) {
                e.preventDefault(); 
                const phone = $('#form1').val();
                if (!isValidPhoneNumber(phone)){
                    alert('Invalid phone number. Please enter a valid 10-digit number starting with 0.');
                    return;
                }
                phones.push({valid:true,number:phone, id:''});
                renderPhones();
            });
            $('#save2').on('click', function (e) {
                e.preventDefault();
                const desc = $('#Cert').val();
                const name = $('#form2').val();
                certificates.push({valid:true,description:desc, name:name, id:''});
                renderCertificates();
            });
            $('#save3').on('click', function (e) {
                e.preventDefault();
                const name = $('#project-name').val();
                const url = $('#project-url').val();
                const desc = $('#project-description').val();
                projects.push({valid:true,description:desc, name:name, id:'', url});
                renderProject();
            });
            $('#save4').on('click', function (e) {
                e.preventDefault();
                const name = $('#experience-name').val();
                const addr = $('#experience-address').val();
                const desc = $('#experience-description').val();
                experience.push({valid:true,description:desc, name:name, id:'',address: addr });
                renderExperience();
            });
            $("#phone-form").validate({
                rules: {
                    form1: {
                        number: true
                    }
                },
                messages:{
                    number: 'Please enter the valid phone number'
                }
            });
            $("#form-cv").validate({
                rules: {
                    firstName: {
                        required: true,
                        minlength: 2
                    },
                    Age: {
                        required: true,
                        number: true
                    },
                    Email: {
                        required: true,
                        email: true
                    },
                    Address: {
                        required: true
                    },
                    Skills: {
                        required: true
                    },
                    About: {
                        required: true
                    },
                },
                messages: {
                    firstName: {
                            required: 'This field is required'
                            
                    },
                    Age: {
                        required: 'This field is required',
                        number: 'Age must be a number'
                    },
                    Email: {
                        required: 'This field is required',
                        email: 'Please enter a valid email format'
                    },
                    Address: {
                        required: 'This field is required'
                    },
                    Skills: {
                        required: 'This field is required'
                    },
                    About: {
                        required: 'This field is required'
                    },
                },
            });
        });
        
    </script>

</body>
</html>


