<?php
include 'config.php';
$id = intval($_GET['id']);

// Fetch artwork
$res = $conn->query("SELECT * FROM paintings WHERE id=$id");
if (!$res || $res->num_rows == 0) {
  die("<h2 style='text-align:center;margin-top:50px;'>Artwork not found.</h2>");
}
$art = $res->fetch_assoc();
$formattedPrice = number_format($art['price'], 0, '.', ',');

// Next / Prev
$prev_query = $conn->query("SELECT id FROM paintings WHERE id < $id ORDER BY id DESC LIMIT 1");
$next_query = $conn->query("SELECT id FROM paintings WHERE id > $id ORDER BY id ASC LIMIT 1");
$prev_id = $prev_query && $prev_query->num_rows > 0 ? $prev_query->fetch_assoc()['id'] : null;
$next_id = $next_query && $next_query->num_rows > 0 ? $next_query->fetch_assoc()['id'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title><?= htmlspecialchars($art['title']) ?> — Nathany Artz</title>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&display=swap" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
<style>
:root {
  --primary: #8B5FBF;
  --primary-dark: #6B46C1;
  --light-bg: #F7F7FB;
  --dark: #1A202C;
}

/* Base */
body {
  font-family: 'Inter', sans-serif;
  background: var(--light-bg);
  margin: 0;
  color: var(--dark);
  line-height: 1.8;
  overflow-x: hidden;
}
a { text-decoration: none; }

/* Container */
.art-container {
  max-width: 1100px;
  margin: 80px auto;
  display: flex;
  flex-wrap: wrap;
  border-radius: 20px;
  overflow: hidden;
  background: white;
  box-shadow: 0 20px 40px rgba(0,0,0,0.08);
  animation: fadeIn 1s ease forwards;
}

/* Image */
.art-image {
  flex: 1;
  min-width: 320px;
  position: relative;
  overflow: hidden;
}
.art-image img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transform: scale(1.05);
  transition: transform 10s ease-out;
}
.art-image:hover img {
  transform: scale(1.15);
}
.art-image::after {
  content: "";
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at center, rgba(0,0,0,0.05), rgba(0,0,0,0.6));
  opacity: 0.3;
}

/* Details */
.art-details {
  flex: 1.2;
  padding: 60px 50px;
}
.art-details h1 {
  font-size: 2.4rem;
  font-weight: 800;
  margin-bottom: 1rem;
  color: var(--dark);
  letter-spacing: -0.5px;
}
.art-details p {
  color: #444;
  font-size: 1.05rem;
  margin-bottom: 1.5rem;
}
.art-price {
  font-size: 1.4rem;
  font-weight: 700;
  color: var(--primary-dark);
  margin-bottom: 1.8rem;
}

/* Buttons */
.actions {
  display: flex;
  flex-wrap: wrap;
  gap: 15px;
}
.btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  padding: 14px 28px;
  border-radius: 50px;
  font-weight: 600;
  transition: all 0.3s ease;
}
.btn i { font-size: 1.1rem; }

.btn-primary {
  background: linear-gradient(90deg, var(--primary), var(--primary-dark));
  color: white;
  box-shadow: 0 6px 15px rgba(107,70,193,0.3);
}
.btn-primary:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(107,70,193,0.45);
}

.btn-secondary {
  background: #E2E8F0;
  color: var(--dark);
}
.btn-secondary:hover {
  background: #CBD5E0;
}

/* Navigation */
.nav-section {
  display: flex;
  justify-content: center;
  gap: 25px;
  margin: 50px auto 80px;
  flex-wrap: wrap;
}
.nav-link {
  background: linear-gradient(90deg, var(--primary), var(--primary-dark));
  color: white;
  padding: 12px 24px;
  border-radius: 50px;
  font-weight: 600;
  display: inline-flex;
  align-items: center;
  gap: 8px;
  transition: all 0.3s ease;
}
.nav-link:hover {
  background: var(--primary-dark);
  transform: translateY(-3px);
}

/* Responsive */
@media (max-width: 900px) {
  .art-container {
    flex-direction: column;
    margin: 40px 20px;
  }
  .art-details {
    padding: 40px 25px;
  }
  .art-details h1 {
    font-size: 2rem;
  }
}

/* Animation */
@keyframes fadeIn {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}
</style>
</head>
<body>

<div class="art-container">
  <div class="art-image">
    <img src="<?= htmlspecialchars($art['image_url']) ?>" alt="<?= htmlspecialchars($art['title']) ?>">
  </div>

  <div class="art-details">
    <h1><?= htmlspecialchars($art['title']) ?></h1>
    <p><?= nl2br(htmlspecialchars($art['description'])) ?></p>
    <div class="art-price"><?= $formattedPrice ?> USD</div>

    <div class="actions">
      <a href="https://wa.me/255755468977?text=<?= urlencode("Hi Nathany! I’m inspired by your artwork: “" . $art['title'] . "”. Is it still available?") ?>" 
         target="_blank" class="btn btn-primary">
        <i class="fab fa-whatsapp"></i> Inquire via WhatsApp
      </a>
      <a href="index.php#gallery" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Back to Gallery
      </a>
    </div>
  </div>
</div>

<!-- Next / Previous navigation -->
<div class="nav-section">
  <?php if ($prev_id): ?>
    <a href="details.php?id=<?= $prev_id ?>" class="nav-link">
      <i class="fas fa-chevron-left"></i> Previous Artwork
    </a>
  <?php endif; ?>

  <?php if ($next_id): ?>
    <a href="details.php?id=<?= $next_id ?>" class="nav-link">
      Next Artwork <i class="fas fa-chevron-right"></i>
    </a>
  <?php endif; ?>
</div>

</body>
</html>
