<?php
require_once '_autoloader.php';

use Components\Request\Request;

function JsonResponse($array) {
    header('Content-type: application/json');
    echo json_encode($array, JSON_PRETTY_PRINT);
}