<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Dashboard</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">
    

</head>

<body>


    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->

    <main class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

    <?php include "components/header.php" ?>

    <!-- Start: Stats -->
    <div class="text-2xl font-semibold px-6 py-5">
        <h1>Stats</h1>
    </div>

    <div class="grid grid-cols-2 gap-4 m-2">
        
        <div class="flex px-4 w-full rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <h1 class= "text-black font-bold mt-2 mb-4">Total Stocks *</h1> 

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-5xl font-semibold text-center mb-4">1234 Items</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button data-modal-target="totalstock-modal" data-modal-toggle="totalstock-modal" class="items-end font-bold rounded-full w-48 py-2 bg-violet-950 text-white duration-300 shadow-md">
                  Go to Product List </button>
              </div>
        </div>

        <!-- Main modal -->
        <div id="totalstock-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Terms of Service
                        </h3>
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="totalstock-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                        </p>
                        <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                            The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                        </p>
                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="totalstock-modal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                        <button data-modal-hide="totalstock-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Decline</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal JS -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var modal = document.getElementById('totalstock-modal');
                var closeButtons = document.querySelectorAll('[data-modal-hide="totalstock-modal"]');
                var openButton = document.querySelector('[data-modal-target="totalstock-modal"]');
            
                closeButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        modal.classList.add('hidden');
                    });
                });
            
                openButton.addEventListener('click', function() {
                    modal.classList.remove('hidden');
                });
            });
        </script>                        
         <!-- <script src="path/to/your/javascript/file.js"></script> if ever lalagay sa JS na file -->   
        <!-- End of Modal -->

        <div class="flex px-4 w-full rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <h1 class= "text-black font-bold mt-2 mb-4">Incoming Stocks</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-5xl font-semibold text-center mb-4">1234 items</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button class="items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                  View </button>
              </div>
        </div>

        <div class="flex px-4 w-full rounded-lg bg-red-300 border border-gray-600 flex-col shadow-md">
            <h1 class= "text-black font-bold mt-2 mb-4">Out of Stock</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-5xl text-red-950 font-semibold text-center mb-4">5 product(s)</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button class="items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                  View </button>
              </div>
        </div>

        <div class="flex px-4 w-full rounded-lg bg-white border border-gray-600 flex-col shadow-md">
            <h1 class= "text-black font-bold mt-2 mb-4">Returns</h1>

            <div class="flex items-center m-3"> 
              <div class="flex flex-col justify-between flex-grow">
                  <p class="text-5xl font-semibold text-center mb-4">5 item(s)</p>
              </div>
            </div>

            <div class="flex place-content-end mt-2 m-3">
              <button class="items-end font-bold rounded-full w-24 py-2 bg-violet-950 text-white duration-300 shadow-md">
                  View </button>
              </div>
        </div>
    </div>
    <!--End: Stats-->

    <!--Start: Product-->
    <div class="text-2xl font-semibold px-6 pt-3 pb-3">
        <h1>Product</h1>
    </div>

    <div class="flex justify-between px-6 mt-1 mb-4">
        
        <div class="flex place-content-end mt-2 m-3">
            <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-black bg-gray-200 hover:bg-slate-400 font-medium 
            rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center" type="button">
                <i class="ri-arrow-up-s-line mr-3"></i>
                <span class="ml-0.5">Recently Added</span>
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
            </button>

            <!-- Dropdown menu -->
            <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 ">
                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Pliers</a>
                </li>
                <li>
                     <a href="#" class="block px-4 py-2 hover:bg-gray-100">Hammers</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Grippers</a>
                </li>
                <li>
                    <a href="#" class="block px-4 py-2 hover:bg-gray-100">Guns</a>
                </li>
                </ul>
            </div>
        </div>

      </div>
    <!--End: Product-->

    <!--Start: Table-->
    <div class="ml-3 mr-3 flex justify-center overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
    <table class="w-full text-sm text-left rtl:text-right text-black">
        <thead class="text-xs text-black uppercase bg-gray-200 ">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product 
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Availability
                </th>
                <th scope="col" class="px-6 py-3">
                    Quantity
                </th>
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="bg-white">
                <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                    Stanley 84-073 Flat Nose Pliers 6"
                </th>
                <td class="px-6 py-4 font-semibold text-black">
                    Pliers
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Available
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    2999
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Php 500
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    <a route='/inv/prod-edit' class="font-medium hover:underline">Edit</a>
                </td>
            </tr>
            <tr class="bg-white">
                <th scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap">
                    Stanley 84-073 Flat Nose Pliers 6"
                </th>
                <td class="px-6 py-4 font-semibold text-black">
                    Pliers
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Available
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    2999
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    Php 500
                </td>
                <td class="px-6 py-4 font-semibold text-black">
                    <a route='/inv/prod-edit' class="font-medium hover:underline">Edit</a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
    <!--End: Table-->
    <script  src="./../src/route.js"></script>
    
</body>
</html>



