<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;

$value = $_POST['outputID'];
$id = strlen($value);

if(isset($_POST["submit"])){
    if($request['outputID'] == "") {
    echo
      "
      <script>
        alert('Mã phiếu xuất không được để trống.');
        document.location.href = '../application/create/output.php';
      </script>
      ";
    } 
    else if($request['date'] == "") {
    echo
        "
        <script>
        alert('Ngày tháng không được để trống.');
        document.location.href = '../application/create/output.php';
        </script>
        ";
    } 
    else if(strlen($value) != 6) {
    echo
    "
    <script>
    alert('Mã phiếu xuất cần 6 ký tự.');
    document.location.href = '../application/create/output.php';
    </script>
    ";
    } 
    else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $value)) {
    echo
    "
    <script>
    alert('Mã phiếu xuất không hợp lệ.');
    document.location.href = '../application/create/output.php';
    </script>
    ";
    }
    else if($request['employeeID'] == "") {
    echo
        "
        <script>
        alert('Mã nhân viên không được để trống.');
        document.location.href = '../application/create/output.php';
        </script>
        ";
    } 
    else if($request['customer'] == "") {
    echo
        "
        <script>
        alert('Mã khách hàng không được để trống.');
        document.location.href = '../application/create/output.php';
        </script>
        ";
    } 
    else if($request['productID'] == "") {
    echo
        "
        <script>
        alert('Mã sản phẩm không được để trống.');
        document.location.href = '../application/create/output.php';
        </script>
        ";
    } 
    else if($request['price'] == "") {
    echo
        "
        <script>
        alert('Giá xuất không được để trống.');
        document.location.href = '../application/create/output.php';
        </script>
        ";
    } 
    else if($request['price'] < 0) {
    echo
    "
    <script>
    alert('Giá xuất không hợp lệ.');
    document.location.href = '../application/create/output.php';
    </script>
    ";
    }
    else if(preg_match('/[^0-9]/', $request['price'])) {
    echo
    "
    <script>
    alert('Giá xuất không hợp lệ.');
    document.location.href = '../application/create/output.php';
    </script>
    ";
    }
    else if($request['number'] == "") {
    echo
    "
    <script>
    alert('Số lượng nhập không được để trống.');
    document.location.href = '../application/create/output.php';
    </script>
    ";
    } 
    else if($request['number'] == 0) {
    echo
    "
    <script>
    alert('Số lượng nhập không hợp lệ.');
    document.location.href = '../application/create/output.php';
    </script>
    ";
    } else {


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
    echo
    "
    <script>
    alert('Tạo phiếu xuất thành công.');
    document.location.href = '../application/order.php';
    </script>
    ";
}
}