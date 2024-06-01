<?php
    // Check if the id is set in the URL
    // Start a new session or resume the existing one
    if (isset($_SESSION['id'])) {
        // Get the id from the session
        $id = $_SESSION['id'];

        $db = Database::getInstance();
        $conn = $db->connect();

        // Prepare the SQL statement
        $query = "SELECT leave_requests.*, employees.* FROM leave_requests 
        JOIN employees ON leave_requests.employees_id = employees.id
        WHERE leave_requests.id = :id;";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $leaveRequest = $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        header('Location: /hr/leave-requests');
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
  <link href="./../../src/tailwind.css" rel="stylesheet">
  <title><?php echo htmlspecialchars($leaveRequest['status']) ?> | 
    <?php 
      echo htmlspecialchars($leaveRequest['last_name']) . ', ';
      echo htmlspecialchars(substr($leaveRequest['first_name'], 0, 1)) . '. ';
      if (!empty($leaveRequest['middle_name'])) {
          echo htmlspecialchars(substr($leaveRequest['middle_name'], 0, 1)) . '.';
      }
    ?></title>
</head>
<body class="text-gray-800 font-sans">

<!-- sidenav -->
<?php 
    include 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- Start Main Bar -->
<main id="mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
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
  <a route="/hr/leave-requests" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Leave Requests</a>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">View Details</a>
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  <!-- End Top Bar -->

  <!-- Request For Leave -->
  <div class="flex ml-20 mt-8 font-bold text-xl ">
    <h1>Leave Request Details</h1>
   </div>
   <div class="flex flex-col ml-20">
    <!-- Column 1-->
  <div class="flex flex-col">
  <div class="mb-4 mt-8">
    <div class="flex">
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="employee">
            Employee Name
            </label>
            <input
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="employee"
            type="text"
            placeholder="employee"
            value="<?php 
                        echo $leaveRequest['first_name'] . ' ';
                        if (!empty($leaveRequest['middle_name'])) {
                            echo substr($leaveRequest['middle_name'], 0, 1) . '. ';
                        }
                        echo $leaveRequest['last_name']; 
                    ?>"
                    readonly
            />
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="Department">
            Department
            </label>
            <input
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="Department"
            type="text"
            placeholder="Department"
            value="<?php echo htmlspecialchars($leaveRequest['department']); ?>"
                    readonly
            />
        </div>
        <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="Position">
            Position
            </label>
            <input
            class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded appearance-none focus:outline-none focus:shadow-outline"
            id="Position"
            type="text"
            placeholder="Position"
            value="<?php echo htmlspecialchars($leaveRequest['position']); ?>"
                    readonly
            />
        </div>
  </div>
  <!-- Details of Leave -->
      <div class="flex flex-col">
      <div class="mb-4 mt-8">
        <div class="flex">
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="middleName">
              Type of Leave       
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded focus:outline-none focus:shadow-outline"
            name="typeOfLeave" id="typeOfLeave"
            value="<?php echo htmlspecialchars($leaveRequest['type']); ?>"
                    readonly>
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="startdate">
              Start Date
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded focus:outline-none focus:shadow-outline"
              id="startdate"
              type="date"
            value="<?php echo htmlspecialchars($leaveRequest['start_date']); ?>"
                    readonly
            />
          </div>
          <div class="mr-2">
            <label class="block mb-2 mt-0 text-sm font-bold text-gray-700" for="middleName">
              End Date
            </label>
            <input
              class="w-64 px-3 py-2 text-sm leading-tight text-gray-700 rounded focus:outline-none focus:shadow-outline"
              id="enddate"
              type="date"
            value="<?php echo htmlspecialchars($leaveRequest['end_date']); ?>"
                    readonly
            />
          </div>
        </div>
      </div>

      <!-- Description -->
      <div class="mt-4">
        <label for="details" class="block mb-2 text-sm font-bold text-gray-900">Description</label>
        <p id="details" class="mr-7 mt-4 block px-4 py-4 p-2.5 w-full sm:w-[780px] text-sm text-gray-700 bg-white">
            <?php echo htmlspecialchars($leaveRequest['details']); ?>
        </p>
    </div>

    <!-- Status -->
    <div class="mt-4">
      <label for="details" class="block mb-2 text-sm font-bold text-gray-900">Status: 
          <?php
            $status = $leaveRequest['status'];
            $colorClass = '';

            switch ($status) {
                case 'Pending':
                    $colorClass = 'text-yellow-600';
                    break;
                case 'Denied':
                    $colorClass = 'text-red-600';
                    break;
                case 'Approved':
                    $colorClass = 'text-green-600';
                    break;
            }
          ?>
          <span class="inline-flex items-center gap-1 rounded-full bg-green-50 px-2 py-1 text-lg font-semibold <?php echo $colorClass; ?>">
              <?php echo $status; ?>
          </span>
      </label>
  </div>
  </div>
  </div>
</main>
<!-- End Main Bar -->
<script  src="./../../src/route.js"></script>
<script  src="./../../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>

<script>
  // Sidebar Toggle
  document.querySelector('.sidebar-toggle').addEventListener('click', function() {
    document.getElementById('sidebar-menu').classList.toggle('hidden');
    document.getElementById('sidebar-menu').classList.toggle('transform');
    document.getElementById('sidebar-menu').classList.toggle('-translate-x-full');
    document.getElementById('mainContent').classList.toggle('md:w-full');
    document.getElementById('mainContent').classList.toggle('md:ml-64');
  });
</script>
</body>
</html> 