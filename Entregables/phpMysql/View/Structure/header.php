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

<script src="<?php echo $shift ?>View/Assets/js/jquery-3.6.1.min.js"></script>
<script src="<?php echo $shift ?>View/Assets/js/bootstrap.bundlev5.2.1.min.js"></script>
<script src="<?php echo $shift ?>View/Assets/js/isotope.min.js"></script>
<script src="<?php echo $shift ?>View/Assets/js/owl-carousel.js"></script>
<script src="<?php echo $shift ?>View/Assets/js/tabs.js"></script>
<script src="<?php echo $shift ?>View/Assets/js/popup.js"></script>
<script src="<?php echo $shift ?>View/Assets/js/custom.js"></script>
<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <img src="<?php echo $shift ?>View/Assets/img/logo.svg" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="#"">Nose</a></li>
                            <li><a href=" #">Nose</a></li>
                        <li><a href="#">Nose</a></li>
                        <li><a href="#">Nose</a></li>
                        <li><a href="#">Home</a>
                        </li>
                    </ul>
                    <a class="menu-trigger">
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->