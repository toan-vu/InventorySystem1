<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;
$oid = $request['id'];
$value = $_POST['import_ID'];

$id = strlen($value);

if(isset($_POST["submit"])){
    $id = $_POST['import_ID'];
    $brand = $_POST["brand"];
    if($brand == "") {
    echo
      "
      <script>
        alert('Mã nhà cung cấp không được để trống.');
        document.location.href = '../application/create/change_entry.php?id=$oid';
      </script>
      ";
    } 
    else if($request['date'] == "") {
    echo
    "
    <script>
      alert('Ngày nhập không được để trống.');
      document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if($request['price'] == "") {
    echo
    "
    <script>
    alert('Giá nhập không được để trống.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if($request['price'] < 0) {
    echo
    "
    <script>
    alert('Giá nhập không hợp lệ.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    }
    else if(preg_match('/[^0-9]/', $request['price'])) {
    echo
    "
    <script>
    alert('Giá nhập không hợp lệ.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    }
    else if($request['number'] == "") {
    echo
    "
    <script>
    alert('Số lượng nhập không được để trống.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if($request['number'] == 0) {
    echo
    "
    <script>
    alert('Số lượng nhập không hợp lệ.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if($request['product'] == "") {
    echo
    "
    <script>
    alert('Mã sản phẩm không được để trống');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if($request['user'] == "") {
    echo
    "
    <script>
    alert('Mã nhân viên không được để trống.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if($request['import_ID'] == "") {
    echo
    "
    <script>
    alert('Mã đơn hàng không được để trống.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if(strlen($value) != 6) {
    echo
    "
    <script>
    alert('Mã phiếu nhập cần 6 ký tự.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    } 
    else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)) {
    echo
    "
    <script>
    alert('Mã phiếu nhập không hợp lệ.');
    document.location.href = '../application/create/change_entry.php?id=$oid';
    </script>
    ";
    }
    else {

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
    echo
    "
    <script>
    alert('Tạo phiếu nhập thành công.');
    document.location.href = '../application/order.php';
    </script>
    ";
}
}