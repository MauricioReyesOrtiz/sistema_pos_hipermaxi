<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Editar Admin
                <a href="admins.php" class="btn btn-danger float-end">Atras</a>
            </h4>
        </div>
        <div class="card-body">
            <?php alertMessage(); ?>

            <form action="code.php" method="post">
                <?php
                    if(isset($_GET['id'])) {
                        if($_GET['id'] != '') {

                            $adminId = $_GET['id'];
                        }else {
                            echo '<h5>ID no encontrado</h5>';
                            return false;
                        }
                    }else {
                        echo '<h5>No se proporciono ningun ID en los parametros</h5>';
                        return false;
                    }

                    $adminData = getById('admins', $adminId);
                    if($adminData){

                        if($adminData['status'] == 200) {

                            ?>
                            <input type="hidden" name="adminId" value="<?= $adminData['data']['id']; ?>">
                                <div class="row">
                                    <div class="col-md-12 mb-3">
                                        <label for="">Nombre *</label>
                                        <input type="text" name="name" required value="<?= $adminData['data']['name']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Correo *</label>
                                        <input type="email" name="email" required value="<?= $adminData['data']['email']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Contraseña *</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="">Celular *</label>
                                        <input type="number" name="phone" value="<?= $adminData['data']['phone']; ?>" class="form-control">
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="">Activo</label>
                                        <br>
                                        <input type="checkbox" name="is_ban" <?= $adminData['data']['id_ban'] == true ? 'checked':''; ?> style="width:30px;height:30px;">
                                    </div>
                                    <div class="col-md-12 mb-3 text-end">
                                        <button type="submit" name="updateAdmin" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            <?php

                        }else {
                            echo '<h5>'.$adminData['message'].'</h5>';
                        }

                    }else {
                        echo 'algo salio mal';
                        return false;
                    }
                ?>

            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>