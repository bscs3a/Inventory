<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Add Products</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <?php
    require_once __DIR__ . "/../functions/db.php";
    $stmt = $conn->query("SELECT * FROM inventory ORDER BY date_added DESC");
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $stmt = $conn->query("SELECT Category_name FROM categories");
    $categories = $stmt->fetchAll();
    ?>

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>


        <h2 class="m-5 text-4xl font-bold">Add Products</h2>
        <div class="p-6">
            <!-- Start: Add Products -->
            <form action="/inv/add-prod" method="POST" enctype="multipart/form-data">
                <div class="ml-3 mt-6">
                    <div class="flex items-center space-x-2">
                        <label for="stock_id" class="w-20 text-right mx-4">Stock ID(SKU):</label>
                        <input type="text" id="stock_id" name="stock_id" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="image" class="w-20 text-right mx-4">Image:</label>
                        <input type="file" id="image" name="image" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="product" class="w-20 text-right mx-4">Product:</label>
                        <input type="text" id="product" name="product" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="category" class="w-20 text-right mx-4">Category:</label>
                        <select id="category" name="category" class="border p-1">
                            <?php foreach ($categories as $category): ?>
                                <option value="<?php echo $category['Category_name']; ?>">
                                    <?php echo $category['Category_name']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="price" class="w-20 text-right mx-4">Price:</label>
                        <input type="text" id="price" name="price" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="quantity" class="w-20 text-right mx-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="border p-1"
                            onkeydown="return event.key !== 'e' && event.key !== 'E'">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="status" class="w-20 text-right mx-4">Product Status:</label>
                        <input type="text" id="status" name="status" class="border p-1" readonly>
                    </div>

                </div>
                <!-- End: Add -->
                <div class="flex justify-between mt-2 m-3">
                    <input type="hidden" id="date_added" name="date_added">
                    <input type="submit"
                        class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900 hover:bg-violet-900">
                    <button route='/inv/inventoryProducts'
                        class="mt-4 items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
                        Back
                    </button>
                </div>
            </form>
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Stock
                            ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Image
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Category</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Price
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Product Status</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <?php foreach ($rows as $row): ?>
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['id']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['stock_id']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['image']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['product']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['category']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['price']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['quantity']; ?></td>
                            <td class="px-6 py-4 whitespace-nowrap"><?php echo $row['status']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <script src="./../src/route.js"></script>
            <script src="./../src/form.js"></script>
            <script>
                document.getElementById('quantity').addEventListener('input', function (e) {
                    var quantity = e.target.value;
                    var statusField = document.getElementById('status');

                    if (quantity == 0) {
                        statusField.value = 'No Stock';
                    } else if (quantity < 499) {
                        statusField.value = 'Understock';
                    } else if (quantity <= 500) {
                        statusField.value = 'On Stock';

                    } else if (quantity > 1000) {
                        statusField.value = 'Overstock';
                    }
                });
            </script>
    </main>
</body>

</html>