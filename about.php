<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>¿Qué es Axolotl Team?</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="icon" href='assets/img/favicon.ico'>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <header class="masthead" style="background-image:url('assets/img/about-bg.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>Sobre Axolotl Team</h1><span class="subheading">This is what I do</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-lg-8 mx-auto">
                <p>AxolotlTeam se trata de un grupo de estudiantes que buscan sobresalir en las diciplinas relacionadas a desarrollo de software y hardware.</p>
                <p> Actualmente el equipo AxolotlTeam está conformado por los siguientes integrantes:</p>
                <?php
                include 'integrantes.php';
                ?>
                </div>
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