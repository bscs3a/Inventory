<?php

$path = './public/inventory/views';
$basePath = "$path/inv.";
$testpath = "$path/testing/inv.";

$inv = [
    // Main
    '/inv/main' => $basePath . "main.php",
    // Inventory Products
    '/inv/inventoryProducts' => $basePath . "products.php",
    // Product Process
    '/inv/inventoryProductsProcess' => $basePath . "prod.process.php",
    // Product Returns
    '/inv/returns' => $basePath . "returns.php",
    // Product Incident Reports  
    '/inv/reports' => $basePath . "reports.php",
    // Product Incoming Stocks
    '/inv/incStock' => $basePath . "incStock.php",
    // Account Settings
    '/inv/accountsett' => $basePath . "accountsett.php",
    // Finance Request
    '/inv/req-finance' => $basePath . "fin.request.php",


    //------------------TESTING------------------------
    //--------------CRUD---------------
    //ADD
    '/inv/add' => $testpath . "additem.php",
    //UPDATE
    '/inv/update' => $testpath . "update.php",
    //DELETE 
    '/inv/delete' => $testpath . "delete.php",
    //incoming stocs
    '/inv/incoming' => $testpath . "incomingStocks.php",
    //returns
    '/inv/testreturns' => $testpath . "Testreturns.php",
    //incident reports
    '/inv/incidents' => $testpath . "incidents.php",
    //--------------END CRUD---------------
    //------------------END TESTING------------------------


    // Edit Product
    '/inv/prod-edit={stock_id}' => function ($stock_id) use ($basePath) {
        $_SESSION['stock_id'] = $stock_id;
        include $basePath . "prodEdit.php";
    },



];


//---------------CRUD OPERATIONS-------------------
//------------Product List--------------------------

Router::post('/inv/Add', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $date_added = date('Y-m-d H:i:s');
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadDirectory = '/assets/uploads/';
        $destPath = $uploadDirectory . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $image = $newFileName;
    } else {
        $image = '';
    }
    $stock_id = $_POST['stock_id'];
    $product = $_POST['product'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $prod_stat = $_POST['prod_stat'];
    $stmt = $conn->prepare("INSERT INTO total_stocks (stock_id, image, product, category, price, quantity, prod_stat, date_added) 
                            VALUES (:stock_id, :image, :product, :category, :price, :quantity, :prod_stat, :date_added)");
    $stmt->bindParam(':stock_id', $stock_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':product', $product);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':prod_stat', $prod_stat);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/add");
});
Router::post('/inv/Update', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];

    if (empty($product_id) || empty($quantity)) {
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/inv/update");
        exit();
    }

    $stmt = $conn->prepare("UPDATE total_stocks SET quantity = :quantity WHERE id = :product_id");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/update");
    exit();
});
Router::post('/inv/delete', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    $id = $_POST['id'];

    $stmt = $conn->prepare("DELETE FROM total_stocks WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Execute the statement
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/delete");
    exit();
});
//------------END Product List----------------
//-------------Incoming Stocks-----------------
Router::post('/inv/incoming', function () {
    $db = Database::getInstance();
    $conn = $db->connect();
    $date_added = date('Y-m-d H:i:s');
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadDirectory = '/assets/uploads/';
        $destPath = $uploadDirectory . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $image = $newFileName;
    } else {
        $image = '';
    }
    $product_id = $_POST['product_id'];
    $delivery_id = $_POST['delivery_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $weight = $_POST['weight'];
    $delivery_date = $_POST['delivery_date'];
    $stmt = $conn->prepare("INSERT INTO delivery_inc (product_id, image, product_name, category, quantity, status, date_added, delivery_id, weight, delivery_date) 
                            VALUES (:product_id, :image, :product_name, :category, :quantity, :status, :date_added, :delivery_id, :weight, :delivery_date)");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->bindParam(':delivery_id', $delivery_id);
    $stmt->bindParam(':weight', $weight);
    $stmt->bindParam(':delivery_date', $delivery_date);
    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/incoming");
});
//------------END Incoming Stocks-----------------
//------------Returns-----------------
Router::post('/inv/testreturns', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadDirectory = '/assets/uploads/';
        $destPath = $uploadDirectory . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $image = $newFileName;
    } else {
        $image = '';
    }
    $product_id = $_POST['product_id'];
    $date_added = $_POST['date_added'];
    $return_id = $_POST['return_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $reason = $_POST['reason'];
    $stmt = $conn->prepare("INSERT INTO returns (product_id, image, product_name, category, quantity, reason, date_added, return_id)  
                            VALUES (:product_id, :image, :product_name, :category, :quantity, :reason, :date_added, :return_id)");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':reason', $reason);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->bindParam(':return_id', $return_id);
    $stmt->execute();
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/testreturns");
});
//------------END Returns-----------------
//------------Incident Reports----------------
Router::post('/inv/incidents', function () {
    $db = Database::getInstance();
    $conn = $db->connect();

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name'];
        $fileName = $_FILES['image']['name'];
        $fileSize = $_FILES['image']['size'];
        $fileType = $_FILES['image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $uploadDirectory = '/assets/uploads/';
        $destPath = $uploadDirectory . $newFileName;
        move_uploaded_file($fileTmpPath, $destPath);
        $image = $newFileName;
    } else {
        $image = '';
    }
    $product_id = $_POST['product_id'];
    $date_added = $_POST['date_added'];
    $incident_id = $_POST['incident_id'];
    $product_name = $_POST['product_name'];
    $category = $_POST['category'];
    $quantity = $_POST['quantity'];
    $status = $_POST['status'];
    $stmt = $conn->prepare("INSERT INTO incidents (product_id, image, product_name, category, quantity, status, date_added, incident_id)  
                            VALUES (:product_id, :image, :product_name, :category, :quantity, :status, :date_added, :incident_id)");
    $stmt->bindParam(':product_id', $product_id);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':product_name', $product_name);
    $stmt->bindParam(':category', $category);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->bindParam(':incident_id', $incident_id);
    $stmt->execute();

    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/incidents");
});
//------------END Incident Reports----------------
//------------END OPERATIONS----------------

//------------PRODUCT ORDER----------------
Router::post('/inv/prod-edit', function () {
    // Include Database class if not already included
    // require_once('Database.php');

    $db = Database::getInstance();
    $conn = $db->connect();
    $date_added = date('Y-m-d H:i:s');

    // Sanitize and validate input
    $prodId = isset($_POST['id']) ? intval($_POST['id']) : null;
    $quantity = isset($_POST['quantity']) ? intval($_POST['quantity']) : 0;

    // Check if required fields are empty
    if (empty($prodId) || empty($quantity)) {
        // Redirect if required fields are empty
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/inv/main");
        exit();
    }

    // Assuming you have a table called 'total_stocks' where product stock information is stored
    $stmt = $conn->prepare("SELECT stock_id FROM total_stocks WHERE prodID = :prodID");
    $stmt->bindParam(':prodID', $prodId);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        // Redirect if product ID not found in total_stocks
        $rootFolder = dirname($_SERVER['PHP_SELF']);
        header("Location: $rootFolder/inv/main");
        exit();
    }

    $stockId = $result['stock_id'];

    // Inserting data into 'inventory_orders'
    $stmt = $conn->prepare("INSERT INTO inventory_orders (stock_id, quantity, date_added) VALUES (:stock_id, :quantity, :date_added)");
    $stmt->bindParam(':stock_id', $stockId);
    $stmt->bindParam(':quantity', $quantity);
    $stmt->bindParam(':date_added', $date_added);
    $stmt->execute();

    // Redirect after successful insertion
    $rootFolder = dirname($_SERVER['PHP_SELF']);
    header("Location: $rootFolder/inv/incStock");
    exit();
});







//END OPERATIONS