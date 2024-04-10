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
                            Reason
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-white">
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
                        <td class="px-6 py-4 font-semibold text-black">
                            <button
                                class="items-end rounded-full w-34 py-2 px-4 bg-violet-950 text-white shadow-md hover:bg-slate-600 active:bg-slate-700 duration-75">
                                Retrieve Product </button>
                        </td>
                    </tr>
                    <tr class="bg-white">
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
                        <td class="px-6 py-4 font-semibold text-black">
                            Void
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            <button
                                class="items-end rounded-full w-34 py-2 px-4 bg-violet-950 text-white shadow-md  hover:bg-slate-600 active:bg-slate-700 duration-75">
                                Retrieve Product </button>
                        </td>
                    </tr>
                    <tr class="bg-white">
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
                        <td class="px-6 py-4 font-semibold text-black">
                            Change of Mind
                        </td>
                        <td class="px-6 py-4 font-semibold text-black">
                            <button
                                class="items-end rounded-full w-34 py-2 px-4 bg-violet-950 text-white shadow-md  hover:bg-slate-600 active:bg-slate-700 duration-75">
                                Retrieve Product </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <!--End: Table-->
        <script src="./../src/route.js"></script>
</body>

</html>