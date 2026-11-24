<?php include 'config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Painting — Nathany Artz</title>
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
  background: linear-gradient(135deg, var(--bg) 0%, #f0edff 100%);
  color: #333;
  margin: 0;
  padding: 40px 20px;
  overflow-x: hidden;
}

/* Container Card */
.container {
  max-width: 650px;
  margin: auto;
  background: rgba(255,255,255,0.9);
  backdrop-filter: blur(12px);
  border-radius: 16px;
  padding: 40px 30px;
  box-shadow: 0 15px 40px rgba(0,0,0,0.08);
  animation: fadeUp 0.8s ease forwards;
}
h2 {
  text-align: center;
  font-size: 1.8rem;
  color: var(--primary);
  font-weight: 700;
  margin-bottom: 25px;
  letter-spacing: 0.5px;
}

/* Form */
input, textarea {
  width: 100%;
  padding: 12px 15px;
  border-radius: 10px;
  border: 1px solid #ccc;
  font-size: 0.95rem;
  margin-bottom: 18px;
  outline: none;
  background: rgba(255,255,255,0.8);
  transition: 0.3s;
}

/* File input */
input[type="file"] {
  padding: 8px;
  background: rgba(255,255,255,0.7);
  border: 1px dashed var(--primary-light);
  cursor: pointer;
}

/* Image preview */
.image-preview {
  width: 100%;
  max-height: 300px;
  object-fit: cover;
  border-radius: 10px;
  border: 2px solid #eee;
  margin-bottom: 18px;
  display: none;
}

/* Buttons */
button, .nav-link {
  border: none;
  border-radius: 10px;
  padding: 12px 20px;
  font-weight: 600;
  cursor: pointer;
  transition: all 0.3s ease;
  text-decoration: none;
  text-align: center;
}
button {
  background: linear-gradient(90deg, var(--primary), var(--primary-light));
  color: #fff;
  width: 100%;
}
button:hover {
  transform: translateY(-2px);
}

.nav-buttons {
  display: flex;
  justify-content: space-between;
  margin-top: 25px;
  gap: 10px;
}
.nav-link {
  flex: 1;
  background: #e2e8f0;
  color: #333;
}
.nav-link:hover {
  background: #d4c7f7;
  color: var(--primary);
}

/* Splash */
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
}
.checkmark {
  width: 90px;
  height: 90px;
  border-radius: 50%;
  border: 6px solid var(--success);
  position: relative;
}
.checkmark::after {
  content: '';
  position: absolute;
  left: 24px; top: 38px;
  width: 25px; height: 45px;
  border-right: 6px solid var(--success);
  border-bottom: 6px solid var(--success);
  transform: rotate(45deg);
}
</style>
</head>
<body>

<div class="container">
  <h2><i class="fas fa-plus-circle"></i> Add New Painting</h2>

  <form method="post" enctype="multipart/form-data">
    <input type="text" name="title" placeholder="Title" required>
    <textarea name="description" placeholder="Description" rows="3"></textarea>
    <input type="number" name="price" placeholder="Price (USD)" required>

    <input type="file" name="image_file" id="image_file" accept="image/*" required>
    <img id="preview" class="image-preview" alt="Image Preview">

    <button type="submit" name="save"><i class="fas fa-save"></i> Save Painting</button>
  </form>

  <div class="nav-buttons">
    <a href="admin.php" class="nav-link">← Back to Admin</a>
    <a href="index.php" class="nav-link">Home</a>
  </div>

<?php
if (isset($_POST['save'])) {
    $title = $conn->real_escape_string($_POST['title']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = $conn->real_escape_string($_POST['price']);

    /* FINAL PATH — ALWAYS PUBLIC_HTML/uploads/ */
    $upload_folder = "uploads/";
    $target_dir = $_SERVER['DOCUMENT_ROOT'] . "/" . $upload_folder;

    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $file_name = time() . "_" . basename($_FILES["image_file"]["name"]);
    $target_file = $target_dir . $file_name;

    // What goes into the database
    $image_url = $upload_folder . $file_name;

    $ext = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    $allowed = ["jpg", "jpeg", "png", "gif", "webp"];

    if (in_array($ext, $allowed)) {

        if (move_uploaded_file($_FILES["image_file"]["tmp_name"], $target_file)) {

            $sql = "INSERT INTO paintings (title, description, image_url, price)
                    VALUES ('$title', '$desc', '$image_url', '$price')";

            if ($conn->query($sql)) {
                echo "<script>sessionStorage.setItem('paintingAdded', 'true');</script>";
            } else {
                echo "<p style='color:red;'>❌ Database Error: ".$conn->error."</p>";
            }

        } else {
            echo "<p style='color:red;'>❌ Error uploading file.</p>";
        }

    } else {
        echo "<p style='color:red;'>❌ Invalid file format.</p>";
    }
}
?>
</div>

<div class="splash" id="splash">
  <div class="checkmark"></div>
  <div class="welcome-text">Painting added successfully!</div>
</div>

<script>
document.getElementById('image_file').addEventListener('change', e => {
  const file = e.target.files[0];
  const preview = document.getElementById('preview');
  if (file) {
    preview.src = URL.createObjectURL(file);
    preview.style.display = 'block';
  }
});

// Success popup then redirect
if (sessionStorage.getItem('paintingAdded') === 'true') {
  sessionStorage.removeItem('paintingAdded');
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
