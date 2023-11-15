<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Contact | Life Style Store</title>
    <style type="text/css">
        .p1 {
            text-align: justify;
        }
    </style>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>
<?php
include 'includes/header.php';
?>
<div class="container" id="content">
    <div class="row">
        <div class="col-lg">
            <img src="img/contact.png" style="float: right;">
            <h1>Get in Touch</h1>
            <p id="p1">
                Hi there, we are here to help you. Please feel free to contact us in case you have any queries regarding the products, payment, or order delivery. With respect to payment, we will be accepting prepaid orders only, in order to avoid cash payment and hence maintain social distancing. With respect to the delay in order delivery, please note that we are trying our best to deliver your order on time, but your order may be delayed due to the current situation (or unforeseen circumstances). However, we ensure that your order will be delivered soon. In case you have any other queries, please fill the form below, and our team will get in touch with you within 24 hours. You can also contact the number given below to get in touch with our customer care executive immediately.
            </p>
        </div>
        <br><br>
        <div class="col-lg">
            <div style="float: right;">
                <h1>COMPANY INFORMATION</h1><br>
                <p class="p1">Ampang, Selangor - 68100</p><br>
                <p class="p1">Phone: +0176269456</p><br>
                <p class="p1">Email: support@lifestylestore.com</p>
            </div>
            <h1>CONTACT US</h1>
            <div style="float: left;">
                <form method="post" action="process_feedback.php">
                    <div class="form-group">
                        <input type="text" name="name" placeholder="Name" autofocus="on" class="form-control" required="true" pattern="^[A-Za-z\s]{1,}[\.]{0,1}[A-Za-z\s]{0,}$">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" placeholder="Email" class="form-control" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" required="true">
                    </div>
                    <div class="form-group">
                        <textarea rows="5" name="address" placeholder="Address" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <textarea rows="5" name="feedback" placeholder="Feedback" class="form-control" required="true"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Submit Feedback</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
include 'includes/footer.php';
?>
</body>
</html>
