<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 11:21
 */

$email=$_GET['email'];
$id_partage=$_POST['id_partage'];

$sql1="SELECT id_user from user where email = '".$email."'";
$req1 = $bdd->query($sql1);

if ($dat=$req1->fetch()) {
    $id = $dat['id_user'];
    $sql=$bdd->prepare("delete from partage where id_partage=? and id_receveur=? ");
    $sql->execute(array($id_partage,$id));

    echo json_encode(array('status' => "OK"));
}