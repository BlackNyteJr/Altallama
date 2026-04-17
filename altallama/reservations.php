<?php
$status = $_GET['status'] ?? '';
$message = $_GET['message'] ?? '';
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Reservations</title>
	<meta name="description" content="Book tattoo sessions, cafe seats, and coworking passes at Alta Llama.">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header class="topbar">
		<div class="container topbar-inner">
			<a class="brand" href="index.php" aria-label="Alta Llama home">
				<img class="brand-logo" src="../pics/Logotipo%20(71%20x%2056%20cm).jpg" alt="Alta Llama">
			</a>
			<nav class="nav" aria-label="Main navigation">
				<a class="nav-btn" href="index.php#collection">Art Supplies</a>
				<a class="nav-btn" href="abisal.php">Abisal</a>
				<a class="nav-btn" href="gallery.php">Gallery</a>
				<a class="nav-btn" href="art-cafe.php">Art Cafe</a>
				<a class="nav-btn" href="coworking.php">Coworking</a>
				<a href="coworking.php#reserve">Workshop</a>
			</nav>
			<div class="actions">
				<div class="cart">1</div>
				<a class="book-btn" href="reservations.php">Book Now</a>
			</div>
		</div>
	</header>

	<main>
		<section class="container inner-hero" id="request">
			<p class="eyebrow">Reservation Desk</p>
			<h1>Book Your <span>Creative Slot</span></h1>
			<p class="lead">Use one form for tattoo sessions, cafe bookings, and coworking reservations. We respond within one business day.</p>
			<?php if ($status === 'success' && $message !== ''): ?>
				<p class="form-alert form-alert-success"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php elseif ($status === 'error' && $message !== ''): ?>
				<p class="form-alert form-alert-error"><?php echo htmlspecialchars($message, ENT_QUOTES, 'UTF-8'); ?></p>
			<?php endif; ?>
		</section>

		<section class="artists">
			<div class="container subpage-grid">
				<article class="story-panel">
					<h2 class="section-title">What You Can Book</h2>
					<p id="cafe">Tattoo consultation, full session, Art Cafe table, coworking day pass, workshop block, or gallery pickup appointment.</p>
					<a class="btn" href="index.php">Back To Home</a>
				</article>
				<form class="detail-card booking-form" method="post" action="square-save.php">
					<input type="hidden" name="form_type" value="reservation">
					<h3>Reservation Form</h3>
					<label for="service">Service</label>
					<select id="service" name="service" required>
						<option value="">Select one...</option>
						<option value="tattoo-consult">Tattoo Consultation</option>
						<option value="tattoo-session">Tattoo Session</option>
						<option value="art-cafe">Art Cafe Table</option>
						<option value="coworking">Coworking Pass</option>
						<option value="workshop">Workshop Booking</option>
					</select>

					<label for="name">Full Name</label>
					<input id="name" name="name" type="text" required>

					<label for="email">Email</label>
					<input id="email" name="email" type="email" required>

					<label for="date">Preferred Date</label>
					<input id="date" name="date" type="date" required>

					<label for="notes">Notes</label>
					<textarea id="notes" name="notes" rows="4" placeholder="Tell us style, group size, timing, or project details."></textarea>

					<button class="btn primary" type="submit">Send Reservation</button>
				</form>
			</div>
		</section>
	</main>

	<footer class="footer">
		<div class="container footer-grid">
			<div class="footer-brand-block">
				<a class="footer-brand" href="index.php" aria-label="Alta Llama home">
					<img class="footer-logo" src="../pics/Logotipo%20(71%20x%2056%20cm).jpg" alt="Alta Llama">
				</a>
				<p class="footer-text">Art supplies, curated materials, and creative spaces for artists, students, and studios.</p>
				<p class="footer-copy">Â© <?php echo date("Y"); ?> Alta Llama. All rights reserved.</p>
			</div>
			<div>
				<h4 class="footer-title">Quick Links</h4>
				<div class="footer-links">
					<a href="index.php">Home</a>
					<a href="store-product-list.php">Store Product List</a>
					<a href="catalog.php">Catalog</a>
					<a href="reservations.php">Reservations</a>
				</div>
			</div>
			<div>
				<h4 class="footer-title">Legal</h4>
				<div class="footer-links">
					<a href="privacy.php">Privacy Policy</a>
					<a href="studio-rules.php">Studio Rules</a>
					<a href="artist-application.php">Artist Application</a>
				</div>
			</div>
			<div>
				<h4 class="footer-title">Connect</h4>
				<div class="footer-links footer-contact">
					<a href="mailto:info@altallama.com">info@altallama.com</a>
					<a href="https://maps.google.com/?q=C.+San+Mill%C3%A1n,+13,+Distrito+Centro,+29013+M%C3%A1laga" target="_blank" rel="noopener">C. San Mill&aacute;n, 13, Distrito Centro, 29013 M&aacute;laga</a>
				</div>
				<a class="social-btn insta-btn" href="https://www.instagram.com/altallama_laecomonica/" target="_blank" rel="noopener" aria-label="Follow Alta Llama on Instagram">
					<svg viewBox="0 0 24 24" aria-hidden="true" focusable="false">
						<path d="M7.75 2h8.5A5.75 5.75 0 0 1 22 7.75v8.5A5.75 5.75 0 0 1 16.25 22h-8.5A5.75 5.75 0 0 1 2 16.25v-8.5A5.75 5.75 0 0 1 7.75 2Zm0 1.8A3.95 3.95 0 0 0 3.8 7.75v8.5a3.95 3.95 0 0 0 3.95 3.95h8.5a3.95 3.95 0 0 0 3.95-3.95v-8.5a3.95 3.95 0 0 0-3.95-3.95h-8.5Zm8.95 1.35a1.2 1.2 0 1 1 0 2.4 1.2 1.2 0 0 1 0-2.4ZM12 7a5 5 0 1 1 0 10 5 5 0 0 1 0-10Zm0 1.8a3.2 3.2 0 1 0 0 6.4 3.2 3.2 0 0 0 0-6.4Z"/>
					</svg>
					<span>Follow on Instagram</span>
				</a>
			</div>
		</div>
	</footer>
	<script src="main.js"></script>
</body>
</html>



