<?php
require_once 'connect.php';
require_once 'helper.php';

$request = $_POST;
$error = array();
$error[] = $request['import_ID'];

if(isset($_POST["submit"])){
    $id = $_POST['import_ID'];
    $brand = $_POST["brand"];
    if($brand == "") {
    echo
      "
      <script>
        alert('Hãy nhập mã Nhà cung cấp');
        document.location.href = '../application/create/entry.php';
      </script>
      ";
    } else if($request['date'] == "") {
        echo
        "
        <script>
          alert('Hãy nhập Ngày tháng');
          document.location.href = '../application/create/entry.php';
        </script>
        ";
        } else if($request['price'] == "") {
            echo
            "
            <script>
            alert('Hãy nhập Giá');
            document.location.href = '../application/create/entry.php';
            </script>
            ";
            } else if($request['number'] == "") {
                echo
                "
                <script>
                alert('Hãy nhập Số lượng');
                document.location.href = '../application/create/entry.php';
                </script>
                ";
                } else if($request['product'] == "") {
                    echo
                    "
                    <script>
                    alert('Hãy nhập Mã sản phẩm');
                    document.location.href = '../application/create/entry.php';
                    </script>
                    ";
                    } else if($request['user'] == "") {
                        echo
                        "
                        <script>
                        alert('Hãy nhập Mã nhân viên');
                        document.location.href = '../application/create/entry.php';
                        </script>
                        ";
                        } else if($request['import_ID'] == "") {
                            echo
                            "
                            <script>
                            alert('Hãy nhập Mã đơn hàng');
                            document.location.href = '../application/create/entry.php';
                            </script>
                            ";
                            } else if(str_word_count($request['import_ID']) != 6) {
                                echo
                                "
                                <script>
                                alert('mã đơn hàng cần 6 ký tự.');
                                document.location.href = '../application/create/entry.php';
                                </script>
                                ";
                                }

}

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
