<?php

$action = explode("?", $_SERVER["REQUEST_URI"]);
header('Content-Type: application/json; charset=UTF-8');

switch ($action[0]) {
    case '/calculateEulAndN':

        $testarr = ['eul' => 101, 'n' => 202];
        echo json_encode($testarr);
        die();
        break;
    case '/calculateE':
        $testarr = ['e' => 101000];
        echo json_encode($testarr);
        die();
        break;
    case '/calculateD':
        $testarr = ['d' => 303003];
        echo json_encode($testarr);
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
