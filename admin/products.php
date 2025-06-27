<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Productos
                <a href="products-create.php" class="btn btn-primary float-end">Añadir Producto</a>
            </h4>
        </div>
        <div class="card-body">
        <?php alertMessage(); ?>
        <?php
        $products = getAll('products');
        if(!$products) {
            echo '<h4>Algo salio mal!</h4>';
            return false;
        }
        if(mysqli_num_rows($products) > 0)
        {
        ?>

            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            <th>Estado</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                         
                        <!-- mostrar registros de administradores -->
                        <?php foreach($products as $item) : ?>
                            <tr>
                             <td><?= $item['id'] ?></td>
                             <td>
                                <img src="../<?= $item['image']; ?>" class="img-thumbnail" style="width:100px;height:100px;" alt="Img">
                            </td>
                             <td><?= $item['name'] ?></td>
                             <td><?= $item['price'].'Bs' ?></td>
                             <td><?= $item['quantity'] ?></td>
                             <td>
                                <?php
                                    if($item['status'] == 1) {
                                        echo '<span class="badge bg-danger"><i class="fa-solid fa-eye-slash"></i>Oculto</span>';
                                    }else {
                                        echo '<span class="badge bg-success"><i class="fa-solid fa-eye"></i>Visible</span>';
                                    }
                                ?>
                             </td>
                             <td>
                                <a href="products-edit.php?id=<?= $item['id']; ?>" class="btn btn-info btn-sm"><i class="fa fa-pencil" aria-hidden="true"></i>Editar</a>
                                <a 
                                    href="products-delete.php?id=<?= $item['id']; ?>" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Estas seguro de eliminar este producto?')"
                                >
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                    Eliminar
                                </a>
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