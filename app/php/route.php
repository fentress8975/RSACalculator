<?php

$action = explode("?", $_SERVER["REQUEST_URI"]);

switch ($action[0]) {
    case '/calculateEulAndN':
        echo $_SERVER["QUERY_STRING"];
        die();
        break;
    case '/calculateE':
        echo $_SERVER["QUERY_STRING"];
        die();
        break;
    case '/calculateD':
        echo $_SERVER["QUERY_STRING"];
        die();
        break;
    case '/encryptM':
        echo $_SERVER["QUERY_STRING"];
        die();
        break;
    case '/decryptC':
        echo $_SERVER["QUERY_STRING"];
        die();
        break;

    default:
        
        break;
}
