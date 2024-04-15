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
            <h1>Finance Request</h1>
        </div>

        <div class="flex justify-center gap-4 px-6">
            <div class="w-1/4">
                <h1 class="text-lg font-semibold mb-4">Pay Using</h1>
                <!-- Dropdown button -->
                <select class="w-full border border-gray-300 rounded p-2 text-center mb-2 block">
                    <option value="">Select an option</option>
                    <option value="option1">Debit</option>
                    <option value="option2">Credit</option>
                    <option value="option2">Cash</option>
                </select>
            </div>
            <div class="w-1/4">
                <h1 class="text-lg font-semibold mb-4">Funds</h1>
                <!-- Number only input with Philippine peso sign -->
                <div class="w-full flex items-center border border-gray-300 rounded p-2 block">
                    <span class="mr-2">₱100,000</span>
                    <input type="hidden" name="currency" value="PHP" min="0" step="1" class="w-full focus:outline-none" />
                </div>
            </div>
        </div>

        <!--Start: Table-->
        <div class="ml-3 mr-3 flex overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Inventory Expenses
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Cost (PHP)
                        <th scope="col" class="px-6 py-3">
                            Additional Details
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Ordering Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            5000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost Associated with placing orders
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Inventory Holding Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            3000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of storing inventory
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Shortage Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            1000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of stockouts and lost sales
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Spoilage/Defect Products Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            2000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of damaged or defective inventory
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Inventory Carrying Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            4000
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of holding inventory (storage, insurance)
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Dead Stock Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            1500
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of obsolete or slow-moving inventory
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Excess Stock Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            2500
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of excess inventory
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Ordering Risk Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            1800
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost associated with inventory risk
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Inventory Service Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            2200
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of managing and servicing inventory
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Operational and Administrative Costs
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            3500
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            Cost of operational and administrative tasks
                        </td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap font-bold">
                            Total Cost
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap font-bold">
                            <?php echo 5000 + 3000 + 1000 + 2000 + 4000 + 1500 + 2500 + 1800 + 2200 + 3500; ?>

                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!-- Empty cell -->
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <!--End: Table-->
        <div class="text-right pr-4">
            <input type="submit" class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900">
        </div>


</body>

</html>