<?php

session_start();
include '../config/db.php';
include '../includes/functions.php';
// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit; // Ensure no further code is executed after the redirect
}

// Add new schedule
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $departure = $_POST['departure'];
    $type = $_POST['type'];
    $destination = $_POST['destination'];
    $time = $_POST['time'];

    $sql = "INSERT INTO schedules (departure, type, destination, time) VALUES ('$departure', '$type', '$destination', '$time')";
    if ($conn->query($sql) === TRUE) {
        $success = "New schedule added successfully!";
    } else {
        $error = "Error: " . $conn->error;
    }
}

// Fetch schedules for display
$schedules = getSchedules();
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Manage Bus Schedules</h2>
    
    <?php if (isset($success)) echo "<div class='alert alert-success'>$success</div>"; ?>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    
    <form method="POST" action="">
        <div class="mb-3">
            <label for="departure" class="form-label">Departure</label>
            <input type="text" class="form-control" id="departure" name="departure" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Bus Type</label>
            <input type="text" class="form-control" id="type" name="type" required>
        </div>
        <div class="mb-3">
            <label for="destination" class="form-label">Destination</label>
            <input type="text" class="form-control" id="destination" name="destination" required>
        </div>
        <div class="mb-3">
            <label for="time" class="form-label">Time</label>
            <input type="text" class="form-control" id="time" name="time" required>
        </div>
        <button type="submit" class="btn btn-primary">Add Schedule</button>
    </form>

    <h3 class="mt-5">Existing Schedules</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Departure</th>
                <th>Type</th>
                <th>Destination</th>
                <th>Time</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (empty($schedules)) {
                echo "<tr><td colspan='4' class='text-center'>No schedules found.</td></tr>";
            } else {
                foreach ($schedules as $schedule) {
                    echo "<tr>
                            <td>{$schedule['departure']}</td>
                            <td>{$schedule['type']}</td>
                            <td>{$schedule['destination']}</td>
                            <td>{$schedule['time']}</td>
                        </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
