<?php
include_once "include/init.php";
include_once "include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
include_once "include/view/header.php";
?>
    <main role="main" class="row">
        <div class="shadow-sm mb-2 mt-4">
            <h1 class="text-body text-center text-decoration-underline">Product | iPhone 6 Plus.</h1>
            <hr>
        </div>
        <div class="col-md-2 text-center text-lg-start px-3">
        </div>
        <div class="col-md-8">
            <div class="album py-2 bg-light mb-2">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 px-2">
                    <div class="col-md-6">
                        <h5 class="m-2 text-center">By <a class="fw-bold text-decoration-underline fst-italic" href="business.php">Poa Price Uganda</a></h5>
                        <img data-src="" class="lazyload" alt="" style="width: 100%; height: 100px" />
                    </div>
                    <div class="col-md-6">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo $url;?>">Home</a></li>
                            <li class="breadcrumb-item">Product</li>
                        </ul>
                        <h3 class="display-6">iPhone 5</h3>
                        <span class="display-6">1,450,000</span>UGx
                        <hr>
                        <p>Cassava Jolems cookies comes in 400g package. Made from locally grown and processed Cassava. This Cassava Cookie will give you ultimate taste and Nutrients needed to nourish your body.</p>
                        <hr>
                        <div class="row pt-2 pb-2 m-2">
                            <input type="number" name="qty" value="1" class="col-4" disabled/><div class="col-1"></div>
                            <a  href="cart.php" class="col-7 float-end btn btn-outline-primary fw-bolder">Check Out</a>
                        </div>
                        <div class="m-2 border-bottom">
                            <p><span class="fw-bolder">Collection:</span> Mobile Phones</p>
                        </div>
                        <div class="mt-2">
                            <h3>Description</h3>

                            ///////////////////////////

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
include_once "include/view/footer.php";
