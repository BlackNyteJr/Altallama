<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Art Cafe</title>
	<meta name="description" content="Alta Llama Art Cafe page with ambience details, menu highlights, and reservation info.">
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
				<div class="nav-dropdown mega-dropdown">
					<a class="nav-btn" href="index.php" aria-haspopup="true">Art Supplies</a>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="abisal.php" aria-haspopup="true">Abisal</a>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="gallery.php" aria-haspopup="true">Gallery</a>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn active" href="art-cafe.php" aria-haspopup="true">Art Cafe</a>
					<div class="abisal-menu" role="menu" aria-label="Art Cafe links">
						<a href="#info" role="menuitem">Info</a>
						<a href="#menu" role="menuitem">Menu</a>
						<a href="#reserve" role="menuitem">Reserve</a>
					</div>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="coworking.php" aria-haspopup="true">Coworking</a>
				</div>
				<a href="coworking.php#reserve">Workshop</a>
			</nav>

			<div class="actions">
				<div class="cart">1</div>
				<button class="book-btn" type="button">Book Now</button>
			</div>
		</div>
	</header>

	<main>
		<section class="container inner-hero" id="info">
			<p class="eyebrow">Coffee. Craft. Conversation.</p>
			<h1>The Art Cafe <span>At Alta Llama</span></h1>
			<p class="lead">A warm room designed for sketch sessions, artist meetups, and small creative rituals with specialty coffee and house pastries.</p>
			<div class="cta-row">
				<a href="#menu" class="btn primary">See Menu</a>
				<a href="#reserve" class="btn">Reserve Table</a>
			</div>
		</section>

		<section class="artists">
			<div class="container detail-grid">
				<article class="detail-card">
					<h3>Open Sketch Tables</h3>
					<p>Large communal oak tables with task lighting, outlets, and reusable paper rolls.</p>
				</article>
				<article class="detail-card">
					<h3>Artist Talks</h3>
					<p>Weekly sessions on composition, line confidence, and portfolio strategy.</p>
				</article>
				<article class="detail-card">
					<h3>Quiet Hours</h3>
					<p>Morning blocks dedicated to focused drawing and laptop-friendly productivity.</p>
				</article>
			</div>
		</section>

		<section class="collection" id="menu">
			<div class="container subpage-grid">
				<article class="story-panel">
					<h2 class="section-title">Menu</h2>
					<p>Signature espresso drinks, spiced teas, seasonal bakes, and light artisan plates built for long creative sessions.</p>
				</article>
				<div class="detail-grid">
					<article class="detail-card">
						<h3>Black Ember</h3>
						<p>Double espresso, burnt sugar syrup, and orange zest.</p>
					</article>
					<article class="detail-card">
						<h3>Studio Matcha</h3>
						<p>Ceremonial matcha, oat milk foam, and honey dust.</p>
					</article>
					<article class="detail-card">
						<h3>Ink Toast</h3>
						<p>Sourdough, whipped ricotta, fig jam, and toasted walnut.</p>
					</article>
				</div>
			</div>
		</section>

		<section class="studio" id="reserve">
			<div class="container">
				<div class="cta-band">
					<h2>Reserve Your Spot</h2>
					<p>Book a table for two, a sketch group, or private corner seating for creative client meetings.</p>
					<a href="reservations.php#cafe" class="btn primary">Book Cafe Seat</a>
				</div>
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



