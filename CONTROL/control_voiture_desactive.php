<?php

require_once('../control/core.php');

if( isset($_POST['voiture'])){
    $voiture=Model::load("voitures");
    $voiture->Voitures_nlouee($_POST['voiture']);
}else{
    echo '0';
}

?>