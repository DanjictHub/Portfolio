<?php
// Davic-Mart Homes - Contact Page
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
$pageTitle = 'Contact Us';
?>
<?php require __DIR__ . '/includes/header.php'; ?>

<section class="breadcrumb-section" style="background-image: url('<?= SITE_URL ?>/images/IMG1.jpg')">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full py-16 sm:py-20 text-center">
        <span class="inline-block text-xs tracking-wider uppercase mb-3 text-gold-400 font-semibold animate-fade-in-up">Get in Touch</span>
        <h1 class="font-keano text-3xl sm:text-4xl lg:text-5xl text-white font-bold animate-fade-in-up" style="animation-delay: 100ms">Contact Us</h1>
        <p class="text-gray-300 mt-3 max-w-xl mx-auto animate-fade-in-up" style="animation-delay: 200ms">We'd love to hear from you. Reach out to our admin desk for any inquiries.</p>
    </div>
</section>

<section class="py-16 bg-cream-50 animate-on-scroll">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid lg:grid-cols-2 gap-12">
            <div>
                <div class="card-premium p-8">
                    <h2 class="text-2xl font-bold text-navy-900 mb-6">Send Us a Message</h2>
                    <form id="contact-page-form" action="<?= SITE_URL ?>/api/contact.php" method="POST" class="space-y-4">
                        <div class="grid sm:grid-cols-2 gap-4">
                            <div>
                                <label class="form-label">Your Name *</label>
                                <input type="text" name="name" required class="form-input" placeholder="Firstname Surname">
                            </div>
                            <div>
                                <label class="form-label">Your Email *</label>
                                <input type="email" name="email" required class="form-input" placeholder="abcd@gmail.com">
                            </div>
                        </div>
                        <div>
                            <label class="form-label">Phone Number</label>
                            <input type="tel" name="phone" class="form-input" placeholder="08012345678">
                        </div>
                        <div>
                            <label class="form-label">Subject</label>
                            <input type="text" name="subject" class="form-input" placeholder="How can we help you?">
                        </div>
                        <div>
                            <label class="form-label">Message *</label>
                            <textarea name="message" rows="5" required class="form-input" placeholder="Tell us more about your inquiry..."></textarea>
                        </div>
                        <button type="submit" class="btn-primary w-full justify-center py-3">Send Message</button>
                    </form>
                    <div id="contact-page-result" class="mt-4"></div>
                    <script>
                    document.getElementById('contact-page-form')?.addEventListener('submit', async function(e) {
                        e.preventDefault();
                        const btn = this.querySelector('button[type="submit"]');
                        const original = btn.innerHTML;
                        btn.innerHTML = 'Sending...';
                        btn.disabled = true;
                        const resultDiv = document.getElementById('contact-page-result');
                        try {
                            const formData = new FormData(this);
                            const res = await fetch(this.action, { method: 'POST', body: new URLSearchParams(formData) });
                            const data = await res.json();
                            if (data.success) { this.reset(); resultDiv.innerHTML = '<div class="bg-green-100 text-green-800 p-4 rounded-xl text-sm font-medium">' + (data.message || 'Message sent!') + '</div>'; }
                            else { resultDiv.innerHTML = '<div class="bg-red-100 text-red-800 p-4 rounded-xl text-sm font-medium">' + (data.message || 'Error sending message.') + '</div>'; }
                        } catch(e) { resultDiv.innerHTML = '<div class="bg-red-100 text-red-800 p-4 rounded-xl text-sm font-medium">Network error. Please try again.</div>'; }
                        btn.innerHTML = original;
                        btn.disabled = false;
                    });
                    </script>
                </div>
            </div>
            <div>
                <div class="bg-navy-900 rounded-2xl p-8 text-white h-full">
                    <h2 class="text-2xl font-bold text-gold-400 mb-6">Contact Information</h2>
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-full bg-gold-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gold-400">Phone</h3>
                                <p class="text-gray-300 mt-1"><?= CONTACT_PHONE ?></p>
                                <p class="text-gray-400 text-sm mt-1">Available 24/7 for inquiries</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-full bg-gold-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gold-400">Email</h3>
                                <p class="text-gray-300 mt-1"><?= CONTACT_EMAIL ?></p>
                                <p class="text-gray-400 text-sm mt-1">We respond within 24 hours</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="w-12 h-12 rounded-full bg-gold-500/20 flex items-center justify-center flex-shrink-0">
                                <svg class="w-6 h-6 text-gold-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gold-400">Address</h3>
                                <p class="text-gray-300 mt-1"><?= CONTACT_ADDRESS ?></p>
                                <p class="text-gray-400 text-sm mt-1">Visit us during business hours</p>
                            </div>
                        </div>
                    </div>
                    <div class="mt-8 pt-6 border-t border-navy-700">
                        <h3 class="font-semibold text-gold-400 mb-4">Follow Us</h3>
                        <div class="flex space-x-3">
                            <a href="#" class="w-12 h-12 rounded-full bg-navy-800 flex items-center justify-center hover:bg-gold-500 hover:text-navy-900 transition-all duration-300 hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M18.77 7.46H14.5v-1.9c0-.9.6-1.1 1-1.1h3V.5h-4.33C10.24.5 9.35 3.24 9.35 5.47v1.99H6.73v4.08h2.62V24h5.15V11.62h3.47l.8-4.16z"/></svg>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-navy-800 flex items-center justify-center hover:bg-gold-500 hover:text-navy-900 transition-all duration-300 hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                            </a>
                            <a href="#" class="w-12 h-12 rounded-full bg-navy-800 flex items-center justify-center hover:bg-gold-500 hover:text-navy-900 transition-all duration-300 hover:scale-110">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Map / Location -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-10">
            <span class="text-gold-500 font-semibold text-sm tracking-wider uppercase">Find Us</span>
            <h2 class="font-keano text-3xl text-navy-900 font-bold mt-2">Our Location</h2>
        </div>
        <div class="bg-navy-900 rounded-2xl overflow-hidden image-frame">
            <div class="p-8 sm:p-12 text-center">
                <div class="w-16 h-16 mx-auto bg-gold-500/20 rounded-full flex items-center justify-center mb-4">
                    <svg class="w-8 h-8 text-gold-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                </div>
                <h3 class="text-white text-xl font-bold mb-2">Visit Our Location</h3>
                <p class="text-gray-300"><?= CONTACT_ADDRESS ?></p>
                <p class="text-gray-400 text-sm mt-2">Click the button below to get directions via Google Maps</p>
                <a href="https://maps.google.com/?q=<?= urlencode(CONTACT_ADDRESS) ?>" target="_blank" class="btn-primary inline-flex mt-6 px-8 py-3">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0021 18.382V7.618a1 1 0 00-.553-.894L15 4m0 13V4m0 0L9 7"/></svg>
                    Get Directions
                </a>
            </div>
        </div>
    </div>
</section>

<?php require __DIR__ . '/includes/footer.php'; ?>
