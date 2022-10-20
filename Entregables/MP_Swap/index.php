<?php
include_once("./View/Structure/header.php");
include_once("config.php");
require $ROOT . 'vendor/autoload.php';

// Mercadopago integration works with test.
MercadoPago\SDK::setAccessToken("TEST-3707982167170600-101500-7bad492017335794661cb7aae9cf9d5d-244064429"); // Either Production or SandBox AccessToken

// Crea un objeto de preferencia.
$catPizzaPref = new MercadoPago\Preference();
$catCheetoPref = new MercadoPago\Preference();
$catSushiPref = new MercadoPago\Preference();

// Crea cada gatito como un Item de MercadoPago
$catPizza = new MercadoPago\Item();
$catPizza->id = "cat_pizza";
$catPizza->title = 'Gatito comiendo Pizza';
$catPizza->quantity = 1;
$catPizza->unit_price = 2500.00;
$catPizzaPref->items = array($catPizza);

$catCheeto = new MercadoPago\Item();
$catCheeto->id = "cat_cheeto";
$catCheeto->title = 'Gatito comiendo Cheeto';
$catCheeto->quantity = 1;
$catCheeto->unit_price = 1500.00;
$catCheetoPref->items = array($catCheeto);

$catSushi = new MercadoPago\Item();
$catSushi->id = "cat_sushi";
$catSushi->title = 'Gatito comiendo Sushi';
$catSushi->quantity = 1;
$catSushi->unit_price = 3000.00;
$catSushiPref->items = array($catSushi);

// Setting back urls after a payment.
$catPizzaPref->back_urls = array(
    "success" => "http://localhost:8080/index.php/success",
    "failure" => "http://localhost:8080/index.php/failure",
    "pending" => "http://localhost:8080/index.php/pending"
);
$catCheetoPref->back_urls = array(
    "success" => "http://localhost:8080/index.php/success",
    "failure" => "http://localhost:8080/index.php/failure",
    "pending" => "http://localhost:8080/index.php/pending"
);
$catSushiPref->back_urls = array(
    "success" => "http://localhost:8080/index.php/success",
    "failure" => "http://localhost:8080/index.php/failure",
    "pending" => "http://localhost:8080/index.php/pending"
);

// Saving preference values for the checkout.
$catPizzaPref->save();
$catCheetoPref->save();
$catSushiPref->save();

use Swap\Builder;

$swap = (new Builder())
    ->add('array', [
        [
            'ARS/EUR' => 0.0067,
            'ARS/GPB' => 0.0058,
            'ARS/USD' => 0.0065
        ]
    ])
    ->build();

?>

<main>
    <div class="container py-4">
        <div class="p-5 col-mb-8 bg-light rounded-3 bg-dark text-white text-left">
            <div class="row align-items-start">
                <div class="col-8">
                    <h1 class="display-5 fw-bold pb-5 text-center"><?php echo $catPizza->title ?></h1>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-2 p-0">
                                <h3>Precio <?php if (isset($_GET["currency"])) {
                                                echo $_GET['currency'];
                                            } else {
                                                echo "AR";
                                            } ?>$</h3>
                            </div>
                            <div class="col-2 p-0">
                                <h3 id="pricePizza"><?php echo $catPizza->unit_price ?></h3>

                            </div>
                        </div>
                        <form action="index.php/procesar-pago" method="POST">
                            <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $catPizzaPref->id; ?>">
                            </script>
                        </form>
                    </div>
                </div>
                <div class="col-4">
                    <img src="./View/img/gatitoPizza.gif" alt="Gatito comiendo pizza" width="300px" style="border-radius: 5px">
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="p-5 col-mb-8 bg-light rounded-3 bg-dark text-white text-left">
            <div class="row align-items-start">
                <div class="col-8">
                    <h1 class="display-5 fw-bold pb-5 text-center"><?php echo $catCheeto->title ?></h1>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-2 p-0">
                                <h3>Precio <?php if (isset($_GET["currency"])) {
                                                echo $_GET['currency'];
                                            } else {
                                                echo "AR";
                                            } ?>$</h3>
                            </div>
                            <div class="col-2 p-0">
                                <h3 id="priceCheeto"><?php echo $catCheeto->unit_price ?></h3>

                            </div>
                        </div>
                        <form action="index.php/procesar-pago" method="POST">
                            <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $catCheetoPref->id; ?>">
                            </script>
                        </form>
                    </div>
                </div>
                <div class="col-4">
                    <img src="./View/img/gatitoPapitas.gif" alt="Gatito comiendo cheetos" width="300px" style="border-radius: 5px">
                </div>
            </div>
        </div>
    </div>

    <div class="container py-4">
        <div class="p-5 col-mb-8 bg-light rounded-3 bg-dark text-white text-left">
            <div class="row align-items-start">
                <div class="col-8">
                    <h1 class="display-5 fw-bold pb-5 text-center"><?php echo $catSushi->title ?></h1>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-2 p-0">
                                <h3>Precio <?php if (isset($_GET["currency"])) {
                                                echo $_GET['currency'];
                                            } else {
                                                echo "AR";
                                            } ?>$</h3>
                            </div>
                            <div class="col-2 p-0">
                                <h3 id="priceSushi"><?php echo $catSushi->unit_price ?></h3>

                            </div>
                        </div>
                        <form action="index.php/procesar-pago" method="POST">
                            <script src="https://www.mercadopago.com.ar/integrations/v1/web-payment-checkout.js" data-preference-id="<?php echo $catSushiPref->id; ?>">
                            </script>
                        </form>
                    </div>
                </div>
                <div class=" col-4">
                    <img src="./View/img/gatitoSushi.gif" alt="Gatito comiendo sushi" width="300px" style="border-radius: 5px">
                </div>
            </div>
        </div>
    </div>
</main>

<script type="text/javascript">
    function exchange(input) {
        let value = parseInt(input.innerHTML);
        let change = <?php
                        if (isset($_GET["currency"])) {
                            echo $swap->latest("ARS/" . $_GET['currency'])->getValue();
                        } else {
                            echo 1;
                        }
                        ?>;

        input.innerHTML = value * change;
    }

    exchange(document.querySelector("#pricePizza"));
    exchange(document.querySelector("#priceCheeto"));
    exchange(document.querySelector("#priceSushi"));
</script>

<?php
include_once("./View/Structure/footer.php");
?>