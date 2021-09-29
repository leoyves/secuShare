<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 10:21
 */

include 'connect.php';
$bdd = connect();

$nom_user=$_POST['nom_user'];
$prenom_user=$_POST['prenom_user'];
$email=$_POST['email'];
$mot_de_passe=sha1($_POST['mot_de_passe']);
$cle_public=$_POST['cle_public'];


$email=$_GET['email'];
//on recupere l'id et le profil de l'utilsateur
$sql1="SELECT id_user,profil from user where email = '".$email."'";
$req1 = $bdd->query($sql1);

if ($dat=$req1->fetch()) {
    $id_user = $dat['id_user'];
    $profil=$dat['profil'];

    //on verifie que le  profil correspond a un admin et on fait l'enregistrement

    if ($profil=="admin"){
        $sql=$bdd->prepare("insert into user(nom_user, prenom_user, email, mot_de_passe, cle_public) values (?,?,?,?,?)");
        $req=$sql->execute(array($nom_user,$prenom_user,$email,$mot_de_passe,$cle_public));


        echo json_encode(array('status' => "OK"));

    }else{
        echo json_encode(array('status' => "ACCES DENIED"));
    }

}