<?php
require_once '../process/connect.php';
$getinf = new Query();
$orders = $getinf->order();
$imports = $getinf->import();
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
    <title>Inventory System Orders</title>
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
        <div class="sidebar-box-active">
            <i class="fa-solid fa-sack-dollar" style="color: var(--white, white);"></i>
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
        <div class="sidebar-box">
            <i class="fa-solid fa-shop" style="color: var(--white, #b8c7ce);"></i>
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
            <p>Import/Export</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="index.php">Home</a></li>
                <li> > </li>
                <li>Import/Export</li>
            </ul>
        </div>

        <!-- Dashboard orders information -->
        <div class="order-list">
            <div class="add-order">
                <button class="add-order-button" name=""><a href="create/entry.php">Tạo đơn nhập</a></button>
                <button class="add-order-button" name=""><a href="create/output.php">Tạo đơn xuất</a></button>
            </div>
            <div class="order-list-option">
                <button class="order-list-button active button" name="">Đơn nhập</button>
                <button class="order-list-button" name="">Đơn xuất</button>
            </div>

            <div class="each-order-list">

                <!-- order for entry  -->
                <div class="order-list-box active">
                    <!-- filter -->
                    <div class="filter">
                        <i class="fa-solid fa-filter"></i>
                        <select name="cars" id="cars">
                            <option value="volvo">Tất cả</option>
                            <option value="saab">Theo Sản Phẩm</option>
                            <option value="mercedes">Theo Ngày</option>
                            <option value="audi">Theo Trạng Thái</option>
                        </select>
                    </div>
                    <!-- entry table -->
                    <table>
                        <tr class="order-box-select">
                            <th>Mã phiếu nhập</th>
                            <th>Ngày nhập phiếu</th>
                            <th>Giá nhập</th>
                            <th>Số lượng nhập</th>
                            <th>Mã nhà cung cấp</th>
                            <th>Mã sản phẩm</th>
                            <th>Mã nhân viên</th>
                            <th>Tuỳ chọn</th>
                        </tr>

                        <?php
                        foreach ($imports as $import): ?>
                        <tr>
                            <td><a href=""></a><?php echo $import["import_ID"] ?></td>
                            <td><a href=""></a><?php echo $import["import_date"] ?></td>
                            <td><a href=""></a><?php echo $import["import_price"] ?></td>
                            <td><a href=""></a><?php echo $import["import_quantity"] ?></td>
                            <td><a href=""></a><?php echo $import["supplier_ID"] ?></td>
                            <td><a href=""></a><?php echo $import["product_ID"] ?></td>
                            <td><a href=""></a><?php echo $import["user_ID"] ?></td>
                            <td>
                                <a href=""><i class="fa-regular fa-eye"></i></a>
                                <a href="create/change_entry.php?id=<?= $import['import_ID'] ?>"><i class="fa-solid fa-pencil"></i></a>
                                <i onclick="confirmDelete()" class="fa-solid fa-trash-can"></i>
                            </td>    
                                <!-- delete form -->
                                <div class="confirm-delete-popup">
                                    <span>XOÁ PHIẾU NHẬP ĐÃ CHỌN?</span>
                                    <p>Bạn có chắc chắn muốn xoá phiếu nhập đã chọn không ?</p>
                                    <div class="confirm-popup-button">
                                        <button class="confirm-popup-cancel" onclick="closeDeletePopup()">Huỷ bỏ</button>

                                        <form method="post" action="../process/delete_entry.php">
                                        <input type="hidden" value="<?php echo $import["import_ID"] ?>" name="id">
                                        <button type = "submit" class="confirm-popup-delete">Xác nhận</button>
                                        </form>
                                    </div>
                                </div>

                            
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>

            <div class="each-order-list">
                <!-- order for output -->
                <div class="order-list-box">
                    <!-- filter -->
                    <div class="filter">
                        <i class="fa-solid fa-filter"></i>
                        <select name="cars" id="cars">
                            <option value="volvo">Tất cả</option>
                            <option value="saab">Theo Sản Phẩm</option>
                            <option value="mercedes">Theo Ngày</option>
                            <option value="audi">Theo Trạng Thái</option>
                        </select>
                    </div>
                    <!-- output table -->
                    <table>
                        <tr class="order-box-select">
                            <th>Mã phiếu xuất</th>
                            <th>Ngày xuất phiếu</th>
                            <th>Giá xuất</th>
                            <th>Số lượng xuất</th>
                            <th>Mã sản phẩm</th>
                            <th>Mã nhân viên</th>
                            <th>Mã khách hàng</th>
                            <th>Tuỳ chọn</th>
                        </tr>

                        <?php
                        $i = 1;
                        foreach ($orders as $order): ?>
                        <tr>
                            <td><a href=""></a><?php echo $order["export_ID"] ?></td>
                            <td><a href=""></a></a><?php echo $order["export_date"] ?></td>
                            <td><a href=""></a><?php echo $order["export_price"] ?></td>
                            <td><a href=""></a><?php echo $order["export_quantity"] ?></td>
                            <td><a href=""></a><?php echo $order["product_ID"] ?></td>
                            <td><a href=""></a><?php echo $order["user_ID"] ?></td>
                            <td><a href=""></a><?php echo $order["customer_ID"] ?></td>
                            <td>
                                <a href=""><i class="fa-regular fa-eye"></i></a>
                                <a href="create/change_output.php?id=<?= $order['export_ID'] ?>"><i class="fa-solid fa-pencil"></i></a>
                                <i onclick="confirmDeleteOutput()" class="fa-solid fa-trash-can"></i>
                                <!-- delete form -->
                                <div class="confirm-delete-output-popup">
                                    <span>XOÁ PHIẾU XUẤT ĐÃ CHỌN ?</span>
                                    <p>Bạn có chắc chắn muốn xoá phiếu xuất đã chọn không ?</p>
                                    <div class="confirm-popup-output-button">
                                        <button class="confirm-popup-output-cancel" onclick="closeDeleteOutput()">Huỷ bỏ</button>
                                        <form method="POST" action="../process/delete_output.php">
                                        <input type="hidden" value="<?php echo $order["export_ID"] ?>" name="id">
                                        <button type = "submit" class="confirm-popup-output-delete">Xác nhận</button>
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