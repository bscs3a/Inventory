<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incoming Stocks</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>


    <?php include "components/sidebar.php" ?>
    <?php require_once __DIR__ . '/../functions/inc_stock.php'; ?>
    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Finance Request-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Incoming Stocks</h1>
        </div>

        <!--Start: Table-->
        <div class="ml-3 mr-3 flex overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Product ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Image
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Weight(kg)
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delivery Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Delivery Date
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($IncStock as $row) : ?>
                        <tr class="bg-white">
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap"><?= $row['product_id'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                <img src="<?= $row['image'] ?>" alt="Image" class="mr-4">
                            </td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['product_name'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['category'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['quantity'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['weight'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php
                                if ($row['status'] == 'In Transit') {
                                    echo "<span class='italic text-yellow-500'>{$row['status']}</span>";
                                } elseif ($row['status'] == 'Shipped') {
                                    echo "<span class='text-yellow-300'>{$row['status']}</span>";
                                } elseif ($row['status'] == 'Delivered') {
                                    echo "<span class='font-bold text-green-500'>{$row['status']}</span>";
                                } elseif ($row['status'] == 'Pending') {
                                    echo "<span class='italic text-red-500'>{$row['status']}</span>";
                                } else {
                                    echo $row['status'];
                                }
                                ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $row['delivery_date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--End: Table-->
        <script src="./../src/route.js"></script>

</body>

</html>