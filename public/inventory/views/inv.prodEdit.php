<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

</head>

<body>
    <?php include __DIR__ . '/../functions/prod_edit.php'; ?>
    <?php include "components/sidebar.php" ?>

    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!-- Start: Edit content -->
        <div class="flex flex-row flex-wrap justify-center mx-24 mt-8">

            <div class="flex-1 p-4 mt-5 max-w-sm rounded-lg bg-transparent border border-gray-600 flex-col shadow-md">
            </div>

            <div class="flex-1 p-4 w-full max-w-5xl">

                <div class="flex items-start">
                    <!-- ID div -->
                    <div class="mb-6 ml-3 w-1/4 flex-shrink-0">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" disabled>
                        <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">ID</label>
                        <input type="text" id="product" name="product" value="<?php echo $product['id']; ?>" disabled
                            class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                    </div>

                    <!-- Product Name div -->
                    <div class="mb-6 ml-3 flex-1">
                        <input type="hidden" name="id" value="<?php echo $product['id']; ?>" disabled>
                        <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                            Name</label>
                        <input type="text" id="product" name="product" value="<?php echo $product['product']; ?>"
                            disabled
                            class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                    </div>
                </div>

                <div class="mb-6 ml-3">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Category</label>
                    <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>"
                        disabled
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="mb-6 ml-3">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                        Price</label>
                    <input type="text" id="price" name="price" value="<?php echo $product['price']; ?>" disabled
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>
            </div>
        </div>
        <!-- End: Edit content -->


        <!-- Start: Details -->
        <div class="flex flex-row justify-between mx-24 mt-5 relative">

            <div class="flex-1 p-4 mx-5 mt-5 mb-5 rounded-lg bg-white border border-gray-600 flex-col shadow-md">
                <h1 class="text-black text-2xl font-bold ml-2 mt-2">Details</h1>

                <div class="flex justify-between mx-36 my-3 text-xl">
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
                            <button data-modal-target="order-modal" data-modal-toggle="order-modal"
                                class="items-end rounded-full text-lg bg-sidebar text-white px-6 py-1 hover:bg-slate-600 active:bg-slate-700 duration-75">
                                <i class="ri-add-circle-line"></i>
                                <span>Order</span>
                            </button>
                        </div>

                    </div>
                </div>

                <hr class="h-px my-4 bg-gray-200 border-0 mx-24">

                <div class="flex justify-between mx-36 my-5 text-xl">
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

                <hr class="h-px my-6 bg-gray-200 border-0 mx-24">

                <div class="flex justify-between mx-36 my-5 text-xl">
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

                <hr class="h-px my-6 bg-gray-200 border-0 mx-24">

                <div class="flex flex-col mx-36 my-5 text-xl">
                    <div class="mb-8">
                        <p>Description</p>
                    </div>
                    <div class="font-bold">
                        <p>
                            lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem ipsum dolor sit amet lorem
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex justify-end mb-4 mx-4">
            <div class="">
                <button route='/inv/inventoryProducts' ;
                    class="rounded-full text-lg bg-sidebar text-white px-6 py-1 hover:bg-slate-600 active:bg-slate-700 duration-75">
                    Back
                </button>
            </div>
        </div>





        <!-- Order Stock Modal -->
        <div id="order-modal"
            class="modal fixed top-0 left-0 w-full h-full flex items-center justify-center bg-black bg-opacity-50 hidden">
            <div
                class="bg-white rounded shadow-lg w-3/4 sm:w-2/3 md:w-1/2 lg:w-1/3 h-3/4 sm:h-2/3 md:h-1/2 lg:h-1/2 overflow-auto">
                <div class="pl-3 pr-3 pt-3 flex">
                    <h5 class="font-bold uppercase text-gray-600">Order Products</h5>
                    <button data-modal-hide="order-modal"
                        class="ml-auto text-gray-600 hover:text-gray-800 cursor-pointer">
                        <i class="ri-close-line"></i>
                    </button>
                </div>
                <div class="flex justify-center">
                    <div
                        class="p-4 mt-5 rounded-lg bg-transparent border border-gray-600 flex-col shadow-md inline-block">
                        <img src="https://via.placeholder.com/150" alt="Placeholder image">
                    </div>
                </div>
                <div class="flex-1 p-4 w-full max-w-5xl">
                    <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Product
                        Name</label>
                    <select id="product" name="product"
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                        <option value="<?php echo $product['product']; ?>">
                            <?php echo $product['product']; ?>
                        </option>
                        <option value="<?php echo $product['product']; ?>">
                            <?php echo $product['product']; ?>
                        </option>
                        <option value="<?php echo $product['product']; ?>">
                            <?php echo $product['product']; ?>
                        </option>
                    </select>
                </div>

                <div class="flex-1 p-4 w-full max-w-5xl">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Category</label>
                    <input type="text" id="category" name="category" value="<?php echo $product['category']; ?>"
                        disabled
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500">
                </div>

                <div class="flex-1 p-4 w-full max-w-5xl">
                    <label for="large-input" class="block mb-2 text-lg font-medium text-gray-900 my-2">Amount of
                        Products</label>
                    <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>"
                        class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg bg-gray-50 text-base focus:ring-blue-500 focus:border-blue-500"
                        onkeydown="return event.key !== 'e' event.key !== 'E'">
                </div>
                <div class="flex justify-center items-center mt-4 mb-4 space-x-4">
                    <div>
                        <button data-modal-hide="order-modal"
                            class="rounded-full text-lg border border-black text-black px-6 py-1 hover:bg-gray-100 active:bg-gray-300 duration-75">
                            Back
                        </button>
                    </div>
                    <div>
                        <!-- ORDER CONFIRMATION -->
                        <button route='/inv/inventoryProducts'
                            class="rounded-full text-lg bg-sidebar text-white px-6 py-1 hover:bg-slate-600 active:bg-slate-700 duration-75">
                            Order
                        </button>
                    </div>
                </div>
            </div>
        </div>



        <!-- Order Stock Modal JS -->
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                var modal = document.getElementById('order-modal');
                var closeButtons = document.querySelectorAll('[data-modal-hide="order-modal"]');
                var openButton = document.querySelector('[data-modal-target="order-modal"]');

                closeButtons.forEach(function (button) {
                    button.addEventListener('click', function () {
                        modal.classList.add('hidden');
                    });
                });

                openButton.addEventListener('click', function () {
                    modal.classList.remove('hidden');
                });
            });
        </script>

</body>

</html>