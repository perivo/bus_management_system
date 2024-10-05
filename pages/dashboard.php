<?php
session_start();
include '../config/db.php';

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); // Redirect to login if not logged in
    exit; // Ensure no further code is executed after the redirect
}
if (!isset($_SESSION['user'])) {
    header('Location: login.php');
    exit();
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Dashboard</h2>
    <p>Welcome, <?php echo $_SESSION['user']; ?>!</p>
    <ul>
        <li><a href="view_schedules.php">View Bus Schedules</a></li>
        <li><a href="manage_schedules.php">Manage Bus Schedules</a></li>
    </ul>
</div>
<?php include '../includes/footer.php'; ?>
