<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:400,700">
  <title>Log in</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <link rel="stylesheet" href="css/main.css" type="text/css">
</head>

<body class="m-0">


  <div class="container bg-light text-black-50 rounded-3 mt-5 p-3">

    <form class="p-md-5 d-flex flex-column login-form">
      <h1 class="text-center">Login</h1>

      <div class="mb-3">
        <label for="inputName" class="form-label">Username:</label>

        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Name">

        <p class="alert-danger text-danger mt-2">Please enter a valid username!</p>
      </div>
      <div class="mb-3">
        <label for="inputPassword" class="form-label">Password</label>
        <input type="password" class="form-control" name="inputPassword" id="inputPassword" placeholder="">

        <p class="alert-danger text-danger mt-2">Wrong password!</p>
      </div>
      <button type="submit" class="btn btn-primary rounded-5 px-5 w-50  py-2 align-self-center">Submit</button>
      <div class="col d-flex gap-1 gap-sm-5 justify-content-between flex-row-reverse mt-5">
        <a href="admin/index.php" class="text-decoration-none">Login as Admin</a>
        <div class="text-start">Don't have an account? <a href="registration.php"
            class="ps-2 text-decoration-none">Signup
            Now!</a>
        </div>
      </div>
    </form>
  </div>
</body>

</html>