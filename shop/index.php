<?php
header('Content-type: json/application');
require '../logicDB/db.php';
require 'methods.php';
$connect = connectDB();
$q = $_GET['q'];
$params = explode('/', $q);
$type = $params[0];
$id = $params[1];
if($type === 'catalog') {
    if(isset($id)) {
        getCatalogElement($connect, $id);
    } else {
        getCatalog($connect);
    }
}

