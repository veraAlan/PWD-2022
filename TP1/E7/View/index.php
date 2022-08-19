<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="../Controller/calculator.php" method="GET" onsubmit="return validate()">
        <input type="text" id="stValue" name="stValue"><br />
        <input type="text" id="ndValue" name="ndValue"><br />
        <select id="operand" name="operand">
            <option value="sum">Suma</option>
            <option value="sub">Resta</option>
            <option value="mult">Multiplicacion</option>
            <option value="div">Division</option>
        </select>
        <input type="submit" name="submit">
    </form>

    <script type="text/javascript">
        function validate() {
            const stValue = parseInt(document.querySelector("#stValue").value);
            const ndValue = parseInt(document.querySelector("#ndValue").value);

            if(!isNaN(stValue) && !isNaN(ndValue)){
                return true;
            } else {
                isNaN(stValue) ? document.querySelector("#stValue").style.borderColor = "red" : document.querySelector("#stValue").style.borderColor = "";
                isNaN(ndValue) ? document.querySelector("#ndValue").style.borderColor = "red" : document.querySelector("#ndValue").style.borderColor = "";

                return false;
            }
        }
    </script>
</body>

</html>