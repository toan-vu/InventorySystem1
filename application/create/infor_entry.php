<?php
require_once '../../process/connect.php';
$id = $_GET['id'];
$getinf = new Query();
$entrys = $getinf->allEntry($id);
$users = $getinf->user();
$brands = $getinf->brand();
$products = $getinf->product();
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
                <li>Entry information</li>
            </ul>
        </div>

        <!-- Dashboard orders information -->
        <?php
            foreach ($entrys as $entry): ?>
        <div class="output-detail">
                <!-- entry information-->
                <div class="require-info">
                    <p>Thông tin cơ bản</p>
                    <div class="output-detail-box">
                        <label for="import_ID">Mã phiếu nhập</label>
                        <input name ="import_ID" id="import_ID" type="text" readonly value = "<?= $entry['import_ID'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="date">Ngày nhập phiếu</label>
                        <input name ="date" id="date" type="date" readonly value = "<?= $entry['import_date'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="user">Mã nhân viên</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $entry['user_ID']?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="user">Tên nhân viên</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $entry['user_first_name']. ' '.$entry['user_last_name'] ?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="brand">Mã nhà cung cấp</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $entry['supplier_ID']?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="brand">Tên nhà cung cấp</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $entry['supplier_name']?>">
                    </div>

                    <div class="output-detail-box">
                        <label for="brand">Địa chỉ nhà cung cấp</label>
                        <input name ="date" id="date" type="" readonly value = "<?= $entry['supplier_address']?>">
                    </div>
                    
                    
                </div>

                <!-- dynamic input -->
                <div class="dynamic-input">
                    <p>Thông tin đơn nhập</p>
                    
                    <table>
                        <tr class="order-box-select">
                            <th>Mã sản phẩm</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá nhập</th>
                            <th>Số lượng nhập</th>
                        </tr>

                        <tr>
                            <td><a href=""></a><?php echo $entry["product_ID"] ?></td>
                            <td><a href=""></a><?php echo $entry["product_name"] ?></td>
                            <td><a href=""></a><?php echo $entry["import_price"] ?></td>
                            <td><a href=""></a><?php echo $entry["import_quantity"] ?></td>                         
                        </tr>
                    </table>
                </div>    
        </div>
        <button type = "button" onclick = "confirmDelete()" class="popup">Xoá</button>

        <div class="confirm-delete-popup">
                <span>XOÁ PHIẾU NHẬP ĐÃ CHỌN?</span>
                <p>Bạn có chắc chắn muốn xoá phiếu nhập đã chọn không ?</p>
                <div class="confirm-popup-button">
                    <button class="confirm-popup-cancel" onclick="closeDeletePopup()">Huỷ bỏ</button>

                    <form method="post" action="../../process/delete_entry.php">
                    <input type="hidden" value="<?php echo $entry["import_ID"] ?>" name="id">
                    <button type = "submit" class="confirm-popup-delete">Xác nhận</button>
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
        
    </div>
    <script src="../../js/index.js"></script>
    <script src="../../js/order.js"></script>
    <script src="../../js/output.js"></script>
    <script src="../../js/deleteConfirm.js"></script>
</body>
</html>