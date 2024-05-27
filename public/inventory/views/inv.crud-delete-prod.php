<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Manage Products</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
</head>

<body>

    <?php include "components/sidebar.php" ?>
    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
        <?php include "components/header.php" ?>


        <h2 class="m-5 text-4xl font-bold">Delete Products</h2>
        <div class="p-6">

            <div class=" ml-3 mt-6">
                <h1 class="text-lg font-medium text-gray-900">Delete Product</h1>
                <form action="/inv/delete" method="POST">
                    <div class="flex items-center space-x-2">
                        <label for="id" class="w-20 text-center mx-4">ID:</label>
                        <input type="text" id="id" name="id" class="border p-1">
                    </div>
                    <input type="submit" value="Delete"
                        class="mt-4 font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md cursor-pointer active:bg-violet-900">
                </form>
            </div>


            <script src="./../src/route.js"></script>
            <script src="./../src/form.js"></script>
</body>

</html>