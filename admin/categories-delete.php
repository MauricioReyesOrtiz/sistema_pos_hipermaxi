<?php

require '../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)) {

    $categoryId = validate($paraRestultId);

    $category = getById('categories',$categoryId);


    if($category['status'] == 200) {

        $response = delete('categories', $categoryId);
        if ($response) {

            redirect('categories.php','Category eliminado correctamente.');
        }else {

            redirect('categories.php','algo salio mal');
        }

    } else {

        redirect('categories.php',$category['message']);
    }

}else {
    redirect('categories.php','algo salio mal');
}

?>