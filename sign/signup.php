<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
if ($session->isSignedIn()) User\Notify::msg_redirect("Already logged in, please enjoy!", "index.php");

if (isset($_POST['register'])) {
    //instantiate login object
    $register = new User\User();
    $register->username = $database->escape_string($_POST['username']);
    $register->email = $database->escape_string($_POST['email']);
    $register->salt = substr(sha1(time()), 0, 30);
    $register->password = $database->escape_string(Auth\HashText::hashText($_POST['password'], $register->salt));
    if (isset($_POST['agreed']) && $_POST['agreed'] == "agreed") {
        $register->agreed = 1;
    } else {
        User\Notify::msg_redirect("Please agree to terms and Conditions.", $full_url);
    }
    $register->first_name = $database->escape_string($_POST['first_name']);
    $register->last_name = $database->escape_string($_POST['last_name']);
    $register->nick_name = $database->escape_string($_POST['nick_name']);
    $register->dob = $database->escape_string($_POST['dob']);
    $register->phone = $database->escape_string($_POST['phone']);
    $register->address1 = $database->escape_string($_POST['address1']);
    $register->address2 = $database->escape_string($_POST['address2']);
    $register->suits = $database->escape_string($_POST['suits']);
    $register->city = $database->escape_string($_POST['city']);
    $register->country = $database->escape_string($_POST['country']);
    if (\User\Login::checkUsername($register->username)) User\Notify::msg_redirect("Username not available at the moment!", $full_url);
//    die($register->dob);
    if ($register->registerUser()) {
        $register->user_id = $database->last_insert_id();
        if ($register->save()) {
            User\Notify::msg_redirect("Registered successfully, welcome.", "signin.php");
        } else {
            $login = new \User\Login();
            $login->delete_by_id($register->user_id);
            User\Notify::msg_redirect("Sign up failed, please try again!", $_SERVER['PHP_SELF']);
        }
    }
    User\Notify::msg_redirect("Sign up failed, please try again!", $_SERVER['PHP_SELF']);
}

include_once "../include/view/header.php";
?>
    <section class="row">
        <section class="col-md-3"></section>
        <section class="col-md-6">
            <form class="m-4" action="" method="post" enctype="multipart/form-data">
                <img class="mb-4 lazyload rounded-circle" data-src="../assets/img/favicon/ppu-icon.png" alt=""
                     width="72" height="72">
                <h1 class="h3 mb-3 fw-normal text-center">Please Register</h1><?php if (isset($_SESSION['the_msg'])): ?>
                    <div class="alert alert-danger">
                        <?php \User\Notify::get_instant_msg(); ?>
                    </div>
                <?php endif; ?>
                <div class="row">
                    <div class="form-floating col-4 mt-2 p-2">
                        <input type="text" name="first_name" minlength="2" class="form-control" id="floatingFirstName"
                               placeholder="mc" required>
                        <label for="floatingFirstName">&nbsp;&nbsp;First name *</label>
                    </div>
                    <div class="form-floating col-4 mt-2 p-2">
                        <input type="text" name="nick_name" maxlength="12" class="form-control" id="floatingNick"
                               placeholder="nickname">
                        <label for="floatingNick">&nbsp;&nbsp;Nick name </label>
                    </div>
                    <div class="form-floating col-4 mt-2 p-2">
                        <input type="text" name="last_name" minlength="2" class="form-control" id="floatingLastName"
                               placeholder="may" required>
                        <label for="floatingLastName">&nbsp;&nbsp;Last name *</label>
                    </div>
                    <div class="form-floating col-5 mt-2">
                        <input type="text" name="username" minlength="4" maxlength="12" class="form-control"
                               id="floatingInput" placeholder="username" required>
                        <label for="floatingInput">&nbsp;&nbsp;Username *</label>
                    </div>
                    <div class="form-floating col-7 mt-2">
                        <input type="email" name="email" minlength="4" maxlength="35" class="form-control"
                               id="floatingInput" placeholder="mcmay@example.com" required>
                        <label for="floatingInput">&nbsp;&nbsp;Email address *</label>
                    </div>
                </div>
                <div class="form-floating mt-2">
                    <input type="date" name="dob" class="form-control" id="floatingDob" placeholder="Date Of Birth"
                           required>
                    <label for="floatingDob">Date Of Birth *</label>
                </div>
                <div class="form-floating mt-2">
                    <input type="text" name="phone" minlength="10" maxlength="15" class="form-control"
                           id="floatingPhone" value="+256 " placeholder="tel" required>
                    <label for="floatingPhone">Phone number *</label>
                </div>
                <div class="row">
                    <div class="form-floating col-6 mt-2">
                        <input type="text" name="address1" class="form-control" id="floatingAddress1"
                               placeholder="Address 1" required>
                        <label for="floatingAddress1">&nbsp;&nbsp;Address 1 *</label>
                    </div>
                    <div class="form-floating col-6 mt-2">
                        <input type="text" name="address2" class="form-control" id="floatingAddress2"
                               placeholder="Address 2">
                        <label for="floatingAddress2">&nbsp;&nbsp;Address 2</label>
                    </div>
                </div>
                <div class="form-floating mt-2">
                    <input type="text" name="suits" class="form-control" id="floatingSuits"
                           placeholder="Building, room no.">
                    <label for="floatingSuits">Suits (Building, Room)</label>
                </div>
                <div class="row">
                    <div class="form-floating col-6 mt-2">
                        <input type="text" name="city" class="form-control" id="floatingCity" placeholder="City"
                               required>
                        <label for="floatingCity">&nbsp;&nbsp;City *</label>
                    </div>
                    <div class="form-floating col-6 mt-2">
                        <input type="text" name="country" class="form-control" id="floatingState" placeholder="State"
                               required>
                        <label for="floatingState">&nbsp;&nbsp;Country *</label>
                    </div>
                </div>
                <div class="form-floating mt-2">
                    <input type="password" name="password" minlength="8" class="form-control" id="floatingPassword"
                           placeholder="Password" required>
                    <label for="floatingPassword">Password *</label>
                </div>

                <div class="form-floating mt-2">
                    <input type="password" name="confirm_password" minlength="8" class="form-control" id="floatingConfirmPassword" placeholder="Password" required>
                    <label for="floatingConfirmPassword">Confirm Password *</label>
                </div>
                <div class="checkbox mb-3 mt-2">
                    <input type="hidden" name="_token" value="<?php echo $_SESSION['_token']; ?>">
                    <label>
                        <input type="checkbox" name="agreed" value="agreed" title="Agree to terms and conditions to proceed" required> Agree to <a href="../terms/">Terms & Conditions</a>
                    </label>
                </div>
<!--                <button class="w-100 btn btn-lg btn-primary" onclick="return regformhash(this.form, this.form.username, this.form.email, this.form.password,this.form.confirm_password);" name="register" type="submit">Sign in-->
                <button class="w-100 btn btn-lg btn-primary" name="register" type="submit">Sign in</button>
                <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
            </form>
        </section>
    </section>
<script src="forms.js"></script>
<script src="sha512.js"></script>
<?php
include_once "../include/view/footer.php";
