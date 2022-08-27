<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap Ref -->
    <link href="../../../../Utilidades/Bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../../../../Utilidades/Bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- Font Awesome Ref -->
    <script src="https://kit.fontawesome.com/030b0c9fc7.js" crossorigin="anonymous"></script>
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
                        <h2 class="modal-title mx-auto mt-3 mb-5 text-center" id="exampleModalLabel">Member Login</h2>
                        <form class="needs-validation" action="../Controller/verificarPass.php" method="POST">
                            <div class="form-floating mb-4 p-1">
                                <i class="fa fa-user fa-xl position-absolute top-50 ms-2"></i>
                                <input type="text" class="form-control ps-5 py-2" id="username" name="username" placeholder="Username" required>
                                <label for="username" class="ps-5">Username</label>
                                <div class="invalid-feedback position-absolute">
                                    Completa este campo
                                </div>
                                <div class="valid-feedback position-absolute">
                                    Excelente!
                                </div>
                            </div>
                            <div class="form-floating mb-4 p-1">
                                <i class="fa fa-lock fa-xl position-absolute top-50 ms-2"></i>
                                <input type="password" class="form-control ps-5 py-2" id="password" name="password" placeholder="Password" required>
                                <label for="password" class="ps-5">Password</label>
                                <div id="feedback" class="invalid-feedback position-absolute"></div>
                                <div class="valid-feedback position-absolute">
                                    Excelente!
                                </div>
                            </div>

                            <button class="w-100 btn btn-lg text-white mb-5" type="submit" style="background-color: #04AA6D" onclick="return isValid()">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        (function() {
            const inputs = document.querySelectorAll('.form-control')

            inputs[0].addEventListener('change', event => {
                if (inputs[0].value != "") {
                    inputs[0].classList.remove("is-invalid")
                    inputs[0].classList.add("is-valid")
                } else {
                    inputs[0].classList.remove("is-valid")
                    inputs[0].classList.add("is-invalid")
                }
            })

            inputs[1].addEventListener('change', event => {
                if (checkPass(inputs[1])) {
                    inputs[1].classList.remove("is-invalid")
                    inputs[1].classList.add("is-valid")
                } else {
                    inputs[1].classList.remove("is-valid")
                    inputs[1].classList.add("is-invalid")
                }
            })
        })()

        function checkPass(passElement) {
            pass = passElement.value;
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
                document.querySelector("#feedback").innerHTML = "Tiene que ser de mas de 8 caracteres."
            } else if(!(hasNum && hasLet)){
                document.querySelector("#feedback").innerHTML = "Requiere al menos un numero y una letra."
            }

            return (hasNum && hasLet);
        }

        function isValid(){
            valid = document.querySelectorAll(".is-valid");

            return valid.length == 2;
        }
    </script>
</body>

</html>