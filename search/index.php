<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
//if (!$session->isSignedIn()) User\Notify::msg_redirect("Profile page require login first!", "{$url}sign/signin.php?red={$full_url}");
include_once "../include/view/header.php";
?>

<?php
include_once "../include/view/footer.php";
