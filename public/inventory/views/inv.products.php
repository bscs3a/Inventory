<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory/Products</title>
    <link href="./../src/tailwind.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon/fonts/remixicon.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>


</head>

<body>


    <?php include "components/sidebar.php" ?>
    <!-- Start: Dashboard -->

    <main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">

        <?php include "components/header.php" ?>

        <!--Start: Product List-->
        <div class="text-2xl font-semibold px-6 pt-3 pb-0">
            <h1>Product List</h1>
        </div>

        <!-- Filter Searchbar Start -->
        <div class="flex justify-between mt-4 p-6">
            <div class="flex items-center ">
                <!-- Dropdown button -->
                <button class="bg-white hover:bg-gray-200 text-black border border-black font-bold py-1 px-4 mr-0">
                    Filter
                </button>
                <!-- Dropdown end-->
                <!-- Search Bar -->
                <div class="relative">
                    <input type="text" id="simple-search" class="py-1 px-4 text-md text-black border border-black w-80 mobile:w-96" placeholder="Search by Category...">
                </div>
                <!-- Searchbar end -->
            </div>
            <!-- Product Request End -->
        </div>


        <!-- Start: Date Filter Panel-->
        <div class="flex justify-evenly mt-0 px-6 w-24 ">
            <!-- Search Bar 1 -->
        </div>

        <!-- Start: ShowEntries & Excel Print Buttons-->
        <div class="flex items-center ml-5 mt-5 px-2 mb-3">
            <label for="entries" class="mr-2">Show</label>
            <div class="relative">
                <select id="entries" class="border border-gray-300 rounded-md text-gray-600 h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none">
                    <option>10</option>
                    <option>20</option>
                    <option>30</option>
                    <option>40</option>
                    <option>50</option>
                </select>
                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path d="M10 12l-6-6h12" />
                    </svg>
                </div>
            </div>
            <span class="ml-2">entries</span>
        </div>

        <div class="inline-flex rounded-md shadow-sm mx-5" role="group">
            <button type="button" onclick="copyToClipboard()" class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">Copy</span>
            </button>
            <button type="button" onclick="exportToExcel()" class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">Excel</span>
            </button>
            <button type="button" onclick="printTable()" class="mx-0 my-2 text-sm font-medium text-gray-900 bg-white hover:bg-gray-200 active:bg-gray-300">
                <span class="p-2 mx-4 my-2">Print</span>
            </button>
        </div>

        <!-- End: ShowEntries & Excel Print Buttons-->

        <!-- End: Filter Panel-->

        <!--Start: Table-->
        <div class="ml-3 mr-3 flex overflow-x-auto shadow-md sm:rounded-lg border border-gray-600 m-4">
            <table class="w-full text-sm text-left rtl:text-right text-black">
                <thead class="text-xs text-black uppercase bg-gray-200 ">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Stock ID
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Product
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Quantity
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Price Each
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Availability
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Date Added
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once __DIR__ . '/../functions/total_stock.php';
                    foreach ($rowsTStock as $rowTStock) : ?>
                        <tr class="bg-white hover:bg-gray-300 cursor-pointer active:bg-gray-400 duration-200" onclick="location.href='/master/inv/prod-edit=<?php echo $rowTStock['stock_id']; ?>'">
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['stock_id']; ?>
                            </td>
                            <td scope="row" class="px-6 py-4 font-semibold text-black whitespace-nowrap flex items-center">
                                <?php if (empty($rowTStock['image'])) : ?>
                                    <img src="/assets/default.png" class="mr-4">
                                <?php else : ?>
                                    <img src="<?php echo '/' . $rowTStock['image']; ?>" alt="Image" class="mr-4">
                                <?php endif; ?>
                                <?php echo $rowTStock['product']; ?>
                            </td>

                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['category']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['quantity']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['price']; ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php
                                if ($rowTStock['quantity'] == 0) {
                                    echo "<span style='color:red'>Out of Stock</span>";
                                } elseif ($rowTStock['quantity'] <= 500) {
                                    echo "<span style='color:yellow'>Understock</span>";
                                } elseif ($rowTStock['quantity'] >= 501 && $rowTStock['quantity'] <= 999) {
                                    echo "<span style='color:green'>Stable Stock</span>";
                                } else {
                                    echo "<span style='color:#ff9933'>Overstock</span>";
                                }
                                ?>
                            </td>
                            <td class="px-6 py-4 font-semibold text-black">
                                <?php echo $rowTStock['date_added']; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <!--End: Table-->
        <script>
            function exportToExcel() {
                var table = document.getElementsByTagName("table")[0];
                var rows = table.getElementsByTagName("tr");
                var wb = XLSX.utils.book_new();
                var ws = XLSX.utils.table_to_sheet(table);
                ws['!cols'] = [];
                ws['!rows'] = [];
                for (var i = 0; i < table.rows[0].cells.length; i++) {
                    ws['!cols'].push({
                        wch: 15
                    });
                }

                ws['!cols'][0] = {
                    hidden: true
                };
                XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                var fileName = getCurrentDateTime() + '.xlsx';
                XLSX.writeFile(wb, fileName);
            }

            function getCurrentDateTime() {
                var today = new Date();
                var year = today.getFullYear();
                var month = ('0' + (today.getMonth() + 1)).slice(-2);
                var day = ('0' + today.getDate()).slice(-2);
                var hours = ('0' + today.getHours()).slice(-2);
                var minutes = ('0' + today.getMinutes()).slice(-2);
                var seconds = ('0' + today.getSeconds()).slice(-2);
                return year + '-' + month + '-' + day + '_' + hours + '-' + minutes + '-' + seconds;
            }

            function copyToClipboard() {
                var table = document.getElementsByTagName("table")[0];
                var range = document.createRange();
                range.selectNode(table);
                window.getSelection().removeAllRanges();
                window.getSelection().addRange(range);
                document.execCommand("copy");
                window.getSelection().removeAllRanges();
                alert("Table copied to clipboard!");
            }

            function printTable() {
                // Create a new window or tab
                var printWindow = window.open('', '_blank');

                // Write the HTML content of the table to the new window or tab
                printWindow.document.write('<html><head><title>Print Table</title></head><body>');
                printWindow.document.write('<table border="1">' + document.getElementsByTagName("table")[0].innerHTML + '</table>');
                printWindow.document.write('</body></html>');

                // Trigger the print dialog for the new window or tab
                printWindow.document.close(); // Close the document for writing
                printWindow.print(); // Trigger the print dialog
            }
        </script>
        <script lang="javascript" src="https://cdn.sheetjs.com/xlsx-0.20.2/package/dist/xlsx.full.min.js"></script>
</body>

</html>