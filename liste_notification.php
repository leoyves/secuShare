<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 09:37
 */

include 'connect.php';
$bdd = connect();

//on identifit l'user qui est connecter
$email=$_GET['email'];

$sql1="SELECT id_user from user where email = '".$email."' ";
$req1 = $bdd->query($sql1);

if ($dat=$req1->fetch()) {
    $id=$dat['id_user'];

    $sql="SELECT id_partage, fichier,date_envoie from partage,user where partage.id_receveur='".$id."' and user.id_user='".$id."' ";
    $req = $bdd->query($sql);
    $tab=array();

    while ( $data=$req->fetch()) {
        $tab[]=$data;
    }
    echo json_encode(array('tab' => $tab));
}


