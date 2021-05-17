<!DOCTYPE html>
<html>
<?php
define('TITLE', 'My Place');
?>

<head>
    <title>About - <?php echo TITLE ?></title>
    <?php include 'head.php'; ?>
</head>

<body>
    <?php
    include 'header.php';
    ?>
    <header class="masthead" style="background-image:url('assets/img/Portada_3.jpg');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <div class="post-heading">
                        <h1>Axolotl Team - <?php echo TITLE ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <article>
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-lg-8 mx-auto">
                    <p>Introducción pendiente...</p>
                    <h5> Login </h5>
                    <div class="Login">
                        <form method="POST" action="main.php">
                            <table>
                                <tr>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls"><label>Username</label>
                                            <input class="form-control" type="username" id="txtusrNomUsr" name="txtusrNomUsr" placeholder="Ingrese usuario">
                                            <small class="form-text text-danger help-block"></small>
                                        </div>
                                    </div>
                                <tr>
                                    <div class="control-group">
                                        <div class="form-group floating-label-form-group controls"><label>Password</label>
                                            <input class="form-control" type="password" id="txtusrContrasena" name="txtusrContrasena" placeholder="Ingrese contraseña">
                                            <small class="form-text text-danger help-block"></small>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                            <table>
                                <tr>
                                    <td colspan="2">
                                        <div id="success"></div>
                                    <td>
                                        <div class="form-group">
                                            <button class="btn btn-primary" id="sendMessageButton" type="submit">Iniciar sesión</button>
                                        </div>
                                    </td>
                                    <div id="cancel"></div>
                                    <td>
                                        <div class="form-group">
                                            <a href="register.php">
                                                <button class="btn btn-secondary" type="button" value="Register">Registrate</button>
                                            </a>
                                        </div>
                                    </td>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </article>
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