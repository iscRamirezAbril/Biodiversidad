<!DOCTYPE html>
<html>
<?php
define('TITLE', 'About us');
?>

<head>
    <title>About - <?php echo TITLE ?></title>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <header class="masthead" style="background-image:url('assets/img/aboutPage.gif');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>Sobre Axolotl Team</h1><span class="subheading">Emprendimiento e innovación</span>
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