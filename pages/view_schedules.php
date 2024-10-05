<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Bus Schedules</h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Departure</th>
                <th>Type</th>
                <th>Destination</th>
                <th>Time</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include '../includes/functions.php';
            $schedules = getSchedules();
            if (empty($schedules)) {
                echo "<tr><td colspan='5' class='text-center'>No schedules found.</td></tr>";
            } else {
                foreach ($schedules as $schedule) {
                    echo "<tr>
                            <td>{$schedule['departure']}</td>
                            <td>{$schedule['type']}</td>
                            <td>{$schedule['destination']}</td>
                            <td>{$schedule['time']}</td>
                            <td><a href='book_bus.php?id={$schedule['id']}' class='btn btn-primary'>Book</a></td>
                        </tr>";
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include '../includes/footer.php'; ?>
