<?php
declare(strict_types=1);

require_once __DIR__ . "/square-catalog.php";

$catalogData = square_catalog_fetch(24);
$products = $catalogData["products"];
$catalogMessage = $catalogData["message"];
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Catalog</title>
	<meta name="description" content="Alta Llama catalog for gallery products, apparel, and prints.">
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
			<p class="eyebrow">Shop</p>
			<h1>Studio <span>Catalog</span></h1>
			<p class="lead">Live products loaded from your Square catalog. Add items in Square and they appear here automatically.</p>
		</section>
		<section class="collection" id="checkout">
			<div class="container">
				<?php if ($catalogMessage !== ""): ?>
					<p class="catalog-note"><?php echo square_catalog_escape($catalogMessage); ?></p>
				<?php endif; ?>

				<div class="detail-grid catalog-grid">
					<?php foreach ($products as $product): ?>
						<article class="detail-card catalog-card">
							<img class="catalog-image" src="<?php echo square_catalog_escape($product["image_url"]); ?>" alt="<?php echo square_catalog_escape($product["name"]); ?>">
							<h3><?php echo square_catalog_escape($product["name"]); ?></h3>
							<p><?php echo square_catalog_escape($product["description"]); ?></p>
							<p class="catalog-price"><?php echo square_catalog_escape($product["price"]); ?></p>
							<a class="btn" href="reservations.php#request">Request Purchase</a>
						</article>
					<?php endforeach; ?>
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
