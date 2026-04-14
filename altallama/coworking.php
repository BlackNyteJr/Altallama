<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Coworking</title>
	<meta name="description" content="Alta Llama coworking studio with workspace photos and reservation details.">
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
					<a class="nav-btn" href="abisal.php" aria-haspopup="true">Abisal</a>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="gallery.php" aria-haspopup="true">Gallery</a>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="art-cafe.php" aria-haspopup="true">Art Cafe</a>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn active" href="coworking.php" aria-haspopup="true">Coworking</a>
					<div class="abisal-menu" role="menu" aria-label="Coworking links">
						<a href="#picture" role="menuitem">Picture</a>
						<a href="#reserve" role="menuitem">Reserve</a>
					</div>
				</div>
				<a href="#reserve">Workshop</a>
			</nav>

			<div class="actions">
				<div class="cart">1</div>
				<button class="book-btn" type="button">Book Now</button>
			</div>
		</div>
	</header>

	<main>
		<section class="container inner-hero">
			<p class="eyebrow">Creative Workspace</p>
			<h1>Coworking <span>For Artists</span></h1>
			<p class="lead">Flexible desks, pro lighting, critique corners, and workshop-ready zones for illustrators, tattooers, and multidisciplinary creators.</p>
			<div class="cta-row">
				<a href="#picture" class="btn primary">View Space</a>
				<a href="#reserve" class="btn">Reserve Desk</a>
			</div>
		</section>

		<section class="collection" id="picture">
			<div class="container subpage-grid">
				<div class="collection-grid">
					<div class="tile"><img src="https://images.unsplash.com/photo-1497215842964-222b430dc094?auto=format&fit=crop&w=900&q=80" alt="Open coworking desks"></div>
					<div class="tile"><img src="https://images.unsplash.com/photo-1497366754035-f200968a6e72?auto=format&fit=crop&w=900&q=80" alt="Modern creative workspace"></div>
					<div class="tile short"><img src="https://images.unsplash.com/photo-1524758631624-e2822e304c36?auto=format&fit=crop&w=900&q=80" alt="Shared studio seating"></div>
					<div class="tile short"><img src="https://images.unsplash.com/photo-1461749280684-dccba630e2f6?auto=format&fit=crop&w=900&q=80" alt="Design workstation"></div>
				</div>
				<article class="story-panel">
					<h2 class="section-title">Picture</h2>
					<p>Industrial warmth, acoustic zones, lockable storage, and community walls where members pin ongoing projects.</p>
					<a href="#reserve" class="btn">Reserve A Pass</a>
				</article>
			</div>
		</section>

		<section class="artists" id="reserve">
			<div class="container">
				<div class="section-head">
					<div>
						<h2 class="section-title">Reserve</h2>
						<p class="section-blurb">Choose day passes, monthly seats, or workshop blocks for teams and guest mentors.</p>
					</div>
				</div>
				<div class="detail-grid">
					<article class="detail-card">
						<h3>Day Pass</h3>
						<p>Access from 9AM to 9PM with high-speed Wi-Fi and coffee station.</p>
					</article>
					<article class="detail-card">
						<h3>Resident Seat</h3>
						<p>Dedicated desk, storage, and member discounts on studio services.</p>
					</article>
					<article class="detail-card">
						<h3>Workshop Block</h3>
						<p>Book the presentation zone for classes, launches, and critique nights.</p>
					</article>
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
