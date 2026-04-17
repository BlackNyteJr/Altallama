<?php
declare(strict_types=1);

require_once __DIR__ . "/square-catalog.php";

$catalogData = square_catalog_fetch(100000);
$products = $catalogData["products"];
$catalogMessage = $catalogData["message"];
$categoryLinks = square_catalog_category_links($products);
$productsByCategory = square_catalog_group_by_category($products);
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Alta Llama | Store Product List</title>
	<meta name="description" content="Alta Llama store product list by category.">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,700;1,400;1,500&family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles.css">
</head>
<body id="site-top">
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
			</nav>
			<div class="actions">
				<div class="cart">1</div>
				<a class="book-btn" href="reservations.php">Book Now</a>
			</div>
		</div>
	</header>

	<main>
		<section class="container inner-hero" id="store-list-top">
			<p class="eyebrow">Store Product List</p>
			<h1>Shop By <span>Category</span></h1>
			<p class="lead">Browse every catalog item grouped by category. Click a category chip to jump directly to that section.</p>
			<?php if ($catalogMessage !== ""): ?>
				<p class="catalog-note"><?php echo square_catalog_escape($catalogMessage); ?></p>
			<?php endif; ?>
		</section>

		<div class="category-sticky-wrap" aria-label="Category filters">
			<div class="container">
				<div class="category-sticky-inner">
					<div class="category-chip-list category-chip-list-sticky">
					<?php foreach ($categoryLinks as $category): ?>
						<a class="category-chip" href="#<?php echo square_catalog_escape($category["slug"]); ?>"><?php echo square_catalog_escape($category["label"]); ?></a>
					<?php endforeach; ?>
					</div>
					<a class="back-top-arrow" href="#site-top" aria-label="Back to top">â†‘</a>
				</div>
			</div>
		</div>

		<?php if ($productsByCategory === []): ?>
			<section class="collection">
				<div class="container">
					<div class="detail-grid catalog-grid">
						<?php for ($placeholder = 1; $placeholder <= 8; $placeholder++): ?>
							<article class="detail-card catalog-card placeholder-card" aria-label="Placeholder catalog item">
								<div class="catalog-image placeholder-image" aria-hidden="true"></div>
								<h3>Catalog Item Placeholder</h3>
								<p>Product details will appear here when your catalog feed is connected.</p>
								<p class="catalog-price">--.--</p>
								<span class="btn" aria-disabled="true">Coming Soon</span>
							</article>
						<?php endfor; ?>
					</div>
				</div>
			</section>
		<?php else: ?>
			<?php foreach ($categoryLinks as $category): ?>
				<?php
				$label = (string) $category["label"];
				$slug = (string) $category["slug"];
				$categoryProducts = $productsByCategory[$label] ?? [];
				?>
				<section class="collection supply-category" id="<?php echo square_catalog_escape($slug); ?>">
					<div class="container">
						<div class="section-head">
							<div>
								<h2 class="section-title"><?php echo square_catalog_escape($label); ?></h2>
								<p class="section-blurb"><?php echo (string) count($categoryProducts); ?> product(s)</p>
							</div>
							<a class="view-link" href="#store-list-top">Back to Categories</a>
						</div>
						<div class="detail-grid catalog-grid">
							<?php foreach ($categoryProducts as $product): ?>
								<article class="detail-card catalog-card">
									<img class="catalog-image" src="<?php echo square_catalog_escape((string) ($product["image_url"] ?? "")); ?>" alt="<?php echo square_catalog_escape((string) ($product["name"] ?? "Product")); ?>">
									<h3><?php echo square_catalog_escape((string) ($product["name"] ?? "Catalog Item")); ?></h3>
									<p><?php echo square_catalog_escape((string) ($product["description"] ?? "")); ?></p>
									<p class="catalog-price"><?php echo square_catalog_escape((string) ($product["price"] ?? "Price on request")); ?></p>
									<a class="btn" href="reservations.php#request">Request Purchase</a>
								</article>
							<?php endforeach; ?>
						</div>
					</div>
				</section>
			<?php endforeach; ?>
		<?php endif; ?>
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



