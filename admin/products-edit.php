<?php include('includes/header.php'); ?>

<div class="container-fluid px-4">
    <div class="card mt-4 shadow-sm">
        <div class="card-header">
            <h4 class="mb-0">Editar Producto
                <a href="products.php" class="btn btn-secondary float-end"><i class="fa-solid fa-arrow-left"></i>Atras</a>
            </h4>
        </div>
        <div class="card-body">

            <?php alertMessage(); ?>

            <form action="code.php" method="post" enctype="multipart/form-data">

                <?php
                    $paramValue = checkParamId('id');
                    if(!is_numeric($paramValue)) {
                        echo '<h5>Id no es un entero</h5>';
                        return false;
                    }

                    $product = getById('products',$paramValue);
                    if($product)
                    {
                        if($product['status'] == 200)
                        {
                ?>

                <input type="hidden" name="product_id" value="<?= $product['data']['id']; ?>">
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
                                        ?>
                                            <option 
                                                value="<?= $cateItem['id']; ?>"
                                                <?= $product['data']['category_id'] == $cateItem['id'] ? 'selected':''; ?>
                                            >
                                                <?= $cateItem['name'];  ?>
                                            </option>
                                        <?php
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
                        <input type="text" name="name" required value="<?= $product['data']['name']; ?>" class="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="">Descripcion *</label>
                        <textarea name="description" class="form-control" rows="3"><?= $product['data']['description']; ?></textarea>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Precio *</label>
                        <input type="text" name="price" required value="<?= $product['data']['price']; ?>" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Cantidad *</label>
                        <input type="text" name="quantity" required value="<?= $product['data']['quantity']; ?>" class="form-control">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="">Imagen *</label>
                        <input type="file" name="image" class="form-control">
                        <img src="../<?= $product['data']['image']; ?>" alt="Img" style="width:40px;height:40px;">
                    </div>

                    <div class="col-md-6">
                        <label>Estado(Sin Chequear=Visible,Chequeado=oculto)</label>
                        <br>
                        <input type="checkbox" name="status" <?= $product['data']['status'] == true ? 'checked':''; ?> style="width:30px;height:30px";>
                    </div>

                    <div class="col-md-6 mb-3 text-end">
                        <br>
                        <button type="submit" name="updateProduct" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i>Actualizar</button>
                    </div>
                </div>
                <?php
 
                        }
                        else
                        {
                            echo '<h5>'.$product['message'].'</h5>';
                        }
                    }
                    else 
                    {
                        echo '<h5>Algo salio mal</h5>';
                        return false;
                    }
                    ?>

            </form>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>