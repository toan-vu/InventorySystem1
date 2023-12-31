<?php
require_once '../process/connect.php';
$getinf = new Query();
$brands = $getinf->brand();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/order.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Inventory System Brands</title>
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
            <h2><a href="index.php">Home</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-user" style="color: var(--white, #b8c7ce);"></i>
            <h2>Users</h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-sack-dollar" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="order.php">Import/Export</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-gear" style="color: var(--white, #b8c7ce);"></i>
            <h2><a href="product.php">Products</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-face-smile" style="color: var(--white, #b8c7ce);"></i>
            <h2>Customers</h2>
        </div>
        <div class="sidebar-box-active">
            <i class="fa-solid fa-shop" style="color: var(--white, white);"></i>
            <h2><a href="brand.php">Brands</a></h2>
        </div>
        <div class="sidebar-box">
            <i class="fa-solid fa-chart-simple" style="color: var(--white, #b8c7ce);"></i>
            <h2>Reports</h2>
        </div>
    </div>
    
    <!-- content -->
    <div class="content">
        <div class="content-title">
            <p>Brands</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="index.php">Home</a></li>
                <li> > </li>
                <li>Brands</li>
            </ul>
        </div>

        <!-- Dashboard orders information -->
        <div class="order-list">
            <div class="add-order">
                <button class="add-order-button" name=""><a href="create/add_brand.php">Thêm nhà cung cấp</a></button>
            </div>
            <div class="order-list-option">
                <button class="order-list-button active button" name="">Danh sách nhà cung cấp</button>
            </div>

            <div class="each-order-list">

                <!-- brands list  -->
                <div class="order-list-box active">
                    <table>
                        <tr class="order-box-select">
                            <th>Mã NCC</th>
                            <th>Tên NCC</th>
                            <th>Địa chỉ</th>
                            <th>Số điện thoại</th>
                            <th>Email</th>
                            <th>Tuỳ chọn</th>
                        </tr>

                        <?php
                        $i = 1;
                        foreach ($brands as $brand): ?>
                        <tr>
                            <td><a href=""></a><?php echo $brand["supplier_ID"] ?></td>
                            <td><a href=""></a><?php echo $brand["supplier_name"] ?></td>
                            <td><a href=""></a><?php echo $brand["supplier_address"] ?></td>
                            <td><a href=""></a><?php echo $brand["supplier_phone"] ?></td>
                            <td><a href=""></a><?php echo $brand["supplier_mail"] ?></td>
                            <td>
                                <a href=""><i class="fa-regular fa-eye"></i></a>
                                <a href=""><i class="fa-solid fa-pencil"></i></a>
                                <i onclick="confirmDelete()" class="fa-solid fa-trash-can"></i>
                                <!-- delete form -->
                                <div class="confirm-delete-popup">
                                    <span>XOÁ PHIẾU NHẬP ĐÃ CHỌN?</span>
                                    <p>Bạn có chắc chắn muốn xoá phiếu nhập đã chọn không ?</p>
                                    <div class="confirm-popup-button">
                                        <button class="confirm-popup-cancel" onclick="closeDeletePopup()">Huỷ bỏ</button>
                                        <form method="POST" action="">
                                        <input type="hidden" value="" name="id">
                                        <button type = "submit" class="confirm-popup-delete">Xác nhận</button>
                                        </form>
                                    </div>
                                </div>

                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

        </div>

        
    </div>
    <script src="../js/index.js"></script>
    <script src="../js/order.js"></script>
        <script src="../js/deleteConfirm.js"></script>
</body>
</html>