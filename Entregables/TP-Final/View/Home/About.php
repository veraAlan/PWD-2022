<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>

<!-- TODO Correct this page's style -->

<body>
    <?php include_once('../Structure/Header.php'); ?>

    <!-- About page contents -->
    <main>
        <div class="containerr text-center">
            <h1>About Us</h1>
            <img src="../Img/logo.svg" alt="Logo">
        </div>

        <div class="containerr text-center">
            <div class="row">
                <div class="col-lg-4">
                    <img class="iconn" src="../Img/alan.jpg" alt="" bd-placeholder-img rounded-circle" width="140" height="140">
                    <h2>Alan Vera</h2>
                    <p>Legajo FAI - 2622 <br>
                        Mail: alanvera.webdev@gmail.com <br>
                        Usuario GitHub: <b>veraAlan</b></p>
                    <p><a class="btn btn-secondary" target="_blank" href="https://github.com/veraAlan">GitHub</a></p>
                </div>
                <div class="col-lg-4">
                    <img class="iconn" src="../Img/aaron.jpg" alt="" bd-placeholder-img rounded-circle" width="140" height="140">
                    <h2>Aaron Acosta</h2>
                    <p>Legajo FAI - 2592 <br>
                        Mail Personal: acostademiann14@gmail.com <br>
                        Usuario GitHub: <b>acostaDemianAaron</b></p>
                    <p><a class="btn btn-secondary" target="_blank" href="https://github.com/acostaDemianAaron">GitHub</a></p>
                </div>
                <div class="col-lg-4">
                    <img class="iconn" src="../Img/santi.png" alt="" bd-placeholder-img rounded-circle" width="140" height="140">
                    <h2>Santiago Yaitul</h2>
                    <p>Legajo FAI - 2339 <br>
                        Mail Personal: santiago.yaitul@gmail.com <br>
                        Usuario GitHub: <b>SantiagoYaitul</b></p>
                    <p><a class="btn btn-secondary" target="_blank" href="https://github.com/SantiagoYaitul">GitHub</a></p>
                </div>
            </div>
        </div>
        <br><br><br>
    </main>

    <?php include_once('../Structure/Footer.php'); ?>
</body>

</html>