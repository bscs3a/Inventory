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
    <?php require_once __DIR__ . '/../functions/incidents.php'; ?>
    <!-- Start: Incident Reports -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>


        <div class="text-2xl font-semibold px-6 pt-3 pb-3">
            <h1>Incident Reports</h1>
        </div>
        <div class="p-6">
            <div class="border-b border-gray-200">
                <nav class="-mb-px flex space-x-8" aria-label="Tabs">
                    <!-- Tabs -->
                    <a href="#" class="tab whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm" data-tab="1">
                        Product Incidents List
                    </a>
                    <a href="#"
                        class="tab border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 whitespace-nowrap py-4 px-4 border-b-2 font-medium text-sm"
                        data-tab="2">
                        Add Product Incident
                    </a>
                </nav>
            </div>

            <!--Start: Table-->
            <div class="tab-content ml-3 mr-3 flex justify-center overflow-x-auto shadow-md
            sm:rounded-lg border border-gray-600 m-4" data-tab="1">
                <table class="w-full text-sm text-left rtl:text-right text-black">
                    <thead class="text-xs text-black uppercase bg-gray-200 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Incident ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Product ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Image
                            </th>
                            <th scope=" col" class="px-6 py-3">
                                Product Name
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
                            <th scope="col" class="px-6 py-3">
                                Date of Incident
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($incidents as $incident): ?>
                            <tr data-modal-target="<?= $incident['status'] ?>-modal"
                                data-modal-toggle="<?= $incident['status'] ?>-modal"
                                class="clickableRow bg-white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200">
                                <td class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                                    <?= $incident['incident_id'] ?>
                                </td>
                                <td class="px-6 py-4 font-semibold text-black"> 123</td>
                                <td class="px-6 py-6 font-semibold text-black whitespace-nowrap flex items-center">
                                    <img src="<?= $incident['image'] ?>" alt="Image" class="mr-4">
                                </td>
                                <td class="px-6 py-4 font-semibold text-black"><?= $incident['product_name'] ?></td>
                                <td class="px-6 py-4 font-semibold text-black"><?= $incident['category'] ?></td>
                                <td class="px-6 py-4 font-semibold text-black"><?= $incident['quantity'] ?></td>
                                <td class="px-6 py-4 font-semibold text-danger"><?= $incident['status'] ?></td>
                                <td class="px-6 py-4 font-semibold text-black"> 04/15/2024</td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!--End: Table-->

            <!-- Start: Add Prod Inci -->
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
                        <label for="stock_id" class="w-20 text-right mx-4">Incident ID:</label>
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
                        <input type="number" id="quantity" name="quantity" class="border p-1"
                            onkeydown="return event.key !== 'e' && event.key !== 'E'">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="category" class="w-20 text-right mx-4">Date of Incident:</label>
                        <input type="date" id="category" name="category" class="border p-1">
                    </div>

                    <div class="flex items-center space-x-2">
                        <label for="prod" class="w-20 text-right mx-4">Status:</label>
                        <select id="product" name="product" class="border p-1 w-40">
                            <option value="">Select Status</option>
                            <option value="product1">Damage in Transit</option>
                            <option value="product2">Not Delivered</option>
                            <option value="product3">Truck Accident</option>
                            <option value="product4">Cancelled</option>
                            <option value="product1">Stolen</option>
                            <option value="product2">Item Lost</option>
                            <option value="product1">Defective</option>
                            <option value="product2">Other</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <input type="hidden" id="date_added" name="date_added">
                    <input type="submit"
                        class="mt-4 mx-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                </form>
            </div>
            <!-- End: Add -->
            <!-- Defective Modal -->
            <div id="defect-modal"
                class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
                <div
                    class="bg-white rounded shadow-lg w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 h-3/4 sm:h-2/3 md:h-1/2 lg:h-1/3 overflow-auto">
                    <div class="pl-3 pr-3 pt-3 flex">
                        <h5 class="font-bold uppercase text-gray-600">Item Report</h5>
                        <button data-modal-hide="defect-modal"
                            class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>

                    <div class="flex justify-center p-8">
                        <?php
                        // Define descriptions for each status
                        $statusDescriptions = [
                            "damaged in Transit" => "The item (<strong>{$incident['product_name']}</strong>) has been reported as damaged in transit. Please inspect for any visible damages and initiate a claim process if necessary.",
                            "Not Delivered" => "The item (<strong>{$incident['product_name']}</strong>) has not been delivered. Please check the delivery status and contact the shipping provider for further assistance.",
                            "Truck Accident" => "The item (<strong>{$incident['product_name']}</strong>) was involved in a truck accident. Please inspect for damages and coordinate with the carrier for resolution.",
                            "Cancelled" => "The order containing the item (<strong>{$incident['product_name']}</strong>) has been cancelled. Please update inventory and refund the customer if necessary.",
                            "Stolen" => "The item (<strong>{$incident['product_name']}</strong>) has been reported as stolen. Please initiate an investigation and take appropriate actions.",
                            "Item Lost" => "The item (<strong>{$incident['product_name']}</strong>) has been reported as lost. Please contact the carrier to trace the shipment and update the customer.",
                            "Defective" => "The item (<strong>{$incident['product_name']}</strong>) has reportedly found 21 minor defects as of today. Send it for manual recount to take prompt action and resolve the conflict."
                        ];

                        // Check if the status exists in the description array
                        if (array_key_exists($incident['status'], $statusDescriptions)) {
                            echo "<p class='text-center text-black'>{$statusDescriptions[$incident['status']]}</p>";
                        } else {
                            echo "<p class='text-center text-black'>Description not available for this status.</p>";
                        }
                        ?>
                    </div>
                    <div class="flex items-center justify-center mb-8">
                        <button
                            class="rounded-full text-lg bg-sidebar text-white px-6 py-1 hover:bg-slate-600 active:bg-slate-700 duration-75">
                            Send Item for Recount
                        </button>
                    </div>
                </div>
                <!-- Defective Modal End -->


                <!-- Defective Stock Modal JS -->
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                        var modal = document.getElementById('defect-modal');
                        var closeButtons = document.querySelectorAll('[data-modal-hide="defect-modal"]');
                        var openButtons = document.querySelectorAll('.clickableRow');

                        closeButtons.forEach(function (button) {
                            button.addEventListener('click', function () {
                                modal.classList.add('hidden');
                            });
                        });

                        openButtons.forEach(function (button) {
                            button.addEventListener('click', function () {
                                modal.classList.remove('hidden');
                            });
                        });
                    });
                </script>
                <!-- Defective Stock Modal JS end -->

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