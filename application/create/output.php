<?php
require_once '../../process/connect.php';
$getinf = new Query();
$users = $getinf->user();
$brands = $getinf->brand();
$products = $getinf->product();
$customers = $getinf->customer();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/index.css">
    <link rel="stylesheet" href="../../css/order.css">
    <link rel="stylesheet" href="../../css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Inventory System Output</title>
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
            <h2><a href="../index.php">Home</a></h2>
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
            <p>Dashboard</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="../index.php">Home</a></li>
                <li> > </li>
                <li>Import/Export</li>
                <li> > </li>
                <li>Output</li>
            </ul>
        </div>

        <!-- Dashboard output information -->
        <div class="output-detail">
            <form action="../../process/process_output.php" method="post" autocomplete="off" enctype="multipart/form-data">
                <!-- output information-->
                <div class="require-info">
                    <div class="output-detail-box">
                        <label for="outputID">Mã phiếu xuất</label>
                        <input name ="outputID" id="outputID" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="date">Ngày xuất phiếu</label>
                        <input name ="date" id="date" type="date">
                    </div>

                    <div class="output-detail-box">
                        <label for="outputID">Mã nhân viên</label>
                        <select name="employeeID" id="employeeID">

                        <?php
                        foreach ($users as $user): ?>
                            <option value="<?php echo $user["user_ID"] ?>"><?php echo $user["user_ID"] ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="output-detail-box">
                        <label for="outputID">Mã khách hàng</label>
                        <select name="customer" id="customer">

                        <?php
                        foreach ($customers as $customer): ?>
                            <option value="<?php echo $customer["customer_ID"] ?>"><?php echo $customer["customer_ID"] ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>
                    
                </div>

                <!-- dynamic input -->
                <div class="dynamic-input">
                    <div class="output-detail-box">
                        <label for="outputID">Mã sản phẩm</label>
                        <select name="productID" id="productID">

                        <?php
                        foreach ($products as $product): ?>
                            <option value="<?php echo $product["product_ID"] ?>"><?php echo $product["product_ID"] ?></option>
                        <?php endforeach; ?>

                        </select>
                    </div>

                    <div class="output-detail-box">
                        <label for="price">Giá xuất</label>
                        <input name ="price" id="price" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="number">Số lượng xuất</label>
                        <input name ="number" id="number" type="number">
                    </div>

                </div>    
                <i class="add">+</i>
                <button type = "submit" name = "submit">Thêm mới</button>
            </form>
        </div>
        
        

        
    </div>
    <script src="../../js/index.js"></script>
    <script src="../../js/order.js"></script>
    <script src="../../js/output.js"></script>
</body>
</html>