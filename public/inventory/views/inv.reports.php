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
                            Incident ID
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
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($incidents as $incident) : ?>
                        <tr data-modal-target="<?= $incident['status'] ?>-modal" data-modal-toggle="<?= $incident['status'] ?>-modal" class="clickableRow bg-white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200">
                            <td class="px-6 py-4 font-semibold text-black whitespace-nowrap"><?= $incident['incident_id'] ?></td>
                            <td class="px-6 py-6 font-semibold text-black whitespace-nowrap flex items-center">
                                <img src="<?= $incident['image'] ?>" alt="Image" class="mr-4">
                            </td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $incident['product_name'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $incident['category'] ?></td>
                            <td class="px-6 py-4 font-semibold text-black"><?= $incident['quantity'] ?></td>
                            <td class="px-6 py-4 font-semibold text-danger"><?= $incident['status'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!--End: Table-->


        <!-- Defective Modal -->
        <div id="defect-modal" class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div class="bg-white rounded shadow-lg w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 h-3/4 sm:h-2/3 md:h-1/2 lg:h-1/3 overflow-auto">
                <div class="pl-3 pr-3 pt-3 flex">
                    <h5 class="font-bold uppercase text-gray-600">Item Report</h5>
                    <button data-modal-hide="defect-modal" class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
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
                    <button class="rounded-full text-lg bg-sidebar text-white px-6 py-1 hover:bg-slate-600 active:bg-slate-700 duration-75">
                        Send Item for Recount
                    </button>
                </div>
            </div>
            <!-- Defective Modal End -->

            <!-- Defective Stock Modal JS -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    var modal = document.getElementById('defect-modal');
                    var closeButtons = document.querySelectorAll('[data-modal-hide="defect-modal"]');
                    var openButtons = document.querySelectorAll('.clickableRow');

                    closeButtons.forEach(function(button) {
                        button.addEventListener('click', function() {
                            modal.classList.add('hidden');
                        });
                    });

                    openButtons.forEach(function(button) {
                        button.addEventListener('click', function() {
                            modal.classList.remove('hidden');
                        });
                    });
                });
            </script>
            <!-- Defective Stock Modal JS end -->
            <script src="./../src/route.js"></script>
</body>

</html>