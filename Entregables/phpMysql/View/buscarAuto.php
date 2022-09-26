<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Assets/css/bootstrapv5.2.1.min.css">
    <script src="Assets/js/jquery-3.6.1.min.js"></script>
    <script src="Assets/js/jquery.inputmask.js"></script>
    <title>Buscar Auto</title>
</head>

<body>
    <form>
        <div class="mb-3">
            <label for="patenteInput" class="form-label">Patente: </label>
            <input type="text" class="form-control" id="xPatente" name="xPatente">
            <div id="emailHelp" class="form-text">La patente sigue el formato: AAA-000.</div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <script>
        $('#xPatente').inputmask('AAA−999');
    </script>
</body>

</html>