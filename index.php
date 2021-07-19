<?php 
include_once "include/init.php";
include_once "include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();

$option = new Product\ProductOptions();
$optionValue = new Product\ProductOptionValue();
$product = new Product\Product();
include_once "include/view/header.php";
?>
    <main role="main" class="row">
        <div class="shadow-sm mb-2">
            <h1 class="text-body text-center text-decoration-underline">Sell | Buy.</h1>
            <hr>
            <?php if (isset($_SESSION['the_msg'])): ?>
                <div class="alert alert-danger" id="notify">
                    <?php User\Notify::get_instant_msg(); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md-1 text-center text-lg-start px-3">
        </div>
        <div class="col-md-10">
            <div class="lead">

            </div>
            <div class="album py-5 bg-light mb-2">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 px-3">
                    
                    <?php
//                    $product->productSave(array('h'), 1, $option, "...color", $optionValue, "...red");
//                    var_export($product);
//                    echo '<br>................................<br>';
//                    var_export($option);
//                    echo '<br>................................<br>';
//                    var_export($optionValue);
                    ?>
                    
                    <a href="product.php" target="_self" class="col-6 col-md-4 text-dark text-decoration-none col-lg-3">
                        <div class="card shadow-sm rounded-start position-relative">
                            <img data-scr="" class="w-100 rounded-3 lazyload" style="height: 180px" alt=""/>
                            <div class="card-body">
                                <span class="fw-bold position-absolute" style="top: 55%;">iPhone 6.</span>
                                <span class="fst-italic p-1 bg-primary rounded-3 text-white">1,450,000 UGx.</span>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group mt-2">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View &raquo;&raquo;</button>
                                    </div>
                                    Save <small class="text-muted border rounded-circle border-primary p-1"> -24%</small>
                                </div>
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </main>
<?php
include_once "include/view/footer.php";
