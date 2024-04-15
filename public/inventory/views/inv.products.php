<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Products</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">


</head>

<body>


    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Product List-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-0">
            <h1>Product List</h1>
        </div>

        <!-- Filter Searchbar Start -->
        <div class="flex justify-between mt-4 p-6">
            <div class="flex items-center ">
                <!-- Dropdown button -->
                <button class="bg-white hover:bg-gray-200 text-black border border-black font-bold py-1 px-4 mr-0">
                    Filter
                </button>
                <!-- Dropdown end-->
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" id="simple-search"
                        class="py-1 px-4 text-md text-black border border-black w-80 mobile:w-96"
                        placeholder="Search by Category...">
                </div>
                <!-- Searchbar end -->
            </div>
            <!-- Product Request End -->
        </div>


        <!-- Start: Date Filter Panel-->
        <div class="flex justify-evenly mt-0 px-6 w-24 ">
            <!-- Search Bar 1 -->
        </div>

        <!-- Start: ShowEntries & Excel Print Buttons-->
        <div class="flex items-center ml-5 mt-5 px-2 mb-3">
            <label for="entries" class="mr-2">Show</label>
            <div class="relative">
                <select id="entries"
                    class="border border-gray-300 rounded-md text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
                    <option>50</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 12l-6-6h12" />
                    </svg>
                </div>
            </div>
            <span class="ml-2">entries</span>
        </div>

        <div class="inline-flex rounded-md shadow-sm mx-5" role="group">
            <button type="button"
                class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">Copy</span>
            </button>
            <button type="button"
                class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">PDF</span>
            </button>
            <button type="button"
                class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">Excel</span>
            </button>
            <button type="button"
                class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">Print</span>
            </button>
        </div>
        <!-- End: ShowEntries & Excel Print Buttons-->

        <!-- End: Filter Panel-->

        <!--Start: Table-->
        <div class="ml-3 mr-3 flex overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Stock ID
                        </th>
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once __DIR__ . '/../functions/total_stock.php';
                    foreach ($rowsTStock as $rowTStock): ?>
                        <tr class="bg-white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200"
                            onclick="location.href='/master/inv/prod-edit=<?php echo $rowTStock['stock_id']; ?>'">
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['stock_id']; ?>
                            </td>
                            <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                <img src="<?php echo empty($rowTStock['image']) ? 'assets/default.png' : $rowTStock['image']; ?>"
                                    alt="Image" class="mr-4">
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
                                <?php
                                if ($rowTStock['quantity'] == 0) {
                                    echo "<span style='color:red'>Out of Stock</span>";
                                } elseif ($rowTStock['quantity'] <= 500) {
                                    echo "<span style='color:yellow'>Understock</span>";
                                } elseif ($rowTStock['quantity'] >= 501 && $rowTStock['quantity'] <= 999) {
                                    echo "<span style='color:green'>Stable Stock</span>";
                                } else {
                                    echo "<span style='color:#ff9933'>Overstock</span>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--End: Table-->

</body>

</html>