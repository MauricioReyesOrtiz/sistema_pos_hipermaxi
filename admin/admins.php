<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Admins/Staff
                <a href="admins-create.php" class="btn btn-primary float-end">Añadir Admin</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>
        <?php
        $admins = getAll('admins');
        if(!$admins) {
            echo '<h4>Algo salio mal!</h4>';
            return false;
        }
        if(mysqli_num_rows($admins) > 0)
        {
        ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Is Ban</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                         
                        <!-- mostrar registros de administradores -->
                        <?php foreach($admins as $adminItem) : ?>
                            <tr>
                             <td><?= $adminItem['id'] ?></td>
                             <td><?= $adminItem['name'] ?></td>
                             <td><?= $adminItem['email'] ?></td>
                             <td>
                                <?php
                                    if($adminItem['is_ban'] == 1) {
                                        echo '<span class="badge bg-danger">Inactivo</span>';
                                    }else {
                                        echo '<span class="badge bg-success">Activo</span>';
                                    }
                                ?>
                             </td>
                             <td>
                                <a href="admins-edit.php?id=<?= $adminItem['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                                <a href="admins-delete.php?id=<?= $adminItem['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>Eliminar</a>
                             </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
            <?php
        }else { ?>
            <tr>
             <h4 class="mb-0">No se encontro ningun registro</h4>
            </tr>
            <?php
        }
        ?>

        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>