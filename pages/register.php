<?php
session_start();
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
    if ($conn->query($sql) === TRUE) {
        header('Location: login.php');
        exit;
    } else {
        $error = "Error: " . $conn->error;
    }
}
?>

<?php include '../includes/header.php'; ?>
<div class="container mt-5">
    <h2>Register</h2>
    <form method="POST" action="">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <button type="submit" class="btn btn-primary">Register</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>
