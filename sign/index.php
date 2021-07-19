<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
if (!$session->isSignedIn()) User\Notify::msg_redirect("Log in to continue", "signin.php");
include_once "../include/init.php";
include_once "../include/view/header.php";
?>
    <div class="container py-3">
        <div class="p-3 mb-4 bg-light rounded-3">
            <div class="container-fluid py-2">
                <h1 class="display-5 fw-bold">Welcome To Poa Price Uganda</h1>
                <p class="fs-4">At Poa Price Uganda.
                    <br>
                    Sell or be sold too.
                </p>
            </div>
    </div>
<?php
include_once "../include/view/footer.php";
