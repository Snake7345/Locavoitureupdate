<?php

require_once('../control/core.php');

if( isset($_POST['utilisateur'])){
    $utilisateur=Model::load("utilisateurs");
    $utilisateur->Employees_desactiv($_POST['utilisateur']);
}else{
    echo '0';
}

?>