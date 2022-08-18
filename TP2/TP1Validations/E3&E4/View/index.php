<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    input{
        margin: 10px 0px;
        border-color: 0.7px solid gray;
    }

</style>

<body>
    <h1>Ingrese sus datos.</h1>
    <br/>
    <form action="../Controller/presentacion.php" method="GET" onsubmit="return validate()">
        Nombre: <input type="text" name="nombre" id="nombre"><br/>
        Apellido: <input type="text" name="apellido" id="apellido"><br/>
        Edad: <input type="number" name="edad" id="edad"><br/>
        Direccion: <input type="text" name="direccion" id="direccion"><br/>

        <input type="submit" value="Enviar" name="submit"> <!-- onclick="return validate()" -->
    </form>

    <script type="text/javascript">
        function validate(){
            names = ["nombre", "apellido", "edad", "direccion"];
            verified = true;

            // Iterates through all inputs and checks if something was inputted.
            for(i = 0; i < 4; i++){
                if(document.getElementById(names[i]).value == ""){
                    document.getElementById(names[i]).style.borderColor = "red";
                    verified = false;
                } else {
                    document.getElementById(names[i]).style.borderColor = "";
                }
            }

            return verified;
        }
    </script>
</body>
</html>