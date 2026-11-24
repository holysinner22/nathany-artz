<?php
session_start();

/* --- SECURE ADMIN LOGIN CONFIG --- */
// Generate new hashes using: echo password_hash("artz2025", PASSWORD_DEFAULT);
$ADMIN_USERNAME = "nathany";
$HASHED_PASSWORD = '$2y$10$1u8JkURIrm0gL76jfUj0/O68ax0G/0R1xeIpGxkkt5rrL8b82et/C'; // hash for "artz2025"

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if ($username === $ADMIN_USERNAME && password_verify($password, $HASHED_PASSWORD)) {
        // Instead of immediate redirect, we’ll handle it with JS splash
        $_SESSION["admin_logged_in"] = true;
        echo "<script>sessionStorage.setItem('loginSuccess', 'true');</script>";
    } else {
        $error = "Invalid username or password!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login — Nathany Artz</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
:root {
  --primary: #6B46C1;
  --primary-light: #9F7AEA;
  --bg-gradient: linear-gradient(135deg, #8B5FBF, #6B46C1 60%, #553C9A);
}

/* Base */
* { box-sizing: border-box; margin: 0; padding: 0; }
body {
  font-family: 'Poppins', sans-serif;
  background: var(--bg-gradient);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  overflow: hidden;
  color: white;
}

/* Floating ambient lights */
body::before, body::after {
  content: "";
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(circle at center, rgba(255,255,255,0.1), transparent);
  animation: float 10s ease-in-out infinite alternate;
}
body::before { width: 250px; height: 250px; top: 15%; left: 10%; }
body::after { width: 300px; height: 300px; bottom: 10%; right: 8%; animation-delay: 3s; }

@keyframes float {
  0% { transform: translateY(0px); opacity: 0.8; }
  100% { transform: translateY(-25px); opacity: 1; }
}

/* Login Card */
.login-box {
  background: rgba(255,255,255,0.12);
  backdrop-filter: blur(18px);
  border: 1px solid rgba(255,255,255,0.25);
  border-radius: 16px;
  padding: 45px 50px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.2);
  width: 360px;
  text-align: center;
  animation: fadeIn 0.8s ease forwards;
}
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}

.login-box h2 {
  margin-bottom: 25px;
  font-weight: 600;
  color: #fff;
}
.login-box h2 i { color: #E9D8FD; margin-right: 8px; }

input[type="text"], input[type="password"] {
  width: 100%;
  padding: 12px 14px;
  margin: 10px 0 18px;
  border: none;
  border-radius: 8px;
  background: rgba(255,255,255,0.9);
  font-size: 1rem;
  font-family: inherit;
  outline: none;
  transition: 0.3s;
}
input:focus { box-shadow: 0 0 0 3px rgba(155, 100, 230, 0.4); }

button {
  width: 100%;
  padding: 12px;
  background: linear-gradient(90deg, var(--primary), var(--primary-light));
  color: white;
  border: none;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  transition: 0.3s ease;
  margin-top: 5px;
}
button:hover {
  transform: translateY(-2px);
  background: linear-gradient(90deg, var(--primary-light), var(--primary));
  box-shadow: 0 4px 15px rgba(107,70,193,0.4);
}

.error {
  color: #ffcccc;
  margin-top: 12px;
  font-size: 0.9rem;
  background: rgba(255,255,255,0.1);
  border-radius: 6px;
  padding: 8px 10px;
}
.back {
  display: inline-block;
  margin-top: 18px;
  color: #E9D8FD;
  text-decoration: none;
  font-weight: 500;
}
.back:hover { text-decoration: underline; }

/* Success Splash */
.splash {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.7);
  display: none;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  z-index: 999;
  color: white;
  backdrop-filter: blur(10px);
  animation: fadeInSplash 0.4s ease;
}
@keyframes fadeInSplash {
  from { opacity: 0; }
  to { opacity: 1; }
}
.checkmark {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 6px solid #38A169;
  position: relative;
  animation: popIn 0.5s ease forwards;
}
.checkmark::after {
  content: '';
  position: absolute;
  left: 24px; top: 38px;
  width: 25px; height: 45px;
  border-right: 6px solid #38A169;
  border-bottom: 6px solid #38A169;
  transform: rotate(45deg);
  animation: draw 0.6s ease 0.4s forwards;
  opacity: 0;
}
@keyframes popIn {
  from { transform: scale(0); opacity: 0; }
  to { transform: scale(1); opacity: 1; }
}
@keyframes draw {
  to { opacity: 1; }
}
.welcome-text {
  margin-top: 25px;
  font-size: 1.3rem;
  font-weight: 600;
  letter-spacing: 0.5px;
}
</style>
</head>
<body>

<form class="login-box" method="POST" id="loginForm">
  <h2><i class="fas fa-user-shield"></i> Admin Login</h2>
  <input type="text" name="username" placeholder="Username" required autofocus>
  <input type="password" name="password" placeholder="Password" required>
  <button type="submit"><i class="fas fa-sign-in-alt"></i> Login</button>
  <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
  <a href="index.php" class="back"><i class="fas fa-arrow-left"></i> Back to Home</a>
</form>

<!-- Success Splash -->
<div class="splash" id="splash">
  <div class="checkmark"></div>
  <div class="welcome-text">Welcome back, Nathany!</div>
</div>

<script>
if (sessionStorage.getItem('loginSuccess') === 'true') {
  // Clear flag immediately so it doesn’t replay
  sessionStorage.removeItem('loginSuccess');

  const splash = document.getElementById('splash');
  splash.style.display = 'flex';

  setTimeout(() => {
    splash.querySelector('.checkmark').style.transform = 'scale(1.2)';
  }, 300);

  // Redirect after 2 seconds
  setTimeout(() => {
    splash.style.opacity = '0';
    setTimeout(() => { window.location.href = 'admin.php'; }, 500);
  }, 2000);
}
</script>

</body>
</html>
