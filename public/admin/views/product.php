<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link href="./../src/tailwind.css" rel="stylesheet" />
</head>

<body>
  <div class="flex h-screen bg-gray-100">
    <!-- sidebar -->
    <div class="md:flex flex-col w-64 bg-gray-800">
      <div class="flex items-center justify-end h-16 bg-violet-950 p-6">
        <span class="text-white font-bold uppercase text-4xl">BSCS 3A</span>
      </div>
      <div class="flex flex-col flex-1 overflow-y-auto">
        <nav class="flex-1 px-2 py-4 bg-violet-950">
          <a href="/Master/adm/dashboard"
            class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Dashboard</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Invoices</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Expense Category</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Expense Record</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Items</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Payments</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Revenue Record</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Balance Sheet</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Database</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>

          <a href="#" class="flex justify-between items-center px-4 py-2 text-gray-100 hover:bg-violet-300">
            <span class="flex items-center">
              <span class="mx-4 font-normal">Users</span>
            </span>

            <span>
              <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
              </svg>
            </span>
          </a>
        </nav>
      </div>
    </div>

    <!-- Navbar -->
    <div class="flex flex-col flex-1 overflow-y-auto">
      <div class="flex items-center justify-between h-16 bg-zinc-200 border-b border-gray-200">
        <div class="flex items-center px-4">
          <button class="text-gray-500 focus:outline-none focus:text-gray-700">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
          </button>
          <h1 class="text-2xl font-semibold px-5">Dashboard</h1>
        </div>

        <div class="flex items-center pr-4 text-xl font-semibold">
          Sample User

          <span class="p-3">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
              stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
            </svg>
          </span>
        </div>
      </div>

      <!-- Main Content -->
      <div class="p-4">
        <div class="m-5 flex justify-between items-center">
          <h1 class="text-2xl font-semibold">Products</h1>
          <div class="lg:ml-40 ml-10 space-x-8">
            <button class="bg-indigo-600 px-4 py-2 rounded-md text-white font-semibold tracking-wide cursor-pointer">
              Add Item
            </button>
          </div>
        </div>

        <!-- table -->
        <div class="overflow-hidden rounded-lg border border-gray-300 shadow-md m-5">
          <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
            <thead class="bg-gray-200">
              <tr class="border-b border-y-gray-300">
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Product
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  ID
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Name
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Categories
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Price
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900">
                  Description
                </th>
                <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
              </tr>
            </thead>

            <tbody class="divide-y divide-gray-100 border-b border-gray-300">
              <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                  <div class="font-medium text-gray-700 text-sm">
                    <img class="h-14 w-12" src="../img/stanley.jpg" alt="" />
                  </div>
                </th>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">1234</div>
                </td>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Stanley 84-055 Bi-Material Slip Joint Plier 6"
                  </div>
                </td>
                <td class="px-6 py-4">
                  <select value="user.role" class="bg-transparent font-medium text-gray-700 text-sm">
                    <option value="hr">Hand Tools</option>
                    <option value="po">Power Tools</option>
                    <option value="po">Fastening Tools</option>
                  </select>
                </td>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Php 1000
                  </div>
                </td>
                <td class="px-7 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Two-position, adjustable joint pliers used for grasping
                    and turning. Rust-resistant chrome finish. Machined jaws
                    help grip items securely.
                  </div>
                </td>
                <td class="px-6 py-4">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path
                      d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                  </svg>
                </td>
              </tr>
            </tbody>

            <tbody class="divide-y divide-gray-100 border-b border-gray-300">
              <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                  <div class="font-medium text-gray-700 text-sm">
                    <img class="h-14 w-12" src="../img/stanley.jpg" alt="" />
                  </div>
                </th>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">1234</div>
                </td>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Stanley 84-055 Bi-Material Slip Joint Plier 6"
                  </div>
                </td>
                <td class="px-6 py-4">
                  <select value="user.role" class="bg-transparent font-medium text-gray-700 text-sm">
                    <option value="hr">Hand Tools</option>
                    <option value="po">Power Tools</option>
                    <option value="po">Fastening Tools</option>
                  </select>
                </td>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Php 1000
                  </div>
                </td>
                <td class="px-7 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Two-position, adjustable joint pliers used for grasping
                    and turning. Rust-resistant chrome finish. Machined jaws
                    help grip items securely.
                  </div>
                </td>
                <td class="px-6 py-4">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path
                      d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                  </svg>
                </td>
              </tr>
            </tbody>

            <tbody class="divide-y divide-gray-100 border-b border-gray-300">
              <tr class="hover:bg-gray-50">
                <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                  <div class="font-medium text-gray-700 text-sm">
                    <img class="h-14 w-12" src="../img/stanley.jpg" alt="" />
                  </div>
                </th>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">1234</div>
                </td>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Stanley 84-055 Bi-Material Slip Joint Plier 6"
                  </div>
                </td>
                <td class="px-6 py-4">
                  <select value="user.role" class="bg-transparent font-medium text-gray-700 text-sm">
                    <option value="hr">Hand Tools</option>
                    <option value="po">Power Tools</option>
                    <option value="po">Fastening Tools</option>
                  </select>
                </td>
                <td class="px-6 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Php 1000
                  </div>
                </td>
                <td class="px-7 py-4">
                  <div class="font-medium text-gray-700 text-sm">
                    Two-position, adjustable joint pliers used for grasping
                    and turning. Rust-resistant chrome finish. Machined jaws
                    help grip items securely.
                  </div>
                </td>
                <td class="px-6 py-4">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-4 h-4">
                    <path
                      d="M21.731 2.269a2.625 2.625 0 0 0-3.712 0l-1.157 1.157 3.712 3.712 1.157-1.157a2.625 2.625 0 0 0 0-3.712ZM19.513 8.199l-3.712-3.712-12.15 12.15a5.25 5.25 0 0 0-1.32 2.214l-.8 2.685a.75.75 0 0 0 .933.933l2.685-.8a5.25 5.25 0 0 0 2.214-1.32L19.513 8.2Z" />
                  </svg>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <script src="./../src/route.js"></script>
</body>

</html>