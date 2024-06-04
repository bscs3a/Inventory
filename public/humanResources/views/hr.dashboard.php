<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />
  <link href="./../src/tailwind.css" rel="stylesheet">
  <title>Dashboard</title>
</head>

<body class="text-gray-800 font-sans">
 
<!-- sidenav -->
<?php 
  require_once 'inc/sidenav.php';
?>
<!-- end of sidenav -->

<!-- Start Main Bar -->
<main id = "mainContent" class="w-full md:w-[calc(100%-256px)] md:ml-64 min-h-screen transition-all main">
  <div class="py-2 px-6 bg-white flex items-center shadow-md shadow-black/10">
   <button type="button" class="text-lg text-gray-600 sidebar-toggle">
  <i class="ri-menu-line"></i>
   </button>
   <ul class="flex items-center text-sm ml-4">  
  <li class="mr-2">
    <a href="#" class="text-[#151313] hover:text-gray-600 font-medium">Human Resources</a>
  </li>
  <li class="text-[#151313] mr-2 font-medium">/</li>
  <a href="#" class="text-[#151313] mr-2 font-medium hover:text-gray-600">Dashboard</a>
   </ul>
   <?php 
    require_once 'inc/logout.php';
  ?>
  </div>
  
  <!-- WELCOME, USER! -->
  <?php
  $db = Database::getInstance();
  $conn = $db->connect();

  $username = $_SESSION['user']['username'];

  $stmt = $conn->prepare("SELECT employees.first_name FROM account_info 
                        JOIN employees ON account_info.employees_id = employees.id 
                        WHERE account_info.username = :username");

  $stmt->bindParam(':username', $username);
  $stmt->execute();

  $user = $stmt->fetch(PDO::FETCH_ASSOC);
  $firstName = $user['first_name'];
  ?>
  <h1 class="ml-6 mt-4 text-4xl font-bold">Welcome, <?php echo $firstName; ?>!</h1>

  <!-- Employee  -->
  <div class="p-6">
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
      
    <?php
      $db = Database::getInstance();
      $conn = $db->connect();

      $query = "SELECT COUNT(*) as total_employees FROM employees";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $total_employees = $result['total_employees'];

      $query = "SELECT * FROM employees ORDER BY id DESC LIMIT 3";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      $employees = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/10">
      <div class="text-2xl text-center font-semibold">Total Employees</div>
      <div class="text-2xl text-center font-semibold"><?php echo $total_employees; ?></div>
    </div>
<!--  -->
      <?php
      $db = Database::getInstance();
      $conn = $db->connect();

      $query = "SELECT COUNT(*) as count FROM leave_requests WHERE CURDATE() BETWEEN start_date AND end_date AND status = 'Approved'";
      $stmt = $conn->prepare($query);
      $stmt->execute();
      $result = $stmt->fetch(PDO::FETCH_ASSOC);
      $onLeave = $result['count'];

      $pdo = null;
      $stmt = null;
      ?>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/10">
      <div class="text-2xl text-center font-semibold">On Leave</div>
      <div class="text-2xl text-center font-semibold"><?php echo $onLeave; ?></div>
    </div>
<!--  -->
    <?php
    $db = Database::getInstance();
    $conn = $db->connect();

    // Query to get the total number of employees
    $queryTotal = "SELECT COUNT(*) as count FROM employees";
    $stmtTotal = $conn->prepare($queryTotal);
    $stmtTotal->execute();
    $resultTotal = $stmtTotal->fetch(PDO::FETCH_ASSOC);
    $totalCount = $resultTotal['count'];

    // Query to get the number of employees on leave
    $queryLeave = "SELECT COUNT(*) as count FROM leave_requests WHERE CURDATE() BETWEEN start_date AND end_date AND status = 'Approved'";
    $stmtLeave = $conn->prepare($queryLeave);
    $stmtLeave->execute();
    $resultLeave = $stmtLeave->fetch(PDO::FETCH_ASSOC);
    $leaveCount = $resultLeave['count'];
    
    // Query to get the number of employees on clocked in
    $queryAttendance = "SELECT COUNT(*) as count FROM attendance WHERE attendance_date = CURDATE() AND clock_out IS NULL";
    $stmtAttendance = $conn->prepare($queryAttendance);
    $stmtAttendance->execute();
    $resultAttendance = $stmtAttendance->fetch(PDO::FETCH_ASSOC);
    $attendanceCount = $resultAttendance['count'];

    // Calculate the number of employees on board
    $onBoardCount = $attendanceCount;

    $pdo = null;
    $stmtTotal = null;
    $stmtLeave = null;
    ?>
    <div class="bg-white rounded-md border border-gray-100 p-6 shadow-md shadow-black/10">
      <div class="text-2xl text-center font-semibold">On Board</div>
      <div class="text-2xl text-center font-semibold"><?php echo $onBoardCount; ?></div>
    </div>
    </div>
  </div>
  <!-- Newly Hired Employees -->
  <h3 class="ml-6 mt-4 text-xl font-bold">Newly Hired Employees</h3>
  
  <?php 
    if (empty($employees)) {
        require_once 'inc/noResult.php';
    } 
    else {
        require_once 'inc/employees.table.php';
    } 
  ?>
  </div>
  
</div>
</div>
</div>
<!-- Payroll --> 
<h4 class="ml-6 mt-4 text-xl font-bold"> Payroll </h4>
<?php 
  $db = Database::getInstance();
  $conn = $db->connect();

  $search = $_POST['search'] ?? '';
  $query = "SELECT payroll.*, salary_info.*, employees.* FROM payroll";
  $query .= " 
  LEFT JOIN employees ON payroll.employees_id = employees.id
  LEFT JOIN salary_info ON salary_info.employees_id = employees.id AND payroll.salary_id = salary_info.id";

  // Add an ORDER BY clause to sort the results in descending order by payroll.id
  $query .= " ORDER BY payroll.id DESC";

  // Add a LIMIT clause to limit the results to 3
  $query .= " LIMIT 3";

  $stmt = $conn->prepare($query);
  $stmt->execute();
  $payroll = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $pdo = null;
  $stmt = null;
  if (empty($payroll)) {
      require_once 'inc/noResult.php';
  } 
  else {
      require_once 'inc/payroll-list-dashboard.table.php';
  } 
?>
<!-- Chart -->
<!-- <div>
  <div class="flex items-center min-h-full max-w-full">
    <canvas id="myChart" style="height:400px;"></canvas>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
      const ctx = document.getElementById('myChart');
      new Chart(ctx, {
        type: 'line',
        data: {
          labels: ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
          datasets: [{
            label: '# Employees Payroll',
            data: [25, 50, 10, 24, 100, 95, 85],
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
    </script>  
  </div>
</div> -->
<!-- End Chart -->
</main>
<!-- End Main Bar-->
<script  src="./../src/route.js"></script>
<script  src="./../src/form.js"></script>
<script type="module" src="../public/humanResources/js/sidenav-active-inactive.js"></script>
</body>

</html>