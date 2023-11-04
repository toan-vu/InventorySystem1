<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;

$data = [
    'import_ID' => $request['import_ID'],
    'date' => $request['date'],
    'price' => $request['price'],
    'number' => $request['number'],
    'brand' => $request['brand'],
    'product' => $request['product'],
    'user' => $request['user'],
];

$getinf = new Query();
    $products = $getinf->createEntry($data);
redirectEntry();
