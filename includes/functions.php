<?php
include '../config/db.php';

function getSchedules() {
    global $conn;
    $sql = "SELECT * FROM bus_schedule"; // Ensure your table name is correct
    $result = $conn->query($sql);
    $schedules = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $schedules[] = $row;
        }
    }
    return $schedules;
}
?>
