<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

</head>

<body>
    <?php include __DIR__ . '/../functions/prod_edit.php'; ?>
    <?php include "components/sidebar.php" ?>

    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!-- Start: Edit content -->
        <div class="flex flex-row flex-wrap justify-center mx-24 mt-8">

            <div class="flex-1 p-4 mt-5 max-w-lg rounded-lg bg-white border border-gray-600 flex-col shadow-md">
                <!--Need Fixing: Image Input-->
                <img class="flex mx-24" id="image-preview" src="" alt="Image Preview" style="display: none;">
                <input type="file" accept="image/*" id="photo-upload" onchange="previewImage(event)">
            </div>

            <script>
                function previewImage(event) {
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = new Image();
                        img.onload = function () {
                            if (this.width > 800 || this.height > 400) {
                                alert('Image dimensions must be less than 800 x 400 pixels.');
                                document.getElementById('photo-upload').value = '';
                            } else {
                                var output = document.getElementById('image-preview');
                                output.src = reader.result;
                                output.style.display = 'block';
                            }
                        };
                        img.src = e.target.result;
                    };
                    reader.readAsDataURL(event.target.files[0]);
                }
            </script>

            <div class="flex-1 p-4 w-96 max-w-5xl">
                <div class="mb-6 ml-3">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                        Name</label>
                    <input type="text" id="product" name="product" value="<?php echo $product['product']; ?>"
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>
                <div class="mb-6 ml-3">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Category</label>
                    <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>"
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6 ml-3">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                        Price</label>
                    <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>"
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
        <!-- End: Edit content -->


        <!-- Start: Details -->
        <div class="flex flex-row flex-wrap justify-between mx-24 mt-10">

            <div class="flex-1 p-4 mx-16 mt-5 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
                <h1 class="text-black text-2xl font-bold ml-2 mt-2">Details</h1>

                <div class="flex justify-between mx-36 my-5 text-2xl">
                    <div>
                        <p>Stocks</p>
                    </div>

                    <div class="flex justify-evenly">
                        <div class="px-2">
                            <p class="font-bold">
                                <?php
                                echo $product['quantity']; ?>
                            </p>
                        </div>

                        <div class="px-2">
                            <button class="items-end rounded-full text-lg bg-violet-950 text-white px-6 py-1">
                                <i class="ri-add-circle-line"></i>
                                <span>Order</span>
                            </button>
                        </div>

                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-200 border-0 mx-24">

                <div class="flex justify-between mx-36 my-5 text-2xl">
                    <div>
                        <p>Availability</p>
                    </div>
                    <div>
                        <p class="font-bold">
                            <?php
                            echo $product['availability']; ?>
                        </p>
                    </div>
                </div>

                <hr class="h-px my-8 bg-gray-200 border-0 mx-24">

                <div class="flex justify-between mx-36 my-5 text-2xl">
                    <div>
                        <p>Product Status</p>
                    </div>
                    <div>
                        <p class="font-bold">
                            <?php
                            echo $product['prod_stat']; ?>
                        </p>
                    </div>
                </div>
            </div>

        </div>

        <!-- <div class="flex place-content-end mr-40">
            <div class="flex justify-end px-4 mt-0">
                <div class="flex place-content-end mt-10 mr-2">
                    <button route='/inv/inv/main'
                        class="items-end rounded-lg w-24 px-2 py-1 border border-black bg-yellow text-black hover:bg-gray-200 active:bg-gray-300 duration-100">
                        Cancel </button>
                </div>
            </div>
            <div class="flex place-content-end mt-10">
                <button
                    class="items-end rounded-lg w-24 px-2 py-1 font-bold border border-black bg-button1 hover:bg-yellow-600 active:bg-yellow-700 text-black duration-300">
                    Save </button>
            </div>
        </div> -->

</body>

</html>