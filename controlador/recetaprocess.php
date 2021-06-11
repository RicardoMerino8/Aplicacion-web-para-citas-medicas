<?php

$medicamento = $_POST["medicamento"];
$dosis = $_POST["dosis"];

$arr = array("medicamento"=> $medicamento, "dosis"=>$dosis );
    echo json_encode($arr);

    
?>