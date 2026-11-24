<?php 
include 'config.php'; 
$id = intval($_GET['id']);
$res = $conn->query("SELECT * FROM paintings WHERE id=$id");
$row = $res->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Painting — Nathany Artz</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
:root {
  --primary: #6B46C1;
  --primary-light: #9F7AEA;
  --success: #38A169;
  --danger: #E53E3E;
  --bg: #f5f4fb;
  --white: #fff;
}

/* Base */
body {
  font-family: 'Poppins', sans-serif;
  background: linear-gradient(135deg, var(--bg) 0%, #ece8ff 100%);
  margin: 0;
  padding: 40px 20px;
  color: #333;
  overflow-x: hidden;
}

/* Container */
.container {
  max-width: 700px;
  margin: 40px auto;
  background: rgba(255,255,255,0.9);
  backdrop-filter: blur(12px);
  border-radius: 18px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.08);
  padding: 40px 35px;
  animation: fadeUp 0.8s ease forwards;
}
h2 {
  text-align: center;
  color: var(--primary);
  font-weight: 700;
  font-size: 1.8rem;
  margin-bottom: 25px;
}
h2 i { color: var(--primary-light); margin-right: 8px; }

/* Labels & Inputs */
label {
  font-weight: 600;
  color: #444;
  margin-bottom: 6px;
  display: block;
}
input, textarea {
  width: 100%;
  padding: 12px 15px;
  border-radius: 10px;
  border: 1px solid #ccc;
  font-size: 0.95rem;
  margin-bottom: 18px;
  background: rgba(255,255,255,0.8);
  transition: all 0.3s ease;
}
input:focus, textarea:focus {
  border-color: var(--primary);
  box-shadow: 0 0 8px rgba(107,70,193,0.25);
}

/* File Input */
input[type="file"] {
  padding: 8px;
  border: 1px dashed var(--primary-light);
  cursor: pointer;
}
input[type="file"]:hover { background: rgba(255,255,255,0.95); }

/* Image */
.image-preview {
  width: 100%;
  max-height: 300px;
  object-fit: cover;
  border-radius: 10px;
  border: 1px solid #eee;
  margin-bottom: 15px;
  display: block;
  box-shadow: 0 4px 10px rgba(0,0,0,0.08);
}

/* Buttons */
button, .nav-link {
  border: none;
  border-radius: 10px;
  padding: 12px 20px;
  font-weight: 600;
  cursor: pointer;
  text-decoration: none;
  transition: all 0.3s ease;
}
button {
  background: linear-gradient(90deg, var(--primary), var(--primary-light));
  color: #fff;
  width: 100%;
  font-size: 1rem;
  box-shadow: 0 6px 18px rgba(107,70,193,0.3);
}
button:hover {
  transform: translateY(-2px);
  box-shadow: 0 8px 22px rgba(107,70,193,0.4);
}

/* Nav Buttons */
.nav-buttons {
  display: flex;
  justify-content: space-between;
  gap: 10px;
  margin-top: 25px;
}
.nav-link {
  flex: 1;
  background: #e2e8f0;
  color: #333;
  text-align: center;
  font-weight: 500;
}
.nav-link:hover { background: #d4c7f7; color: var(--primary); }

/* Splash Success */
.splash {
  position: fixed;
  top: 0; left: 0;
  width: 100%; height: 100%;
  background: rgba(0,0,0,0.7);
  display: none;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  z-index: 9999;
  color: white;
  backdrop-filter: blur(10px);
}
.checkmark {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 6px solid var(--success);
  position: relative;
  animation: popIn 0.5s ease forwards;
}
.checkmark::after {
  content: '';
  position: absolute;
  left: 24px; top: 38px;
  width: 25px; height: 45px;
  border-right: 6px solid var(--success);
  border-bottom: 6px solid var(--success);
  transform: rotate(45deg);
  animation: draw 0.6s ease 0.4s forwards;
  opacity: 0;
}
.welcome-text {
  margin-top: 25px;
  font-size: 1.3rem;
  font-weight: 600;
}
@keyframes popIn { from { transform: scale(0); opacity: 0; } to { transform: scale(1); opacity: 1; } }
@keyframes draw { to { opacity: 1; } }
@keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

/* Responsive */
@media (max-width: 600px) {
  .container { padding: 25px 20px; }
  .nav-buttons { flex-direction: column; }
}
</style>
</head>
<body>

<div class="container">
  <h2><i class="fas fa-edit"></i> Edit Painting</h2>

  <form method="post" enctype="multipart/form-data">
    <label>Title</label>
    <input type="text" name="title" value="<?= htmlspecialchars($row['title']) ?>" required>

    <label>Description</label>
    <textarea name="description" rows="3"><?= htmlspecialchars($row['description']) ?></textarea>

    <label>Price (USD)</label>
    <input type="number" name="price" value="<?= htmlspecialchars($row['price']) ?>" required>

    <label>Current Image</label>
    <img src="<?= htmlspecialchars($row['image_url']) ?>" class="image-preview" alt="Current Image">

    <label>Change Image</label>
    <input type="file" name="image_file" id="image_file" accept="image/*">
    <img id="preview" class="image-preview" style="display:none;" alt="Preview">

    <button type="submit" name="update"><i class="fas fa-save"></i> Save Changes</button>
  </form>

  <div class="nav-buttons">
    <a href="admin.php" class="nav-link"><i class="fas fa-arrow-left"></i> Back to Admin</a>
    <a href="index.php" class="nav-link"><i class="fas fa-home"></i> Home</a>
  </div>

  <?php
  if (isset($_POST['update'])) {
      $title = $conn->real_escape_string($_POST['title']);
      $desc = $conn->real_escape_string($_POST['description']);
      $price = $conn->real_escape_string($_POST['price']);
      $image_url = $row['image_url'];

      if (!empty($_FILES["image_file"]["name"])) {
          $target_dir = "uploads/";
          if (!file_exists($target_dir)) mkdir($target_dir, 0777, true);
          $file_name = basename($_FILES["image_file"]["name"]);
          $target_file = $target_dir . time() . "_" . $file_name;
          $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
          $valid_ext = ["jpg","jpeg","png","gif","webp"];

          if (in_array($ext, $valid_ext)) {
              if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {
                  $image_url = $target_file;
              } else {
                  echo "<p class='error'>❌ Error uploading new image.</p>";
              }
          } else {
              echo "<p class='error'>❌ Invalid file type. Only images allowed.</p>";
          }
      }

      $sql = "UPDATE paintings SET title='$title', description='$desc', price='$price', image_url='$image_url' WHERE id=$id";
      if ($conn->query($sql)) {
          echo "<script>sessionStorage.setItem('paintingUpdated', 'true');</script>";
      } else {
          echo "<p class='error'>❌ Database Error: ".$conn->error."</p>";
      }
  }
  ?>
</div>

<!-- Splash Success -->
<div class="splash" id="splash">
  <div class="checkmark"></div>
  <div class="welcome-text">Painting updated successfully!</div>
</div>

<script>
// Live preview
const fileInput = document.getElementById('image_file');
const preview = document.getElementById('preview');
fileInput.addEventListener('change', e => {
  const file = e.target.files[0];
  if (file) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
  } else {
    preview.style.display = 'none';
  }
});

// Show splash on success
if (sessionStorage.getItem('paintingUpdated') === 'true') {
  sessionStorage.removeItem('paintingUpdated');
  const splash = document.getElementById('splash');
  splash.style.display = 'flex';
  setTimeout(() => {
    splash.style.opacity = '0';
    setTimeout(() => { window.location.href = 'admin.php'; }, 600);
  }, 2000);
}
</script>

</body>
</html>
