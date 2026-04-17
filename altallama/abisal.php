<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Abisal</title>
	<meta name="description" content="Abisal by Alta Llama: reservations, resident and guest artists, and studio information.">
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
					<a class="nav-btn active" href="abisal.php" aria-haspopup="true">Abisal</a>
					<div class="abisal-menu" role="menu" aria-label="Abisal links">
						<a href="#reservations" role="menuitem">Reservations</a>
						<a href="#resident-guest" role="menuitem">Resident/Guest</a>
						<a href="#info" role="menuitem">Info</a>
					</div>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="gallery.php" aria-haspopup="true">Gallery</a>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="art-cafe.php" aria-haspopup="true">Art Cafe</a>
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
		<section class="container inner-hero abisal-hero">
			<img class="subbrand-logo" src="../pics/ABISAL.jpg" alt="ABISAL">
			<p class="eyebrow">Abisal Tattoo Collective</p>
			<h1>Underwater Myth, <span>Precision Ink</span></h1>
			<p class="lead">Abisal is our dedicated tattoo floor for deep blackwork, organic textures, and high-contrast realism led by resident masters and rotating guest specialists.</p>
			<div class="cta-row">
				<a href="#reservations" class="btn primary">Reserve Session</a>
				<a href="#resident-guest" class="btn">Meet Artists</a>
			</div>
		</section>

		<section class="artists" id="reservations">
			<div class="container">
				<div class="section-head">
					<div>
						<h2 class="section-title">Reservations</h2>
						<p class="section-blurb">Structured booking for custom pieces, flash sessions, and collaborative projects.</p>
					</div>
				</div>
				<div class="detail-grid">
					<article class="detail-card">
						<h3>Custom Commission</h3>
						<p>1-3 hour concept call, style deck, and placement mapping before your first needle pass.</p>
						<a href="reservations.php#request" class="view-link">Start Request</a>
					</article>
					<article class="detail-card">
						<h3>Flash Sessions</h3>
						<p>Weekly rotating sheet drops with pre-sized artwork ready for same-week appointment slots.</p>
						<a href="../abisal-tattoo/info.php" class="view-link">View Sheets</a>
					</article>
					<article class="detail-card">
						<h3>Aftercare Plan</h3>
						<p>Every appointment includes healing support, product recommendations, and follow-up checkpoints.</p>
						<a href="studio-rules.php#aftercare" class="view-link">Read Guide</a>
					</article>
				</div>
			</div>
		</section>

		<section class="collection" id="resident-guest">
			<div class="container subpage-grid abisal-resident-grid">
				<article class="story-panel resident-panel">
					<p class="feature-label">Resident + Guest Program</p>
					<h2 class="section-title">Resident / Guest</h2>
					<p>Residents anchor our visual language while guests bring rare techniques from global studios in Seoul, Madrid, and Sao Paulo.</p>
					<div class="resident-tags" aria-label="Program highlights">
						<span>Blackwork</span>
						<span>Fine Line</span>
						<span>Neo Traditional</span>
						<span>Guest Spot Weeks</span>
					</div>
					<div class="resident-metrics" aria-label="Program stats">
						<div><strong>12</strong><span>Resident Artists</span></div>
						<div><strong>24+</strong><span>Guest Spots / Year</span></div>
						<div><strong>7</strong><span>International Studios</span></div>
					</div>
					<a href="artist-application.php" class="btn">Apply as Guest</a>
				</article>
				<div class="resident-media" aria-label="Resident and guest visual showcase">
					<div class="resident-main"><img src="https://images.unsplash.com/photo-1604881991720-f91add269bed?auto=format&fit=crop&w=1200&q=80" alt="Tattoo artist working on sleeve"></div>
					<div class="resident-stack">
						<div class="resident-small"><img src="https://images.unsplash.com/photo-1607462109225-6b64ae2dd3cb?auto=format&fit=crop&w=900&q=80" alt="Resident artist portrait"></div>
						<div class="resident-small"><img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=900&q=80" alt="Guest artist portrait"></div>
					</div>
					<article class="resident-note" aria-label="Upcoming guest drop note">
						<p class="feature-label">Next Guest Drop</p>
						<h3>Madrid Fine-Line Week</h3>
						<p>Limited booking window opens this month with collaborative flash sheets and custom slots.</p>
					</article>
				</div>
			</div>
		</section>

		<section class="studio" id="info">
			<div class="container">
				<div class="banner-strip">
					<h2>Studio Info</h2>
					<p>Open Tuesday to Sunday, private consultation booths, hospital-grade sterilization protocol, and multilingual front desk support.</p>
					<a href="index.php#studio" class="btn primary">Visit Main Studio</a>
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



