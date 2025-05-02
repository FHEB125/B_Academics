<!-- views/login.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Consultation System</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
<div class="container">
    <img src="sjcb logo.jpg" alt="College Logo" class="college-logo">
    <h1>Login</h1>
    <div class="container">
        <h1>Academic Consultation Login</h1>
        <form action="index.php?action=login" method="POST"> 
            <div class="form-group">
                <label for="email">Full Name: </label>
                <input type="email" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember" name="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit">Login</button>
        </form>
        <p>Create an account? <a href="register.php">Sign up</a></p>
        <p><a href="forgot_password.php">Forgot your password?</a></p> 
        
        <?php if (isset($_GET['error'])): ?>
            <div class="error-message" style="color: red;">
                <p><?php echo htmlspecialchars($_GET['error']); ?></p>
            </div>
        <?php endif; ?>
    </div>
</div>
</body>
</html>