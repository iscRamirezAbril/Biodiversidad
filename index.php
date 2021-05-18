<!DOCTYPE html>
<html>
<?php
define('TITLE', 'Axolotl Team');
?>

<head>
    <title>About - <?php echo TITLE ?></title>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <header class="masthead" style="background-image:url('assets/img/MainPage.png');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="site-heading">
                        <h1>My Place</h1><span class="subheading">by Axolotl Team</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="container">
        <div class="row">
            <div class="col-md-20 col-lg-35">
                <div class="post-preview"><a href="#">
                        <h1>My place</h1>
                        <h3 class="post-title">¡Descubre los establecimientos favoritos en tu comodidad!</h4>
                            <h4 class="post-subtitle">Con <b>My place</b> podrás registrar tus establecimientos preferidos,
                                solamente debes contar con un usuario para poder comenzar a conocer los establecimientos
                                mas reconocidos en tu localidad.
                            </h4>
                    </a>
                </div>
                <hr>
                <div class="post-preview">
                    <h2 class="post-title">Actualizaciones</h2>
                    <h4 class="post-subtitle">En esta página informativa se encontrarán los siguientes apartados:</h3>
                        <li>Inicio: donde se encuentra la bienvenida a este sitio web.</li>
                        <li>Sobre nosotros: donde podrás encontrar información sobre los desarrolladores de la página.</li>
                        <li>Contáctanos: podrás ponerte en contacto.</li>
                        <li>Blog Biodiversidad: donde encontrarás todo tipo de información acerca de la biodiversidad.</li>
                        <p class="post-meta">Posted by <a href="about.php">Axolotl Team</a></p>
                </div>
                <hr>
                <div class="clearfix"></div>
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