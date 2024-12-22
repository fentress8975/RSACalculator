<?php

$action = explode("?", $_SERVER["REQUEST_URI"]);
header('Content-Type: application/json; charset=UTF-8');
include_once("php/RSACalculator.php");

switch ($action[0]) {
    case '/calculateEulAndN':

        echo json_encode(RSACalculator::calculateEulAndN($_GET['q'],$_GET['p']));
        die();
        break;
    case '/calculateE':
        echo json_encode(RSACalculator::calculateE($_GET['eul']));
        die();
        break;
    case '/calculateD':
        echo json_encode(RSACalculator::calculateD($_GET['e'],$_GET['eul'],));
        die();
        break;
    case '/encryptM':
        $testarr = ['c' => 21321312];
        echo json_encode($testarr);
        die();
        break;
    case '/decryptC':
        $testarr = ['m' => 1018989898];
        echo json_encode($testarr);
        die();
        break;

    default:
        header('Content-Type: text/html; charset=UTF-8');
        break;
}
