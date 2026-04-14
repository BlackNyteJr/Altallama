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
			<a class="brand" href="index.php">Alta Llama</a>

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
		<section class="container inner-hero">
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
			<div class="container subpage-grid">
				<article class="story-panel">
					<h2 class="section-title">Resident / Guest</h2>
					<p>Residents anchor our visual language while guests bring rare techniques from global studios in Seoul, Madrid, and Sao Paulo.</p>
					<a href="artist-application.php" class="btn">Apply as Guest</a>
				</article>
				<div class="collection-grid">
					<div class="tile"><img src="https://images.unsplash.com/photo-1607462109225-6b64ae2dd3cb?auto=format&fit=crop&w=900&q=80" alt="Resident artist portrait"></div>
					<div class="tile"><img src="https://images.unsplash.com/photo-1604881991720-f91add269bed?auto=format&fit=crop&w=900&q=80" alt="Tattoo artist working on sleeve"></div>
					<div class="tile short"><img src="https://images.unsplash.com/photo-1524504388940-b1c1722653e1?auto=format&fit=crop&w=900&q=80" alt="Guest artist portrait"></div>
					<div class="tile short"><img src="https://images.unsplash.com/photo-1515372039744-b8f02a3ae446?auto=format&fit=crop&w=900&q=80" alt="Tattoo stencil prep"></div>
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
