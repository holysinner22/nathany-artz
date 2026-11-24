<?php
include 'config.php';
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="google-site-verification" content="7WVVtzyKuvA4h_tEq6DMvC-BzIYCsvtUjU6BpVmoZ_Q" />
<title>Nathany Artz</title>
<!-- Favicon / Tab Icon -->
<link rel="icon" type="image/png" href="uploads/logi.png">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
/* === CSS VARIABLES === */
:root {
  --primary: #FFD11F;        /* Logo Yellow */
  --primary-dark: #E6B800;   /* Deeper Gold for hover states */
  --secondary: #000000;      /* Black for accents */
  --dark: #000000;           /* Text & contrast */
  --light: #FFFFFF;          /* Main background */
  --gray: #555555;           /* Neutral text */
  --gray-light: #F2F2F2;     /* Light backgrounds */
  --transition: all 0.3s ease;
}


/* === BASE === */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

html {
  scroll-behavior: smooth;
}

body {
  font-family: 'Inter', sans-serif;
  background-color: var(--light);
  color: var(--dark);
  line-height: 1.6;
  overflow-x: hidden;
}

/* === OTHER MOBILE STYLES === */
@media (max-width: 768px) {
  header {
    padding: 1rem 5%;
  }
  
  /* Split Hero Layout for Mobile */
  .hero {
    flex-direction: column;
    min-height: auto;
  }
  
  .hero-image {
    flex: 1;
    min-height: 50vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: var(--gray-light);
    position: relative;
    overflow: hidden;
  }

  .hero-image img {
    width: 100%;
    height: 50vh;
    object-fit: cover;
    transition: transform 0.5s ease;
  }

  .hero-content {
    order: 2;
    padding: 4rem 5%;
    align-items: center;
    text-align: center;
  }
  
  .hero-content h1 {
    font-size: 2.3rem;
  }
  
  .hero-content p {
    font-size: 1.1rem;
  }
  
  .hero-buttons {
    flex-direction: column;
    align-items: center;
    width: 100%;
  }
  
  .btn {
    width: 100%;
    max-width: 300px;
    justify-content: center;
  }
  
  .contact-actions {
    flex-direction: column;
    align-items: center;
  }
  
  .about-stats {
    flex-direction: column;
    gap: 1.5rem;
  }
  
  .scroll-indicator {
    display: none;
  }
}

/* === HERO SECTION === */
.hero-elegant {
  position: relative;
  height: 100vh;
  width: 100%;
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--dark);
  color: #fff;
}

/* Background & animation */
.hero-bg {
  position: absolute;
  inset: 0;
  z-index: 0;
}
.hero-bg img {
  width: 100%;
  height: 100%;
  object-fit: cover;
  filter: brightness(0.55) saturate(1.15);
  animation: panZoom 30s ease-in-out infinite alternate;
}
@keyframes panZoom {
  0% { transform: scale(1.05) translate(0,0); }
  100% { transform: scale(1.18) translate(-2%, -3%); }
}

/* Glass overlay with brand hues */
.hero-glass {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    120deg,
    rgba(139, 95, 191, 0.65) 0%,
    rgba(255, 107, 107, 0.25) 40%,
    rgba(15, 15, 20, 0.7) 100%
  );
  backdrop-filter: blur(7px);
  z-index: 1;
}

/* Content Layer */
.hero-container {
  position: relative;
  z-index: 2;
  max-width: 850px;
  animation: fadeUp 1.5s ease forwards;
  padding: 0 1rem;
}

.hero-heading {
  font-size: clamp(2.8rem, 6vw, 5rem);
  font-weight: 800;
  line-height: 1.1;
  color: #fff;
  margin-bottom: 1rem;
  letter-spacing: -0.5px;
}
.hero-name {
  display: inline-block;
  background: linear-gradient(90deg, var(--primary), var(--secondary));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.hero-subtitle {
  font-size: 1.4rem;
  font-weight: 400;
  color: rgba(255,255,255,0.85);
  letter-spacing: 0.8px;
}

/* Hero tagline */
.hero-tagline {
  font-size: 1.25rem;
  color: #e8e8e8;
  margin-bottom: 2.5rem;
  line-height: 1.8;
  max-width: 700px;
  text-shadow: 0 3px 8px rgba(0,0,0,0.35);
}

/* Buttons */
.hero-actions {
  display: flex;
  flex-wrap: wrap;
  gap: 1rem;
  margin-bottom: 2.5rem;
}
.btn-main {
  background: linear-gradient(90deg, var(--primary), var(--primary-dark));
  color: #fff;
  border-radius: 50px;
  font-weight: 600;
  padding: 14px 30px;
  transition: all 0.3s ease;
  box-shadow: 0 8px 25px rgba(107, 70, 193, 0.4);
}
.btn-main:hover {
  background: var(--primary-dark);
  transform: translateY(-4px);
  box-shadow: 0 10px 30px rgba(107, 70, 193, 0.5);
}
.btn-outline-light {
  border: 2px solid #fff;
  color: #fff;
  padding: 14px 30px;
  border-radius: 50px;
  transition: all 0.3s ease;
}
.btn-outline-light:hover {
  background: #fff;
  color: var(--primary-dark);
}

/* Artistic Quote */
.hero-quote {
  font-style: italic;
  color: rgba(255,255,255,0.9);
  font-size: 1.1rem;
  margin-top: 1.5rem;
  animation: fadeUp 2.3s ease forwards;
  animation-delay: 0.3s;
}

/* Scroll Icon */
.scroll-icon {
  position: absolute;
  bottom: 40px;
  left: 50%;
  transform: translateX(-50%);
  animation: bounce 2s infinite;
  font-size: 1.5rem;
  color: rgba(255,255,255,0.8);
}

/* Animations */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(40px); }
  to { opacity: 1; transform: translateY(0); }
}
@keyframes bounce {
  0%,20%,50%,80%,100% { transform: translate(-50%,0); }
  40% { transform: translate(-50%,-12px); }
  60% { transform: translate(-50%,-6px); }
}

/* Responsive */
@media (max-width: 768px) {
  .hero-heading,
  .hero-tagline,
  .hero-quote { text-align: center; }
  .hero-actions { justify-content: center; }
}


/* === GALLERY === */
.gallery-section {
  padding: 120px 6%;
  background: #fafafa;
  position: relative;
}

.section-header {
  text-align: center;
  margin-bottom: 4rem;
}
.section-header h2 {
  font-size: 2.8rem;
  font-weight: 800;
  background: linear-gradient(90deg, var(--primary), var(--secondary));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}
.gallery-intro {
  color: #555;
  font-size: 1.15rem;
  max-width: 750px;
  margin: 1rem auto 0;
  line-height: 1.8;
}

/* Grid layout */
.gallery-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(310px, 1fr));
  gap: 40px;
}

/* Art cards */
.art-card {
  background: white;
  border-radius: 16px;
  overflow: hidden;
  box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
  transition: all 0.4s ease;
  transform: translateY(0);
}
.art-card:hover {
  transform: translateY(-10px);
  box-shadow: 0 15px 30px rgba(0, 0, 0, 0.12);
}

/* Image overlay */
.art-image {
  position: relative;
  overflow: hidden;
}
.art-image img {
  width: 100%;
  height: 280px;
  object-fit: cover;
  transition: transform 0.6s ease;
}
.art-card:hover .art-image img {
  transform: scale(1.1);
}
.art-overlay {
  position: absolute;
  inset: 0;
  background: rgba(20, 20, 20, 0.55);
  opacity: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  transition: all 0.4s ease;
}
.art-card:hover .art-overlay {
  opacity: 1;
}
.btn-view {
  background: linear-gradient(90deg, var(--primary), var(--primary-dark));
  color: white;
  padding: 10px 18px;
  border-radius: 50px;
  text-decoration: none;
  font-weight: 600;
  box-shadow: 0 6px 15px rgba(107,70,193,0.4);
  transition: all 0.3s ease;
}
.btn-view:hover {
  background: var(--primary-dark);
  transform: translateY(-3px);
}

/* Metadata */
.art-meta {
  padding: 1.6rem;
  text-align: left;
}
.art-meta h3 {
  font-size: 1.3rem;
  margin-bottom: 0.5rem;
  color: var(--dark);
}
.short-desc {
  color: #666;
  font-size: 1rem;
  line-height: 1.5;
  margin-bottom: 1rem;
}
.art-price {
  font-weight: 700;
  font-size: 1.1rem;
  color: var(--primary-dark);
  margin-bottom: 1rem;
}

/* Buttons */
.art-actions {
  display: flex;
  gap: 10px;
}
.btn-whatsapp {
  border: none;
  background: #25D366;
  color: #fff;
  padding: 10px 20px;
  border-radius: 50px;
  cursor: pointer;
  font-weight: 600;
  transition: all 0.3s ease;
  display: flex;
  align-items: center;
  gap: 8px;
}
.btn-whatsapp:hover {
  background: #1ebd5f;
  transform: translateY(-2px);
}

/* Pagination */
.pagination {
  display: flex;
  justify-content: center;
  gap: 10px;
  margin-top: 60px;
}
.page-btn {
  background: #E2E8F0;
  color: #333;
  padding: 10px 16px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
}
.page-btn:hover {
  background: var(--primary);
  color: white;
}
.page-btn.active {
  background: var(--primary-dark);
  color: white;
  pointer-events: none;
}

/* Empty state */
.no-art {
  text-align: center;
  font-size: 1.2rem;
  color: #777;
}

/* Animations */
@keyframes fadeInUp {
  from { opacity: 0; transform: translateY(30px); }
  to { opacity: 1; transform: translateY(0); }
}

/* === ABOUT SECTION - IMMERSIVE EDITION (UPDATED + AUTO HEIGHT MATCH) === */
.about-section {
  position: relative;
  padding: 120px 8%;
  background: linear-gradient(135deg, #f8f8fc 0%, #ece9f5 100%);
  overflow-x: hidden;
  width: 100%;
  box-sizing: border-box;
}

.about-inner {
  display: flex;
  align-items: stretch;          /* 🔥 Makes both columns equal height */
  justify-content: center;
  gap: 60px;
  flex-wrap: wrap;
  width: 100%;
  max-width: 100%;
  box-sizing: border-box;
}

/* === LEFT IMAGE === */
.about-image {
  position: relative;
  flex: 1;
  min-width: 340px;
  border-radius: 20px;
  overflow: hidden;
  height: auto;                  /* 🔥 Allows full height matching */
  display: flex;
  box-shadow: 0 15px 35px rgba(107,70,193,0.25);
  transition: all 0.5s ease;
}

.about-image:hover {
  transform: translateY(0);
  box-shadow: 0 25px 45px rgba(107,70,193,0.3);
}

.about-image img {
  width: 100%;
  height: 100%;                  /* 🔥 Auto-stretch to text height */
  object-fit: cover;
  filter: brightness(0.9);
  transition: all 0.6s ease;
}

.about-image:hover img {
  filter: brightness(1);
  transform: scale(1.05);
}

.image-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(to top, rgba(0,0,0,0.4) 0%, transparent 80%);
}

.image-caption {
  position: absolute;
  bottom: 20px;
  left: 20px;
  color: white;
  font-size: 1rem;
  font-style: italic;
  opacity: 0.85;
}

/* === RIGHT TEXT CONTENT === */
.about-content {
  flex: 1.2;
  min-width: 350px;
  word-wrap: break-word;
  overflow-wrap: break-word;
}

.about-content h2 {
  font-size: 2.6rem;
  font-weight: 800;
  color: var(--dark);
  margin-bottom: 1.2rem;
}

.about-content .highlight {
  background: linear-gradient(90deg, var(--primary), var(--primary-dark));
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
}

.about-intro {
  font-size: 1.15rem;
  line-height: 1.8;
  color: #333;
}

.about-content p {
  font-size: 1.05rem;
  color: #555;
  margin-top: 1rem;
  margin-bottom: 1rem;
  line-height: 1.75;
}

/* === STATS === */
.about-stats {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 1.5rem;
  margin-top: 2rem;
}

.stat {
  flex: 1;
  text-align: center;
  min-width: 140px;
}

.stat-number {
  font-size: 2.3rem;
  font-weight: 800;
  color: var(--primary-dark);
  display: block;
  transition: transform 0.4s ease;
}

.stat:hover .stat-number {
  transform: scale(1.1);
}

.stat-label {
  font-size: 1rem;
  color: #666;
}

/* === QUOTE === */
.artist-quote {
  margin-top: 2.5rem;
  padding-left: 20px;
  border-left: 4px solid var(--primary);
  font-style: italic;
  color: #555;
  font-size: 1.1rem;
  line-height: 1.7;
  opacity: 0.9;
  transition: all 0.4s ease;
}

.artist-quote:hover {
  color: var(--primary-dark);
  border-color: var(--secondary);
}

/* === ANIMATIONS === */
.fade-left, .fade-right {
  opacity: 0;
  transform: translateY(30px);
  transition: all 1s ease-out;
}

.fade-left.visible, .fade-right.visible {
  opacity: 1;
  transform: translateY(0);
}

/* === RESPONSIVE === */
@media (max-width: 900px) {
  .about-section {
    padding: 80px 5%;
  }

  .about-section .container {
    padding-left: 0;
    padding-right: 0;
    max-width: 100%;
  }

  .about-inner {
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 30px;
  }

  .about-image {
    width: 100%;
    min-width: unset;
    max-width: 100%;
    height: auto;
  }

  .about-content {
    width: 100%;
    min-width: unset;
    max-width: 100%;
  }

  .about-content h2 {
    font-size: 2.2rem;
  }

  .artist-quote {
    border: none;
    padding-left: 0;
  }
}

@media (max-width: 576px) {
  .about-section {
    padding: 60px 4%;
  }

  .about-section .container {
    padding-left: 0;
    padding-right: 0;
  }

  .about-inner {
    gap: 20px;
  }

  .about-content h2 {
    font-size: 1.8rem;
  }

  .about-content p,
  .about-intro {
    font-size: 1rem;
    line-height: 1.6;
  }

  .about-stats {
    gap: 1rem;
  }

  .stat {
    min-width: 100px;
  }
}

/* === CONTACT === */
.contact-section {
  background: radial-gradient(circle at top left, #6B46C1 0%, #1A202C 80%);
  color: white;
  padding: 120px 8%;
  text-align: center;
  position: relative;
  overflow: hidden;
}

.contact-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: none;
}


.contact-container {
  position: relative;
  z-index: 2;
  max-width: 1100px;
  margin: 0 auto;
}

.contact-section h2 {
  font-size: 2.6rem;
  font-weight: 800;
  background: linear-gradient(90deg, #ffffff, #d9baff);
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  margin-bottom: 1.5rem;
}

.contact-intro {
  font-size: 1.15rem;
  color: rgba(255,255,255,0.85);
  max-width: 750px;
  margin: 0 auto 3rem;
  line-height: 1.8;
}

/* Cards */
.contact-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(230px, 1fr));
  gap: 2rem;
  margin-bottom: 3rem;
}

.contact-card {
  background: rgba(255, 255, 255, 0.07);
  border-radius: 16px;
  padding: 2rem;
  transition: all 0.4s ease;
  backdrop-filter: blur(10px);
  box-shadow: 0 5px 25px rgba(0,0,0,0.15);
  position: relative;
  overflow: hidden;
}
.contact-card:hover {
  background: rgba(255, 255, 255, 0.12);
  transform: translateY(-6px);
  box-shadow: 0 10px 30px rgba(0,0,0,0.25);
}
.contact-card .icon {
  width: 60px;
  height: 60px;
  background: rgba(255,255,255,0.15);
  border-radius: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  margin: 0 auto 1rem;
  font-size: 1.6rem;
  color: #fff;
  box-shadow: 0 0 15px rgba(255,255,255,0.1);
}
.contact-card h4 {
  color: #fff;
  font-weight: 600;
  margin-bottom: 0.4rem;
  font-size: 1.1rem;
}
.contact-card p, 
.contact-card a {
  color: rgba(255,255,255,0.85);
  font-size: 1rem;
  transition: color 0.3s ease;
  text-decoration: none;
}
.contact-card a:hover {
  color: #fff;
}

/* Note */
.contact-note {
  color: rgba(255,255,255,0.75);
  font-size: 1.05rem;
  max-width: 700px;
  margin: 0 auto 2.5rem;
  line-height: 1.8;
}

/* Buttons */
.contact-actions {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 1.2rem;
}

.btn {
  display: inline-flex;
  align-items: center;
  gap: 10px;
  border-radius: 50px;
  padding: 14px 28px;
  font-weight: 600;
  transition: all 0.3s ease;
  font-size: 1rem;
}

.btn-whatsapp {
  background: #25D366;
  color: white;
  box-shadow: 0 6px 18px rgba(37,211,102,0.3);
}
.btn-whatsapp:hover {
  background: #1ebd5f;
  transform: translateY(-3px);
}

.btn-email {
  background: rgba(255,255,255,0.1);
  border: 2px solid rgba(255,255,255,0.25);
  color: white;
}
.btn-email:hover {
  background: white;
  color: var(--primary-dark);
  transform: translateY(-3px);
}

/* Animation */
.fade-up {
  opacity: 0;
  transform: translateY(40px);
  transition: all 0.8s ease-out;
}
.fade-up.visible {
  opacity: 1;
  transform: translateY(0);
}

/* Responsive */
@media (max-width: 768px) {
  .contact-section h2 {
    font-size: 2.2rem;
  }
  .contact-intro {
    font-size: 1rem;
  }
}

/* === FOOTER === */
.footer-elevated {
  position: relative;
  background: linear-gradient(180deg, #1a202c 0%, #0b0c10 90%);
  color: #ccc;
  padding: 100px 8% 40px;
  overflow: hidden;
}

/* Subtle moving glow overlay */
.footer-overlay {
  position: absolute;
  inset: 0;
  background: radial-gradient(circle at 10% 20%, rgba(107,70,193,0.2), transparent 60%),
              radial-gradient(circle at 90% 80%, rgba(255,107,107,0.15), transparent 70%);
  animation: floatGlow 12s ease-in-out infinite alternate;
  z-index: 0;
}
@keyframes floatGlow {
  from { background-position: 10% 20%, 90% 80%; }
  to { background-position: 20% 10%, 80% 90%; }
}

.footer-container {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  gap: 2.5rem;
  position: relative;
  z-index: 2;
  max-width: 1200px;
  margin: 0 auto;
  text-align: left;
}

/* Brand */
.footer-brand {
  flex: 1 1 280px;
}
.footer-brand img {
  width: 80px;
  height: 80px;
  border-radius: 50%;
  object-fit: cover;
  margin-bottom: 1rem;
  box-shadow: 0 0 15px rgba(139,95,191,0.4);
  transition: transform 0.3s ease;
}
.footer-brand img:hover {
  transform: scale(1.05);
}
.footer-brand h3 {
  color: white;
  font-size: 1.6rem;
  font-weight: 700;
  margin-bottom: 0.5rem;
}
.footer-brand p {
  color: #aaa;
  font-size: 0.95rem;
  line-height: 1.7;
  max-width: 320px;
}

/* Links */
.footer-links {
  flex: 1 1 200px;
}
.footer-links h4 {
  color: #fff;
  margin-bottom: 1rem;
  font-size: 1.1rem;
  font-weight: 600;
}
.footer-links ul {
  list-style: none;
  padding: 0;
}
.footer-links li {
  margin-bottom: 0.5rem;
}
.footer-links a {
  color: #aaa;
  font-size: 0.96rem;
  text-decoration: none;
  transition: all 0.3s ease;
}
.footer-links a:hover {
  color: var(--primary);
  padding-left: 4px;
}

/* Social */
.footer-social {
  flex: 1 1 250px;
}
.footer-social h4 {
  color: #fff;
  margin-bottom: 1rem;
  font-size: 1.1rem;
  font-weight: 600;
}
.footer-social p {
  color: #aaa;
  font-size: 0.95rem;
  margin-bottom: 1.2rem;
  max-width: 280px;
}
.social-icons {
  display: flex;
  gap: 1rem;
}
.social-icons a {
  width: 42px;
  height: 42px;
  display: flex;
  align-items: center;
  justify-content: center;
  background: rgba(255,255,255,0.08);
  color: white;
  border-radius: 50%;
  transition: all 0.3s ease;
  font-size: 1.2rem;
}
.social-icons a:hover {
  background: var(--primary);
  transform: translateY(-4px) scale(1.1);
  box-shadow: 0 6px 20px rgba(139,95,191,0.4);
}

/* Bottom Bar */
.footer-bottom {
  margin-top: 60px;
  border-top: 1px solid rgba(255,255,255,0.1);
  text-align: center;
  padding-top: 20px;
  font-size: 0.95rem;
  color: #aaa;
}
.footer-bottom span {
  color: var(--primary);
}

/* Responsive */
@media (max-width: 900px) {
  .footer-container {
    flex-direction: column;
    text-align: center;
    align-items: center;
  }
  .footer-brand p,
  .footer-links ul,
  .footer-social p {
    max-width: 100%;
  }
  .footer-links ul {
    padding: 0;
  }
  .social-icons {
    justify-content: center;
  }
}


.pagination {
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  gap: 10px;
}
.page-btn {
  background: #E2E8F0;
  color: #333;
  padding: 10px 16px;
  border-radius: 6px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
}
.page-btn:hover {
  background: #6B46C1;
  color: white;
}
.page-btn.active {
  background: #6B46C1;
  color: white;
  pointer-events: none;
}

/* === ANIMATIONS === */
@keyframes fadeInUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

@keyframes bounce {
  0%, 20%, 50%, 80%, 100% {
    transform: translateY(0) translateX(-50%);
  }
  40% {
    transform: translateY(-10px) translateX(-50%);
  }
  60% {
    transform: translateY(-5px) translateX(-50%);
  }
}

/* === RESPONSIVE DESIGN === */
@media (max-width: 992px) {
  .hero-content h1 {
    font-size: 2.8rem;
  }
  
  .gallery-grid {
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
  }
}

@media (max-width: 768px) {
  /* Split Hero Layout for Mobile */
  .hero {
    flex-direction: column;
    min-height: auto; 
  }
  .hero-container {
    padding-top: 4rem !important; /* Adjust as you like: 3rem, 5rem, etc */
  }
  
  .hero-image {
  flex: 1;
  min-height: 100vh;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--gray-light);
  position: relative;
  overflow: hidden;
}

.hero-image img {
  width: 100%;
  height: 100vh;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.hero-image:hover img {
  transform: scale(1.05);
}

  .hero-content {
    order: 2;
    padding: 4rem 5%;
    align-items: center;
    text-align: center;
  }
  
  .hero-content h1 {
    font-size: 2.3rem;
  }
  
  .hero-content p {
    font-size: 1.1rem;
  }
  
  .hero-buttons {
    flex-direction: column;
    align-items: center;
    width: 100%;
  }
  
  .btn {
    width: 100%;
    max-width: 300px;
    justify-content: center;
  }
  
  .contact-buttons {
    flex-direction: column;
    align-items: center;
  }
  
  .about-stats {
    flex-direction: column;
    gap: 1.5rem;
  }
  
  .scroll-indicator {
    display: none;
  }
}

@media (max-width: 576px) {
  .hero-content h1 {
    font-size: 2rem;
  }
  
  .hero-content p {
    font-size: 1rem;
  }
  
  .section-header h2 {
    font-size: 2rem;
  }
  
  .about-content h2 {
    font-size: 2rem;
  }
  
  .contact-content h2 {
    font-size: 2rem;
  }
  
  .gallery-grid {
    grid-template-columns: 1fr;
  }
  
  .footer-links {
    flex-direction: column;
    gap: 1rem;
  }
}

/* === GLASS NAVBAR STYLING (from Swahili Sweatshop adapted to Nathany colors) === */
.glass-nav {
  background: rgba(255, 255, 255, 0.85);
  backdrop-filter: blur(10px);
  border-bottom: 1px solid rgba(0, 0, 0, 0.08);
  box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
  transition: background 0.3s ease, box-shadow 0.3s ease;
  z-index: 1030;
}
.glass-nav .nav-link {
  color: var(--dark);
  font-weight: 500;
  transition: color 0.2s;
  position: relative;
}
.glass-nav .nav-link:hover { color: var(--primary); }
.glass-nav .nav-link.active { color: var(--primary); }
.glass-nav .nav-link.active::after {
  content: "";
  position: absolute;
  left: 12px;
  right: 12px;
  bottom: -6px;
  height: 2px;
  background: var(--primary);
  border-radius: 2px;
}
.glass-nav.scrolled {
  background: rgba(255, 255, 255, 0.98) !important;
  box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

/* Custom black toggler icon */
.custom-toggler .navbar-toggler-icon {
  background-image: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba(0,0,0,1)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
}

.hero {
  margin-top: 80px; /* push hero down below navbar */
}

.glass-nav {
  position: sticky;
  top: 0;
  z-index: 1050;
}

</style>
</head>
<body>

<!-- ✅ Glass Navbar -->
<nav class="navbar navbar-expand-lg glass-nav sticky-top">
  <div class="container">
    <!-- Logo -->
    <a class="navbar-brand fw-bold me-4" href="#home">
      <img src="uploads/logi.png" alt="Nathany Artz Logo" style="height:60px;border-radius:50%;">
    </a>

    <!-- Mobile Toggler -->
    <button class="navbar-toggler custom-toggler" type="button"
      data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar Links -->
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav align-items-center gap-3">
        <li class="nav-item"><a class="nav-link" href="#home">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="#gallery">Gallery</a></li>
        <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
      </ul>
    </div>
  </div>
</nav>


<section id="home" class="hero-elegant">
  <div class="hero-bg">
    <img src="uploads/pic1.jpg" alt="Nathany Artz African Fine Art & Portraits">
    <div class="hero-glass"></div>
  </div>

  <div class="hero-container container text-center text-md-start">
    <h1 class="hero-heading">
      <span class="hero-name">Nathany_artz</span><br>
      <span class="hero-subtitle">The Essence of African Expression</span>
    </h1>

    <p class="hero-tagline">
      Step into a world where every color whispers emotion and every stroke tells a story.  
      <strong>Nathany_artz</strong> transforms imagination into timeless portraits and paintings  
      that celebrate the rhythm, beauty, and soul of Africa.
    </p>

    <div class="hero-actions">
      <a href="#gallery" class="btn btn-main">
        <i class="fas fa-palette me-2"></i> Discover the Gallery
      </a>
      <a href="#about" class="btn btn-outline-light">
        <i class="fas fa-user me-2"></i> Meet the Artist
      </a>
      <a href="#contact" class="btn btn-outline-light">
        <i class="fas fa-comment-dots me-2"></i> Commission Your Masterpiece
      </a>
    </div>

    <div class="hero-quote">
      “Art is not seen, it is felt, it is remembered, it is lived.”
    </div>

    <div class="scroll-icon">
      <i class="fas fa-chevron-down"></i>
    </div>
  </div>
</section>

<section id="gallery" class="gallery-section">
  <div class="section-header">
    <h2>Art Gallery</h2>
    <p class="gallery-intro">
      A handpicked collection of paintings and portraits, inspired by the spirit of Africa, where every shade tells a story and each canvas captures emotion beyond words.
    </p>
  </div>

  <div class="gallery-grid">
    <?php
    // Pagination setup
    $items_per_page = 6;
    $page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
    $countResult = $conn->query("SELECT COUNT(*) AS total FROM paintings");
    $total_items = $countResult->fetch_assoc()['total'];
    $total_pages = ceil($total_items / $items_per_page);
    $offset = ($page - 1) * $items_per_page;
    $res = $conn->query("SELECT * FROM paintings ORDER BY id DESC LIMIT $items_per_page OFFSET $offset");

    if ($res->num_rows > 0) {
      while ($row = $res->fetch_assoc()) {
        $formattedPrice = number_format($row['price'], 0, '.', ',');
        $whatsappNumber = "255755468977";
        $message = "Hi Nathany! I'm interested in your artwork.\n\n"
                 . "Title: {$row['title']}\n"
                 . "Description: {$row['description']}\n"
                 . "Price: {$formattedPrice} USD\n\n"
                 . "Is this piece still available?";
    ?>
      <div class="art-card">
        <div class="art-image">
          <img src="<?= htmlspecialchars($row['image_url']) ?>" alt="<?= htmlspecialchars($row['title']) ?>">
          <div class="art-overlay">
            <a href="details.php?id=<?= $row['id'] ?>" class="btn-view">
              <i class="fas fa-eye"></i> View Details
            </a>
          </div>
        </div>

        <div class="art-meta">
          <h3><?= htmlspecialchars($row['title']) ?></h3>
          <p class="short-desc"><?= htmlspecialchars(substr($row['description'], 0, 90)) ?>...</p>
          <div class="art-price"><?= $formattedPrice ?> USD</div>
          <div class="art-actions">
            <button class="btn-whatsapp"
              data-number="<?= $whatsappNumber ?>"
              data-message="<?= htmlspecialchars($message) ?>">
              <i class="fab fa-whatsapp"></i> Inquire
            </button>
          </div>
        </div>
      </div>
    <?php
      }
    } else {
      echo "<p class='no-art'>No paintings uploaded yet.</p>";
    }
    ?>
  </div>

  <?php if ($total_pages > 1): ?>
  <div class="pagination">
    <?php if ($page > 1): ?>
      <a href="?page=<?= $page - 1 ?>#gallery" class="page-btn">« Prev</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= $total_pages; $i++): ?>
      <a href="?page=<?= $i ?>#gallery" class="page-btn <?= ($i == $page) ? 'active' : '' ?>">
        <?= $i ?>
      </a>
    <?php endfor; ?>
    <?php if ($page < $total_pages): ?>
      <a href="?page=<?= $page + 1 ?>#gallery" class="page-btn">Next »</a>
    <?php endif; ?>
  </div>
  <?php endif; ?>

  <!-- WhatsApp Handler -->
  <script>
  document.querySelectorAll('.btn-whatsapp').forEach(btn => {
    btn.addEventListener('click', async () => {
      const number = btn.dataset.number;
      const message = encodeURIComponent(btn.dataset.message);
      const link = `https://wa.me/${number}?text=${message}`;
      window.open(link, '_blank');
    });
  });
  </script>
</section>

<section id="about" class="about-section">
  <div class="about-inner container">
    <div class="about-image fade-left">
      <img src="uploads/artist.jpg" alt="Nathan Msuya working on artwork" />
      <div class="image-overlay"></div>
      <div class="image-caption">Capturing the rhythm of Africa through color and emotion</div>
    </div>

    <div class="about-content fade-right">
  <h2>Meet <span class="highlight">Nathany Artz</span></h2>

  <p class="about-intro">
    <strong>Nathan Msuya</strong> is a Zanzibari visual artist whose work harmonizes realism and abstraction to interpret the richness of African heritage. A graduate of <strong>TASUBA – College of Art Bagamoyo</strong>, he is recognized for his refined technique and his ability to translate culture and emotion into compelling visual narratives.
  </p>

  <p>
    His artistic practice centers on themes of identity, symbolism, and african storytelling, expressed through distinctive portraiture and conceptual compositions. Nathan has showcased his work through collaborations with <strong>Nafasi Art Space</strong> and <strong>Rangi Gallery</strong> in Dar es Salaam, and was honored with the <strong>Best Drawing Artist of 2022</strong> award by the <strong>Uni Awards</strong>.
  </p>

      <div class="about-stats">
        <div class="stat">
          <span class="stat-number">150+</span>
          <span class="stat-label">Artworks Created</span>
        </div>
        <div class="stat">
          <span class="stat-number">5</span>
          <span class="stat-label">Years of Experience</span>
        </div>
        <div class="stat">
          <span class="stat-number">50+</span>
          <span class="stat-label">Happy Collectors</span>
        </div>
      </div>

      <blockquote class="artist-quote">
        “Art is not what I see, but what I feel and what I hope the world feels too.”  
        <br><strong>– Nathan Msuya</strong>
      </blockquote>
    </div>
  </div>
</section>

<script>
// Scroll reveal animations
const fadeElements = document.querySelectorAll('.fade-left, .fade-right');
const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      observer.unobserve(entry.target);
    }
  });
}, { threshold: 0.25 });
fadeElements.forEach(el => observer.observe(el));
</script>
<section id="contact" class="contact-section">
  <div class="contact-container fade-up">
    <h2>Let’s Create Something Timeless</h2>
    <p class="contact-intro">
      Whether you are envisioning a <strong>personal portrait</strong>, a <strong>custom painting</strong>, or a <strong>replica of a past piece</strong>. Nathany Artz is here to bring your emotions to canvas. Reach out and let us craft your story through art.
    </p>

    <div class="contact-grid">
      <div class="contact-card fade-up">
        <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
        <h4>Studio Location</h4>
        <p>Stone Town, Zanzibar</p>
      </div>

      <div class="contact-card fade-up">
        <div class="icon"><i class="fab fa-whatsapp"></i></div>
        <h4>Phone / WhatsApp</h4>
        <a href="https://wa.me/255755468977?text=Hi%20Nathan!%20I'm%20interested%20in%20your%20artwork." target="_blank">
          +255 755 468 977
        </a>
      </div>

      <div class="contact-card fade-up">
        <div class="icon"><i class="fas fa-envelope"></i></div>
        <h4>Email</h4>
        <a href="mailto:nathanmsuya8@gmail.com">nathanmsuya8@gmail.com</a>
      </div>

      <div class="contact-card fade-up">
        <div class="icon"><i class="fab fa-instagram"></i></div>
        <h4>Instagram</h4>
        <a href="https://instagram.com/Nathany_artz" target="_blank">@Nathany_artz</a>
      </div>
    </div>

    <p class="contact-note fade-up">
      Every piece tells a story, yours could be next. If your desired artwork is sold, I can recreate it or design a new, personalized concept for you. 
      Simply send me a message and let us begin the journey.
    </p>

    <div class="contact-actions fade-up">
      <a href="https://wa.me/255755468977?text=Hi%20Nathan!%20I'd%20like%20to%20commission%20an%20artwork." 
         target="_blank" class="btn btn-whatsapp">
        <i class="fab fa-whatsapp"></i> Message on WhatsApp
      </a>
      <a href="mailto:nathanmsuya8@gmail.com" class="btn btn-email">
        <i class="fas fa-envelope"></i> Send an Email
      </a>
    </div>
  </div>
</section>

<script>
// === Reveal animations for fade-up ===
const fadeUps = document.querySelectorAll('.fade-up');
const fadeObserver = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      fadeObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.2 });
fadeUps.forEach(el => fadeObserver.observe(el));
</script>


<footer class="footer-elevated">
  <div class="footer-overlay"></div>
  <div class="footer-container">

    <!-- Brand -->
    <div class="footer-brand">
      <img src="uploads/logi.png" alt="Nathany Artz Logo" />
      <h3>Nathany Artz</h3>
      <p>Transforming African emotion and heritage into timeless fine art and portraits.</p>
    </div>

    <!-- Links -->
    <div class="footer-links">
      <h4>Quick Links</h4>
      <ul>
        <li><a href="#home">Home</a></li>
        <li><a href="#gallery">Gallery</a></li>
        <li><a href="#about">About</a></li>
        <li><a href="#contact">Contact</a></li>

        <!-- 🔥 Restored Login Link -->
        <li><a href="login.php">Login</a></li>
      </ul>
    </div>

    <!-- Connect -->
    <div class="footer-social">
      <h4>Connect</h4>
      <p>Follow the journey, explore, share, and stay inspired.</p>
      <div class="social-icons">
        <a href="https://instagram.com/Nathany_artz" target="_blank" title="Instagram"><i class="fab fa-instagram"></i></a>
        <a href="https://wa.me/255755468977" target="_blank" title="WhatsApp"><i class="fab fa-whatsapp"></i></a>
        <a href="mailto:nathanmsuya8@gmail.com" title="Email"><i class="fas fa-envelope"></i></a>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <p>© <span id="year"></span> Nathany_Artz — Crafted with passion in Zanzibar.</p>
  </div>
</footer>



<script>
// Auto year
document.getElementById('year').textContent = new Date().getFullYear();
</script>

<!-- ✅ Bootstrap bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Smooth scroll + auto-close mobile menu
document.querySelectorAll('.glass-nav .nav-link[href^="#"]').forEach(anchor => {
  anchor.addEventListener("click", function(e) {
    e.preventDefault();
    const targetId = this.getAttribute("href").substring(1);
    const target = document.getElementById(targetId);
    if (target) {
      const offset = 70;
      const elementPosition = target.offsetTop - offset;
      window.scrollTo({ top: elementPosition, behavior: "smooth" });
    }
    const navCollapse = document.getElementById("navbarNav");
    if (navCollapse && navCollapse.classList.contains("show") && typeof bootstrap !== "undefined") {
      new bootstrap.Collapse(navCollapse).toggle();
    }
  });
});

// Highlight active section while scrolling
(function(){
  const sections = document.querySelectorAll("header[id], section[id]");
  const navLinks = document.querySelectorAll(".glass-nav .nav-link");
  function setActive() {
    let current = "";
    sections.forEach(section => {
      const top = section.offsetTop - 120;
      if (window.scrollY >= top) current = section.id;
    });
    navLinks.forEach(link => {
      link.classList.toggle("active", link.getAttribute("href").substring(1) === current);
    });
  }
  window.addEventListener("scroll", setActive, { passive: true });
  window.addEventListener("load", setActive);
})();

// Solid background on scroll
window.addEventListener("scroll", function() {
  const nav = document.querySelector(".glass-nav");
  if (!nav) return;
  if (window.scrollY > 50) {
    nav.classList.add("scrolled");
  } else {
    nav.classList.remove("scrolled");
  }
}, { passive: true });
</script>


</body>
</html>