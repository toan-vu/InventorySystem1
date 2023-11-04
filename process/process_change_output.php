<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;


    $id = $request['id'];
    $export_ID = $request['outputID'];
    $date = $request['date'];
    $price = $request['price'];
    $number = $request['number'];
    $customer = $request['customer'];
    $productID = $request['productID'];
    $employeeID = $request['employeeID'];


$getinf = new Query();
    $products = $getinf->updateOutput($id, $export_ID, $date, $price, $number, $customer, $productID, $employeeID);
redirectEntry();