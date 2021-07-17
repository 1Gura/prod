<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *, Authorization');
header('Access-Control-Allow-Methods: *,');
header('Access-Control-Allow-Credentials: true');
header('Content-type: json/application');

require '../logicDB/db.php';
require 'methods.php';

$connect = connectDB();
$q = $_GET['q'];
$method = $_SERVER['REQUEST_METHOD'];
$params = explode('/', $q);
$type = $params[0];
$id = $params[1];

switch ($method) {
    case $method === 'GET':
        if ($type === 'catalog') {
            if (!empty($_GET['category'])) {
                getCatalog($connect, $_GET['category']);
            } else if (isset($id)) {
                getCatalogElement($connect, $id);
            } else {
                getCatalog($connect);
            }
        }
        break;
    case $method === 'POST':
        if ($type === 'catalog') {
            addElementCatalog($connect, $_POST);
        }
        break;
}





