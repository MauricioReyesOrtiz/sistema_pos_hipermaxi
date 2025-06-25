<?php

if(isset($_SESSION['loggedIn'])) {

    $email = validate($_SESSION['loggedInUser']['email']);

    $query = "SELECT * FROM admins WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if(mysqli_num_rows($result) == 0) {

        logoutSession();
        redirect('../login.php','Acceso Denegado!');
        
    }else {
        $row = mysqli_fetch_assoc($result);
        if($row['is_ban'] == 1) {
            logoutSession();
            redirect('../login.php','Tu cuenta ha sido baneada! por favor contacta a tu administador');
        }
    }
}
else
{
    redirect('../login.php','Inicia Sesion para continuar...');
}


?>