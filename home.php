<?php
session_start();
if (!isset($_SESSION["email"])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit();
}

$message = "";
if (isset($_SESSION["success"])) {
    $message = $_SESSION["success"];
    unset($_SESSION["success"]); // Remove message after displaying
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <style>
        .popup {
            position: fixed;
            top: 20px;
            right: 20px;
            background: #28a745;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            display: none;
        }
    </style>
</head>
<body>

<?php if ($message != ""): ?>
    <div class="popup" id="popup">
        <?php echo $message; ?>
    </div>
    <script>
        document.getElementById("popup").style.display = "block"; // Show popup
        setTimeout(() => {
            document.getElementById("popup").style.display = "none";
        }, 3000); // Hide after 3 seconds
    </script>
<?php endif; ?>



</body>
</html>
