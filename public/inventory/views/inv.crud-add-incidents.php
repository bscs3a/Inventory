<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Add Product Incidents</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>


        <h2 class="m-5 text-4xl font-bold">Add Product Incidents</h2>
        <div class="p-6">
             <!-- Start: Add Prod Inci -->
             <div class="ml-3 mt-6">
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
                        <input type="number" id="quantity" name="quantity" class="border p-1" onkeydown="return event.key !== 'e' && event.key !== 'E'">
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
                    </div>
        <div class="flex justify-between mt-2 m-3">
            <input type="hidden" id="date_added" name="date_added">
            <input type="submit"
                class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900 hover:bg-violet-900">
                    </form>
            <button route='/inv/reports'
                class="mt-4 items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md hover:bg-violet-900">
                Back
            </button>
        </div>

            <script src="./../src/route.js"></script>
            <script src="./../src/form.js"></script>
</body>

</html>