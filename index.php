<?php
$pageTitle = 'Rango — Handmade Resin Jewelry';
$year = date('Y');
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="description" content="Rango — handmade resin jewelry and botanical keepsakes inspired by nature.">
<meta name="theme-color" content="#3f2018">
<title><?= htmlspecialchars($pageTitle) ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Great+Vibes&family=Playfair+Display:ital,wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="noise"></div>
<div class="page-loader" id="pageLoader"><div class="loader-mark">Rango</div><span>little treasures, loading…</span></div>
<div class="topbar"><span>Handcrafted with love</span><i>✦</i><span>Free delivery on orders over Rs. 3,000</span><i>✦</i><span>Small-batch & one of a kind</span></div>

<header class="header" id="siteHeader">
  <a href="#home" class="logo magnetic">Rango</a>
  <nav class="desktop-nav">
    <a class="active" href="#shop">SHOP</a><a href="#about">OUR STORY</a><a href="#custom">CUSTOM</a><a href="#contact">CONTACT</a>
  </nav>
  <div class="header-actions">
    <button class="icon-btn magnetic" id="searchToggle" aria-label="Search">⌕</button>
    <button class="bag-btn magnetic" id="cartBtn" aria-label="Shopping bag"><span>♡</span><b id="cartCount">0</b></button>
    <button class="hamburger" id="menuBtn" aria-label="Open menu"><span></span><span></span></button>
  </div>
</header>
<div class="search-panel" id="searchPanel"><div><span>SEARCH RANGO</span><button id="closeSearch">×</button></div><input id="searchInput" type="search" placeholder="Find your little treasure…" autocomplete="off"><small>Try “ring”, “daisy”, “necklace” or a color</small></div>
<div class="mobile-menu" id="mobileMenu"><a href="#shop">SHOP <span>01</span></a><a href="#about">OUR STORY <span>02</span></a><a href="#custom">CUSTOM <span>03</span></a><a href="#contact">CONTACT <span>04</span></a></div>

<main id="home">
<section class="hero section-reveal">
  <div class="hero-orbit orbit-one"></div><div class="hero-orbit orbit-two"></div>
  <div class="hero-copy">
    <p class="eyebrow reveal-item"><span></span> HANDMADE • ONE OF A KIND</p>
    <h1 class="hero-title"><span>Nature,</span> <span>captured</span><br><span>in <i>little</i></span> <span><i>treasures.</i></span></h1>
    <p class="hero-description reveal-item">Real flowers, preserved in resin and transformed into tiny keepsakes you can wear, carry and keep close.</p>
    <div class="hero-actions reveal-item"><a class="hero-btn magnetic" href="#shop"><span>Explore the collection</span><b>↗</b></a><a class="text-link" href="#about">Discover Rango <span>↓</span></a></div>
    <div class="hero-meta reveal-item"><span><b>12</b> original pieces</span><span><b>100%</b> handmade</span></div>
  </div>
  <div class="hero-gallery">
    <div class="hero-glow"></div>
    <div class="hero-main parallax-card" data-speed="0.08"><img src="images/84abb8238907f78d913f58f4db1b680b.jpg" alt="Rango lavender floral earrings"><span class="image-stamp">BOTANICAL<br>NO. 08</span></div>
    <div class="hero-small parallax-card" data-speed="0.12"><img src="images/e7d05f88b9de1fa7a50ac1fa7bf34c21.jpg" alt="Rango botanical pendant"></div>
    <div class="hero-note"><span>✿</span><strong>real flowers<br>forever</strong></div>
    <div class="scroll-cue"><span></span> SCROLL TO EXPLORE</div>
  </div>
</section>

<section class="marquee"><div class="marquee-track"><span>HANDMADE WITH LOVE</span><i>✦</i><span>REAL BOTANICALS</span><i>✦</i><span>ONE OF A KIND</span><i>✦</i><span>MADE IN SMALL BATCHES</span><i>✦</i><span>HANDMADE WITH LOVE</span><i>✦</i><span>REAL BOTANICALS</span><i>✦</i></div></section>

<section class="collection" id="shop">
  <div class="collection-head section-reveal"><div><p class="eyebrow"><span></span> THE COLLECTION</p><h2>Little things,<br><i>worth keeping.</i></h2><p class="italic-sub">Handcrafted pieces, each capturing a unique moment in nature.</p></div><div class="collection-tools"><div class="result-count"><b id="resultCount">12</b> pieces</div><select id="sortSelect"><option value="featured">Featured</option><option value="low">Price: Low to High</option><option value="high">Price: High to Low</option><option value="name">Name A–Z</option></select></div></div>
  <div class="filters section-reveal" id="filters"><button class="filter active" data-cat="All">All <small>12</small></button><button class="filter" data-cat="Rings">Rings</button><button class="filter" data-cat="Earrings">Earrings</button><button class="filter" data-cat="Necklaces">Necklaces</button><button class="filter" data-cat="Bracelets">Bracelets</button><button class="filter" data-cat="Keychains">Keychains</button><button class="filter" data-cat="Accessories">Accessories</button></div>
  <div class="products" id="products"></div>
</section>

<section class="editorial section-reveal" id="about">
  <div class="editorial-image"><img src="images/d582c409b11379012bd4f62ed843c709.jpg" alt="Rango floral bracelet"><span>01 / 03</span></div>
  <div class="editorial-copy"><p class="eyebrow"><span></span> A LITTLE ABOUT RANGO</p><h2>Made slowly.<br><i>Meant to be kept.</i></h2><p>Rango began with a love for tiny things that feel special. We preserve real flowers inside clear resin and turn them into wearable keepsakes.</p><p>Every piece is handmade in small batches, so little differences are part of its charm — no two pieces are ever exactly alike.</p><a href="#contact" class="under-link">Get to know us <b>↗</b></a><div class="editorial-sign">Rango <small>est. 2026</small></div></div>
</section>

<section class="promise section-reveal"><div class="promise-intro"><p class="eyebrow"><span></span> THE RANGO PROMISE</p><h2>Small details.<br><i>Big feeling.</i></h2></div><div class="promise-grid"><div><span>✿</span><strong>Real botanicals</strong><p>Pressed flowers & leaves</p></div><div><span>♡</span><strong>Made by hand</strong><p>Small-batch craftsmanship</p></div><div><span>✦</span><strong>Gift ready</strong><p>Beautifully packed with care</p></div><div><span>∞</span><strong>One of a kind</strong><p>Every piece is unique</p></div></div></section>

<section class="custom section-reveal" id="custom"><div class="custom-decoration">✦</div><div><p class="eyebrow light"><span></span> MAKE IT PERSONAL</p><h2>Have a flower or idea<br>you want to <i>keep forever?</i></h2><p>Tell us what you have in mind and we'll create a special piece around it.</p></div><button class="outline-light magnetic" id="customBtn">Request a custom piece <span>↗</span></button></section>

<section class="contact section-reveal" id="contact"><div class="contact-heading"><p class="eyebrow"><span></span> LET'S BE FRIENDS</p><h2>Stay close<br>to <i>Rango.</i></h2></div><div class="contact-side"><p>New drops, pretty pieces and little surprises — straight to your inbox.</p><form id="newsletter"><div><input type="email" id="email" placeholder="Your email address" required><button type="submit" aria-label="Join newsletter">↗</button></div><small>By joining, you agree to receive occasional Rango updates.</small></form></div></section>
</main>

<footer><div class="footer-top"><div><div class="footer-logo">Rango</div><p>Handmade treasures inspired by nature.</p></div><div class="footer-links"><a href="#shop">Shop</a><a href="#about">Our Story</a><a href="#custom">Custom</a><a href="#contact">Contact</a></div><div class="footer-social"><span>Follow along</span><a href="#">Instagram ↗</a></div></div><div class="footer-bottom"><span>© <?= $year ?> Rango</span><span>Made with ♡ for little things</span><span>Pakistan</span></div></footer>

<aside class="drawer" id="drawer"><div class="drawer-head"><div><p class="eyebrow"><span></span> YOUR BAG</p><h2>Little treasures</h2></div><button id="closeCart">×</button></div><div class="cart-items" id="cartItems"></div><div class="empty" id="emptyCart">Your bag is empty ♡<br><a href="#shop">Find a little treasure</a></div><div class="cart-footer" id="cartFooter"><div class="free-bar"><span id="freeBar"></span></div><small id="freeText">Free delivery on orders over Rs. 3,000</small><div class="cart-total"><span>Subtotal</span><strong id="subtotal">Rs. 0</strong></div><small>Demo checkout — no real payment is processed.</small><button class="dark-btn magnetic" id="checkoutBtn">Continue to checkout <span>↗</span></button></div></aside><div class="backdrop" id="backdrop"></div>

<div class="modal" id="productModal"><div class="modal-box product-box"><button class="x" data-close="productModal">×</button><div id="productDetail"></div></div></div>
<div class="modal" id="checkoutModal"><div class="modal-box form-box"><button class="x" data-close="checkoutModal">×</button><p class="eyebrow"><span></span> CHECKOUT</p><h2>Complete your order</h2><form id="checkoutForm"><div class="two"><label>Name<input name="name" required></label><label>Phone<input name="phone" required></label></div><label>Email<input type="email" name="email" required></label><label>Address<textarea name="address" rows="3" required></textarea></label><label>City<input name="city" required></label><label>Payment<select name="payment"><option>Cash on Delivery</option><option>Bank Transfer</option></select></label><div id="checkoutSummary" class="summary"></div><button class="dark-btn" type="submit">Place order <span>♡</span></button></form></div></div>
<div class="modal" id="customModal"><div class="modal-box form-box"><button class="x" data-close="customModal">×</button><p class="eyebrow"><span></span> CUSTOM ORDER</p><h2>Your idea,<br><i>your piece.</i></h2><form id="customForm"><label>Name<input name="name" required></label><label>Phone / WhatsApp<input name="phone" required></label><label>Tell us your idea<textarea name="idea" rows="5" placeholder="Flower, color, shape, occasion…" required></textarea></label><button class="dark-btn" type="submit">Send request <span>↗</span></button></form></div></div>
<div class="toast" id="toast"></div><button class="back-top" id="backTop" aria-label="Back to top">↑</button>
<script>window.RANGO_PHP=true;</script><script src="script.js"></script>
</body></html>
