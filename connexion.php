<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 09:21
 */

header('Access-Control-Allow-Origin: *');


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