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
    <link href="../../Libraries/FontAwesome/css/all.min.css" rel="stylesheet">
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
                    <div class="modal-body px-5">
                        <button type="button" class="btn-close m-1 position-absolute end-0 top-0" style="background-size: 10px" data-bs-dismiss="modal" aria-label="Close"></button>
                        <h3 class="modal-title mx-auto mt-3 mb-5 text-center" id="exampleModalLabel">Member Login</h3>
                        <form action="../Controller/verificarPass.php" method="POST">
                            <div class="form-floating">
                                <i class="fa fa-user fa-xl position-absolute top-50 ms-3"></i>
                                <input type="text" class="form-control ps-5" id="username" name="username" placeholder="Username" required>
                                <label for="username" class="ps-5">Username</label>
                            </div>
                            <div class="form-floating">
                                <i class="fa fa-lock fa-xl position-absolute top-50 ms-3"></i>
                                <input type="password" class="form-control ps-5 my-3" id="password" name="password" placeholder="Password" required>
                                <label for="password" class="ps-5">Password</label>
                            </div>

                            <button class="w-100 btn btn-lg text-white mb-5" type="submit" style="background-color: #04AA6D" onclick="return validate();">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        (() => {
            'use strict'

            const forms = document.querySelectorAll('.needs-validation')

            Array.form(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()

        function validate() {
            pass = document.querySelector("#password").value;
            username = document.querySelector("#username").value;
            var hasNum = false,
                hasLet = false,
                passLen = false;

            if (pass.length >= 8 && pass != username) {
                passLen = true;
                let i = 0;

                while (pass.length > i) {
                    pass[i].match(/[0-9]/i) ? hasNum = (hasNum || true) : hasNum;
                    pass[i].match(/[a-z]/i) ? hasLet = (hasLet || true) : hasLet;
                    i++;
                }
            }

            if(!passLen){
                alert("La contrasenia necesita mas de 8 caracteres.");
            } else if(!(hasNum && hasLet)){
                alert("La contrasenia requiere al menos un numero y una letra.");
            }

            return (hasNum && hasLet);
        }
    </script>
</body>

</html>