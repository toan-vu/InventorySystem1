<?php
require_once '../../process/connect.php';
$id = $_GET['id'];
$getinf = new Query();
$outputs = $getinf->allOutput($id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/order.css">
    <link rel="stylesheet" href="../../css/infor.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Inventory System Entry</title>
</head>
<body>
    <!-- navbar -->
    <div class="navbar">
        <div class="navbar-box">
            <i class="fa-solid fa-bars active" style="color: #0071AF;"></i>
            <div class="navbar-user">
                <i class="fa-regular fa-circle-user"></i>
                <span>User#1</span>
                <i class="fa-solid fa-chevron-down"></i>
            </div>
        </div>
    </div>    
    <!--sidebar  -->
    <div class="sidebar">
        <h1>Inventory System</h1>
        <div class="sidebar-box">
            <i class="fa-solid fa-house" style="color: #b8c7ce;"></i>
            <h2><a href="../index.php">Trang chủ</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-user" style="color: var(--white, #b8c7ce);"></i>
            <h2>Users</h2>
        </div>
        <div class="sidebar-box-active">
            <i class="fa-solid fa-sack-dollar" style="color: var(--white, white);"></i>
            <h2><a href="../order.php">Import/Export</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-gear" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="../product.php">Products</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-face-smile" style="color: var(--white, #b8c7ce);"></i>
            <h2>Customers</h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-shop" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="../brand.php">Brands</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-chart-simple" style="color: var(--white, #b8c7ce);"></i>
            <h2>Reports</h2>
        </div>
    </div>
    
    <!-- content -->
    <div class="content">
        <div class="content-title">
            <p>Entry information</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="../index.php">Home</a></li>
                <li> > </li>
                <li>Import/Export</li>
                <li> > </li>
                <li>Output information</li>
            </ul>
        </div>

        <!-- Dashboard orders information -->
        <?php
            foreach ($outputs as $output): ?>
        <div class="output-detail">
                <!-- output information-->
                <div class="require-info">
                    <p>Thông tin cơ bản</p>
                    <div class="output-detail-box">
                        <label for="import_ID">Mã phiếu xuất</label>
                        <input name ="import_ID" id="import_ID" type="text" readonly value = "<?= $output['export_ID'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="date">Ngày xuất phiếu</label>
                        <input name ="date" id="date" type="date" readonly value = "<?= $output['export_date'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="user">Mã nhân viên</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $output['user_ID']?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="user">Tên nhân viên</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $output['user_first_name']. ' '.$output['user_last_name'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="brand">Mã khách hàng</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $output['customer_ID']?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="brand">Tên khách hàng</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $output['customer_name']?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="brand">Địa chỉ khách hàng</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $output['customer_address']?>">
                    </div>
                    
                    
                </div>

                <!-- dynamic input -->
                <div class="dynamic-input">
                    <p>Thông tin đơn xuất</p>
                    
                    <table>
                        <tr class="order-box-select">
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá nhập</th>
                            <th>Số lượng nhập</th>
                        </tr>

                        <tr>
                            <td><a href=""></a><?php echo $output["product_ID"] ?></td>
                            <td><a href=""></a><?php echo $output["product_name"] ?></td>
                            <td><a href=""></a><?php echo $output["export_price"] ?></td>
                            <td><a href=""></a><?php echo $output["export_quantity"] ?></td>                         
                        </tr>
                    </table>
                </div>    
        </div>
        <?php endforeach; ?>
        
    </div>
    <script src="../../js/index.js"></script>
    <script src="../../js/order.js"></script>
    <script src="../../js/output.js"></script>
</body>
</html>