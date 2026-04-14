<?php
$status = $_GET['status'] ?? '';
$message = $_GET['message'] ?? '';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Artist Application</title>
	<meta name="description" content="Apply as resident or guest artist at Alta Llama.">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header class="topbar">
		<div class="container topbar-inner">
			<a class="brand" href="index.php">Alta Llama</a>
			<nav class="nav" aria-label="Main navigation">
				<a class="nav-btn" href="index.php#collection">Art Supplies</a>
				<a class="nav-btn" href="abisal.php">Abisal</a>
				<a class="nav-btn" href="gallery.php">Gallery</a>
				<a class="nav-btn" href="art-cafe.php">Art Cafe</a>
				<a class="nav-btn" href="coworking.php">Coworking</a>
			</nav>
			<div class="actions">
				<div class="cart">1</div>
				<a class="book-btn" href="reservations.php">Book Now</a>
			</div>
		</div>
	</header>
	<main>
		<section class="container inner-hero">
			<p class="eyebrow">Join The Team</p>
			<h1>Artist <span>Application</span></h1>
			<p class="lead">Apply as resident or guest artist. Share your style, portfolio, and preferred availability.</p>
			<?php if ($status === 'success' && $message !== ''): ?>
				<p class="form-alert form-alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php elseif ($status === 'error' && $message !== ''): ?>
				<p class="form-alert form-alert-error"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php endif; ?>
		</section>
		<section class="collection">
			<div class="container subpage-grid">
				<article class="story-panel">
					<h2 class="section-title">What We Look For</h2>
					<p>Strong line quality, professional communication, portfolio consistency, and clear visual identity.</p>
				</article>
				<form class="detail-card booking-form" method="post" action="square-save.php">
					<input type="hidden" name="form_type" value="application">
					<h3>Apply Now</h3>
					<label for="app-name">Name</label>
					<input id="app-name" name="name" type="text" required>
					<label for="app-email">Email</label>
					<input id="app-email" name="email" type="email" required>
					<label for="role">Role</label>
					<select id="role" name="role" required>
						<option value="">Select one...</option>
						<option value="resident">Resident Artist</option>
						<option value="guest">Guest Artist</option>
					</select>
					<label for="portfolio">Portfolio URL</label>
					<input id="portfolio" name="portfolio" type="url" placeholder="https://">
					<label for="bio">Short Bio</label>
					<textarea id="bio" name="bio" rows="4"></textarea>
					<button class="btn primary" type="submit">Send Application</button>
				</form>
			</div>
		</section>
	</main>
	<footer class="footer">
		<div class="container footer-inner">
			<p>Alta Llama</p>
			<div class="footer-links">
				<a href="privacy.php">Privacy Policy</a>
				<a href="studio-rules.php">Studio Rules</a>
				<a href="artist-application.php">Artist Application</a>
			</div>
		</div>
	</footer>
	<script src="main.js"></script>
</body>
</html>
