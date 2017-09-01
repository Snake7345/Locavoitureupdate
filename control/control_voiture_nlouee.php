<?php

require_once('../control/core.php');
require_once('../control/checkboxanswer.php');

if( isset($_POST['voitureID'])){
    $voiture=Model::load("voitures");
    $voiture->Voitures_nlouee($_POST['voitureID']);
    $answer = new checkboxanswer();
    $answer-> colum = 'Louee';
    $answer-> value = false;
    $answer-> id = $_POST['voitureID'];
    echo json_encode($answer);
}else{
    echo '0';
}