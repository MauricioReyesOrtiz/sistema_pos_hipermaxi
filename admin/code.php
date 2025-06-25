<?php

include('../config/function.php');

if (isset($_POST['saveAdmin'])) {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;

    if ($name != '' && $email != '' && $password != '') {

        $emailCheck = mysqli_query($conn, "SELECT * FROM admins WHERE email='$email'");
        if($emailCheck) {
            if(mysqli_num_rows($emailCheck) > 0) {
                redirect('admins-create.php','Correo electronico ya usuado por otro usuario');
            }
        }

        $bcrypt_password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $bcrypt_password,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];
        $result = insert('admins',$data);
        
        if($result){
            redirect('admins.php','Administrador creado correctamente!');
        }else {
            redirect('admins-create.php','Algo salio mal');
        }

    }else {
        redirect('admins-create.php','por favor rellene los campos obligatorios');
    }
}


// actualizar admin
if (isset($_POST['updateAdmin'])){

    $adminId = validate($_POST['adminId']);

    $adminData = getById('admins',$adminId);
    if ($adminData['status'] != 200) {
        redirect('admins-edit.php?id='.$adminId,'por favor rellene los campos obligatorios');
    }
    
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $phone = validate($_POST['phone']);
    $is_ban = isset($_POST['is_ban']) == true ? 1 : 0;

    if($password != '') {
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
    }else {
        $hashedPassword = $adminData['data']['password'];
    }


    if ($name != '' && $email != '') {

        $data = [
            'name' => $name,
            'email' => $email,
            'password' => $hashedPassword,
            'phone' => $phone,
            'is_ban' => $is_ban
        ];
        $result = update('admins', $adminId, $data);
        
        if($result){
            redirect('admins-edit.php?id='.$adminId,'Administrador actualizado correctamente!');
        }else {
            redirect('admins-edit.php?id='.$adminId,'Algo salio mal');
        }

    }else {
        redirect('admins-create.php','por favor rellene los campos obligatorios');
    }
}


// CATEGORIA------------------------------
// guardar categoria
if(isset($_POST['saveCategory'])) {
    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) == true ? 1:0;

    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status
    ];
    $result = insert('categories',$data);
    
    if($result){
        redirect('categories.php','Categoria creada correctamente!');
    }else {
        redirect('categories-create.php','Algo salio mal');
    }
}

// actualizar categoria
if(isset($_POST['updateCategory']))
{
    $categoryId = validate($_POST['categoryId']);

    $name = validate($_POST['name']);
    $description = validate($_POST['description']);
    $status = isset($_POST['status']) == true ? 1:0;

    $data = [
        'name' => $name,
        'description' => $description,
        'status' => $status
    ];
    $result = update('categories', $categoryId, $data);
    
    if($result){
        redirect('categories-edit.php?id='.$categoryId,'Categoria actualizada correctamente!');
    }else {
        redirect('categories-edit.php?id='.$categoryId,'Algo salio mal');
    }
}



?>