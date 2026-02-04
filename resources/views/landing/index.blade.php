<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>{{ config('app.name', 'Laravel') }} - Find popular restaurants, real reviews</title>
	<link rel="stylesheet" href="{{ asset('landing/assets/css/main.css') }}">
	<noscript><link rel="stylesheet" href="{{ asset('landing/assets/css/noscript.css') }}"></noscript>
	<style>
		/* Fullscreen video hero - override Landed #banner dark overlay */
		.hero-video#banner:before,
		.hero-video#banner:after {
			display: none !important;
		}
		.hero-video {
			position: relative;
			width: 100%;
			height: 100vh;
			min-height: 90vh;
			overflow: hidden;
			background: #1a1a1a;
			background-image: none;
		}
		.hero-video__media {
			position: absolute;
			top: 50%;
			left: 50%;
			min-width: 100%;
			min-height: 100%;
			width: auto;
			height: auto;
			transform: translate(-50%, -50%);
			object-fit: cover;
			z-index: 0;
			transition: opacity 0.9s ease;
			opacity: 0;
			/* ใช้ไฟล์ 1920x1080, 5Mbps, H.264, 24fps – ดู public/assets/video/EXPORT_SPECS.txt */
		}
		.hero-video__overlay {
			position: absolute;
			inset: 0;
			background: linear-gradient(to bottom, rgba(0,0,0,0.18) 0%, rgba(0,0,0,0.12) 50%, rgba(0,0,0,0.28) 100%);
			z-index: 1;
		}
		.hero-video__links { margin-top: 1rem; }
		.hero-video__links a { color: rgba(255,255,255,0.95); text-decoration: none; font-size: 0.9rem; margin: 0 0.75rem; text-shadow: 0 1px 4px rgba(0,0,0,0.4); }
		.hero-video__links a:hover { text-decoration: underline; }
		.hero-video__content {
			position: relative;
			z-index: 2;
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100%;
			padding: 2rem 1rem;
			text-align: center;
		}
		.hero-video__content h1 {
			color: #fff;
			font-size: clamp(2rem, 5vw, 3.5rem);
			font-weight: 700;
			margin-bottom: 0.75rem;
			line-height: 1.2;
			text-shadow: 0 2px 8px rgba(0,0,0,0.6), 0 0 20px rgba(0,0,0,0.4);
		}
		.hero-video__content .hero-video__subtitle {
			color: rgba(255,255,255,0.95);
			font-size: clamp(0.95rem, 2vw, 1.2rem);
			margin-bottom: 2rem;
			text-shadow: 0 1px 6px rgba(0,0,0,0.6), 0 0 12px rgba(0,0,0,0.3);
		}
		.hero-video__search {
			display: flex;
			flex-wrap: wrap;
			gap: 0.5rem;
			justify-content: center;
			max-width: 560px;
			width: 100%;
		}
		.hero-video__search input {
			flex: 1;
			min-width: 200px;
			padding: 0.85rem 1.25rem;
			border: none;
			border-radius: 6px;
			font-size: 1rem;
			box-shadow: 0 2px 12px rgba(0,0,0,0.2);
		}
		.hero-video__search button {
			padding: 0.85rem 1.5rem;
			border: none;
			border-radius: 6px;
			background: #e44c65;
			color: #fff;
			font-size: 1rem;
			font-weight: 600;
			cursor: pointer;
			box-shadow: 0 2px 12px rgba(0,0,0,0.2);
			white-space: nowrap;
		}
		.hero-video__search button:hover {
			background: #c93d54;
		}
		/* เลื่อนลงแล้วแต่ละ box ขยับเข้า */
		.animate-on-scroll {
			opacity: 0;
			transform: translateY(28px);
			transition: opacity 0.55s ease-out, transform 0.55s ease-out;
		}
		.animate-on-scroll.in-view {
			opacity: 1;
			transform: translateY(0);
		}
		.box.alt .row .animate-on-scroll:nth-child(1) { transition-delay: 0.05s; }
		.box.alt .row .animate-on-scroll:nth-child(2) { transition-delay: 0.1s; }
		.box.alt .row .animate-on-scroll:nth-child(3) { transition-delay: 0.15s; }
		.box.alt .row .animate-on-scroll:nth-child(4) { transition-delay: 0.2s; }
		.box.alt .row .animate-on-scroll:nth-child(5) { transition-delay: 0.25s; }
		.box.alt .row .animate-on-scroll:nth-child(6) { transition-delay: 0.3s; }
		@media (max-width: 480px) {
			.hero-video__search { flex-direction: column; }
			.hero-video__search input { min-width: 100%; }
		}
	</style>
</head>
<body class="is-preload landing">
		<div id="page-wrapper">

			<!-- Header -->
				<header id="header">
					<h1 id="logo"><a href="{{ url('/') }}">Foods</a></h1>
					<nav id="nav">
						<ul>
							<li><a href="{{ url('/') }}">Home</a></li>
							<li><a href="{{ url('/search') }}">Restaurants</a></li>
							<li><a href="{{ url('/search') }}?tab=dishes">Dishes</a></li>
							<li><a href="#three">Ingredients</a></li>
							<li><a href="{{ url('/login') }}">Log in</a></li>
							<li><a href="{{ url('/register') }}" class="button primary">Sign Up</a></li>
						</ul>
					</nav>
				</header>

			<!-- Hero: fullscreen video background (สุ่มเล่นทั้ง 4 ต่อกัน) -->
				<section id="banner" class="hero-video">
					<video
						class="hero-video__media"
						autoplay
						muted
						playsinline
						preload="metadata"
						poster="{{ asset('landing/images/banner.jpg') }}"
						aria-label="Background video"
					>
						<source src="" type="video/mp4">
					</video>
					<script>
						(function() {
							var urls = ["{{ asset('assets/video/1.mp4') }}","{{ asset('assets/video/2.mp4') }}","{{ asset('assets/video/3.mp4') }}","{{ asset('assets/video/4.mp4') }}"];
							var video = document.currentScript.previousElementSibling;
							var source = video && video.querySelector('source');
							if (!source) return;
							function next() {
								source.src = urls[Math.floor(Math.random() * 4)];
								video.load();
								video.addEventListener('canplay', function go() {
									video.removeEventListener('canplay', go);
									video.style.opacity = '1';
									video.play();
								});
							}
							video.addEventListener('ended', function() { video.style.opacity = '0'; });
							video.addEventListener('transitionend', function(e) {
								if (e.propertyName !== 'opacity' || video.style.opacity !== '0') return;
								next();
								video.style.opacity = '1';
							});
							next();
						})();
					</script>
					<div class="hero-video__overlay" aria-hidden="true"></div>
					<div class="hero-video__content">
						<h1>Discover great food near you</h1>
						<p class="hero-video__subtitle">Real reviews • Real locations • Smart ingredients</p>
						<div class="hero-video__search">
							<input type="text" placeholder="Search dishes, restaurants, or areas…" aria-label="Search">
							<button type="button">Explore</button>
						</div>
						<div class="hero-video__links">
							<a href="{{ url('/search') }}">Explore nearby</a>
							<a href="#four">Add a restaurant</a>
						</div>
					</div>
					<a href="#one" class="goto-next scrolly">Next</a>
				</section>

			<!-- One -->
				<section id="one" class="spotlight style1 bottom animate-on-scroll">
					<span class="image fit main"><img src="{{ asset('landing/images/pic02.jpg') }}" alt="" /></span>
					<div class="content">
						<div class="container">
							<div class="row">
								<div class="col-4 col-12-medium">
									<header>
										<h2>Search by dish, not just by place</h2>
										<p>Find trending dishes and the best spots near you.</p>
									</header>
								</div>
								<div class="col-4 col-12-medium">
									<p>Type ramen, pad thai, burger—then filter by rating, distance, and open hours. We focus on food first, so you discover what to eat faster.</p>
								</div>
								<div class="col-4 col-12-medium">
									<p>Every place includes map location, photos, menus, and community reviews—so you can decide confidently before you go.</p>
								</div>
							</div>
						</div>
					</div>
					<a href="#two" class="goto-next scrolly">Next</a>
				</section>

			<!-- Two -->
				<section id="two" class="spotlight style2 right animate-on-scroll">
					<span class="image fit main"><img src="{{ asset('landing/images/pic03.jpg') }}" alt="" /></span>
					<div class="content">
						<header>
							<h2>Real locations you can trust</h2>
							<p>Accurate pins, hours, and contact info.</p>
						</header>
						<p>We pull location details from reliable sources and keep them reviewable by the community. See what's open now and what's worth the trip.</p>
						<ul class="actions">
							<li><a href="{{ url('/search') }}" class="button">Browse restaurants</a></li>
						</ul>
					</div>
					<a href="#three" class="goto-next scrolly">Next</a>
				</section>

			<!-- Three -->
				<section id="three" class="spotlight style3 left animate-on-scroll">
					<span class="image fit main bottom"><img src="{{ asset('landing/images/pic04.jpg') }}" alt="" /></span>
					<div class="content">
						<header>
							<h2>Know what's inside the dish</h2>
							<p>AI ingredient breakdown (coming soon)</p>
						</header>
						<p>We'll analyze dish descriptions and photos to suggest ingredients and allergens—then later you can order ingredients in one click.</p>
						<ul class="actions">
							<li><a href="#four" class="button">See ingredients</a></li>
						</ul>
					</div>
					<a href="#four" class="goto-next scrolly">Next</a>
				</section>

			<!-- Four -->
				<section id="four" class="wrapper style1 special fade-up">
					<div class="container">
						<header class="major animate-on-scroll">
							<h2>Built for food discovery</h2>
							<p>Reviews, maps, and ingredient intelligence—designed for how people choose food.</p>
						</header>
						<div class="box alt">
							<div class="row gtr-uniform">
								<section class="col-4 col-6-medium col-12-xsmall animate-on-scroll">
									<span class="icon solid alt major fa-chart-area"></span>
									<h3>Dish-first search</h3>
									<p>Search by menus and dishes, not only business names.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall animate-on-scroll">
									<span class="icon solid alt major fa-comment"></span>
									<h3>Photo reviews</h3>
									<p>See what people actually ate—real photos, real ratings.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall animate-on-scroll">
									<span class="icon solid alt major fa-flask"></span>
									<h3>Map &amp; open-now</h3>
									<p>Distance, directions, and open hours you can rely on.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall animate-on-scroll">
									<span class="icon solid alt major fa-paper-plane"></span>
									<h3>Helpful votes</h3>
									<p>Surface the most useful reviews from the community.</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall animate-on-scroll">
									<span class="icon solid alt major fa-file"></span>
									<h3>Ingredient insights</h3>
									<p>Suggested ingredients + allergens (beta/coming soon).</p>
								</section>
								<section class="col-4 col-6-medium col-12-xsmall animate-on-scroll">
									<span class="icon solid alt major fa-lock"></span>
									<h3>Order ingredients later</h3>
									<p>Future marketplace: add ingredients to cart in one click.</p>
								</section>
							</div>
						</div>
						<footer class="major">
							<ul class="actions special">
								<li><a href="#" class="button">Explore key features</a></li>
							</ul>
						</footer>
					</div>
				</section>

			<!-- Five -->
				<section id="five" class="wrapper style2 special fade animate-on-scroll">
					<div class="container">
						<header>
							<h2>Get early access to What People Actually Eat</h2>
							<p>Discover dishes first — real photos, real reviews, and ingredient insights.</p>
						</header>
						<form method="post" action="#" class="cta">
							<div class="row gtr-uniform gtr-50">
								<div class="col-8 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Email for early access" /></div>
								<div class="col-4 col-12-xsmall"><input type="submit" value="Join the waitlist" class="fit primary" /></div>
							</div>
						</form>
					</div>
				</section>

			<!-- Footer -->
				<footer id="footer">
					<ul class="icons">
						<li><a href="#" class="icon brands alt fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="#" class="icon brands alt fa-facebook-f"><span class="label">Facebook</span></a></li>
						<li><a href="#" class="icon brands alt fa-linkedin-in"><span class="label">LinkedIn</span></a></li>
						<li><a href="#" class="icon brands alt fa-instagram"><span class="label">Instagram</span></a></li>
						<li><a href="#" class="icon brands alt fa-github"><span class="label">GitHub</span></a></li>
						<li><a href="#" class="icon solid alt fa-envelope"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; ETTH. All rights reserved.</li>
						<li>Design: <a href="#" rel="nofollow">Thathundol</a></li>
					</ul>
				</footer>

		</div>

		<!-- Scripts -->
			<script src="{{ asset('landing/assets/js/jquery.min.js') }}"></script>
			<script src="{{ asset('landing/assets/js/jquery.scrolly.min.js') }}"></script>
			<script src="{{ asset('landing/assets/js/jquery.dropotron.min.js') }}"></script>
			<script src="{{ asset('landing/assets/js/jquery.scrollex.min.js') }}"></script>
			<script src="{{ asset('landing/assets/js/browser.min.js') }}"></script>
			<script src="{{ asset('landing/assets/js/breakpoints.min.js') }}"></script>
			<script src="{{ asset('landing/assets/js/util.js') }}"></script>
			<script src="{{ asset('landing/assets/js/main.js') }}"></script>
			<script>
				(function() {
					var els = document.querySelectorAll('.animate-on-scroll');
					if (!els.length) return;
					var observer = new IntersectionObserver(function(entries) {
						entries.forEach(function(e) {
							if (e.isIntersecting) e.target.classList.add('in-view');
						});
					}, { rootMargin: '0px 0px -60px 0px', threshold: 0.1 });
					els.forEach(function(el) { observer.observe(el); });
				})();
			</script>

	</body>
</html>