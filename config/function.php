<?php
session_start();

require 'dbcon.php';

//validación del campo de entrada
function validate($inputData) {

    global $conn;
    $validatedData = mysqli_real_escape_string($conn, $inputData);
    return trim($validatedData);
}

//redirigir desde 1 pagina a otra pagina con un mensaje(estado)
function redirect($url, $status){

    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);

}

//muestra mensaje o estado luego de algun proceso
function alertMessage() {
    if (isset($_SESSION['status'])) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
          <h6>'.$_SESSION['status'].'</h6>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['status']);
    }
}

//insertar registro usando esta funcion
function insert($tableName, $data) {
    global $conn;

    $table = validate($tableName);

    $columns = array_keys($data);
    $values = array_values($data);

    $finalColumn = implode(',', $columns);
    $finalValues = "'".implode("', '", $values)."'";

    $query = "INSERT INTO $table ($finalColumn) VALUES ($finalValues)";
    $result = mysqli_query($conn, $query);
    return $result;

}

//actualizar datos usando este funcion
function update($tableName, $id, $data) {
    
    global $conn;

    $table = validate($tableName); 
    $id = validate($id);

    $updateDataString = "";

    foreach($data as $column => $value) {
        $updateDataString .= $column.'='."'$value',";
    }

    $finalUpdateData = substr(trim($updateDataString),0,-1);

    $query = "UPDATE $table SET $finalUpdateData WHERE id='$id'";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getAll($tableName, $status = NULL) {
    
    global $conn;
    $table = validate($tableName);
    $status = validate($status);

    if($status == 'status') {
        $query = "SELECT * FROM $table WHERE status='0'";
    }else {
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($conn, $query);
}

function getById($tableName, $id) {
    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result) {

        if(mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_assoc($result);
            $response = [
                'status' => 200,
                'data' => $row,
                'message' =>'Dato encontrado'
            ];
            return $response;

        }else {

            $response = [
                'status' => 404,
                'message' =>'Dato no encontrado'
            ];
            return $response;
        }

    }else {
        $response = [
            'status' => 500,
            'message' => 'Algo salio mal'
        ];
        return $response;
    }
}

//eliminar dato desde base de datos usando id
function delete($tableName, $id) {

    global $conn;

    $table = validate($tableName);
    $id = validate($id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    return $result;

}


function checkParamId($type){

    if(isset($_GET[$type])){
        if ($_GET[$type] != '') {

            return $_GET[$type];
        }else {
            return '<h5>No se encontro ningun ID</h5>';
        }

    }else {
        return '<h5>No se ha proporcionado ningun ID</h5>';
    }

}


// funcion cerrar sesion
function logoutSession() {
    unset($_SESSION['loggedIn']);
    unset($_SESSION['loggedInUser']);
}


?>