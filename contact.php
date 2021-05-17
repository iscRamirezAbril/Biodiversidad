<!DOCTYPE html>
<html>
<?php
define('TITLE', 'Contacto');
?>

<head>
    <title>About - <?php echo TITLE ?></title>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <header class="masthead" style="background-image:url('assets/img/contact-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>¿Te gustaría contactarnos?</h1><span class="subheading">No lo dudes , nos interesan mucho tus comentarios.</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <p>¿Te gustaría contactarnos?, por favor ayúdanos a llenar los siguientes datos y con gusto te responderemos lo mas pronto posible.</p>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls"><label>Name</label>
                        <input class="form-control" type="text" id="name" required="" placeholder="Nombre">
                        <small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls"><label>Email Address</label>
                        <input class="form-control" type="email" id="email" required="" placeholder="Correo electrónico">
                        <small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls"><label>Phone Number</label>
                        <input class="form-control" type="tel" id="phone" required="" placeholder="Número de teléfono">
                        <small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div class="control-group">
                        <div class="form-group floating-label-form-group controls mb-3"><label>Message</label>
                        <textarea class="form-control" id="message" data-validation-required-message="Please enter a message." required="" placeholder="Por favor, dejanos un mensaje." rows="5"></textarea>
                        <small class="form-text text-danger help-block"></small></div>
                    </div>
                    <div id="success"></div>
                    <div class="form-group"><button class="btn btn-primary" id="sendMessageButton" type="submit">Send</button></div>
                </form>
            </div>
        </div>
    </div>
    <hr>
    <footer>
        <?php
        include 'footer.php';
        ?>
    </footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/clean-blog.js"></script>
</body>

</html>