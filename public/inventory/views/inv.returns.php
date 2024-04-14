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


        <div class="flex justify-between items-center mt-2 px-2">
            <div class="px-4">
                <p class="">Today</p>
            </div>
        </div>


        <!--Start: Table-->
        <div class="ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
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
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap"><?= $row['return_id'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                <img src="<?= $row['image'] ?>" alt="Image" class="mr-4">
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
        <script src="./../src/route.js"></script>
</body>

</html>