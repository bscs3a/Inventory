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
            <input type="text" id="simple-search" class="py-2 px-4 text-md text-black border border-black w-80" placeholder="Search by Category...">
        </div>
        <!-- Searchbar end -->
    </div>
    <!-- Product Request Start -->
    <button route='/inv/prod-edit' class="items-end rounded-full px-2 py-1 bg-violet-950 text-white">
        <i class="ri-add-circle-line"></i>
        <span>Request</span> 
    </button>
    <!-- Product Request End -->
</div>


    <!--Start: Table-->
    <div class="ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
    <table class="w-full text-sm text-left rtl:text-right text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 ">
            <tr>
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
            <tr class="bg-white">
                <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                <img src="image.jpg" alt="PICSUR" class="mr-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </th>
                <td class="px-6 py-4 font-semibold text-black">
                    Pliers
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    1234
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Php500
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Available
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Good Condition
                </td>
            </tr>
            <tr class="bg-white">
                <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                <img src="image.jpg" alt="PICSUR" class="mr-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </th>
                <td class="px-6 py-4 font-semibold text-black">
                    Pliers
                </td>
                <td class="px-6 py-4 font-semibold text-red-500">
                    0
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Php500
                </td>
                <td class="px-6 py-4 font-semibold text-red-500">
                    Out of Stock
                </td>
                <td class="px-6 py-4 font-semibold text-red-500">
                    Defective
                </td>
            </tr>
            <tr class="bg-white">
            <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                <img src="image.jpg" alt="PICSUR" class="mr-4">
                    Stanley 84-073 Flat Nose Pliers 6"
                </th>
                <td class="px-6 py-4 font-semibold text-black">
                    Pliers
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    1234
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Php500
                </td>
                <td class="px-6 py-4 font-semibold text-red-500">
                    Out of Stock
                </td>
                <td class="px-6 py-4 font-semibold text-red-500">
                    Not Found
                </td>
            </tr>
        </tbody>
    </table>
</div>
    <!--End: Table-->
    <script  src="./../src/route.js"></script>
    
</body>
</html>



