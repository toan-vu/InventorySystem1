<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;

$data = [
    'outputID' => $request['outputID'],
    'date' => $request['date'],
    'price' => $request['price'],
    'number' => $request['number'],
    'employeeID' => $request['employeeID'],
    'productID' => $request['productID'],
    'customer' => $request['customer'],
];

$getinf = new Query();
    $outputs = $getinf->createOutput($data);
redirectEntry();