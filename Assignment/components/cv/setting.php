<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 4 Table</title>
    <meta charset="utf-8" />
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
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
                    <input id="txtCreatedDate" type="text" placeholder="..." class="form-control mb-2 mr-sm-2 mb-sm-0" />
                    
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
        <form class="col-sm-12">
            <div class="form-group">
                <label for="Name">Name</label>
                <input type="text" class="form-control" id="Name">
            </div>
            <div class="form-group">
                <label for="Age">Age</label>
                <input type="text" class="form-control" id="Age">
            </div>
            <div class="form-group">
                <label for="Email">Email</label>
                <input class="form-control" type="text" placeholder="user@example.com" id="Email">
            </div>
            <div class="form-group">
                <label for="Address">Address</label>
                <input class="form-control" type="text" id="Address">
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label>Your skills</label>
                    <textarea id='Skills' class="form-control"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="Experience">Work experience</label>
                <input class="form-control" type="text" placeholder="Experience" id="Experience">
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
            </div>
            <div class="mb-3">
                <div class="form-group">
                    <label>About</label>
                    <textarea id='About' class="form-control" rows="5" placeholder="My Bio"></textarea>
                </div>
            </div>
            <button type="button" id="btnSave" class="btn btn-default">Save</button>
            <button type="button" id="btnCancel" class="btn btn-default">Cancel</button>
        </form>
        <div class="modal fade" id="modal-phone" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" >
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <section style="background-color: #eee;">
                    <div class="container ">
                        <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card rounded-3">
                            <div class="card-body p-4">

                                <h4 class="text-center my-3 pb-3">Phone number</h4>

                                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                    <input type="text" id="form1" class="form-control my-3" placeholder='Enter your phone number here'/>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" id='save1'>Save</button>
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
                </section>
                </div>
            </div>
        </div>
        <div class="modal fade" id="modal-certificate" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                <section style="background-color: #eee;">
                    <div class="container ">
                        <div class="row d-flex justify-content-center align-items-center ">
                        <div class="col">
                            <div class="card rounded-3">
                            <div class="card-body p-4">
                                <h4 class="text-center my-3 pb-3">Certificate</h4>
                                <form class="row row-cols-lg-auto g-3 justify-content-center align-items-center mb-4 pb-2">
                                <div class="col-12">
                                    <div class="form-outline">
                                    <input type="text" id="form2" class="form-control" placeholder="Name of the certificate" />
                                    <textarea id='Cert' class="form-control my-3" placeholder="About the certificate"></textarea>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-primary" id='save2'>Save</button>
                                </div>
                                </form>

                                <table class="table mb-4">
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
                </section>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script type="text/javascript">
        let grid, dialog;
        // let phones = [{valid:true,number:'123', id:''}]; 
        // let certificates = [{valid:true,description:'something', name:'', id:''}];
        let phones = []; 
        let certificates = [];
        function Edit(e) {
            $('#ID').val(e.data.record.ID);
            $('#Name').val(e.data.record.Name);
            $('#Age').val(e.data.record.Age);
            $('#Email').val(e.data.record.Email);
            $('#Description').val(e.data.record.Description);
            $('#Skills').val(e.data.record.Skills);
            $('#Experience').val(e.data.record.Experience);
            $('#Address').val(e.data.record.Address);
            /// Gọi php để nạp data vào phones với certificates dựa vào ID của resume là e.data.record.ID và render data vào phone-body và certificate-body (xem HTML phía trên) chỉ render các trường có valid === true
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
                    console.log(certificates)
                    renderCertificates();
                }
            });
            dialog.open();
        }
        function Save() {
            let record = {
                ID: $('#ID').val(),
                Name: $('#Name').val(),
                Gender: $('#Gender input:radio:checked').val(),
                Age: $('#Age').val(),
                Email: $('#Email').val(),
                Description: $('#About').val(),
                Skills: $('#Skills').val(),
                Experience: $('#Experience').val(),
                Address: $('#Address').val(),
            };
            record.phones = phones; 
            record.certificates = certificates; 
            console.log(record)
            $.ajax({ url: 'upsert.php', data: { record: record }, method: 'POST' })
                .done(function (response) {
                    // console.log(JSON.parse(response));
                    console.log(response);
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
                console.log(e.data.id)
                $.ajax({ url: 'delete.php', data: { id: e.data.id }, method: 'POST' })
                    .done(function (res) {
                        grid.reload();
                    })
                    .fail(function () {
                        alert('Failed to delete.');
                    });
            }
        }
        function DeletePhone(index) {
            phones[index].valid = false;
            renderPhones();
        }

        function DeleteCertificate(index) {
            certificates[index].valid = false;
            renderCertificates();
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
            console.log(phones)
            renderPhones();
        }

        function DeleteCertificate(index) {
            certificates[index].valid = false;
            renderCertificates();
        }
        $(document).ready(function () {
            grid = $('#grid').grid({
                primaryKey: 'ID',
                dataSource: 'fetch.php',
                uiLibrary: 'bootstrap4',
                columns: [
                    { field: 'ID', width: 48 },
                    { field: 'Name', sortable: true },
                    { field: 'CreatedDate', sortable: true },
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
                $('#Name').val('');
                $('#Age').val('');
                $('#Email').val('');
                $('#About').val('');
                $('#Skills').val('');
                $('#Experience').val('');
                $('#Address').val('');
                dialog.open('Add Resume');
            });
            $('#btnSave').on('click', Save);
            $('#btnCancel').on('click', function () {
                phones = []; 
                certificates = []; 
                dialog.close();
            });
            $('#btnSearch').on('click', function () {
                grid.reload({ name: $('#txtName').val(), CreatedDate: $('#txtCreatedDate').val() });
            });
            $('#btnClear').on('click', function () {
                $('#txtName').val('');
                grid.reload({ name: '', Age: '', Email:'',  });
            });
            $('#save1').on('click', function (e) {
                e.preventDefault(); 
                const phone = $('#form1').val();
                phones.push({valid:true,number:phone, id:''});
                console.log(phones)
                renderPhones();
                // console.log(phones)
            });
            $('#save2').on('click', function (e) {
                e.preventDefault();
                const desc = $('#Cert').val();
                const name = $('#form2').val();
                certificates.push({valid:true,description:desc, name:name, id:''});
                renderCertificates();
            });
            
        });
    </script>

</body>
</html>

