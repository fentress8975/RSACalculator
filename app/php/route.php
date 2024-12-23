<?php


$action = explode("?", $_SERVER["REQUEST_URI"]);
header('Content-Type: application/json; charset=UTF-8');
include_once("php/RSACalculator.php");

//простая проверка на число
function isNumber(...$variable): bool
{
    foreach ($variable as $value) {
        if (!is_numeric($value)) {
            echo json_encode(['error' => 'Получено не число']);
            die();
        }
    }
    return true;
}
isNumber(...$_GET);
//

switch ($action[0]) {
    case '/calculateEulAndN':
        echo json_encode(RSACalculator::calculateEulAndN($_GET['q'], $_GET['p']));
        die();
        break;
    case '/calculateE':
        echo json_encode(RSACalculator::calculateE($_GET['eul']));
        die();
        break;
    case '/calculateD':
        echo json_encode(RSACalculator::calculateD($_GET['e'], $_GET['eul'],));
        die();
        break;
    case '/encryptM':
        echo json_encode(RSACalculator::encryptM($_GET['m'], $_GET['n'], $_GET['e']));
        die();
        break;
    case '/decryptC':
        echo json_encode(RSACalculator::decryptC($_GET['c'], $_GET['d'], $_GET['n']));
        die();
        break;

    default:
        header('Content-Type: text/html; charset=UTF-8');
        break;
}
