
<?php 
include('includes/header.php');

if(isset($_SESSION['loggedIn'])) {
    ?>
    <script>window.location.href = 'index.php';</script>
    <?php
}
?>

<div class="py-5 bg-light" style="background: url('fondohiper.jpg') no-repeat center; background-size: cover;">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded-4">

                <?php alertMessage(); ?>

                    <div class="p-5" style="margin: auto;">
                        <div style="text-align: center;"><img src="./logohiper.png" alt="" width="100"></div>
                        <h4 class="text-dark mb-3" style="text-align: center;">Iniciar Sesion</h4>
                        <form action="login-code.php" method="post">

                            <!--email-->
                            <div class="mb-3">
                                <label>Ingrese Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>

                            <!--contraseña-->
                            <div class="mb-3">
                                <label>Ingrese Contraseña</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <!--boton iniciar sesion-->
                            <div class="mb-3">
                                <button type="submit" name="loginBtn" class="btn btn-primary w-100 mt-2">
                                    Iniciar Sesion
                                </button>
                            </div>


                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>

    

    