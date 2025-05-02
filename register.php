<!-- views/register.php -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Register - Academic Consultation</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<div class="container">
    <img src="sjcb logo.jpg" alt="College Logo" class="college-logo">
    <h1>Register</h1>
    <form action="index.php?action=register" method="POST">
        <label for="full_name">Full Name:</label>
        <input type="text" id="full_name" name="full_name" required value="<?php echo htmlspecialchars($_POST['full_name'] ?? ''); ?>">
        
        <label for="email">Email Address:</label>
        <input type="email" id="email" name="email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>">
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <label for="confirm_password">Confirm Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>
        
        <button type="submit">Register</button>
    </form>
    <p>Already registered? <a href="index.php?action=login_page">Login here</a></p>

    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
    <?php if (isset($_GET['success'])): ?>
        <p style="color:green;"><?php echo htmlspecialchars($_GET['success']); ?></p>
    <?php endif; ?>
</div>
</body>
</html>