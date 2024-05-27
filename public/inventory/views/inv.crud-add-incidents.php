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

            <div class="ml-3 mt-6">
                <h1 class="text-lg font-medium text-gray-900">Update Product</h1>
                <form action="/inv/Update" method="POST">
                    <div class="flex items-center space-x-2">
                        <label for="product" class="w-20 text-right mx-4">Select Product:</label>
                        <select id="product" name="product" class="border p-1 w-40">
                            <option value="">Select a product</option>
                            <option value="product1">Pliers x300</option>
                            <option value="product2">Hammer T2000</option>
                            <!-- Add more options as needed -->
                        </select>
                    </div>
                    <div class="flex items-center space-x-2">
                        <label for="quantity" class="w-20 text-right mx-4">Quantity:</label>
                        <input type="number" id="quantity" name="quantity" class="border p-1"
                            onkeydown="return event.key !== 'e' && event.key !== 'E'">
                    </div>
                    <input type="submit"
                        class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900">
            </div>
            </form>

            <script src="./../src/route.js"></script>
            <script src="./../src/form.js"></script>
</body>

</html>