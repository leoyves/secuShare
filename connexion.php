<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 09:21
 */

require_once('connect.php.php');

$bdd = connect();
$email=$_POST['email'];
$mot_de_passe =$_POST['mot_de_passe'];

$sql=$bdd->prepare('select * from user where email=? and mot_de_passe=?');
$sql->execute(array($email,$mot_de_passe));

$count=$req->rowCount($req);
if ($count==1) {
    if ($data =$req->fetch()) {
        if ($data['profil']=="user") {
            echo json_encode(array('status' => "OK",'email'=>$email));
            $_SESSION['email']=$data['email'];


        }
        elseif ($data['profil']=="admin") {
            echo json_encode(array('status' => "KO"));
        }

    }
}
else
    echo json_encode(array('status' => "KK"));



?>