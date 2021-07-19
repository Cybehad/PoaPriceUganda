<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
if ($session->isSignedIn()) User\Notify::msg_redirect("Already logged in, please enjoy!", "index.php");
if (isset($_POST['login'])){
    $login = new User\Login();
    //Capture user credentials;
    $username = $_POST['username'];
    $password = $_POST['password'];
    if ($login->userLogin($username,$password)){
        if (isset($_GET['red'])){
            User\Notify::msg_redirect("Welcome To Poa Price Uganda", $_GET['red']);
        }
        User\Notify::msg_redirect("Welcome To Poa Price Uganda");
    }else{
        User\Notify::msg_redirect("Username or password incorrect, please try again later!" ,$_SERVER['PHP_SELF']);
    }
}
include_once "../include/view/header.php";
?>
    <section class="form-signin">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
            <img class="mb-4 rounded-circle" src="../assets/img/favicon/ppu-icon.png" alt="" width="72" height="72">
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
            <?php if (isset($_SESSION['the_msg'])): ?>
            <div class="alert alert-danger">
                <?php \User\Notify::get_instant_msg(); ?>
            </div>
            <?php endif; ?>
            <div class="form-floating">
                <input type="text" name="username" minlength="2" class="form-control" id="floatingInput" placeholder="name@example.com" required>
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating mt-2">
                <input type="password" name="password" minlength="8" class="form-control" id="floatingPassword" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
                <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
            </div>
<!--            <button class="w-100 btn btn-lg btn-primary" onclick="formHash(this.form, this.form.password);" name="login">Sign in</button>-->
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="login">Sign in</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
        </form>
    </section>
<script src="forms.js"></script>
<script src="sha512.js"></script>
<?php
include_once "../include/view/footer.php";
