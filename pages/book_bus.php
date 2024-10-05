<?php
session_start();
include '../config/db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get bus ID and user ID from session
    $bus_id = $_POST['bus_id'];
    $user_id = $_SESSION['user_id'];

    // Insert booking into the database
    $sql = "INSERT INTO bookings (user_id, bus_id) VALUES ('$user_id', '$bus_id')";
    if ($conn->query($sql) === TRUE) {
        header('Location: view_bookings.php?msg=Booking successful!');
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}

// Get bus ID from the URL
if (isset($_GET['id'])) {
    $bus_id = $_GET['id'];
} else {
    // Redirect if bus ID is not present
    header('Location: view_schedules.php');
    exit;
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Book Bus</h2>
    <form method="POST" action="">
        <input type="hidden" name="bus_id" value="<?php echo htmlspecialchars($bus_id); ?>">
        <button type="submit" class="btn btn-primary">Confirm Booking</button>
    </form>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
</div>
<?php include '../includes/footer.php'; ?>
