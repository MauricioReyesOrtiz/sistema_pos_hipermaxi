<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Categorias
                <a href="categories-create.php" class="btn btn-primary float-end">Añadir Categoria</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>
        <?php
        $categories = getAll('categories');
        if(!$categories) {
            echo '<h4>Algo salio mal!</h4>';
            return false;
        }
        if(mysqli_num_rows($categories) > 0)
        {
        ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                         
                        <!-- mostrar registros de administradores -->
                        <?php foreach($categories as $item) : ?>
                            <tr>
                             <td><?= $item['id'] ?></td>
                             <td><?= $item['name'] ?></td>
                             <td>
                                <?php
                                    if($item['status'] == 1) {
                                        echo '<span class="badge bg-danger">Oculto</span>';
                                    }else {
                                        echo '<span class="badge bg-success">Visible</span>';
                                    }
                                ?>
                             </td>
                             <td>
                                <a href="categories-edit.php?id=<?= $item['id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                                <a href="categories-delete.php?id=<?= $item['id']; ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>Eliminar</a>
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