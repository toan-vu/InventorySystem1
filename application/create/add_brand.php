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
    <title>Inventory System Add Brand</title>
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
        <div class="sidebar-box">
            <i class="fa-solid fa-sack-dollar" style="color: var(--white, #b8c7ce);"></i>
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
        <div class="sidebar-box-active">
            <i class="fa-solid fa-shop" style="color: var(--white, white);"></i>
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
            <p>Add brand</p>
            <ul>
                <i class="fa-solid fa-palette"></i>
                <li class="home"><a href="../index.php">Home</a></li>
                <li> > </li>
                <li>Brands</li>
                <li> > </li>
                <li>Add Brand</li>
            </ul>
        </div>

        <!-- Dashboard output information -->
        <div class="output-detail">
            <form action="">
                <!-- output information-->
                <div class="require-info">
                    <div class="output-detail-box">
                        <label for="outputID">Mã nhà cung cấp</label>
                        <input name ="outputID" id="outputID" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="outputID">Tên nhà cung cấp</label>
                        <input name ="outputID" id="outputID" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="outputID">Địa chỉ nhà cung cấp</label>
                        <input name ="outputID" id="outputID" type="text">
                    </div>
                    
                    <div class="output-detail-box">
                        <label for="outputID">SĐT liên hệ</label>
                        <input name ="outputID" id="outputID" type="text">
                    </div>

                    <div class="output-detail-box">
                        <label for="outputID">Địa chỉ hòm thư</label>
                        <input name ="outputID" id="outputID" type="email">
                    </div>
                </div>
                <button type = "submit" name = "submit">Thêm mới</button>
            </form>
        </div>
        
        

        
    </div>
    <script src="../../js/index.js"></script>
    <script src="../../js/order.js"></script>
</body>
</html>