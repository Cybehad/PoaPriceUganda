<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
include_once "../include/view/header.php";
?>
    <section class="row">
        <section class="col-md-3"></section>
        <section class="col-md-6 lead my-5 px-5">
            <h2 class="text-center">Contact Poa Price Uganda.</h2>
            <hr>
            <div class="row border rounded-3 text-center mb-4 pb-2">
                <h3 class="">Contact By Phone Number</h3>
                <hr>
                <div class="shadow-sm">
                    <a href="tel:+256703926608">+256 703 926608</a><br>
                    <a href="tel:+256786749916">+256 786 749916</a>
                </div>
            </div>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="row border rounded-3 p-4">
                <h3 class="text-center">Contact By Form</h3>
                <hr>
                <div class="col-md-4">
                    <label for="validFirstName" class="form-label">FirstName <span class="text-danger">*</span></label>
                    <input type="text" class="form-control is-invalid" minlength="2" id="validFirstName" placeholder="cybehad" required>
                    <span class="invalid-feedback">Two char min</span>
                    <span class="valid-feedback">
                        Looks good!
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="validLastName" class="form-label">LastName <span class="text-danger">*</span></label>
                    <input type="text" class="form-control is-invalid" minlength="3" id="validLastName" placeholder="solutions" required="">
                    <span class="invalid-feedback">Three char min</span>
                    <span class="valid-feedback">
                        Looks good!
                    </span>
                </div>
                <div class="col-md-4">
                    <label for="validEmail" class="form-label">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control is-invalid" minlength="3" id="validEmail" placeholder="ppu@example.com" required="">
                    <span class="invalid-feedback">Valid email required</span>
                    <span class="valid-feedback">
                        Looks good!
                    </span>
                </div>
                <div class="col-12 my-2">
                    <label for="validText" class="form-label">Details <span class="text-danger">*</span></label>
                    <textarea type="text" class="form-control" title="Text to describe your need!" minlength="3" id="validText" placeholder="Some text here..." required=""></textarea>
                </div>
                <div class="col-12 text-center my-2">
                    <button class="btn btn-primary" name="contact_form" type="submit">Submit form</button>
                </div>
            </div>
            </form>
        </section>
    </section>
<?php
include_once "../include/view/footer.php";
