<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Financial Request</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">


</head>

<body>


    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>

        <!--Start: Finance Request-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Request Inventory Needs</h1>
        </div>

        <div class="flex justify-between px-6 mt-1 mb-4">

            <div class="flex place-content-end mt-2 m-3">
                <button route='/inv/prod-edit' class="items-end rounded-full px-2 py-1 bg-violet-950 text-white">
                    <i class="ri-add-circle-line"></i>
                    <span>Request</span>
                </button>
            </div>
        </div>
        <!--End: Product-->

        <!--Start: Table-->
        <div class="ml-3 mr-3 flex overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
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
                            Availability
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                            Greenmade 27 gal Black/Yellow Storage Tote 14.7 in. H X 20.4 in. W X 30.4 in. D Stackable
                        </th>
                        <td class="px-6 py-4 font-semibold text-black">
                            Bins & Baskets
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            Available
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            20
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            Php 4000
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            <a route='/inv/prod-edit' class="font-medium hover:underline">Edit</a>
                        </td>
                    </tr>
                    <tr class="bg-white">
                        <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                            ACE 4-TIER HEAVY DUTY INDUSTRIAL STORAGE RACK
                        </th>
                        <td class="px-6 py-4 font-semibold text-black">
                            Shelves
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            Available
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            10
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            Php 5000
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            <a route='/inv/prod-edit' class="font-medium hover:underline">Edit</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--End: Table-->

</body>

</html>