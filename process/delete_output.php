<?php

require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;

$data = [
    'id' => $request['id'],
];

$getinf = new Query();
    $products = $getinf->deleteEntry($data);
redirectEntry();