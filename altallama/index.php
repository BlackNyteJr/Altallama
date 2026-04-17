<?php
declare(strict_types=1);

require_once __DIR__ . "/square-catalog.php";

$catalogData = square_catalog_fetch(100000);
$allProducts = $catalogData["products"];
$homeProducts = array_slice($allProducts, 0, 4);
$homeFeatured = $homeProducts[0] ?? null;
$homeCatalogMessage = $catalogData["message"];
$categoryLinks = square_catalog_category_links($allProducts);
$totalProducts = count($allProducts);
$totalCategories = count($categoryLinks);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Art Store & Creative Supply</title>
	<meta name="description" content="Alta Llama art store for premium supplies, paper, paint, tools, and creative workspace essentials.">
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
					<a class="nav-btn active" href="store-product-list.php" aria-haspopup="true">Art Supplies</a>
					<div class="mega-menu" role="menu" aria-label="Art Supplies categories">
						<div class="mega-rail">
							<h4>All Categories</h4>
							<?php foreach ($categoryLinks as $category): ?>
								<a href="store-product-list.php#<?php echo square_catalog_escape((string) $category["slug"]); ?>" role="menuitem"><?php echo square_catalog_escape((string) $category["label"]); ?></a>
							<?php endforeach; ?>
						</div>
						<div class="mega-main">
							<?php
							$chunkSize = 8;
							$chunks = array_chunk($categoryLinks, $chunkSize);
							$maxColumns = min(6, count($chunks));
							for ($i = 0; $i < $maxColumns; $i++):
								$chunk = $chunks[$i];
							?>
								<div class="mega-column">
									<h4>Store Categories</h4>
									<?php foreach ($chunk as $category): ?>
										<a href="store-product-list.php#<?php echo square_catalog_escape((string) $category["slug"]); ?>" role="menuitem"><?php echo square_catalog_escape((string) $category["label"]); ?></a>
									<?php endforeach; ?>
								</div>
							<?php endfor; ?>
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
				<p class="eyebrow">Alta Llama Art Store</p>
				<h1>Tools For <span>Every Artist</span></h1>
				<p class="lead">From sketchbooks and paint to studio essentials, Alta Llama is your creative supply destination for students, professionals, and curious makers.</p>
				<div class="cta-row">
					<a href="#collection" class="btn primary">Shop Supplies</a>
					<a href="catalog.php" class="btn">Browse Catalog</a>
				</div>
			</div>

			<div class="hero-visual">
				<div class="hero-main">
					<img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?auto=format&fit=crop&w=1200&q=80" alt="Art supplies on a work table">
				</div>
				<div class="hero-polaroid">
					<div>
						<img src="https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?auto=format&fit=crop&w=700&q=80" alt="Paint brushes and art materials">
					</div>
				</div>
			</div>
		</section>

		<section class="artists" id="artists">
			<div class="container">
				<div class="section-head">
					<div>
						<h2 class="section-title">Top Categories</h2>
						<p class="section-blurb">Everything you need to sketch, paint, design, and build your workflow in one place.</p>
					</div>
					<a href="catalog.php" class="view-link">View Full Catalog</a>
				</div>

				<div class="artist-grid">
					<article class="artist-card">
						<div class="img"><img src="https://images.unsplash.com/photo-1452860606245-08befc0ff44b?auto=format&fit=crop&w=800&q=80" alt="Drawing and illustration supplies"></div>
						<h3>Drawing</h3>
						<p>Sketchbooks, graphite, fineliners, and markers</p>
					</article>
					<article class="artist-card">
						<div class="img"><img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=800&q=80" alt="Painting supplies"></div>
						<h3>Painting</h3>
						<p>Acrylic, watercolor, oils, brushes, and mediums</p>
					</article>
					<article class="artist-card">
						<div class="img"><img src="https://images.unsplash.com/photo-1452802447250-470a88ac82bc?auto=format&fit=crop&w=800&q=80" alt="Paper and support materials"></div>
						<h3>Paper & Support</h3>
						<p>Fine papers, boards, canvases, and mounting tools</p>
					</article>
				</div>
			</div>
		</section>

		<section class="collection" id="collection">
			<div class="container collection-shell">
				<div class="collection-intro">
					<p class="eyebrow">Store Highlight</p>
					<h2 class="section-title">The Collection</h2>
					<p>Curated art supplies, paper, paint, and tools selected for creators who want reliable quality in every medium.</p>
				</div>
				<div class="collection-stats" aria-label="Collection stats">
					<div class="collection-stat"><strong><?php echo (string) $totalProducts; ?></strong><span>Products</span></div>
					<div class="collection-stat"><strong><?php echo (string) $totalCategories; ?></strong><span>Categories</span></div>
					<div class="collection-stat"><strong>24/7</strong><span>Store Preview</span></div>
				</div>
			</div>

			<div class="container collection-layout">
				<div class="collection-left">
					<h3 class="section-title">Shop By Essentials</h3>
					<p>Discover featured products, trending picks, and curated materials for drawing, painting, and studio workflows.</p>
					<a href="store-product-list.php" class="shop-link">Open Store Product List</a>
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

				<div class="collection-grid collection-grid-wrap">
					<article class="collection-overlay" aria-label="Collection spotlight">
						<p class="feature-label">Collection Spotlight</p>
						<h3>Fresh Arrivals</h3>
						<p>New stock from top brands is landing every week.</p>
						<a class="view-link" href="store-product-list.php">Explore Now</a>
					</article>
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
						<p class="address">C. San Mill&aacute;n, 13, Distrito Centro, 29013 M&aacute;laga</p>

						<p class="label">Operating Hours</p>
						<div class="hours">
							<span>Mon - Thu</span><span>12PM - 8PM</span>
							<span>Fri - Sat</span><span>12PM - 10PM</span>
							<span>Sunday</span><span>Appointment Only</span>
						</div>

						<a href="https://maps.google.com/?q=C.+San+Mill%C3%A1n,+13,+Distrito+Centro,+29013+M%C3%A1laga" class="btn primary" target="_blank" rel="noopener">Get Directions</a>
					</article>
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



