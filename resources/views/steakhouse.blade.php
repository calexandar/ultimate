<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KODIAK — Steakhouse, Seattle</title>
    <meta name="description" content="Fire. Knife. Bone. A steakhouse forged in the Pacific Northwest.">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;0,900;1,700&family=DM+Sans:opsz,wght@9..40,300;9..40,500;9..40,600;9..40,700&display=swap" rel="stylesheet">
    <meta property="og:title" content="KODIAK — Steakhouse, Seattle">
    <meta property="og:description" content="Fire. Knife. Bone. A steakhouse forged in the Pacific Northwest.">
    <meta property="og:type" content="website">
    <meta name="theme-color" content="#0A0A0A">
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' rx='4' fill='%230A0A0A'/><text x='16' y='22' font-size='18' text-anchor='middle' fill='%23C9A44A'>K</text></svg>">
    <link rel="preload" href="/video/Steak.mp4" as="video" type="video/mp4">
    @vite(['resources/css/app.css'])
    @livewireStyles
</head>
<body>

<nav class="fixed top-0 left-0 right-0 z-50 mix-blend-difference">
    <div class="max-w-7xl mx-auto px-6 lg:px-12 h-20 flex items-center justify-between">
        <a href="#" class="font-display text-xl text-warm tracking-wide">KODIAK</a>
        <div class="flex items-center gap-8">
            <a href="#cuts" class="nav-link text-xs text-warm/70 hover:text-warm tracking-widest uppercase transition-colors" aria-label="View the menu cuts section">The Cuts</a>
            <a href="#table" class="nav-link text-xs text-warm/70 hover:text-warm tracking-widest uppercase transition-colors" aria-label="Go to reservations section">Reserve</a>
        </div>
    </div>
</nav>

<section style="height: calc(1500px + 100vh);" class="relative w-full">
    <div class="sticky top-0 h-screen w-full overflow-hidden bg-ember" id="hero-container">

        <div id="hero-reveal" class="absolute inset-0 will-change-transform" style="clip-path: polygon(25% 25%, 75% 25%, 75% 75%, 25% 75%)">
            <video autoplay muted loop playsinline class="absolute inset-0 w-full h-full object-cover" id="hero-video" style="transform: scale(1.7)">
                <source src="/video/Steak.mp4" type="video/mp4">
            </video>
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="hero-glow"></div>
            <div class="hero-grain"></div>
        </div>

        <div class="relative z-10 h-screen flex items-center justify-center">
            <div class="text-center px-6 max-w-4xl mx-auto" id="hero-content">
                <p class="text-gold text-xs tracking-[0.25em] uppercase mb-8" id="hero-sub">Seattle · Since 2024</p>
                <h1 class="font-display text-5xl sm:text-7xl md:text-8xl lg:text-9xl font-black text-warm leading-[0.9] tracking-tight" id="hero-headline">
                    Fire.<br>
                    <span class="text-gold">Knife.</span><br>
                    Bone.
                </h1>
                <div class="flex justify-center mt-10" id="hero-line-wrap">
                    <div class="gold-line" id="hero-line"></div>
                </div>
                <p class="mt-8 text-sm md:text-base text-muted max-w-md mx-auto leading-relaxed" id="hero-desc">
                    A steakhouse forged in the Pacific Northwest. Dry-aged in-house,<br class="hidden md:block"> finished over live fire, and served without compromise.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-12" id="hero-ctas">
                    <a href="#table" class="btn-primary">
                        Reserve a Table
                        <svg width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M1 7h12M7 1l6 6-6 6" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                    <a href="#cuts" class="btn-outline">View the Cuts</a>
                </div>
            </div>
        </div>

        <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-20">
            <div class="flex flex-col items-center gap-2 text-muted/50">
                <span class="text-[10px] tracking-[0.2em] uppercase">Scroll</span>
                <svg width="16" height="24" viewBox="0 0 16 24" class="animate-bounce"><rect x="1" y="1" width="14" height="22" rx="7" stroke="currentColor" stroke-width="1.5" fill="none"/><circle cx="8" cy="8" r="2" fill="currentColor"/></svg>
            </div>
        </div>
    </div>
</section>

<section class="py-28 lg:py-36 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 md:gap-12">
            <div class="text-center reveal stat-cell">
                <div class="stat-number" data-target="10">0</div>
                <div class="stat-label">Years Aged Cheddar</div>
            </div>
            <div class="text-center reveal reveal-d1 stat-cell">
                <div class="stat-number" data-target="60">0</div>
                <div class="stat-label">Day Dry-Aged</div>
            </div>
            <div class="text-center reveal reveal-d2 stat-cell">
                <div class="stat-number" data-target="1800">0<span class="num-suffix">°</span></div>
                <div class="stat-label">Fire Temp</div>
            </div>
            <div class="text-center reveal reveal-d3 stat-cell">
                <div class="stat-number" data-target="32">0</div>
                <div class="stat-label">oz Tomahawk</div>
            </div>
        </div>
    </div>
</section>

<div class="section-divider max-w-7xl mx-auto"></div>

<section id="cuts" class="py-36 lg:py-52 px-6 texture-light relative overflow-hidden text-center mx-auto">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 font-display text-[40vw] font-black text-warm/[0.015] leading-none select-none pointer-events-none">K</div>
    <div class="max-w-full mx-auto">
        <div class="text-center mb-40">
            <p class="text-gold text-xs tracking-[0.25em] uppercase mb-4 reveal">From the Fire</p>
            <h2 class="font-display text-4xl md:text-5xl lg:text-6xl font-bold text-warm reveal reveal-d1">The Cuts</h2>
                <div class="flex justify-center mt-8 reveal reveal-d2">
                    <div class="gold-line gold-line-draw"></div>
                </div>
        </div>

        <div class="grid md:grid-cols-2 gap-x-12 gap-y-20 mx-auto">
                <div class="reveal">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Dry-Aged Ribeye</h3>
                        <span class="price-tag">$68</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">45-day dry-aged, marbled prime beef. Charred exterior, butter-soft center. 16oz.</p>
                </div>
                <div class="reveal reveal-d1">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Wagyu Striploin</h3>
                        <span class="price-tag">$94</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">A5 Japanese Wagyu, scored and seared over almond wood. 8oz.</p>
                </div>
                <div class="reveal reveal-d2">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Bone-In Tomahawk</h3>
                        <span class="price-tag">$120</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">32oz Prime ribeye on the bone. Built for two. Finished with smoked bone marrow butter.</p>
                </div>
                <div class="reveal reveal-d3">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Filet Mignon</h3>
                        <span class="price-tag">$56</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Center-cut tenderloin, wrapped in applewood bacon. 8oz of velvet texture.</p>
                </div>
                <div class="reveal reveal-d3">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Columbia River Salmon</h3>
                        <span class="price-tag">$48</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">King salmon, cedar-planked over open flame. Glazed with brown butter and honey.</p>
                </div>
                <div class="reveal reveal-d3">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Lamb Rack</h3>
                        <span class="price-tag">$72</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Colorado lamb, herb-crusted, roasted slow over mesquite. Served with mint gremolata.</p>
                </div>

                <div class="reveal">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Truffle Mashed Potatoes</h3>
                        <span class="price-tag">$16</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Yukon Gold potatoes, black truffle oil, aged parmesan.</p>
                </div>
                <div class="reveal reveal-d1">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Grilled Asparagus</h3>
                        <span class="price-tag">$14</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Charred over hardwood, lemon zest, shaved pecorino.</p>
                </div>
                <div class="reveal reveal-d2">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Creamed Spinach</h3>
                        <span class="price-tag">$14</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Slow-cooked with cream, garlic, and a touch of nutmeg.</p>
                </div>
                <div class="reveal reveal-d2">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Roasted Bone Marrow</h3>
                        <span class="price-tag">$22</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Parsley salad, toasted sourdough, flake sea salt.</p>
                </div>

                <div class="reveal">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Cabernet Sauvignon</h3>
                        <span class="price-tag">$28</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Napa Valley 2018. Full-bodied, cassis and oak.</p>
                </div>
                <div class="reveal reveal-d1">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Washington Malbec</h3>
                        <span class="price-tag">$18</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Bold dark fruit, smooth finish, Columbia Valley.</p>
                </div>
                <div class="reveal reveal-d2">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Old Fashioned</h3>
                        <span class="price-tag">$22</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Bulleit Rye, bitters, sugar, orange twist.</p>
                </div>
                <div class="reveal reveal-d2">
                    <div class="flex items-baseline justify-between mb-2">
                        <h3 class="font-display text-lg md:text-xl font-bold text-warm">Manhattan</h3>
                        <span class="price-tag">$24</span>
                    </div>
                    <p class="text-sm text-muted/70 leading-relaxed text-left">Woodford Reserve, sweet vermouth, cherry.</p>
                </div>
            </div>
    </div>
</section>

<div class="section-divider max-w-7xl mx-auto"></div>

<section id="table" class="py-28 lg:py-36 px-6">
    <div class="max-w-7xl mx-auto">
        <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
            <div>
                <p class="text-gold text-xs tracking-[0.25em] uppercase mb-4 reveal">Join Us</p>
                <h2 class="font-display text-4xl md:text-5xl font-bold text-warm leading-tight reveal reveal-d1">
                    The fire<br>
                    <span class="text-gold">is waiting.</span>
                </h2>
                <div class="mt-6 reveal reveal-d2">
                    <div class="gold-line gold-line-wide gold-line-draw"></div>
                </div>
                <p class="mt-6 text-sm text-muted leading-relaxed max-w-md reveal reveal-d2">
                    1423 Western Avenue, Seattle, WA 98101<br>
                    <span class="block mt-3">Sunday – Thursday: 5pm – 10pm<br>
                    Friday – Saturday: 5pm – 11pm</span>
                </p>
                <div class="mt-4 text-sm text-muted reveal reveal-d3">
                    <p>(206) 555–0142</p>
                </div>
                <div class="mt-10 reveal reveal-d4">
                    <livewire:reservation-form />
                </div>
            </div>
            <div class="reveal reveal-d2">
                <div class="aspect-[4/5] w-full bg-surface border border-edge overflow-hidden relative">
                    <div class="absolute inset-0 bg-gradient-to-br from-crimson/5 to-gold/5"></div>
                    <div class="flex items-center justify-center h-full px-8">
                        <div class="text-center">
                            <div class="font-display text-8xl text-gold/20 font-black leading-none">K</div>
                            <div class="mt-6 space-y-4 text-xs text-muted">
                                <p class="tracking-[0.2em] uppercase">Private Dining Available</p>
                                <p class="tracking-[0.2em] uppercase">Corkage Fee: $45</p>
                                <div class="border-t border-edge pt-4 mt-4">
                                    <p class="tracking-[0.15em] text-warm/60">"The best steak I've had on the West Coast."</p>
                                    <p class="text-gold text-[10px] tracking-[0.15em] uppercase mt-3">— Seattle Met</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="border-t border-edge py-12 px-6">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-6">
        <p class="font-display text-lg text-warm/40 foot-link">KODIAK</p>
        <p class="text-[11px] text-muted/50 tracking-[0.12em] uppercase">Fire. Knife. Bone.</p>
        <p class="text-[11px] text-muted/50 tracking-[0.1em] uppercase">© 2024 KODIAK Seattle</p>
    </div>
</footer>

<script>
(function () {
    var reveal = document.getElementById('hero-reveal');
    var video = document.getElementById('hero-video');
    var sub = document.getElementById('hero-sub');
    var headline = document.getElementById('hero-headline');
    var line = document.getElementById('hero-line');
    var desc = document.getElementById('hero-desc');
    var ctas = document.getElementById('hero-ctas');
    var scrollHeight = 1500;
    var ticking = false;

    var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) { e.target.classList.add('in'); }
        });
    }, { threshold: 0.15 });
    document.querySelectorAll('.reveal').forEach(function (el) { observer.observe(el); });
    document.querySelectorAll('.gold-line-draw').forEach(function (el) { observer.observe(el); });

    var counted = false;
    function countUp() {
        if (counted) return;
        var nums = document.querySelectorAll('.stat-number[data-target]');
        if (!nums.length || !document.querySelector('.stat-cell.reveal.in')) return;
        counted = true;
        nums.forEach(function (el) {
            var target = parseInt(el.getAttribute('data-target'), 10);
            var suffix = el.querySelector('.num-suffix');
            var duration = 1200;
            var start = performance.now();
            function tick(now) {
                var p = Math.min((now - start) / duration, 1);
                var eased = 1 - Math.pow(1 - p, 3);
                var current = Math.round(eased * target);
                el.childNodes[0].textContent = current;
                if (p < 1) requestAnimationFrame(tick);
                else { el.childNodes[0].textContent = target; }
            }
            requestAnimationFrame(tick);
        });
    }
    var countObserver = new IntersectionObserver(function (entries) {
        entries.forEach(function (e) {
            if (e.isIntersecting) { countUp(); countObserver.disconnect(); }
        });
    }, { threshold: 0.5 });
    var statsSection = document.querySelector('.stat-cell');
    if (statsSection) countObserver.observe(statsSection);

    function update() {
        var t = Math.min(window.scrollY / scrollHeight, 1);
        var s = 25 - 25 * t;
        var e = 75 + 25 * t;
        reveal.style.clipPath = 'polygon(' + s + '% ' + s + '%, ' + e + '% ' + s + '%, ' + e + '% ' + e + '%, ' + s + '% ' + e + '%)';
        var z = 1.7 - 0.7 * Math.min(window.scrollY / (scrollHeight + 500), 1);
        video.style.transform = 'scale(' + z + ')';

        var c = Math.min(t * 2.5, 1);
        sub.style.opacity = c;
        sub.style.transform = 'translateY(' + (12 - 12 * c) + 'px)';
        headline.style.opacity = Math.min(c * 1.5, 1);
        headline.style.transform = 'translateY(' + (20 - 20 * Math.min(c * 1.5, 1)) + 'px)';
        line.style.width = 60 * c + 'px';
        desc.style.opacity = Math.min(Math.max((c - 0.15) * 2, 0), 1);
        desc.style.transform = 'translateY(' + (12 - 12 * Math.min(Math.max((c - 0.15) * 2, 0), 1)) + 'px)';
        ctas.style.opacity = Math.min(Math.max((c - 0.25) * 2, 0), 1);
        ctas.style.transform = 'translateY(' + (16 - 16 * Math.min(Math.max((c - 0.25) * 2, 0), 1)) + 'px)';
        ticking = false;
    }

    window.addEventListener('scroll', function () { if (!ticking) { ticking = true; requestAnimationFrame(update); } }, { passive: true });
    update();
})();
</script>

@livewireScripts
</body>
</html>
