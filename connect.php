<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 09:23
 */

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
}

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$ret = [
    'result' => 'OK',
];
print json_encode($ret);

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