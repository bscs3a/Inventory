<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Update Returns</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>

        <h2 class="m-5 text-4xl font-bold">Update Product Returns</h2>
        <div class="p-6">
            <!-- Start: Add Prod Return -->
            <div class=" mt-6">
                <form action="/inv/Add" method="POST" enctype="multipart/form-data" class="space-y-4">
                    <div class="flex items-center space-x-2">
                        <label for="image" class="w-20 text-right mx-4">Image:</label>
                        <input type="file" id="image" name="image" class="border p-1">
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="stock_id" class="w-20 text-right mx-4">Return ID:</label>
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
                        <label for="category" class="w-20 text-right mx-4">Return Date:</label>
                        <input type="date" id="category" name="category" class="border p-1">
                    </div>

                    <div class="flex items-center space-x-2">
                        <label for="prod" class="w-20 text-right mx-4">Reason:</label>
                        <select id="product" name="product" class="border p-1 w-40">
                            <option value="">Select Reason</option>
                            <option value="Defective">Defective</option>
                            <option value="Void">Void</option>
                            <option value="Wrong Item">Wrong Item</option>
                            <option value="Change of Mind">Change of Mind</option>

                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <input type="hidden" id="date_added" name="date_added">
                    <input type="submit"
                        class="mt-4 mx-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                </form>

                <div class="flex place-content-end mt-2 m-3">
                    <button route='/inv/returns'
                        class="items-end font-bold rounded-full w-48 py-2 bg-violet-950 text-white duration-300 shadow-md">
                        Back
                    </button>
                </div>

                <script src="./../src/route.js"></script>
                <script src="./../src/form.js"></script>
</body>

</html>