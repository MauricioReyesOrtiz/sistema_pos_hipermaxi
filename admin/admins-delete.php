<?php

require '../config/function.php';

$paraRestultId = checkParamId('id');
if(is_numeric($paraRestultId)) {

    $adminId = validate($paraRestultId);

    $admin = getById('admins',$adminId);
    if($admin['status'] == 200) {

        $adminDeleteRes = delete('admins', $adminId);
        if ($adminDeleteRes) {
            redirect('admins.php','Admin eliminado correctamente.');
        }else {
            redirect('admins.php','algo salio mal');
        }

    } else {

        redirect('admins.php',$admin['message']);
    }
    // echo $adminId;

}else {
    redirect('admins.php','algo salio mal');
}

?>