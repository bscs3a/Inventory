<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">


</head>

<body>


    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Finance Request-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Product Lists</h1>
        </div>


        <div class="flex justify-between items-center mt-4 p-4">
            <div class="flex items-center">
                <!-- Dropdown button -->
                <button class="bg-white hover:bg-gray-200 text-black border border-black font-bold py-2 px-4 mr-0">
                    Filter
                </button>
                <!-- Dropdown end-->
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" id="simple-search" class="py-2 px-4 text-md text-black border border-black w-80"
                        placeholder="Search by Category...">
                </div>
                <!-- Searchbar end -->
            </div>
            <!-- Product Request End -->
        </div>


        <!--Start: Table-->
        <div class="ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Image
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
                            Price Each
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Availability
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once __DIR__ . '/../functions/total_stock.php';
                    foreach ($rowsTStock as $rowTStock): ?>
                        <tr class="bg-white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200"
                            onclick="location.href='/master/inv/prod-edit?id=<?php echo $rowTStock['id']; ?>'">
                            <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                <img src="<?php echo $rowTStock['image']; ?>" alt="Image" class="mr-4">
                            </th>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['product']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['category']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['quantity']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['price']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['availability']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['prod_stat']; ?>
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