<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Returns</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>
    <?php include "components/sidebar.php" ?>
    <?php require_once __DIR__ . '/../functions/inc_stock.php'; ?>

    <!-- Start: Returns-->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Returns-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Returns</h1>
        </div>

        <div class="p-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Tabs -->
                    <a href="#" class="tab whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="1">
                        Product Returns List
                    </a>
                    <a href="#" class="tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="2">
                        Add Product Return
                    </a>
                </nav>
            </div>


            <!--Start: Table-->
            <div class="tab-content ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
                <table class="w-full text-sm text-left rtl:text-right text-black" data-tab="1">
                    <thead class="text-xs text-black uppercase bg-gray-200 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Return ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Category
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Quantity
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Reason
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Return Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Action
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($returns as $row) : ?>
                            <tr class="bg-white">
                                <td class="px-6 py-4 font-semibold text-black whitespace-nowrap"><?= $row['return_id'] ?>
                                </td>
                                <td class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                    <?php if (empty($row['image'])) : ?>
                                        <img src="../public/inventory/views/assets/default.png" class="mr-4" style="width: 4em; height: 4em;">
                                    <?php else : ?>
                                        <img src="<?php echo '/' . $row['image']; ?>" alt="Image" class="mr-4" style="width: 4em; height: 4em;">
                                    <?php endif; ?>
                                </td>
                                <td class="px-6 py-4 font-semibold text-black"><?= $row['product_name'] ?></td>
                                <td class="px-6 py-4 font-semibold text-black"><?= $row['category'] ?></td>
                                <td class="px-6 py-4 font-semibold text-black"><?= $row['quantity'] ?></td>
                                <td class="px-6 py-4 font-semibold text-black">
                                    <?php
                                    if ($row['reason'] == 'In Transit') {
                                        echo "<span class='italic text-yellow-500'>{$row['reason']}</span>";
                                    } elseif ($row['reason'] == 'Shipped') {
                                        echo "<span class='text-yellow-300'>{$row['reason']}</span>";
                                    } elseif ($row['reason'] == 'Delivered') {
                                        echo "<span class='font-bold text-green-500'>{$row['reason']}</span>";
                                    } elseif ($row['reason'] == 'Pending') {
                                        echo "<span class='italic text-red-500'>{$row['reason']}</span>";
                                    } else {
                                        echo $row['reason'];
                                    }
                                    ?>
                                </td>
                                <td class="px-6 py-4 font-semibold text-black"><?= $row['date_added'] ?></td>
                                <td class="px-6 py-4 font-semibold text-black">
                                    <button class="items-end rounded-full w-34 py-2 px-4 bg-violet-950 text-white shadow-md hover:bg-slate-600 active:bg-slate-700 duration-75">
                                        Retrieve Product </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!--End: Table-->

            <!-- Start: Add Prod Return -->
            <div class="tab-content ml-3 mt-6 hidden" data-tab="2">
                <h1 class="text-lg font-medium text-gray-900">
                    Add Product Incident
                </h1>
                <form action="/inv/Add" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <label for="image" class="w-20 text-right mx-4">Image:</label>
                        <input type="file" id="image" name="image" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="stock_id" class="w-20 text-right mx-4">Return ID:</label>
                        <input type="text" id="stock_id" name="stock_id" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="stock_id" class="w-20 text-right mx-4">Product ID:</label>
                        <input type="text" id="stock_id" name="stock_id" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="product" class="w-20 text-right mx-4">Product Name:</label>
                        <input type="text" id="product" name="product" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="category" class="w-20 text-right mx-4">Category:</label>
                        <input type="text" id="category" name="category" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="quantity" class="w-20 text-right mx-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="border p-1" onkeydown="return event.key !== 'e' && event.key !== 'E'">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="category" class="w-20 text-right mx-4">Return Date:</label>
                        <input type="date" id="category" name="category" class="border p-1">
                    </div>

                    <div class="flex items-center space-x-2">
                        <label for="prod" class="w-20 text-right mx-4">Reason:</label>
                        <select id="product" name="product" class="border p-1 w-40">
                            <option value="">Select Reason</option>
                            <option value="Defective">Defective</option>
                            <option value="Void">Void</option>
                            <option value="Wrong Item">Wrong Item</option>
                            <option value="Change of Mind">Change of Mind</option>

                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <input type="hidden" id="date_added" name="date_added">
                    <input type="submit" class="mt-4 mx-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                </form>
            </div>
            <!-- End: Add -->

            <!-- Tabs JS Start -->
            <script>
                document.querySelectorAll('.tab').forEach((tab) => {
                    tab.addEventListener('click', (e) => {
                        e.preventDefault();

                        // Remove active state from all tabs
                        document.querySelectorAll('.tab').forEach((tab) => {
                            tab.classList.remove('border-indigo-500', 'text-indigo-600');
                            tab.classList.add('border-transparent', 'text-gray-500');
                        });

                        // Add active state to clicked tab
                        tab.classList.add('border-indigo-500', 'text-indigo-600');
                        tab.classList.remove('border-transparent', 'text-gray-500');

                        // Hide all tab contents
                        document.querySelectorAll('.tab-content').forEach((content) => {
                            content.classList.add('hidden');
                        });

                        // Show clicked tab's content
                        document.querySelector(`.tab-content[data-tab="${tab.dataset.tab}"]`).classList.remove('hidden');
                    });
                });
            </script>
            <script src="./../src/route.js"></script>
</body>

</html>