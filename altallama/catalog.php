<?php
declare(strict_types=1);

require_once __DIR__ . "/square-catalog.php";

$currentPage = isset($_GET["page"]) ? (int) $_GET["page"] : 1;
if ($currentPage < 1) {
	$currentPage = 1;
}

$itemsPerPage = 24;
$catalogData = square_catalog_fetch(100000);
$allProducts = $catalogData["products"];
$totalItems = count($allProducts);
$totalPages = max(1, (int) ceil($totalItems / $itemsPerPage));

if ($currentPage > $totalPages) {
	$currentPage = $totalPages;
}

$offset = ($currentPage - 1) * $itemsPerPage;
$products = array_slice($allProducts, $offset, $itemsPerPage);
$catalogMessage = $catalogData["message"];
$hasProducts = $totalItems > 0;

function catalog_page_url(int $page): string
{
	$params = $_GET;
	$params["page"] = $page;

	return "catalog.php?" . http_build_query($params) . "#checkout";
}

function catalog_visible_pages(int $currentPage, int $totalPages, int $maxVisible = 4): array
{
	if ($totalPages <= 0) {
		return [];
	}

	$maxVisible = max(1, $maxVisible);
	$startPage = max(1, $currentPage - (int) floor($maxVisible / 2));
	$endPage = min($totalPages, $startPage + $maxVisible - 1);
	$startPage = max(1, $endPage - $maxVisible + 1);

	$pages = [];
	for ($page = $startPage; $page <= $endPage; $page++) {
		$pages[] = $page;
	}

	return $pages;
}

$visiblePages = catalog_visible_pages($currentPage, $totalPages, 4);
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
		<section class="container inner-hero">
			<p class="eyebrow">Shop</p>
			<h1>Studio <span>Catalog</span></h1>
			<p class="lead">Products are loaded from your latest catalog import (CSV) with Square as backup.</p>
		</section>
		<section class="collection" id="checkout">
			<div class="container">
				<?php if ($catalogMessage !== ""): ?>
					<p class="catalog-note"><?php echo square_catalog_escape($catalogMessage); ?></p>
				<?php endif; ?>

				<?php if ($hasProducts): ?>
					<div class="catalog-pagination" aria-label="Catalog pagination top">
						<p class="catalog-page-status">
							Page <?php echo (string) $currentPage; ?> of <?php echo (string) $totalPages; ?>
						</p>
						<div class="catalog-page-links">
							<?php if ($currentPage > 1): ?>
								<a class="catalog-page-btn" href="<?php echo square_catalog_escape(catalog_page_url($currentPage - 1)); ?>">Previous</a>
							<?php endif; ?>

							<?php foreach ($visiblePages as $page): ?>
								<?php if ($page === $currentPage): ?>
									<span class="catalog-page-btn is-active"><?php echo (string) $page; ?></span>
								<?php else: ?>
									<a class="catalog-page-btn" href="<?php echo square_catalog_escape(catalog_page_url($page)); ?>"><?php echo (string) $page; ?></a>
								<?php endif; ?>
							<?php endforeach; ?>

							<?php if ($currentPage < $totalPages): ?>
								<a class="catalog-page-btn" href="<?php echo square_catalog_escape(catalog_page_url($currentPage + 1)); ?>">Next</a>
							<?php endif; ?>
						</div>
					</div>
				<?php else: ?>
					<p class="catalog-note">Catalog preview mode: placeholder cards are shown until products are available.</p>
				<?php endif; ?>

				<div class="detail-grid catalog-grid">
					<?php if ($hasProducts): ?>
						<?php foreach ($products as $product): ?>
							<article class="detail-card catalog-card">
								<img class="catalog-image" src="<?php echo square_catalog_escape($product["image_url"]); ?>" alt="<?php echo square_catalog_escape($product["name"]); ?>">
								<h3><?php echo square_catalog_escape($product["name"]); ?></h3>
								<p><?php echo square_catalog_escape($product["description"]); ?></p>
								<p class="catalog-price"><?php echo square_catalog_escape($product["price"]); ?></p>
								<a class="btn" href="reservations.php#request">Request Purchase</a>
							</article>
						<?php endforeach; ?>
					<?php else: ?>
						<?php for ($placeholder = 1; $placeholder <= 8; $placeholder++): ?>
							<article class="detail-card catalog-card placeholder-card" aria-label="Placeholder catalog item">
								<div class="catalog-image placeholder-image" aria-hidden="true"></div>
								<h3>Catalog Item Placeholder</h3>
								<p>Product details will appear here when your catalog feed is connected.</p>
								<p class="catalog-price">--.--</p>
								<span class="btn" aria-disabled="true">Coming Soon</span>
							</article>
						<?php endfor; ?>
					<?php endif; ?>
				</div>

				<?php if ($hasProducts): ?>
					<div class="catalog-pagination" aria-label="Catalog pagination bottom">
						<p class="catalog-page-status">
							Page <?php echo (string) $currentPage; ?> of <?php echo (string) $totalPages; ?>
						</p>
						<div class="catalog-page-links">
							<?php if ($currentPage > 1): ?>
								<a class="catalog-page-btn" href="<?php echo square_catalog_escape(catalog_page_url($currentPage - 1)); ?>">Previous</a>
							<?php endif; ?>

							<?php foreach ($visiblePages as $page): ?>
								<?php if ($page === $currentPage): ?>
									<span class="catalog-page-btn is-active"><?php echo (string) $page; ?></span>
								<?php else: ?>
									<a class="catalog-page-btn" href="<?php echo square_catalog_escape(catalog_page_url($page)); ?>"><?php echo (string) $page; ?></a>
								<?php endif; ?>
							<?php endforeach; ?>

							<?php if ($currentPage < $totalPages): ?>
								<a class="catalog-page-btn" href="<?php echo square_catalog_escape(catalog_page_url($currentPage + 1)); ?>">Next</a>
							<?php endif; ?>
						</div>
					</div>
				<?php endif; ?>
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



