<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exception</title>
</head>
<?php
session_start();

function loginUser($username, $password) {
    if ($username === '' || $password === '') {
        throw new InvalidArgumentException("Username dan password harus diisi.");
    }
    if ($password !== '123') {
        throw new RuntimeException("Password yang dimasukkan salah.");
    }
    $_SESSION['username'] = $username;
}

// Periksa login status
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $username = $_POST['username'];
        $password = $_POST['password'];
        loginUser($username, $password);
        header("Location: galery.php");
        exit();
    } catch (InvalidArgumentException $e) {
        $error_message = $e->getMessage();
    } catch (RuntimeException $e) {
        $error_message = $e->getMessage();
    }
}
?>

<body>
    <h2>Login Menggunakan Exception</h2>
    <?php if (isset($error_message)) { ?>
        <p>Error: <?php echo $error_message; ?></p>
    <?php } ?>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>