<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Incident Reports</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>


    <?php include "components/sidebar.php" ?>
    <!-- Start: Incident Reports -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>


        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Incident Reports</h1>
        </div>


        <div class="flex justify-between items-center mt-2 px-2">
            <div class="px-4">
                <p class="">Today</p>
            </div>
        </div>


        <!--Start: Table-->
        <div class="ml-3 mr-3 flex overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            ID
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
                            Product Status
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200">
                        <th scope=" row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                            1
                        </th>
                        <th scope="row" class="px-6 py-6 font-semibold text-black whitespace-nowrap flex items-center">
                            <img src="image.jpg" alt="Image" class="mr-4">
                            Stanley 84-073 Flat Nose Pliers 6"
                        </th>
                        <td class="px-6 py-4 font-semibold text-black">
                            Pliers
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            1234
                        </td>
                        <td class="px-6 py-4 font-semibold text-danger">
                            Defective
                        </td>
                    </tr>
                    <tr class="bg-white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200">
                        <th scope=" row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                            2
                        </th>
                        <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                            <img src="image.jpg" alt="Image" class="mr-4">
                            Stanley 84-073 Flat Nose Pliers 6"
                        </th>
                        <td class="px-6 py-4 font-semibold text-black">
                            Pliers
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            1234
                        </td>
                        <td class="px-6 py-4 font-semibold text-danger">
                            Item Lost
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!--End: Table-->
        <script src="./../src/route.js"></script>

</body>

</html>