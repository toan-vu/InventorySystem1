<?php
abstract class connection {
    protected $DB_TYPE;
    protected $DB_HOST;
    protected $DB_NAME;
    protected $USER;
    protected $PW;
    protected $connection;

    public function __construct() {
        $this->DB_TYPE = 'mysql';
        $this->DB_HOST = 'localhost';
        $this->DB_NAME = 'inventory';
        $this->USER = 'root';
        $this->PW = '';
        $this->connection = $this->conn();
    }

    public function conn() {
        try {
            $conn = new PDO("$this->DB_TYPE:host=$this->DB_HOST;dbname=$this->DB_NAME", $this->USER, $this->PW);
            $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $conn;
        } catch (Exception $e) {
            die("Connection failed: " . $e->getMessage());
        }
    }
    public function prepareSQL($sql) {
        return $this->connection->prepare($sql);
}
}
class Query extends connection {
    // select table information
    public function order() {
        $sql = "SELECT * FROM export";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function import() {
        $sql = "SELECT * FROM import";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function product() {
        $sql = "SELECT * FROM product";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function customer() {
        $sql = "SELECT * FROM customer";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function brand() {
        $sql = "SELECT * FROM supplier";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function user() {
        $sql = "SELECT * FROM user";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function select($data) {
        $sql = "SELECT * FROM import WHERE import_ID = '$data'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
    public function selectOutput($data) {
        $sql = "SELECT * FROM export WHERE export_ID = '$data'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // insert data
    public function createEntry($data) {
        $sql = "INSERT INTO import (import_ID, import_date, import_price, import_quantity, supplier_ID, product_ID, user_ID) 
        VALUES (:import_ID, :date, :price, :number, :brand, :product, :user)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }
    
    public function createOutput($data) {
        $sql = "INSERT INTO export (export_ID, export_date, export_price, export_quantity, product_ID, user_ID, customer_ID) 
        VALUES (:outputID, :date, :price, :number, :productID, :employeeID, :customer)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function createProduct($data) {
        $sql = "INSERT INTO product (product_ID, product_name, product_category, product_quantity, product_status, product_price) 
        VALUES (:id, :name, :category, :number, :status, :price)";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    // delete data
    public function deleteEntry($data) {
        $sql = "DELETE FROM import 
         WHERE import_ID = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function deleteOutput($data) {
        $sql = "DELETE FROM export 
         WHERE export_ID = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    

    // update data
    public function updateEntry($id, $import_ID, $date, $price, $number, $brand, $product, $user) {
        $sql = "UPDATE import SET import_ID = '$import_ID', import_date = '$date', import_price = '$price',
        import_quantity = '$number', supplier_ID = '$brand', product_ID = '$product' , user_ID = '$user' 
        WHERE import.import_ID = '$id'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
    }

    // public function minusProduct($data) {
    //     $sql = "UPDATE product SET product_quantity = (product_quantity - :number) WHERE product_ID = :productID";
    //     $stmt = $this->prepareSQL($sql);
    //     $stmt->execute($data);
    // }

    public function updateOutput($id, $export_ID, $date, $price, $number, $customer, $productID, $employeeID) {
        $sql = "UPDATE export SET export_ID = '$export_ID', export_date = '$date', export_price = '$price',
        export_quantity = '$number', product_ID = '$productID', user_ID = '$employeeID' , customer_ID = '$customer' 
        WHERE export.export_ID = '$id'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
    }

// useless
    public function all_ad() {
        $sql = "SELECT * 
        FROM product_order 
        INNER JOIN orders ON product_order.orderId = orders.orderId
        INNER JOIN customer ON orders.cusId = customer.cusId
        GROUP BY orders.orderId";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function search() {
        $sql = "SELECT * 
        FROM product_order 
        INNER JOIN orders ON product_order.orderId = orders.orderId
        INNER JOIN customer ON orders.cusId = customer.cusId WHERE orderStatus LIKE '%$search%'";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }


    

    

    public function updateStatus($data) {
        $sql = "UPDATE orders SET orderStatus = 5 WHERE orderId = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    public function updateConfirmStatus($data) {
        $sql = "UPDATE orders SET orderStatus = 2 WHERE orderId = :id";
        $stmt = $this->prepareSQL($sql);
        $stmt->execute($data);
    }

    // public function select($data) {
    //     $sql = "SELECT * FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
    //     INNER JOIN orders ON product_order.orderId = orders.orderId 
    //     INNER JOIN customer ON orders.cusId = customer.cusId
    //     INNER JOIN product_img ON product_img.SKU = product.SKU
    //     INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$data'";
    //     $stmt = $this->prepareSQL($sql);
    //     $stmt->execute();
    //     return $stmt->fetchAll();
    // }

    public function select_brand($data) {
    $sql = "SELECT * FROM product INNER JOIN product_order ON product.SKU = product_order.SKU 
    INNER JOIN orders ON product_order.orderId = orders.orderId 
    INNER JOIN customer ON orders.cusId = customer.cusId
    -- INNER JOIN product_img ON product_img.SKU = product.SKU
    INNER JOIN brand ON brand.brandId = product.brandId WHERE orders.orderId  = '$data' GROUP BY product.brandId";
    $stmt = $this->prepareSQL($sql);
    $stmt->execute();
    return $stmt->fetchAll();
}
}
