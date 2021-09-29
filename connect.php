<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 09:23
 */
header('Access-Control-Allow-Origin: *');



function connect() {
    $conn = NULL;
    try{
        /*On essaie d'etablir la connexion*/
        $conn = new PDO("mysql:host=localhost;dbname=secushare", "root", "");

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        /*Si elle echoue, on recupere l'erreur et on l'affiche*/
        echo 'ERROR: ' . $e->getMessage();
    }
    return($conn);
}


 ?>