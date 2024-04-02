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


        <!--Start: Table-->
        <div
            class="mx-auto max-w-sm p-4 flex flex-col justify-center items-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600">
            <h1 class="text-center text-lg font-semibold mb-4">Pay Using</h1>
            <!-- Dropdown button -->
            <select class="w-full border border-gray-300 rounded p-2 text-center mb-2">
                <option value="">Select an option</option>
                <option value="option1">Paymaya</option>
                <option value="option2">Gcash</option>
                <option value="option2">MetroBank</option>
            </select>
            <h1 class="text-center text-lg font-semibold mb-4">Amount</h1>
            <!-- Number only input with Philippine peso sign -->
            <div class="w-full flex items-center border border-gray-300 rounded p-2">
                <span class="mr-2">₱</span>
                <input type="number" min="0" step="1" class="w-full focus:outline-none" />
            </div>
        </div>
        <!--End: Table-->

</body>

</html>