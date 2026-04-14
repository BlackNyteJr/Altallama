<?php
declare(strict_types=1);

require_once __DIR__ . "/square-catalog.php";

$catalogData = square_catalog_fetch(8);
$galleryProducts = array_slice($catalogData["products"], 0, 4);
$galleryFeatured = $galleryProducts[0] ?? null;
$galleryCatalogMessage = $catalogData["message"];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Gallery</title>
	<meta name="description" content="Alta Llama gallery page with product highlights and collector information.">
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
					<a class="nav-btn active" href="gallery.php" aria-haspopup="true">Gallery</a>
					<div class="abisal-menu" role="menu" aria-label="Gallery links">
						<a href="#product-page" role="menuitem">Product Page</a>
						<a href="#info" role="menuitem">Info</a>
					</div>
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
			<p class="eyebrow">Curated Works</p>
			<h1>Collector Grade <span>Gallery</span></h1>
			<p class="lead">From limited apparel to numbered fine-art prints, this is the visual extension of our studio ethos for collectors and collaborators.</p>
			<div class="cta-row">
				<a href="#product-page" class="btn primary">Browse Products</a>
				<a href="#info" class="btn">Collector Info</a>
			</div>
		</section>

		<section class="collection" id="product-page">
			<div class="container collection-layout">
				<div class="collection-left">
					<h2 class="section-title">Product Page</h2>
					<p>Signature drops include archival prints, stitched apparel, and collaborative ceramics produced in short runs.</p>
					<a href="catalog.php" class="shop-link">Open Complete Catalog</a>
					<?php if ($galleryCatalogMessage !== ""): ?>
						<p class="catalog-note"><?php echo square_catalog_escape($galleryCatalogMessage); ?></p>
					<?php endif; ?>
					<?php if ($galleryFeatured !== null): ?>
						<article class="feature-card">
							<p class="feature-label">Editor Pick</p>
							<h3 class="feature-title"><?php echo square_catalog_escape($galleryFeatured["name"]); ?></h3>
							<div class="feature-price">
								<span><?php echo square_catalog_escape($galleryFeatured["price"]); ?></span>
								<button class="bag-btn" type="button">+</button>
							</div>
						</article>
					<?php else: ?>
						<article class="feature-card">
							<p class="feature-label">Editor Pick</p>
							<h3 class="feature-title">Blind Embossed<br>Monograph Set</h3>
							<div class="feature-price">
								<span>$185.00</span>
								<button class="bag-btn" type="button">+</button>
							</div>
						</article>
					<?php endif; ?>
				</div>
				<div class="collection-grid">
					<?php if ($galleryProducts !== []): ?>
						<?php foreach ($galleryProducts as $index => $product): ?>
							<div class="tile<?php echo $index >= 2 ? " short" : ""; ?>"><img src="<?php echo square_catalog_escape($product["image_url"]); ?>" alt="<?php echo square_catalog_escape($product["name"]); ?>"></div>
						<?php endforeach; ?>
					<?php else: ?>
						<div class="tile"><img src="https://images.unsplash.com/photo-1512436991641-6745cdb1723f?auto=format&fit=crop&w=900&q=80" alt="Gallery apparel display"></div>
						<div class="tile"><img src="https://images.unsplash.com/photo-1455885666463-221c5f7becc0?auto=format&fit=crop&w=900&q=80" alt="Printed notebook collection"></div>
						<div class="tile short"><img src="https://images.unsplash.com/photo-1579762593175-20226054cad0?auto=format&fit=crop&w=900&q=80" alt="Framed artwork on wall"></div>
						<div class="tile short"><img src="https://images.unsplash.com/photo-1473448912268-2022ce9509d8?auto=format&fit=crop&w=900&q=80" alt="Art packaging and tags"></div>
					<?php endif; ?>
				</div>
			</div>
		</section>

		<section class="artists" id="info">
			<div class="container">
				<div class="section-head">
					<div>
						<h2 class="section-title">Gallery Info</h2>
						<p class="section-blurb">Shipping, framing, authenticity certificates, and collector support from first order to installation.</p>
					</div>
				</div>
				<div class="detail-grid">
					<article class="detail-card">
						<h3>Authenticity</h3>
						<p>Every numbered piece ships with a signed certificate and edition log entry.</p>
					</article>
					<article class="detail-card">
						<h3>Global Shipping</h3>
						<p>Secure packaging standards for domestic and international collectors.</p>
					</article>
					<article class="detail-card">
						<h3>Framing Partner</h3>
						<p>Premium frame options in maple, black oak, and museum-grade acrylic.</p>
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
