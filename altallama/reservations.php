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
			<a class="brand" href="index.php">Alta Llama</a>
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
