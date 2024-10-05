<?php
session_start();
include '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM bookings WHERE user_id = '$user_id'";
$result = $conn->query($sql);
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Your Bookings</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Bus ID</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['bus_id']}</td>
                            <td><a href='cancel_booking.php?id={$row['id']}' class='btn btn-danger'>Cancel</a></td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='3' class='text-center'>No bookings found.</td></tr>";
            } ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
