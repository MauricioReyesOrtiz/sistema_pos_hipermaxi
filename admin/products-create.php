<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Añadir Producto
                <a href="products.php" class="btn btn-primary float-end">Atras</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="code.php" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label>Seleccione Categoria</label>
                        <select name="category_id" class="form-select">
                            <option value="">Seleccione Categoria</option>
                            <?php
                            $categories = getAll('categories');
                            if($categories){
                                if(mysqli_num_rows($categories) > 0){
                                    foreach ($categories as $cateItem) {
                                        echo '<option value="'.$cateItem['id'].'">'.$cateItem['name'].'</option>';
                                    }
                                }else {
                                    echo '<option value="">No se encontraron categorias!</option>';
                                }
                            }else {
                                echo '<option value="">Algo Salio Mal!</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Nombre del Producto *</label>
                        <input type="text" name="name" required class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripcion *</label>
                        <textarea name="description" class="form-control" rows="3"></textarea>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Precio *</label>
                        <input type="text" name="price" required class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Cantidad *</label>
                        <input type="text" name="quantity" required class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Imagen *</label>
                        <input type="file" name="image" class="form-control">
                    </div>

                    <div class="col-md-6">
                        <label>Estado(Sin Chequear=Visible,Chequeado=oculto)</label>
                        <br>
                        <input type="checkbox" name="status" style="width:30px;height:30px";>
                    </div>

                    <div class="col-md-6 mb-3 text-end">
                        <br>
                        <button type="submit" name="saveProduct" class="btn btn-primary">Guardar</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>