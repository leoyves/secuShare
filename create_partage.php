<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 10:04
 */

include 'connect.php';
$bdd = connect();

$fichier=$_POST['fichier'];
$cle_aleatoire=$_POST['cle_aleatoire'];

$nbr_fiche=sizeof($fichier);

//on identifit l'user qui est connecter
$email=$_GET['email'];

$sql1="SELECT id_user from user where email = '".$email."'";
$req1 = $bdd->query($sql1);

if ($dat=$req1->fetch()) {
    $id_envoyeur=$dat['id_user'];

    $sql=$bdd->prepare("insert into partage(id_envoyeur, id_receveur, fichier, cle_aleatoire) values (?,?,?,?)");

    for ($i=0;$i<$nbr_fiche;$i++){
        $id_envoyeur=$_POST['id_envoyeur']['$i'];
        $id_receveur=$_POST['id_receveur']['$i'];
        $fichier=$_POST['fichier'][$i];
        $req=$sql->execute(array($id_envoyeur,$id_receveur,$fichier,$cle_aleatoire));

    }

    echo json_encode(array('status' => "OK"));
}
