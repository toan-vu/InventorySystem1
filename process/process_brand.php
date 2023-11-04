<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;

$data = [
    'id' => $request['id'],
    'name' => $request['name'],
    'price' => $request['price'],
    'number' => $request['number'],
    'category' => $request['category'],
    'status' => $request['status'],
];

$getinf = new Query();
    $products = $getinf->createProduct($data);
redirectProduct();