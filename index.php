<?php
// Davic-Mart Homes - Homepage
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';

$db = getDB();
$featuredRooms = $db->query("SELECT * FROM rooms WHERE featured = 1 AND is_visible = 1 ORDER BY price_per_night ASC")->fetchAll();
try {
    $galleryImages = $db->query("SELECT * FROM gallery WHERE is_visible = 1 ORDER BY sort_order ASC, created_at DESC")->fetchAll();
} catch (Exception $e) {
    $galleryImages = [];
}
$testimonials = [
    ['name' => 'Chioma O.', 'text' => 'My stay at Davic-Mart Homes was absolutely wonderful. The apartment was spotless, the staff was incredibly friendly, and the location is perfect. I highly recommend HOME 3!', 'rating' => 5, 'room' => 'Davic-Mart HOME 3'],
    ['name' => 'Emeka O.', 'text' => 'I booked HOME 2 for my family and we had an amazing time. The kitchen was fully equipped and the kids loved having two parlours. We will definitely be back!', 'rating' => 5, 'room' => 'Davic-Mart HOME 2'],
    ['name' => 'Tunde A.', 'text' => 'Great value for money. HOME 1 had everything I needed for my business trip. Fast WiFi, comfortable space, and excellent customer service.', 'rating' => 5, 'room' => 'Davic-Mart HOME 1'],
];

$pageTitle = 'Welcome';
$pageDescription = 'Discover your home away from home at Davic-Mart Homes. Cozy, modern shortlet apartments in Port Harcourt.';
?>
<?php require __DIR__ . '/includes/header.php'; ?>

<!-- Hero Section -->
<section class="hero-premium min-h-[85vh] flex items-center" style="background: linear-gradient(135deg, rgba(0,31,61,0.85) 0%, rgba(0,45,90,0.8) 50%, rgba(0,31,61,0.85) 100%), url('<?= SITE_URL ?>/images/IMG1.jpg') center/cover no-repeat;">
    <div class="relative z-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 w-full">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in-up">
                <span class="badge-outline text-xs tracking-wider uppercase mb-3 inline-block">Davic-Mart Homes</span>
                <h1 class="font-keano text-4xl sm:text-5xl lg:text-6xl text-white font-bold leading-tight mt-3">
                    Discover Your <span class="text-gradient">Home Away From Home</span>
                </h1>
                <p class="text-gray-300 text-lg mt-4 leading-relaxed max-w-xl">
                    Experience cozy, modern shortlet apartments in the heart of Port Harcourt. 
                    Premium comfort, affordable luxury, and a warm welcome await you.
                </p>
                <div class="flex flex-wrap gap-4 mt-8">
                    <a href="<?= SITE_URL ?>/rooms/" class="btn-primary text-base px-8 py-3">
                        View Our Rooms
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    <a href="<?= SITE_URL ?>/contact.php" class="btn-outline-light text-base px-8 py-3">
                        Contact Us
                    </a>
                </div>
                <div class="mt-10 glass p-4">
                    <form action="<?= SITE_URL ?>/booking/" method="GET" class="flex flex-col sm:flex-row gap-3 items-end">
                        <div class="flex-1 w-full">
                            <label class="text-xs text-gray-300 font-medium mb-1 block">Check-in</label>
                            <input type="date" name="check_in" id="hero-check-in" required 
                                   class="w-full px-4 py-2.5 bg-white rounded-lg text-navy-900 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500">
                        </div>
                        <div class="flex-1 w-full">
                            <label class="text-xs text-gray-300 font-medium mb-1 block">Check-out</label>
                            <input type="date" name="check_out" id="hero-check-out" required 
                                   class="w-full px-4 py-2.5 bg-white rounded-lg text-navy-900 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500">
                        </div>
                        <div class="w-full sm:w-auto flex gap-2">
                            <div class="flex-1 sm:flex-none">
                                <label class="text-xs text-gray-300 font-medium mb-1 block">Guests</label>
                                <select name="guests" class="w-full px-4 py-2.5 bg-white rounded-lg text-navy-900 text-sm focus:outline-none focus:ring-2 focus:ring-gold-500">
                                    <option value="1">1 Guest</option>
                                    <option value="2" selected>2 Guests</option>
                                    <option value="3">3 Guests</option>
                                    <option value="4">4 Guests</option>
                                </select>
                            </div>
                            <button type="submit" class="btn-primary px-6 py-2.5 mt-auto whitespace-nowrap">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
                                Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="hidden lg:block animate-fade-in animate-float">
                <div class="relative">
                    <div class="bg-gold-500/20 rounded-3xl p-6">
                        <div class="bg-navy-800/80 backdrop-blur-sm rounded-2xl p-8 space-y-6">
                            <div class="flex items-center space-x-4">
                                <div class="w-16 h-16 rounded-full bg-gold-500/20 flex items-center justify-center">
                                    <svg class="w-8 h-8 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/></svg>
                                </div>
                                <div>
                                    <p class="text-white text-xl font-bold"><?= count($featuredRooms) ?> Premium Rooms</p>
                                    <p class="text-gray-400 text-sm">Starting from <?= formatPrice(min(array_column($featuredRooms, 'price_per_night') ?: [25000])) ?>/night</p>
                                </div>
                            </div>
                            <div class="border-t border-navy-700 pt-6">
                                <div class="grid grid-cols-3 gap-4 text-center">
                                    <div>
                                        <p class="text-gold-500 text-2xl font-bold">Free</p>
                                        <p class="text-gray-400 text-xs">WiFi</p>
                                    </div>
                                    <div>
                                        <p class="text-gold-500 text-2xl font-bold">24/7</p>
                                        <p class="text-gray-400 text-xs">Security</p>
                                    </div>
                                    <div>
                                        <p class="text-gold-500 text-2xl font-bold">AC</p>
                                        <p class="text-gray-400 text-xs">Cooling</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Features Strip -->
<section class="bg-navy-800 border-y border-navy-700 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="feature-block feature-card">
                <div class="feature-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <span class="text-white text-sm font-medium">Verified & Trusted</span>
                </div>
            </div>
            <div class="feature-block feature-card">
                <div class="feature-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                </div>
                <div>
                    <span class="text-white text-sm font-medium">Flexible Booking</span>
                </div>
            </div>
            <div class="feature-block feature-card">
                <div class="feature-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                </div>
                <div>
                    <span class="text-white text-sm font-medium">24/7 Support</span>
                </div>
            </div>
            <div class="feature-block feature-card">
                <div class="feature-icon">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <div>
                    <span class="text-white text-sm font-medium">Prime Location</span>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider-premium"><span>Featured Accommodations</span></div>

<!-- Featured Rooms Section -->
<section class="py-16 sm:py-20 bg-cream-50 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-gold-500 font-semibold text-sm tracking-wider uppercase">Our Rooms</span>
            <h2 class="font-keano text-3xl sm:text-4xl text-navy-900 font-bold mt-2">Choose Your Perfect Stay</h2>
            <p class="text-gray-600 mt-3">Explore our range of cozy, well-appointed rooms designed for your comfort and relaxation.</p>
        </div>
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 stagger-children">
            <?php foreach ($featuredRooms as $i => $room): 
                $amenities = json_decode($room['amenities'], true) ?: [];
                $images = json_decode($room['images'], true) ?: [];
            ?>
            <div class="card-premium overflow-hidden group">
                <a href="<?= SITE_URL ?>/rooms/details.php?slug=<?= $room['slug'] ?>" class="block no-underline">
                <div class="relative overflow-hidden h-56">
                    <?php $firstImg = $images[0] ?? null; $imgUrl = $firstImg ? roomImageUrl($firstImg) : null; ?>
                    <?php if ($imgUrl): ?>
                    <img src="<?= $imgUrl ?>" alt="<?= escape($room['title']) ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                    <?php else: ?>
                    <div class="w-full h-full bg-gradient-to-br from-navy-700 to-navy-900 flex items-center justify-center">
                        <span class="text-gold-500 font-keano text-6xl opacity-30">DM</span>
                    </div>
                    <?php endif; ?>
                    <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    <span class="absolute top-3 right-3 badge-premium"><?= formatPrice($room['price_per_night']) ?>/night</span>
                    <div class="absolute bottom-3 left-3 right-3">
                        <h3 class="text-white font-semibold text-lg"><?= escape($room['title']) ?></h3>
                        <p class="text-gray-200 text-xs">Up to <?= $room['max_guests'] ?> guests</p>
                    </div>
                </div>
                </a>
                <div class="p-5">
                    <a href="<?= SITE_URL ?>/rooms/details.php?slug=<?= $room['slug'] ?>" class="no-underline">
                    <p class="text-gray-600 text-sm leading-relaxed line-clamp-2 hover:text-gold-600 transition-colors"><?= escape(truncate($room['description'], 120)) ?></p>
                    </a>
                    <div class="flex flex-wrap gap-2 mt-3">
                        <?php foreach (array_slice($amenities, 0, 4) as $amenity): ?>
                        <span class="badge-outline"><?= escape($amenity) ?></span>
                        <?php endforeach; ?>
                        <?php if (count($amenities) > 4): ?>
                        <span class="badge-outline">+<?= count($amenities) - 4 ?> more</span>
                        <?php endif; ?>
                    </div>
                    <div class="flex items-center justify-between mt-5 pt-4 border-t border-gray-100">
                        <div>
                            <span class="text-xs text-gray-500">Starting from</span>
                            <p class="text-navy-900 font-bold text-xl"><?= formatPrice($room['price_per_night'])?> <span class="text-xs text-gray-500 font-normal">/night</span></p>
                        </div>
                        <div class="flex gap-2">
                            <a href="<?= SITE_URL ?>/rooms/details.php?slug=<?= $room['slug'] ?>" class="btn-secondary text-sm px-4 py-2">Details</a>
                            <a href="<?= SITE_URL ?>/booking/?room_id=<?= $room['id'] ?>&step=dates" class="btn-primary text-sm px-4 py-2">Book Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-10">
            <a href="<?= SITE_URL ?>/rooms/" class="btn-secondary px-8 py-3">View All Rooms</a>
        </div>
    </div>
</section>

<div class="divider-premium"><span>Why Choose Us</span></div>

<!-- About Section -->
<section class="py-16 sm:py-20 bg-white animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="animate-fade-in-up">
                <span class="text-gold-500 font-semibold text-sm tracking-wider uppercase">About Us</span>
                <h2 class="font-keano text-3xl sm:text-4xl text-navy-900 font-bold mt-2">Welcome to Davic-Mart Homes</h2>
                <div class="w-20 h-1 bg-gold-500 rounded-full mt-4 mb-6"></div>
                <p class="text-gray-600 leading-relaxed mb-4">
                    At Davic-Mart Homes, we believe that every stay should feel like coming home. 
                    Located in the heart of Port Harcourt, we offer a range of beautifully appointed 
                    shortlet apartments designed for comfort, convenience, and affordability.
                </p>
                <p class="text-gray-600 leading-relaxed mb-6">
                    Whether you're visiting for business or leisure, our modern rooms, attentive service, 
                    and prime location in GRA make us the perfect choice for your stay in Rivers State.
                </p>
                <div class="grid grid-cols-3 gap-4 mb-6">
                    <div class="text-center p-4 bg-cream-50 rounded-xl">
                        <p class="text-gold-500 text-2xl font-bold font-keano">3+</p>
                        <p class="text-gray-600 text-sm">Premium Rooms</p>
                    </div>
                    <div class="text-center p-4 bg-cream-50 rounded-xl">
                        <p class="text-gold-500 text-2xl font-bold font-keano">50+</p>
                        <p class="text-gray-600 text-sm">Happy Guests</p>
                    </div>
                    <div class="text-center p-4 bg-cream-50 rounded-xl">
                        <p class="text-gold-500 text-2xl font-bold font-keano">24/7</p>
                        <p class="text-gray-600 text-sm">Support</p>
                    </div>
                </div>
                <a href="<?= SITE_URL ?>/contact.php" class="btn-primary px-6 py-3">Learn More About Us</a>
            </div>
            <div class="animate-on-scroll-right space-y-6">
                <div class="relative overflow-hidden rounded-3xl h-72 image-frame">
                    <img id="about-slideshow-img" src="<?= SITE_URL ?>/images/IMG5.jpg" alt="Davic-Mart Homes" class="w-full h-full object-cover" style="transition: opacity 0.8s ease;">
                    <div class="absolute inset-0 bg-gradient-to-t from-navy-900/40 to-transparent"></div>
                    <div class="absolute bottom-4 left-4 right-4">
                        <span class="badge-premium text-xs">Welcome to Davic-Mart Homes</span>
                    </div>
                </div>
                <div class="bg-navy-900 rounded-3xl p-8 text-white">
                    <h3 class="font-keano text-2xl font-bold text-gold-400 mb-6">Why Choose Us?</h3>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gold-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Prime Location:</strong> Situated in the prestigious GRA, Port Harcourt</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gold-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Modern Amenities:</strong> WiFi, AC, Smart TV, fully equipped kitchenettes</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gold-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Affordable Rates:</strong> Premium comfort at competitive prices</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gold-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>24/7 Security:</strong> Your safety is our top priority</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 text-gold-500 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                            <span><strong>Dedicated Support:</strong> Admin desk always ready to assist you</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="divider-premium"><span>Guest Reviews</span></div>

<!-- Testimonials -->
<section class="py-16 sm:py-20 bg-cream-50 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-gold-500 font-semibold text-sm tracking-wider uppercase">Testimonials</span>
            <h2 class="font-keano text-3xl sm:text-4xl text-navy-900 font-bold mt-2">What Our Guests Say</h2>
        </div>
        <div class="grid md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $j => $t): ?>
            <div class="card-premium p-6 animate-fade-in-up" style="animation-delay: <?= $j * 150 ?>ms">
                <div class="flex text-gold-500 mb-3">
                    <?php for ($k = 0; $k < $t['rating']; $k++): ?>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                    <?php endfor; ?>
                </div>
                <p class="text-gray-600 text-sm leading-relaxed italic">"<?= escape($t['text']) ?>"</p>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="font-semibold text-navy-900"><?= escape($t['name']) ?></p>
                    <p class="text-xs text-gray-500">Stayed in <?= $t['room'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<div class="divider-premium"><span>Our Gallery</span></div>

<!-- Gallery Section -->
<section class="py-16 sm:py-20 bg-white animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-2xl mx-auto mb-12">
            <span class="text-gold-500 font-semibold text-sm tracking-wider uppercase">Gallery</span>
            <h2 class="font-keano text-3xl sm:text-4xl text-navy-900 font-bold mt-2">Take a Look Around</h2>
            <p class="text-gray-600 mt-3">Peek inside Davic-Mart Homes and see what awaits you.</p>
        </div>
        <?php if (!empty($galleryImages)): ?>
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 stagger-children">
            <?php foreach ($galleryImages as $gi): ?>
            <a href="<?= SITE_URL ?>/<?= $gi['image_url'] ?>" target="_blank" class="group relative overflow-hidden rounded-2xl aspect-square bg-navy-900 block">
                <img src="<?= SITE_URL ?>/<?= $gi['image_url'] ?>" 
                     alt="<?= escape($gi['caption'] ?? 'Davic-Mart Homes') ?>"
                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                     loading="lazy">
                <div class="absolute inset-0 bg-gradient-to-t from-navy-900/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                <?php if ($gi['caption']): ?>
                <div class="absolute bottom-0 left-0 right-0 p-3 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                    <p class="text-white text-sm font-medium"><?= escape($gi['caption']) ?></p>
                </div>
                <?php endif; ?>
            </a>
            <?php endforeach; ?>
        </div>
        <?php else: ?>
        <div class="text-center py-12">
            <svg class="w-16 h-16 mx-auto text-gray-300 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <p class="text-gray-400">Gallery coming soon.</p>
        </div>
        <?php endif; ?>
    </div>
</section>

<div class="divider-premium"><span>Get In Touch</span></div>

<!-- Contact / CTA Section -->
<section class="py-16 sm:py-20 bg-navy-900 text-white animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div>
                <span class="text-gold-400 font-semibold text-sm tracking-wider uppercase">Get In Touch</span>
                <h2 class="font-keano text-3xl sm:text-4xl font-bold mt-2">We'd Love to Hear From You</h2>
                <p class="text-gray-300 mt-3 leading-relaxed">
                    Have questions about our rooms, booking, or need assistance? Our admin desk is always ready to help.
                </p>
                <div class="space-y-4 mt-8">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Phone</p>
                            <p class="font-medium"><?= CONTACT_PHONE ?></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Email</p>
                            <p class="font-medium"><?= CONTACT_EMAIL ?></p>
                        </div>
                    </div>
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-full bg-gold-500/20 flex items-center justify-center">
                            <svg class="w-5 h-5 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                        </div>
                        <div>
                            <p class="text-sm text-gray-400">Address</p>
                            <p class="font-medium"><?= CONTACT_ADDRESS ?></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="glass-dark p-8">
                <h3 class="text-xl font-bold mb-6">Send Us a Message</h3>
                <form id="landing-contact-form" action="<?= SITE_URL ?>/api/contact.php" method="POST" class="space-y-4">
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="form-label text-gray-300 text-xs">Your Name</label>
                            <input type="text" name="name" required class="w-full px-4 py-2.5 bg-white/20 border border-white/30 rounded-lg text-white text-sm placeholder-gray-400 focus:outline-none focus:bg-white/30 focus:border-gold-500">
                        </div>
                        <div>
                            <label class="form-label text-gray-300 text-xs">Your Email</label>
                            <input type="email" name="email" required class="w-full px-4 py-2.5 bg-white/20 border border-white/30 rounded-lg text-white text-sm placeholder-gray-400 focus:outline-none focus:bg-white/30 focus:border-gold-500">
                        </div>
                    </div>
                    <div>
                        <label class="form-label text-gray-300 text-xs">Subject</label>
                        <input type="text" name="subject" class="w-full px-4 py-2.5 bg-white/20 border border-white/30 rounded-lg text-white text-sm placeholder-gray-400 focus:outline-none focus:bg-white/30 focus:border-gold-500">
                    </div>
                    <div>
                        <label class="form-label text-gray-300 text-xs">Message</label>
                        <textarea name="message" rows="4" required class="w-full px-4 py-2.5 bg-white/20 border border-white/30 rounded-lg text-white text-sm placeholder-gray-400 focus:outline-none focus:bg-white/30 focus:border-gold-500"></textarea>
                    </div>
                    <button type="submit" class="btn-primary w-full justify-center py-3">Send Message</button>
                </form>
                <div id="landing-contact-result" class="mt-4"></div>
                <script>
                document.getElementById('landing-contact-form')?.addEventListener('submit', async function(e) {
                    e.preventDefault();
                    const btn = this.querySelector('button[type="submit"]');
                    const original = btn.innerHTML;
                    btn.innerHTML = 'Sending...';
                    btn.disabled = true;
                    const resultDiv = document.getElementById('landing-contact-result');
                    try {
                        const formData = new FormData(this);
                        const res = await fetch(this.action, { method: 'POST', body: new URLSearchParams(formData) });
                        const data = await res.json();
                        if (data.success) { this.reset(); resultDiv.innerHTML = '<div class="bg-green-500/20 text-green-300 p-3 rounded-lg text-sm">' + (data.message || 'Message sent!') + '</div>'; }
                        else { resultDiv.innerHTML = '<div class="bg-red-500/20 text-red-300 p-3 rounded-lg text-sm">' + (data.message || 'Error sending message.') + '</div>'; }
                    } catch(e) { resultDiv.innerHTML = '<div class="bg-red-500/20 text-red-300 p-3 rounded-lg text-sm">Network error. Please try again.</div>'; }
                    btn.innerHTML = original;
                    btn.disabled = false;
                });
                </script>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
