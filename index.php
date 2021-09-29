<?php
/**
 * Created by PhpStorm.
 * User: ygoti
 * Date: 28/09/2021
 * Time: 14:21
 */

require_once 'classeConnexionUser.php';

if (isset($_POST['valider'])){
    $email=$_POST['email'];
    $mot_de_passe=$_POST['mot_de_passe'];

    $test=new classeConnexionUser();
    $tes=$test->isLogged($email,$mot_de_passe);
}
?>

<h1>connnexion</h1>
<form action="" method="post">
    <h1>connexion</h1>
    <input type="email" name="email">
    <input type="password" name="mot_de_passe">
    <button type="submit" name="valider">Valider</button>
</form>
