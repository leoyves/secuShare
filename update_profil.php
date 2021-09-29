<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 11:29
 */

include 'connect.php';
$bdd = connect();

$mot_de_passe=sha1($_POST['mot_de_passe']);
$cle_public=$_POST['cle_public'];


$email=$_GET['email'];
//on recupere l'id et le profil de l'utilsateur
$sql1="SELECT id_user,profil from user where email = '".$email."'";
$req1 = $bdd->query($sql1);

if ($dat=$req1->fetch()) {
    $id_user = $dat['id_user'];
    $sql=$bdd->prepare("update user set mot_de_passe=?, cle_public=? where id_user=?");
    $sql->execute(array($mot_de_passe,$cle_public,$id_user));

    echo json_encode(array('status' => "OK"));
}