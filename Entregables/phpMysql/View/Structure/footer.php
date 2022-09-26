<?php
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {
    $url = "https://";
} else {
    $url = "http://";
    $url .= $_SERVER['HTTP_HOST'];
    $url .= $_SERVER['REQUEST_URI'];
}
$url_components = parse_url($url);
$array_url = explode("/", $url_components['path']);
array_pop($array_url);
for ($i = 0; $i < 3; $i++) {
    array_shift($array_url);
}
$shift = "";
while (count($array_url) > 1) {
    $shift .= "../";
    array_pop($array_url);
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
    <link rel="stylesheet" href="<?php echo $shift ?>View/Assets/css/style.css">
</head>

<body>
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright ©</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>