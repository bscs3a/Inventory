<?php
    // Check if the id is set in the URL
    // Start a new session or resume the existing one
    if (isset($_SESSION['id'])) {
        // Get the id from the session
        $id = $_SESSION['id'];

        $db = Database::getInstance();
        $conn = $db->connect();

        // Prepare the SQL statement
        $query = "SELECT employees.*, employment_info.*, salary_info.*, tax_info.*, benefit_info.*, account_info.* FROM employees
        LEFT JOIN employment_info ON employment_info.employees_id = employees.id
        LEFT JOIN salary_info ON salary_info.employees_id = employees.id
        LEFT JOIN tax_info ON tax_info.salary_id = salary_info.id
        LEFT JOIN benefit_info ON benefit_info.salary_id = salary_info.id
        LEFT JOIN account_info ON account_info.employees_id = employees.id
        WHERE employees.id = :id AND salary_info.id = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $employees = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: /hr/dashboard');
    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title>Update Employee</title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
    include 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- MAIN -->
<main id = "mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
  <!-- Top Bar -->
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600 sidebar-toggle">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a route="/hr/dashboard" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a route="/hr/employees/page=1" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Employees</a>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Update</a>
   </ul>
   <ul class="ml-auto flex items-center">
    
   <div class="relative inline-block text-left ml-4">
                <div>
                <a class="inline-flex justify-between w-full px-4 py-2 text-sm font-medium text-black bg-white rounded-md shadow-sm border-b-2 transition-all hover:bg-gray-200 focus:outline-none hover:cursor-pointer" id="options-menu" aria-haspopup="true" aria-expanded="true">
                    <div class="text-black font-medium mr-4 ">
                    <i class="ri-user-3-fill mx-1"></i> <?= $_SESSION['user']['username']; ?>
                    </div>
                    <i class="ri-arrow-down-s-line"></i>
                </a>
            </div>

            <div class="origin-top-right absolute right-0 mt-4 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 focus:outline-none hidden" id="dropdown-menu" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <div class="py-1" role="none">
                <form action="/logout" method="post">
                    <button type="submit" class="w-full block px-4 py-2 text-md text-gray-700 hover:bg-gray-100 hover:text-gray-900" role="menuitem">
                        <i class="ri-logout-box-line"></i>
                        Logout
                    </button>
                </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById('options-menu').addEventListener('click', function() {
                var dropdownMenu = document.getElementById('dropdown-menu');
                if (dropdownMenu.classList.contains('hidden')) {
                    dropdownMenu.classList.remove('hidden');
                } else {
                    dropdownMenu.classList.add('hidden');
                }
            });
        </script>
    </ul>
   <?php 
    // require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->

  
  <div class="flex items-center flex-wrap">
    <h3 class="ml-6 mt-8 text-xl font-bold">Update Employee Information</h3>
  </div>
  
<!-- Profile -->
<div class="py-2 px-6 mt-4">
<form action= "/update-employees" method="POST" enctype="multipart/form-data">
  <div class="flex">

    <div class="mr-4">
      <img src="<?php echo $employees['image_url']; ?>" alt="Profile Picture" name="image_url" id="image_url" class="w-48 h-48 object-cover">
      <input type="file" id="fileInput" name="image_url" accept="image/*" style="display: none;">
      <span>
          <div class="ml-1 mb-20 mt-4"> 
              <button type="button" id="uploadButton" class="focus:outline-none text-white bg-blue-500 hover:bg-blue-600 focus:ring-4 focus:ring-yellow-600 font-medium rounded-lg text-sm px-5 py-2.5  mb-2">Upload</button>
              <button type="button" id="removeButton" class="focus:outline-none text-black bg-white hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2">Remove</button>
          </div>    
      </span>
    </div>

  <!-- Employee Information -->
  <div class="flex flex-col ml-20">
    <div class="mb-4">
      <div class="flex">
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="firstName">
              First Name
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="firstName"
              id="firstName"
              type="text"
              value="<?php echo $employees['first_name']; ?>"
              placeholder="First Name"
            />
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="middleName">
              Middle Name
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="middleName"
              id="middleName"
              type="text"
              value="<?php echo $employees['middle_name']; ?>"
              placeholder="Middle Name"
            />
        </div>
        <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="lastName">
              Last Name
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="lastName"
              id="lastName"
              type="text"
              value="<?php echo $employees['last_name']; ?>"
              placeholder="Last Name"
            />
        </div>
      </div>
    </div>
      <!-- Employee Information 2 -->
  <div class="flex flex-col">
    <div class="mb-4">
      <div class="flex">
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="dateofbirth">
              Date of Birth
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="dateofbirth"
              id="dateofbirth"
              value="<?php echo $employees['dateofbirth']; ?>"
              type="date"
            />
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="gender">
              Gender
            </label>
            <select
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="gender"
            id="gender">
            <option value="">Select Gender</option>
            <option value="Female" <?php echo $employees['gender'] == 'Female' ? 'selected' : ''; ?>>Female</option>
            <option value="Male" <?php echo $employees['gender'] == 'Male' ? 'selected' : ''; ?>>Male</option>
          </select>
        </div>
        <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="nationality">
              Nationality
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="nationality"
              id="nationality"
              type="text"
              value="<?php echo $employees['nationality']; ?>"
              placeholder="Nationality"
            />
        </div>
      </div>
    </div>
    <!-- Employee Information 3-->
    <div class="flex flex-col">
      <div class="mb-4">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="civilstatus">
              Civil Status
            </label>
            <select
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              id="civilstatus"
              name="civilstatus">
              <option value="">Select Status</option>
              <option value="Single"<?php echo $employees['civil_status'] == 'Single' ? 'selected' : ''; ?>>Single</option>
              <option value="Married"<?php echo $employees['civil_status'] == 'Married' ? 'selected' : ''; ?>>Married</option>
              <option value="Widowed"<?php echo $employees['civil_status'] == 'Widowed' ? 'selected' : ''; ?>>Widowed</option>
              <option value="Divorced"<?php echo $employees['civil_status'] == 'Divorced' ? 'selected' : ''; ?>>Divorced</option>
          </select>
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="address">
              Address
            </label>
            <input  
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="address"
            id="address"
            type="text"
              value="<?php echo $employees['address']; ?>"
            placeholder="Address"
          />
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="contactnumber">
              Contact Number
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="contactnumber"
              id="contactnumber"
              type="tel"
              value="<?php echo $employees['contact_no']; ?>"
              placeholder="Contact Number"
            />
          </div>
        </div>
      </div>

      <!-- Employee Information 4-->
      <div class="flex flex-col">
      <div class="mb-4">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="email">
              Email
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="email"
              id="email"
              value="<?php echo $employees['email']; ?>"
              placeholder="example@example.com">
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="department">
              Department
            </label>
            <select
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="department" id="Department" placeholder="Department">
              
              <option value="">Select Department</option>
              <option value="Product Order"<?php echo $employees['department'] == 'Product Order' ? 'selected' : ''; ?>>Product Order</option>
              <option value="Inventory"<?php echo $employees['department'] == 'Inventory' ? 'selected' : ''; ?>>Inventory</option>
              <option value="Delivery"<?php echo $employees['department'] == 'Delivery' ? 'selected' : ''; ?>>Delivery</option>
              <option value="Human Resources"<?php echo $employees['department'] == 'Human Resources' ? 'selected' : ''; ?>>Human Resources</option>
              <option value="Point of Sales"<?php echo $employees['department'] == 'Point of Sales' ? 'selected' : ''; ?>>Point of Sales</option>
              <option value="Finance"<?php echo $employees['department'] == 'Finance' ? 'selected' : ''; ?>>Finance</option>
              
            </select>
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="Position">
              Position
            </label>
            <select
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                        name="position" id="Position" placeholder="Position">
                        
                        <!-- <option value="">Select Position</option> -->
                        <option value="<?php echo $employees['position'] ?>"><?php echo $employees['position'] ?></option>
              </select>
          </div>
        </div>
      </div>

    <!-- Employee Information 5 : EMPLOYMENT INFO-->
    <div class="flex flex-col">
      <div class="mb-4">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="dateofhire">
              Date of Hire
            </label>
            <input  
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="dateofhire"
            id="dateofhire"
            type="date"
              value="<?php echo $employees['dateofhire']; ?>"
            placeholder="Date of Hire"
          />
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="startdate">
              Start of Employment
            </label>
            <input  
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
            name="startdate"
            id="startdate"
            type="date"
              value="<?php echo $employees['startdate']; ?>"
            placeholder="Start Date"
          />
          </div>
          <div>
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="enddate">
              End of Employment
            </label>
            <input  
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
              name="enddate"
              id="enddate"
              type="date"
              value="<?php echo $employees['enddate']; ?>"
              placeholder="enddate"
            />
          </div>
        </div>
      </div>
      
      <!-- START DATE / HIRE DATE ERROR -->
      <div class="flex flex-col">
      <div class="mb-4">
        <div class="flex">
          <div class="mr-2">
            <span id="dateError" class="text-red-500 text-xs"></span>
          </div>
        </div>
      </div>
      </div>

                  <!-- Salary Information and Tax Information -->
            <div>
              <h2 class="block mb-2 mt-8 text-base font-bold text-gray-700">Salary and Tax Information</h2>
              <div class="flex flex-col">
                <div class="mb-4 mt-4">
                  <div class="flex">
                    <div class="mr-2">
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="monthlysalary">
                          Monthly Salary
                        </label>
                        <input
                        class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="monthlysalary"
                          id="monthlysalary"
                          type="text"
                          placeholder="0.00"
                          value="<?php echo $employees['monthly_salary']; ?>"
                          oninput="calculateTax()"
                        readonly
                        />
                    </div>
                    <!-- TAX INFO -->
                    <div class="mr-2">
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="incometax">
                          Income Tax
                        </label>
                        <input
                        class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="incometax"
                          id="incometax"
                          type="text"
                          value="<?php echo $employees['income_tax']; ?>"
                          placeholder="0.00"
                          readonly
                        />
                    </div>
                    <div>
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="withholdingtax">
                          Withholding tax
                        </label>
                        <input  
                        class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                          name="withholdingtax"
                          id="withholdingtax"
                          type="number"
                          value="<?php echo $employees['withholding_tax']; ?>"
                          placeholder="0.00"
                          readonly
                        />
                    </div>
                  </div>
                </div>
                <div>
                  <!-- BENEFIT INFO -->
                  <div class="flex flex-col">
                    <div class="mb-4">
                      <div class="flex">
                        <div class="mr-2">
                            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="sss">
                              SSS
                            </label>
                            <input
                            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                              name="sss"
                              id="sss"
                              type="text"
                              value="<?php echo $employees['sss_fund']; ?>"
                              placeholder="0.00"
                              readonly
                            />
                        </div>
                        <div class="mr-2">
                            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="pagibig">
                              Pag-IBIG Fund
                            </label>
                            <input
                            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                              name="pagibig"
                              id="pagibig"
                              type="text"
                              value="<?php echo $employees['pagibig_fund']; ?>"
                              placeholder="0.00"
                              readonly
                            />
                        </div>
                        <div>
                            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="philhealth">
                              Philhealth
                            </label>
                            <input  
                            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                              name="philhealth"
                              id="philhealth"
                              type="text"
                              value="<?php echo $employees['philhealth']; ?>"
                              placeholder="0.00"
                              readonly
                            />
                        </div>
                      </div>
                    </div>
                    <div class="flex flex-col">
                      <div class="mb-4">
                        <div class="flex">
                          <div class="mr-2">
                              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="thirteenthmonth">
                                13th Month Pay
                              </label>
                              <input
                              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                                name="thirteenthmonth"
                                id="thirteenthmonth"
                                type="number"
                                value="<?php echo $employees['thirteenth_month']; ?>"
                                placeholder="0.00"
                                readonly
                              />
                          </div>
                          <div class="mr-2">
                              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="totalsalary">
                                Total Salary (with Tax reductions)
                              </label>
                              <input
                              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
                                name="totalsalary"
                                id="totalsalary"
                                type="number"
                                value="<?php echo $employees['total_salary']; ?>"
                                placeholder="0.00"
                                readonly
                              />
                          </div>
                      </div>

                            <!-- Account Information -->
            <div>
              <h2 class="block mb-2 mt-8 text-base font-bold text-gray-700">Account Information</h2>
              <div class="flex flex-col">
                <div class="mb-4 mt-4">
                  <div class="flex">
                    <div class="mr-2">
                        <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="username">
                          Username
                        </label>
                        <input
                          class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                          name="username"
                          id="username"
                          type="text"
                          value="<?php echo $employees['username']; ?>"
                          placeholder="Username"
                        />
                    </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="incometax">
                Password
              </label>
              <input
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="password"
                id="password"
                type="password"
                value="<?php echo $employees['password']; ?>"
                placeholder="Password"
              />
            </div>
            <div class="mr-2">
              <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="incometax">
                Confirm Password
              </label>
              <input
                class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 border rounded shadow appearance-none focus:outline-none focus:shadow-outline"
                name="confirmPassword"
                id="confirmPassword"
                type="password"
                value="<?php echo $employees['password']; ?>"
                placeholder="Confirm Password"
              />
              <div class="text-sm mt-2 ml-32">
              <input type="checkbox" id="togglePassword"> Show Password
              </div>
                  </div>
                </div>
            <!-- PASSWORD ERRORS -->
          <div class="flex">
            <div id="passwordError" class="text-xs text-red-500">
            </div>
          </div>
          <div class="flex">
            <div id="confirmPasswordError" class="text-xs text-red-500">
            </div>
          </div>
              </div>
                      <div>
                      </div>
                      <div class="flex flex-row mt-8 justify-center">
                        <button id="updateButton" type="submit" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Update</button>
                        <button route="/hr/employees/id=<?php echo $employees['id']; ?>" type="button" class="focus:outline-none text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Cancel</button>
                      </div>
                      </form>
    </div>
  </div>
</div> 
</main>

<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>

<!-- Sidebar active/inactive -->
<script>
  // Sidebar Toggle
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });

  // DEPARTMENT AND POSITION DROPDOWN
  document.getElementById('Department').addEventListener('change', function() {
  var positionSelect = document.getElementById('Position');
  var department = this.value;

  // Clear the position select
  positionSelect.innerHTML = '<option value="">Select Position</option>';

  // Define the positions for each department
  var positions = {

      'Product Order': [
        'Order Processor',
        'Order Entry Clerk',
        'Quality Control Inspector',
        'Logistics Coordinator',
        'Procurement Specialist'
      ],

      'Inventory': [
        'Inventory Manager/Controller',
        'Inventory Planner',
        'Stock Controller',
        'Purchasing Manager',
        'Warehouse Manager',
        'Materials Manager'
      ],

      'Delivery': [
        'Delivery Driver',
        'Courier',
        'Warehouse Associate',
        'Customer Service Representative',
        'Parcel Sorter'
      ],

      'Human Resources': [
        'Recruiter',
        'HR Manager/Director',
        'Compensation and Benefits Specialist',
        'HR Coordinator',
        'HR Legal Compliance Specialist'
      ],

      'Point of Sales': [
        'Retail Associate/Cashier',
        'Inventory Control Specialist',
        'Sales Associate',
        'Customer Service Representative',
        'Business Analyst',
        'E-commerce Coordinator'
      ],

      'Finance': [
        'Accountant',
        'Bookkeeper',
        'Financial Analyst',
        'Tax Accountant',
        'Cost Accountant',
        'Credit Analyst',
        'Payroll Specialist'
      ]
  };
      
    // Define the salaries for each position
    var salaries = {
      'Order Processor': 18000,
      'Order Entry Clerk': 15000,
      'Quality Control Inspector': 20000,
      'Logistics Coordinator': 30000,
      'Procurement Specialist': 40000,
      'Inventory Manager/Controller': 60000,
      'Inventory Planner': 35000,
      'Stock Controller': 25000,
      'Purchasing Manager': 70000,
      'Warehouse Manager': 55000,
      'Materials Manager': 55000,
      'Delivery Driver': 15000,
      'Courier': 18000,
      'Warehouse Associate': 18000,
      'Customer Service Representative': 20000,
      'Parcel Sorter': 15000,
      'Recruiter': 30000,
      'HR Manager/Director': 80000,
      'Compensation and Benefits Specialist': 45000,
      'HR Coordinator': 25000,
      'HR Legal Compliance Specialist': 35000,
      'Retail Associate/Cashier': 12000,
      'Inventory Control Specialist': 25000,
      'Sales Associate': 18000,
      'Business Analyst': 45000,
      'E-commerce Coordinator': 35000,
      'Accountant': 35000,
      'Bookkeeper': 20000,
      'Financial Analyst': 45000,
      'Tax Accountant': 45000,
      'Cost Accountant': 45000,
      'Credit Analyst': 35000,
      'Payroll Specialist': 30000
    };

  // Add an event listener to the position select field
  document.getElementById('Position').addEventListener('change', function() {
  var salaryInput = document.getElementById('monthlysalary');
  var position = this.value;

  // Get the salary for the selected position
  var salary = salaries[position];

  // Update the salary input field
  if (salary) {
    salaryInput.value = salary.toFixed(2);
  } else {
    salaryInput.value = '';
  }

  // Manually trigger the calculateTax function
  calculateTax();
});
      // Get the positions for the selected department
      var departmentPositions = positions[department];

      // Add the positions to the position select
      if (departmentPositions) {
          departmentPositions.forEach(function(position) {
              var option = document.createElement('option');
              option.value = position;
              option.text = position;
              positionSelect.add(option);
          });
      }
  });

  // DATE OF HIRE AND START OF EMPLOYMENT VALIDATION
  document.getElementById('startdate').addEventListener('input', checkDates);

  function checkDates() {
    var dateofhire = document.getElementById('dateofhire').value;
    var startdate = document.getElementById('startdate').value;
    var dateError = document.getElementById('dateError');

    if (startdate < dateofhire) {
      dateError.textContent = 'Start date cannot be before date of hire';
    } else {
      dateError.textContent = '';
    }
  }

  // Show/Hide Password
  document.getElementById('togglePassword').addEventListener('change', function () {
    document.getElementById('password').type = this.checked ? 'text' : 'password';
    document.getElementById('confirmPassword').type = this.checked ? 'text' : 'password';
  });

  // CHECKING IF PASSWORDS MATCH AND THE PASSWORD IS STRONG
  var passwordField = document.getElementById('password');
  var confirmPasswordField = document.getElementById('confirmPassword');

  passwordField.addEventListener('input', validatePassword);
  confirmPasswordField.addEventListener('input', validatePassword);

  function validatePassword() {
    var password = passwordField.value;
    var confirmPassword = confirmPasswordField.value;

    // Check if passwords match
    if (password !== confirmPassword) {
      document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
      return;
    } else {
      document.getElementById('confirmPasswordError').textContent = '';
    }

    // Check if password meets requirements
    var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!regex.test(password)) {
      document.getElementById('passwordError').textContent = 'Password must contain at least 1 uppercase letter, 1 number, 1 special character, and be at least 8 characters long';
    } else {
      document.getElementById('passwordError').textContent = '';
    }
  }

  document.getElementById('saveButton').addEventListener('click', function (event) {
    var password = document.getElementById('password').value;
    var confirmPassword = document.getElementById('confirmPassword').value;
    var dateofhire = document.getElementById('dateofhire').value;
    var startdate = document.getElementById('startdate').value;

    // Check if passwords match
    if (password !== confirmPassword) {
      document.getElementById('confirmPasswordError').textContent = 'Passwords do not match';
      event.preventDefault();
      return;
    } else {
      document.getElementById('confirmPasswordError').textContent = '';
    }

    // Check if password meets requirements
    var regex = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    if (!regex.test(password)) {
      document.getElementById('passwordError').textContent = 'Password must contain at least 1 uppercase letter, 1 number, 1 special character, and be at least 8 characters long';
      event.preventDefault();
      return;
    } else {
      document.getElementById('passwordError').textContent = '';
    }

    // Check if start date is on or after date of hire
    if (startdate < dateofhire) {
      document.getElementById('dateError').textContent = 'Start date cannot be before date of hire';
      event.preventDefault();
    } else {
      document.getElementById('dateError').textContent = '';
    }
});

  // Image Upload
  document.getElementById('uploadButton').addEventListener('click', function() {
      document.getElementById('fileInput').click();
  });

  document.getElementById('fileInput').addEventListener('change', function() {
    var file = this.files[0];
    var reader = new FileReader();
    reader.onloadend = function() {
        document.getElementById('image_url').src = reader.result;
      }
    if (file) {
        reader.readAsDataURL(file);
      } else {
        document.getElementById('image_url').src = "";
      }
});
document.getElementById('removeButton').addEventListener('click', function() {
    document.getElementById('image_url').src = 'public\humanResources\img\noPhotoAvailable.png';
    document.getElementById('fileInput').value = ""; // Clear the file input
});
// Form submission
document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();
    var formData = new FormData(this);
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'hr/employees/add', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            alert('File uploaded successfully.');
        } else {
            alert('An error occurred while uploading the file.');
        }
    };
    xhr.send(formData);
  });

// Automatic Tax Calculation for UI
function calculateTax() {
  const monthlySalary = parseFloat(document.getElementById('monthlysalary').value.replace(/[^\d.-]/g, '')); // Retrieve and parse the monthly salary value
  
  if (!isNaN(monthlySalary)) { // Check if the parsed value is a valid number
    // TAX DEDUCTIONS
    // FIX INCOME TAX. THIS IS JUST A TEST
    let incomeTax;
    if (monthlySalary <= 20833.33) {
      incomeTax = 0;
    } else if (monthlySalary <= 33333.33) {
        incomeTax = (monthlySalary - 20833.33) * 0.20;
    } else if (monthlySalary <= 66666.67) {
        incomeTax = 2500 + (monthlySalary - 33333.33) * 0.25;
    } else if (monthlySalary <= 166666.67) {
        incomeTax = 10833.33 + (monthlySalary - 66666.67) * 0.30;
    } else if (monthlySalary <= 666666.67) {
        incomeTax = 40833.33 + (monthlySalary - 166666.67) * 0.32;
    } else {
        incomeTax = 200833.33 + (monthlySalary - 666666.67) * 0.35;
    }
    document.getElementById('incometax').value = incomeTax.toFixed(2);

    let withholdingTax;
    if (monthlySalary <= 20833.33) {
      withholdingTax = 0;
    } else if (monthlySalary <= 33333.33) {
        withholdingTax = 0 + (monthlySalary - 20833.33) * 0.15;
    } else if (monthlySalary <= 66666.67) {
        withholdingTax = 1875 + (monthlySalary - 33333.33) * 0.20;
    } else if (monthlySalary <= 166666.67) {
        withholdingTax = 8541.80 + (monthlySalary - 66666.67) * 0.25;
    } else if (monthlySalary <= 666666.67) {
        withholdingTax = 33541.80 + (monthlySalary - 166666.67) * 0.30;
    } else {
        withholdingTax = 183541.80 + (monthlySalary - 666666.67) * 0.35;
    }
    document.getElementById('withholdingtax').value = withholdingTax.toFixed(2);
    
    // BENEFIT DEDUCTIONS
    const pagibig = 200.00;
    document.getElementById('pagibig').value = pagibig;

    const sss = (monthlySalary * 0.14) * 0.32;
    document.getElementById('sss').value = sss.toFixed(2);
    
    let philhealth;
    if (monthlySalary <= 10000.00) {
        philhealth = 500.00;
    } else if (monthlySalary <= 99999.99) {
        philhealth = 500.00 + (monthlySalary - 10000.00) * 0.05;
    } else {
        philhealth = 5000.00;
    }
    document.getElementById('philhealth').value = philhealth.toFixed(2);

    const thirteenthmonth = monthlySalary;
    document.getElementById('thirteenthmonth').value = thirteenthmonth;

    // TOTAL SALARY
    const totalsalary = monthlySalary - (incomeTax + withholdingTax + pagibig + sss + philhealth);
    document.getElementById('totalsalary').value = totalsalary.toFixed(2);
  } else {
    // If the parsed value is NaN (Not a Number), clear the tax input fields
    document.getElementById('incometax').value = '';
    document.getElementById('withholdingtax').value = '';
    document.getElementById('pagibig').value = '';
    document.getElementById('sss').value = '';
    document.getElementById('philhealth').value = '';
    document.getElementById('thirteenthmonth').value = '';
    document.getElementById('totalsalary').value = '';
  }
}
// Function to update the monthly salary based on the selected position and calculate tax
function updateSalary() {
  var selectedPosition = document.getElementById('Position').value;
  var monthlySalaryInput = document.getElementById('monthlysalary');

  if (salaries[selectedPosition] !== undefined) {
    var salary = salaries[selectedPosition];
    monthlySalaryInput.value = salary.toLocaleString('en-PH', { style: 'currency', currency: 'PHP' });
    console.log("Monthly salary updated:", salary); // Debugging statement
    calculateTax(); // Call the calculateTax function after updating the salary
  } else {
    monthlySalaryInput.value = ''; // If position not found, clear the input
  }
}

</script>
</body>
</html> 