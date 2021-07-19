<?php
include_once "../include/init.php";
include_once "../include/autoload.php";
$database = new Db\DbConnect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
$session = new Auth\Session();
include_once "../include/view/header.php";
?>

    <section class="row">
        <section class="col-2 col-md-2"></section>
        <section class="col-md-8 lead my-5 p-4">
            <h2 class="text-center">Return Policy</h2>
            <hr>
            <p>We have a 30-day return policy, which means you have 30 days after receiving your item to request a return.</p>
            <p>To be eligible for a return, your item must be in the same condition that you received it, unworn or unused, with tags, and in its original packaging. You’ll also need the receipt or proof of purchase.</p>
            <p>To start a return, you can contact us at <a href="mailto:ppu@cybehad.com">ppu@cybehad.com</a>. If your return is accepted, we’ll send you a return shipping label, as well as instructions on how and where to send your package. Items sent back to us without first requesting a return will not be accepted.</p>
            <p>You can always contact us for any return question at <a href="mailto:ppu@cybehad.com">ppu@cybehad.com</a>.</p>
            <h2>Damages and issues</h2>
            <p>Please inspect your order upon reception and contact us immediately if the item is defective, damaged or if you receive the wrong item, so that we can evaluate the issue and make it right.</p>
            <h2>Exceptions / non-returnable items</h2>
            <p>Certain types of items cannot be returned, like perishable goods (such as food, flowers, or plants), custom products (such as special orders or personalized items), and personal care goods (such as beauty products). We also do not accept returns for hazardous materials, flammable liquids, or gases. Please get in touch if you have questions or concerns about your specific item.</p>
            <p>Unfortunately, we cannot accept returns on sale items or gift cards.</p>
            <h2>Exchanges</h2>
            <p>The fastest way to ensure you get what you want is to return the item you have, and once the return is accepted, make a separate purchase for the new item.</p>
            <h2>Refunds</h2>
            <p>We will notify you once we’ve received and inspected your return, and let you know if the refund was approved or not. If approved, you’ll be automatically refunded on your original payment method. Please remember it can take some time for your bank or credit card company to process and post the refund too.</p>
        </section>
    </section>
<?php
include_once "../include/view/footer.php";
