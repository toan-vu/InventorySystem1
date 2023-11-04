<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;


    $id = $request['id'];
    $import_ID = $request['import_ID'];
    $date = $request['date'];
    $price = $request['price'];
    $number = $request['number'];
    $brand = $request['brand'];
    $product = $request['product'];
    $user = $request['user'];


$getinf = new Query();
    $products = $getinf->updateEntry($id, $import_ID, $date, $price, $number, $brand, $product, $user);
redirectEntry();