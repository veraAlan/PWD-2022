<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../Libraries/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../Libraries/Bootstrap/css/bootstrap.utilities.css" rel="stylesheet">
    <script src="../../Libraries/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Font Awesome Ref -->
    <link href="../../Libraries/FontAwesome/css/fontawesome.min.css" rel="stylesheet">
    <title>Login</title>
</head>

<body>
    <div class="container p-4">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Member Login
        </button>

        <!-- Modal -->
        <div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="btn-close m-0 position-absolute end-0 mx-2" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h5 class="modal-title mx-auto" id="exampleModalLabel">Member Login</h5>
                    </div>
                    <div class="modal-body p-3">
                        <form action="../Controller/">
                            <input class="col-12 px-2 mt-4" type="text" id="username" name="username" placeholder="Username"><i class="fa-solid fa-user"></i>
                            <input class="col-12 px-2 my-2" type="password" id="password" name="password" placeholder="Password">
                            <button type="button" class="btn btn-primary col-12 px-2">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>