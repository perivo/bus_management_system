<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id'])) {
    $booking_id = $_GET['id'];
    $sql = "DELETE FROM bookings WHERE id = '$booking_id'";
    
    if ($conn->query($sql) === TRUE) {
        header('Location: view_bookings.php?msg=Booking cancelled successfully!');
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Cancel Booking</h2>
    <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
    <p>Booking has been cancelled. <a href="view_bookings.php">View your bookings</a>.</p>
</div>
<?php include '../includes/footer.php'; ?>
