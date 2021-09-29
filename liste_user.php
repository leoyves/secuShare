<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 29/09/2021
 * Time: 09:32
 */

include 'connect.php';
    $bdd = connect();

$sql="SELECT id_user,nom_user,prenom_user,cle_public from user ";
 $req = $bdd->query($sql);
 $tab=array();

 while ( $data=$req->fetch()) {
     $tab[]=$data;
 }
 echo json_encode(array('tab' => $tab));