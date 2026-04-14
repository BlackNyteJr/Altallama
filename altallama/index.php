<?php
declare(strict_types=1);

require_once __DIR__ . "/square-catalog.php";

$catalogData = square_catalog_fetch(8);
$homeProducts = array_slice($catalogData["products"], 0, 4);
$homeFeatured = $homeProducts[0] ?? null;
$homeCatalogMessage = $catalogData["message"];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | The Ink Sanctuary</title>
	<meta name="description" content="Alta Llama tattoo gallery and artist showcase.">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body>
	<header class="topbar">
		<div class="container topbar-inner">
			<div class="brand">Alta Llama</div>

			<nav class="nav" aria-label="Main navigation">
				<div class="nav-dropdown mega-dropdown">
					<a class="nav-btn active" href="#collection" aria-haspopup="true">Art Supplies</a>
					<div class="mega-menu" role="menu" aria-label="Art Supplies categories">
						<div class="mega-rail">
							<h4>All Categories</h4>
							<a href="#collection" role="menuitem">Drawing & Illustration</a>
							<a href="#collection" role="menuitem">Painting & Color</a>
							<a href="#collection" role="menuitem">Tattoo Supplies</a>
							<a href="#collection" role="menuitem">Craft Materials</a>
							<a href="#collection" role="menuitem">Digital Design Tools</a>
							<a href="#collection" role="menuitem">Printmaking</a>
							<a href="#collection" role="menuitem">Studio Furniture</a>
							<a href="#collection" role="menuitem">Deals & Bundles</a>
						</div>
						<div class="mega-main">
							<div class="mega-column">
								<h4>Drawing</h4>
								<a href="#collection" role="menuitem">Sketchbooks</a>
								<a href="#collection" role="menuitem">Markers</a>
								<a href="#collection" role="menuitem">Technical Pens</a>
								<a href="#collection" role="menuitem">Graphite Sets</a>
							</div>
							<div class="mega-column">
								<h4>Painting</h4>
								<a href="#collection" role="menuitem">Acrylic Colors</a>
								<a href="#collection" role="menuitem">Oil Paints</a>
								<a href="#collection" role="menuitem">Watercolor Kits</a>
								<a href="#collection" role="menuitem">Brush Sets</a>
							</div>
							<div class="mega-column">
								<h4>Tattoo Studio</h4>
								<a href="#collection" role="menuitem">Stencil Paper</a>
								<a href="#collection" role="menuitem">Ink Caps</a>
								<a href="#collection" role="menuitem">Grip Covers</a>
								<a href="#collection" role="menuitem">Barrier Film</a>
							</div>
							<div class="mega-column">
								<h4>Print & Paper</h4>
								<a href="#collection" role="menuitem">Canvas Rolls</a>
								<a href="#collection" role="menuitem">Fine Art Paper</a>
								<a href="#collection" role="menuitem">Inkjet Sheets</a>
								<a href="#collection" role="menuitem">Cutting Mats</a>
							</div>
							<div class="mega-column">
								<h4>Workspace</h4>
								<a href="#studio" role="menuitem">Lighting</a>
								<a href="#studio" role="menuitem">Storage Cases</a>
								<a href="#studio" role="menuitem">Stools & Chairs</a>
								<a href="#studio" role="menuitem">Cleaning Supplies</a>
							</div>
							<div class="mega-column">
								<h4>Quick Picks</h4>
								<a href="#collection" role="menuitem">Starter Bundle</a>
								<a href="#collection" role="menuitem">Best Sellers</a>
								<a href="#collection" role="menuitem">New Arrivals</a>
								<a href="#collection" role="menuitem">Gift Cards</a>
							</div>
						</div>
					</div>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="abisal.php" aria-haspopup="true">Abisal</a>
					<div class="abisal-menu" role="menu" aria-label="Abisal links">
						<a href="abisal.php#reservations" role="menuitem">Reservations</a>
						<a href="abisal.php#resident-guest" role="menuitem">Resident/Guest</a>
						<a href="abisal.php#info" role="menuitem">Info</a>
					</div>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="gallery.php" aria-haspopup="true">Gallery</a>
					<div class="abisal-menu" role="menu" aria-label="Gallery links">
						<a href="gallery.php#product-page" role="menuitem">Product Page</a>
						<a href="gallery.php#info" role="menuitem">Info</a>
					</div>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="art-cafe.php" aria-haspopup="true">Art Cafe</a>
					<div class="abisal-menu" role="menu" aria-label="Art Cafe links">
						<a href="art-cafe.php#info" role="menuitem">Info</a>
						<a href="art-cafe.php#menu" role="menuitem">Menu</a>
						<a href="art-cafe.php#reserve" role="menuitem">Reserve</a>
					</div>
				</div>
				<div class="nav-dropdown abisal-dropdown">
					<a class="nav-btn" href="coworking.php" aria-haspopup="true">Coworking</a>
					<div class="abisal-menu" role="menu" aria-label="Coworking links">
						<a href="coworking.php#picture" role="menuitem">Picture</a>
						<a href="coworking.php#reserve" role="menuitem">Reserve</a>
					</div>
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
		<section class="container hero">
			<div>
				<p class="eyebrow">Artistry In Every Stitch</p>
				<h1>The Ink <span>Sanctuary</span></h1>
				<p class="lead">Where world-class tattoo artistry meets a curated gallery experience. We do not just mark skin; we compose legacies.</p>
				<div class="cta-row">
					<a href="#artists" class="btn primary">Explore Portfolios</a>
					<a href="#collection" class="btn">Visit Gallery</a>
				</div>
			</div>

			<div class="hero-visual">
				<div class="hero-main">
					<img src="https://images.unsplash.com/photo-1542727365-19732a80dcfd?auto=format&fit=crop&w=1200&q=80" alt="Tattoo artist creating detailed linework">
				</div>
				<div class="hero-polaroid">
					<div>
						<img src="https://images.unsplash.com/photo-1607462109225-6b64ae2dd3cb?auto=format&fit=crop&w=700&q=80" alt="Tattoo artist portrait">
					</div>
				</div>
			</div>
		</section>

		<section class="artists" id="artists">
			<div class="container">
				<div class="section-head">
					<div>
						<h2 class="section-title">Meet the Masters</h2>
						<p class="section-blurb">Our artists are carefully selected for their unique vision and technical precision.</p>
					</div>
					<a href="abisal.php#resident-guest" class="view-link">View All Artists</a>
				</div>

				<div class="artist-grid">
					<article class="artist-card">
						<div class="img"><img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?auto=format&fit=crop&w=800&q=80" alt="Julian Ink Vane portrait"></div>
						<h3>Julian 'Ink' Vane</h3>
						<p>Hyper-realism & Portraiture</p>
					</article>
					<article class="artist-card">
						<div class="img"><img src="https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=800&q=80" alt="Elena Moretti portrait"></div>
						<h3>Elena Moretti</h3>
						<p>Fine Line & Botanical</p>
					</article>
					<article class="artist-card">
						<div class="img"><img src="https://images.unsplash.com/photo-1521572267360-ee0c2909d518?auto=format&fit=crop&w=800&q=80" alt="Kaito Sato portrait"></div>
						<h3>Kaito Sato</h3>
						<p>Neo-Traditional & Irezumi</p>
					</article>
				</div>
			</div>
		</section>

		<section class="collection" id="collection">
			<div class="container collection-layout">
				<div class="collection-left">
					<h2 class="section-title">The Collection</h2>
					<p>Curated apparel, high-end prints, and artwork products designed by our resident artists. Take a piece of the gallery home.</p>
					<a href="catalog.php" class="shop-link">Shop All Merchandise</a>
					<?php if ($homeCatalogMessage !== ""): ?>
						<p class="catalog-note"><?php echo square_catalog_escape($homeCatalogMessage); ?></p>
					<?php endif; ?>

					<?php if ($homeFeatured !== null): ?>
						<article class="feature-card">
							<p class="feature-label">Feature Item</p>
							<h3 class="feature-title"><?php echo square_catalog_escape($homeFeatured["name"]); ?></h3>
							<div class="feature-price">
								<span><?php echo square_catalog_escape($homeFeatured["price"]); ?></span>
								<button class="bag-btn" type="button">+</button>
							</div>
						</article>
					<?php else: ?>
						<article class="feature-card">
							<p class="feature-label">Feature Item</p>
							<h3 class="feature-title">Limited Edition Silk Screen<br>Print No. 42</h3>
							<div class="feature-price">
								<span>$120.00</span>
								<button class="bag-btn" type="button">+</button>
							</div>
						</article>
					<?php endif; ?>
				</div>

				<div class="collection-grid">
					<?php if ($homeProducts !== []): ?>
						<?php foreach ($homeProducts as $index => $product): ?>
							<div class="tile<?php echo $index >= 2 ? " short" : ""; ?>"><img src="<?php echo square_catalog_escape($product["image_url"]); ?>" alt="<?php echo square_catalog_escape($product["name"]); ?>"></div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="tile"><img src="https://images.unsplash.com/photo-1521572163474-6864f9cf17ab?auto=format&fit=crop&w=900&q=80" alt="Alta Llama black t-shirt"></div>
						<div class="tile"><img src="https://images.unsplash.com/photo-1455885666463-221c5f7becc0?auto=format&fit=crop&w=900&q=80" alt="Embossed notebook on desk"></div>
						<div class="tile short"><img src="https://images.unsplash.com/photo-1508615070457-7baeba4003ab?auto=format&fit=crop&w=900&q=80" alt="Abstract orange artwork panel"></div>
						<div class="tile short"><img src="https://images.unsplash.com/photo-1612817159949-195b6eb9e31a?auto=format&fit=crop&w=900&q=80" alt="Small amber candle jar"></div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="studio" id="studio">
			<div class="container">
				<div class="studio-card">
					<div class="map" aria-hidden="true">
						<span class="map-pin"></span>
					</div>
					<article class="studio-info">
						<h2>Visit the Studio</h2>

						<p class="label">Address</p>
						<p class="address">1204 East 6th Street<br>Austin, TX 78702</p>

						<p class="label">Operating Hours</p>
						<div class="hours">
							<span>Mon - Thu</span><span>12PM - 8PM</span>
							<span>Fri - Sat</span><span>12PM - 10PM</span>
							<span>Sunday</span><span>Appointment Only</span>
						</div>

						<a href="https://maps.google.com/?q=1204+East+6th+Street+Austin+TX+78702" class="btn primary" target="_blank" rel="noopener">Get Directions</a>
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
