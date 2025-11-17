<?php
//DAO - Data Access Object
function conectar(){
    require_once('config.php');
    
    $con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    if (mysqli_connect_errno()){
        echo "falha ao conectar-se ao mySQL:" . mysqli_connect_error();
        exit();
    }
    return $con;
}
?>
