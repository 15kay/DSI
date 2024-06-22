<?php
session_start();

// Check if admin is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Check if the user is an admin (You can also validate based on roles or privileges)
include('database/config.php');
$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM admin WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

// If user is not an admin, redirect to login
if ($result->num_rows <= 0) {
    header("Location: login.php");
    exit;
}

require_once('database/config.php');
$query = "SELECT StudentID, FirstName, LastName, Subject1, Subject2, Email, Actions FROM Students";
$results = mysqli_query($conn, $query);
$countQuery = "SELECT COUNT(*) AS total FROM Students";
$countResult = mysqli_query($conn, $countQuery);
$countRow = mysqli_fetch_assoc($countResult);
$totalStudents = $countRow['total'];

$stmt_Dev1 = $conn->prepare("SELECT COUNT(*) as total FROM Students WHERE Subject1 = 'DEV1' or Subject1='DEV1'");
$stmt_Dev1->execute();
$result_Dev1 = $stmt_Dev1->get_result();
$rowDev1 = $result_Dev1->fetch_assoc();
$Dev1 = $rowDev1['total'];

$stmt_Dev2 = $conn->prepare("SELECT COUNT(*) as total FROM Students WHERE Subject1 = 'DEV2' or Subject2='DEV2'");
$stmt_Dev2->execute();
$result_Dev2 = $stmt_Dev2->get_result();
$rowDev2 = $result_Dev2->fetch_assoc();
$Dev2 = $rowDev2['total'];

$stmt_TP1 = $conn->prepare("SELECT COUNT(*) as total FROM Students WHERE Subject1 = 'TP1' or Subject2='TP1'");
$stmt_TP1->execute();
$result_TP1 = $stmt_TP1->get_result();
$rowTP1 = $result_TP1->fetch_assoc();
$TP1 = $rowTP1['total'];

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['student_id'])) {
    // Update the status to "Admitted" for the student with the given ID
    $studentId = $_POST['student_id'];
    $sql = "UPDATE Students SET Actions='Admitted' WHERE StudentID=$studentId";

 } else {
        echo "Failed to update status: " . $conn->error;
    }

    // Retrieve the list of students
    $sql = "SELECT * FROM Students";
    $results = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fect data from Php database</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="vendors/styles/adminDash.css">
</head>

<body>
    <header>
        <nav>
            <div class="nav-upper-options">
                <div class="nav-option">
                    <h3><a href=""><i class="fas fa-tachometer-alt"></i> Dashboard</a></h3>
                </div>
                <div class="nav-option">
                    <h3><a href=""><i class="fas fa-chart-bar"></i> Insights</a></h3>
                </div>
                <div class="nav-option">
                    <h3><a href=""><i class="fas fa-pencil-alt"></i> Grading</a></h3>
                </div>
                <div class="nav-option">
                    <h3><a href=""><i class="fas fa-file"></i> Files</a></h3>
                </div>
                <div class="nav-option">
                    <h3><a href=""><i class="fas fa-cog"></i> Settings</a></h3>
                </div>
                <div class="nav-option">
                    <h3><a href=""><i class="fas fa-sign-out-alt"></i> Logout</a></h3>
                </div>
            </div>
        </nav>
    </header>
    <div class="main">
        <div class="box-container">
            <div class="box box1">
                <div class="text">
                    <h2 class="topic-heading">
                        <i class="fas fa-users"></i>
                        <?php echo $totalStudents; ?>
                    </h2>
                    <h2 class="topic" name="enrolled">Enrolled Students</h2>
                </div>
            </div>
            <div class="box box1">
                <div class="text">
                    <h2 class="topic-heading">
                        <i class="fas fa-code"></i>
                        <?php echo $Dev1; ?>
                    </h2>
                    <h2 class="topic" name="DEV1">DEV1</h2>
                </div>
            </div>
            <div class="box box1">
                <div class="text">
                    <h2 class="topic-heading">
                        <i class="fas fa-code"></i>
                        <?php echo $Dev2; ?>
                    </h2>
                    <h2 class="topic" name="DEV2">DEV2</h2>
                </div>
            </div>
            <div class="box box4">
                <div class="text">
                    <h2 class="topic-heading">
                        <i class="fas fa-book"></i>
                        <?php echo $TP1; ?>
                    </h2>
                    <h2 class="TP1">TP1</h2>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card">
                        <br>
                        <div class="card-header">
                            <h2 class="display-6"><b> Students</b></h2>
                            <div class="search">
                                <form action="application.php" method="GET">
                                    <input type="text" name="search_term" placeholder="Search Student">
                                    <!-- <button type="submit">Search</button> -->
                                </form>
                            </div>
                        </div>
                        <br>
                        <hr>
                        <form action="updateStatus.php" method="post">
                            <div class="card-body">
                                <table class="table-border">
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Subject 1</th>
                                        <th>Subject 2</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php
                                    while($row = mysqli_fetch_assoc($results)) {
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $row['FirstName']?>
                                        </td>
                                        <td>
                                            <?php echo $row['LastName']?>
                                        </td>
                                        <td>
                                            <?php echo $row['Subject1']?>
                                        </td>
                                        <td>
                                            <?php echo $row['Subject2']?>
                                        </td>
                                        <td><a href="#Email.php">
                                                <?php echo $row['Email']?>
                                            </a></td>
                                        <td>
                                            <?php echo $row['Actions']?>
                                        </td>
                                        <td>
                                            <input type="hidden" name="student_id"
                                                value="<?php echo $row['StudentID']; ?>">
                                            <input type="submit" class="update-button" value="Update">
                                        </td>
                                    </tr>
                                    <?php
                                    } 
                                    ?>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>