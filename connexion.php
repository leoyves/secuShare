<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 09:21
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

require_once('connect.php');

$bdd = connect();
$email=$_POST['email'];
$mot_de_passe =sha1($_POST['mot_de_passe']);

if ($email !=null and $mot_de_passe !=null){
    $sql=$bdd->prepare('select * from user where email=? and mot_de_passe=?');
    $sql->execute(array($email,$mot_de_passe));
    $count=$sql->rowCount($sql);
    if ($count==1) {
        if ($data =$sql->fetch()) {
            echo json_encode(array('status' => "OK",'email'=>$email));
            $_SESSION['email']=$data['email'];
}


    }
}
else
    echo json_encode(array('status' => "login ou mot de passe incorrect"));



?>