<?php
include 'config.php';
$id = intval($_GET['id']);

// Fetch painting
$res = $conn->query("SELECT * FROM paintings WHERE id=$id");
if (!$res || $res->num_rows == 0) {
    die("<p style='font-family:Poppins,sans-serif;text-align:center;margin-top:40px;'>Painting not found.</p>");
}
$row = $res->fetch_assoc();

// Build correct full path for deletion
$fullImagePath = $_SERVER['DOCUMENT_ROOT'] . "/" . $row['image_url'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Delete Painting — Nathany Artz</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

<style>
:root {
  --primary: #6B46C1;
  --danger: #E53E3E;
  --danger-dark: #C53030;
  --success: #38A169;
  --gray: #CBD5E0;
}
body {
  font-family: 'Poppins', sans-serif;
  background: #f3efff;
  padding: 40px 20px;
}
.container {
  max-width: 600px;
  margin: 60px auto;
  background: white;
  border-radius: 16px;
  padding: 35px;
  box-shadow: 0 8px 25px rgba(0,0,0,0.12);
  text-align: center;
}
h2 { color: var(--danger); }
img {
  width:100%; max-height:300px; object-fit:cover;
  border-radius:12px; margin:15px 0;
}
.buttons {
  display:flex; justify-content:center; gap:15px;
}
.btn {
  padding:12px 22px; border-radius:10px; cursor:pointer;
  font-weight:600; border:none;
}
.delete-btn { background:var(--danger); color:white; }
.cancel-btn { background:var(--gray); }
.splash {
  position:fixed; inset:0; display:none;
  background:rgba(0,0,0,0.7);
  justify-content:center; align-items:center;
  color:white; flex-direction:column;
}
</style>
</head>
<body>

<div class="container">
  <h2><i class="fa fa-trash"></i> Confirm Delete</h2>
  <p>Are you sure you want to delete this artwork?</p>

  <img src="<?= htmlspecialchars($row['image_url']) ?>">
  <p><strong><?= htmlspecialchars($row['title']) ?></strong></p>

  <form method="post">
    <div class="buttons">
      <button type="submit" name="confirm_delete" class="btn delete-btn">Yes, Delete</button>
      <button type="button" id="cancelBtn" class="btn cancel-btn">Cancel</button>
    </div>
  </form>
</div>

<div id="successSplash" class="splash">
  <h2>✔ Deleted Successfully!</h2>
</div>

<div id="cancelSplash" class="splash">
  <h2>✖ Cancelled</h2>
</div>

<?php
if (isset($_POST['confirm_delete'])) {

    // Delete image
    if (file_exists($fullImagePath)) {
        unlink($fullImagePath);
    }

    // Delete database row
    $conn->query("DELETE FROM paintings WHERE id=$id");

    echo "<script>
            sessionStorage.setItem('deleted', 'true');
            window.location.reload();
          </script>";
}
?>

<script>
if (sessionStorage.getItem('deleted') === 'true') {
    sessionStorage.removeItem('deleted');
    const s = document.getElementById('successSplash');
    s.style.display = 'flex';
    setTimeout(()=>{ window.location.href='admin.php'; }, 1500);
}

document.getElementById('cancelBtn').onclick = () => {
    const c = document.getElementById('cancelSplash');
    c.style.display = 'flex';
    setTimeout(()=>{ window.location.href='admin.php'; }, 1000);
};
</script>

</body>
</html>
