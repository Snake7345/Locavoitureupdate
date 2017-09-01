<?php

require_once('../control/core.php');
require_once('../control/checkboxanswer.php');

if( isset($_POST['utilisateur'])){
    $utilisateur=Model::load("utilisateurs");
    $utilisateur->Employees_desactiv($_POST['utilisateur']);
    
    $answer = new checkboxanswer();
    $answer-> colum = 'Actif';
    $answer-> value = false;
    $answer-> id = $_POST['utilisateur'];
    echo json_encode($answer);
}else{
    echo '0';
}

?>