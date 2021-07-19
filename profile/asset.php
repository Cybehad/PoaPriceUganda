<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
if ($session->isSignedIn()) echo "";
include_once "../include/view/header.php";
?>

    <section class="row">

    </section>
<!--    <section role="main" class="row">-->
<!--        <div class="shadow-sm mb-1">-->
<!--            <h1 class="text-body text-center text-decoration-underline">Sell | Buy.</h1>-->
<!--            <hr>-->
<!--        </div>-->
<!--        <div class="col-md-3 text-center text-lg-start px-3">-->
<!--            <aside class="bd-aside sticky-xl-top text-muted align-self-start mb-3 mb-xl-5 px-2">-->
<!--                <h1 class="pb-3 mb-4 border-bottom">Collections</h1>-->
<!--                <nav class="small" id="toc">-->
<!--                    <ul class="list-unstyled">-->
<!--                        <li class="my-2">-->
<!--                            <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse"-->
<!--                                    aria-expanded="false" data-bs-target="#contents-collapse"-->
<!--                                    aria-controls="contents-collapse">Phones & Accessories-->
<!--                            </button>-->
<!--                            <ul class="list-unstyled ps-3 collapse" id="contents-collapse">-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#typography">Only Mobile-->
<!--                                        Phones</a></li>-->
<!--                                <hr class="m-0 p-0">-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#typography">Samsung-->
<!--                                        Galaxy</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#images">Apple iPhone</a>-->
<!--                                </li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#figures">Huawei</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#tables">Tecno &-->
<!--                                        Infinix</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#tables">Accessories</a>-->
<!--                                </li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#figures">Oppo</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#figures">Redmi</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#figures">Others</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="my-2">-->
<!--                            <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse"-->
<!--                                    aria-expanded="false" data-bs-target="#forms-collapse"-->
<!--                                    aria-controls="forms-collapse">Computer &amp; Laptop-->
<!--                            </button>-->
<!--                            <ul class="list-unstyled ps-3 collapse" id="forms-collapse">-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#overview">Only Computer-->
<!--                                        &amp; Laptop</a></li>-->
<!--                                <hr class="m-0 p-0">-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#overview">Apple</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#disabled-forms">Dell</a>-->
<!--                                </li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#disabled-forms">Hp</a>-->
<!--                                </li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#sizing">Samsung</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#input-group">Accer</a>-->
<!--                                </li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#input-group">Others</a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                        <li class="my-2">-->
<!--                            <button class="btn d-inline-flex align-items-center collapsed" data-bs-toggle="collapse"-->
<!--                                    aria-expanded="false" data-bs-target="#components-collapse"-->
<!--                                    aria-controls="components-collapse">Components-->
<!--                            </button>-->
<!--                            <ul class="list-unstyled ps-3 collapse" id="components-collapse">-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#accordion">Accordion</a>-->
<!--                                </li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#alerts">Alerts</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#badge">Badge</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded"-->
<!--                                       href="#breadcrumb">Breadcrumb</a></li>-->
<!--                                <li><a class="d-inline-flex align-items-center rounded" href="#buttons">Buttons</a></li>-->
<!--                            </ul>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </nav>-->
<!--            </aside>-->
<!--        </div>-->
<!--        <div class="col-md-9">-->
<!--            <div class="album py-2 bg-light">-->
<!--                <div class="row mb-2">-->
<!--                    <div>-->
<!--                        <h1 class="text-center text-uppercase">Genuine Gadgets Uganda</h1>-->
<!--                    </div>-->
<!--                    <div class="bd-example">-->
<!--                        <svg class="bd-placeholder-img bd-placeholder-img-lg img-fluid" width="100%" height="250"-->
<!--                             xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Responsive image"-->
<!--                             preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title>-->
<!--                            <rect width="100%" height="100%" fill="#868e96"></rect>-->
<!--                            <text x="50%" y="50%" fill="#dee2e6" dy=".3em">Responsive image</text>-->
<!--                        </svg>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <hr>-->
<!--                <div>-->
<!--                    <h4 class="text-center text-uppercase">MOBILE PHONES COLLECTION</h4>-->
<!--                </div>-->
<!--                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 px-3">-->
<!--                    <div class="col-6 col-md-4 col-lg-3">-->
<!--                        <div class="card shadow-sm rounded-start position-relative">-->
<!--                            <img data-scr="" class="w-100 rounded-3 lazyload" style="height: 180px" alt=""/>-->
<!--                            <div class="card-body">-->
<!--                                <span class="fw-bold position-absolute" style="top: 55%;">iPhone 6.</span>-->
<!--                                <span class="fst-italic p-1 bg-primary rounded-3 text-white">1,450,000 UGx.</span>-->
<!--                                <div class="d-flex justify-content-between align-items-center">-->
<!--                                    <div class="btn-group mt-2">-->
<!--                                        <button type="button" class="btn btn-sm btn-outline-secondary">Buy Now</button>-->
<!--                                    </div>-->
<!--                                    Save <small class="text-muted border rounded-circle border-primary p-1">-->
<!--                                        -24%</small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <hr>-->
<!--                <div>-->
<!--                    <h4 class="text-center text-uppercase">PHONES ACCESSORIES COLLECTION</h4>-->
<!--                </div>-->
<!--                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 px-3">-->
<!--                    <div class="col-6 col-md-4 col-lg-3">-->
<!--                        <div class="card shadow-sm rounded-start position-relative">-->
<!--                            <img data-scr="" class="w-100 rounded-3 lazyload" style="height: 180px" alt=""/>-->
<!--                            <div class="card-body">-->
<!--                                <span class="fw-bold position-absolute" style="top: 55%;">iPhone 6.</span>-->
<!--                                <span class="fst-italic p-1 bg-primary rounded-3 text-white">1,450,000 UGx.</span>-->
<!--                                <div class="d-flex justify-content-between align-items-center">-->
<!--                                    <div class="btn-group mt-2">-->
<!--                                        <button type="button" class="btn btn-sm btn-outline-secondary">Buy Now</button>-->
<!--                                    </div>-->
<!--                                    Save <small class="text-muted border rounded-circle border-primary p-1">-24%</small>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <hr>-->
<!--            </div>-->
<!--        </div>-->
<!--    </section>-->
<?php
include_once "../include/view/footer.php";
