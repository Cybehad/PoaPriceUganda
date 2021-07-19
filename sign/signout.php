<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
if ($session->isSignedIn()) {
    User\LogOut::Logout();
    User\Notify::msg_redirect("Logged out successfully.", "signin.php");
} else {
    echo <<<Simple
  <!DOCTYPE html>
  <html>
  <head>
  <title>C | Wrong Logout</title>
  </head>
  <body>
  <section>
  <article>
  <div>
  <p>You reached here! Good guy!.</p>
  <p>redirecting in 3 seconds...</p>
  </div>
  </article>
  </section>
  </body>
  </html>
Simple;
    header("refresh: 3 url=signin.php");
}