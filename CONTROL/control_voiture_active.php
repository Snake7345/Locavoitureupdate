<?php

require_once('../control/core.php');

if( isset($_POST['voitureID'])){
    $voiture=Model::load("voitures");
    $voiture->Voitures_louee($_POST['voitureID']);
}else{
    echo '0';
}

?>