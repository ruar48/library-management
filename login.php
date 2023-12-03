<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css" type="text/css">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap');

    body {
        font-family: 'Ubuntu', sans-serif;
    }

    .d-block {
        width: 100%;
        height: 350px;
    }

    .top {
        margin-top: 10%;
    }

    #loader {
        position: fixed;
        left: 0px;
        top: 0px;
        width: 100%;
        height: 100%;
        z-index: 9999;
        background: url('assets/images/Dual Ring-1s-200px.png') 50% 50% no-repeat rgb(249, 249, 249);
        opacity: 1;
    }
    </style>
    <title>Log in</title>
</head>

<body class="m-0 d-flex justify-content-center">
    <div id="loader"></div>
    <div class="container bg-light text-black-50 rounded-3 mt-5 p-3 col-lg-6">
        <form class="p-md-5 d-flex flex-column login-form" id="logform">
            <h1 class="text-center">Login</h1>
            <div id="msg_login"></div>
            <div class="">
                <center><span id="myalert2"></span></center>
            </div>

            <div class="" id="myalert" style="display: none;">
                <div class="">
                    <center><span id="alerttext"></span></center>
                </div>
            </div>

            <div class="" id="myalert3" style="display: none;">
                <div class="">
                    <div class="alert alert-success" id="alerttext3"></div>
                </div>
            </div>
            <div class="mb-3">
                <label for="inputName" class="form-label">Email</label>
                <input type="email" class="form-control" name="inputName" id="inputName" placeholder="Email">
                <span class="email-error"></span>
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="inputPassword" id="inputPassword"
                    placeholder="************">
                <span class="pass-error"></span>
            </div>
            <button type="button" class="btn btn-primary rounded-5 px-5 w-50 py-2 align-self-center"
                id="login-button">Submit</button>
            <div class="col d-flex gap-1 gap-sm-5 justify-content-between flex-row-reverse mt-5">
                <a href="admin/index.php" class="text-decoration-none">Login as Admin</a>
                <div class="text-start">Don't have an account? <a href="registration.php"
                        class="ps-2 text-decoration-none">Signup Now!</a></div>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script>
    $(window).on('load', function() {
        setTimeout(function() {
            $('#loader').fadeOut('slow');
        });
    });

    $(document).on('click', '#login-button', function() {
        var inputName = $('#inputName').val();
        var inputPassword = $('#inputPassword').val();

        if (inputName !== '' && inputPassword !== '') {
            $('#myalert').slideUp();
            $('#myalert3').slideUp();

            var logform = $('#logform').serialize();

            $.ajax({
                method: 'POST',
                url: 'config/login.php',
                data: logform,
                success: function(data) {
                    if (data == 1 || data == 2 || data == 3) {
                        $('#myalert3').slideDown();
                        $('#alerttext3').html(
                            '<i class="fa fa-check"></i> Login Successful. User Verified!');
                        $('#login-button').text('Login');
                        $('#logform')[0].reset();
                        $('#myalert').hide();
                        $('#alerttext').hide();
                        $('#myalert2').hide();
                        $('#alerttext2').hide();

                        setTimeout(function() {
                            // Redirect based on the role received from the server
                            var redirectPath;
                            if (data == 1) {
                                redirectPath = '/library-management/admin/index.php';
                            } else if (data == 2) {
                                redirectPath = '/library-management/staff/index.php';
                            } else if (data == 3) {
                                redirectPath = '/library-management/user/index.php';
                            } else {
                                console.error('Invalid role received from the server.');
                                return;
                            }

                            window.location.href = redirectPath;
                        }, 1000);
                    } else {
                        // Handle unsuccessful login
                        $('#myalert').slideDown();
                        $('#alerttext').html(data);
                        $('#logtext').text('Login');
                        $('#logform')[0].reset();
                        $('#myalert2').hide();
                        $('#alerttext3').hide();
                    }
                }
            });
        } else {
            // Handle case where input fields are not filled
            $('#myalert2').slideDown();
            $('#myalert').hide();
            $('#alerttext3').hide();
            $('#myalert2').html(
                '<div class="alert alert-warning err_msg"><i class="fa fa-info"></i> Please input both fields/select to Login</div>'
            );
            $('#logtext').text('Login');
            $('#logform')[0].reset();
        }
    });
    </script>
</body>

</html>