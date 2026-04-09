<?php
/**
 * Template Name: Reflexology for Menopause
 * Description: Specialist menopause reflexology page with hero, intro, benefits, testimonials, FAQ, and CTA
 */
get_header(); ?>

<style>
/* ============================================
   MENOPAUSE PAGE STYLES
   ============================================ */

/* Hero Section */
.meno-hero {
    position: relative;
    min-height: 420px;
    display: flex;
    align-items: center;
    justify-content: center;
    text-align: center;
    background: url('<?php echo content_url(); ?>/uploads/2021/04/3PC2080A-scaled.jpeg') center center / cover no-repeat;
    padding: 80px 20px;
}
.meno-hero::before {
    content: '';
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.70);
}
.meno-hero-content {
    position: relative;
    z-index: 1;
    max-width: 720px;
    margin: 0 auto;
}
.meno-hero-label {
    font-family: 'Mulish', sans-serif;
    font-size: 13px;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: rgba(255, 255, 255, 0.85);
    margin-bottom: 16px;
}
.meno-hero h1 {
    font-family: 'Cormorant Garamond', Georgia, serif;
    font-size: clamp(2.2rem, 5vw, 3.2rem);
    font-weight: 500;
    color: #fff;
    margin: 0 0 20px;
    line-height: 1.2;
}
.meno-hero-sub {
    font-family: 'Mulish', sans-serif;
    font-size: 1.1rem;
    color: rgba(255, 255, 255, 0.9);
    line-height: 1.7;
    max-width: 600px;
    margin: 0 auto;
}

/* Section defaults */
.meno-section {
    padding: 70px 20px;
}
.meno-section .meno-inner {
    max-width: 1100px;
    margin: 0 auto;
}
.meno-section h2 {
    font-family: 'Cormorant Garamond', Georgia, serif;
    font-size: clamp(1.8rem, 3.5vw, 2.4rem);
    font-weight: 500;
    color: #2c2c2c;
    margin: 0 0 24px;
    line-height: 1.25;
}
.meno-section h3 {
    font-family: 'Cormorant Garamond', Georgia, serif;
    font-size: 1.4rem;
    font-weight: 500;
    color: #2c2c2c;
    margin: 30px 0 16px;
}
.meno-section p, .meno-section li {
    font-family: 'Mulish', sans-serif;
    font-size: 1rem;
    color: #444;
    line-height: 1.8;
}

/* Two-column layout */
.meno-two-col {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 50px;
    align-items: center;
}
@media (max-width: 768px) {
    .meno-two-col {
        grid-template-columns: 1fr;
        gap: 30px;
    }
}
.meno-two-col img {
    width: 100%;
    height: auto;
    border-radius: 12px;
    box-shadow: 0 8px 30px rgba(0, 0, 0, 0.1);
}
.meno-text-60 {
    grid-template-columns: 3fr 2fr;
}
.meno-text-40 {
    grid-template-columns: 2fr 3fr;
}
@media (max-width: 768px) {
    .meno-text-60, .meno-text-40 {
        grid-template-columns: 1fr;
    }
}

/* Warm background sections */
.meno-warm {
    background-color: #F5EAE7;
}

/* Benefits list */
.meno-benefits {
    list-style: none;
    padding: 0;
    margin: 20px 0;
}
.meno-benefits li {
    padding: 8px 0 8px 28px;
    position: relative;
}
.meno-benefits li::before {
    content: '✦';
    position: absolute;
    left: 0;
    color: #C77D81;
    font-size: 14px;
}

/* Testimonials */
.meno-testimonials {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    margin-top: 40px;
}
@media (max-width: 768px) {
    .meno-testimonials {
        grid-template-columns: 1fr;
    }
}
.meno-testimonial-card {
    background: #fff;
    border-radius: 12px;
    padding: 32px 28px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.06);
    position: relative;
}
.meno-testimonial-card::before {
    content: '\201C';
    font-family: Georgia, serif;
    font-size: 4rem;
    color: #C77D81;
    opacity: 0.3;
    position: absolute;
    top: 8px;
    left: 20px;
    line-height: 1;
}
.meno-testimonial-card p {
    font-style: italic;
    margin: 0 0 16px;
    font-size: 0.95rem;
    color: #555;
}
.meno-testimonial-card .meno-testimonial-author {
    font-family: 'Mulish', sans-serif;
    font-weight: 700;
    font-style: normal;
    color: #2c2c2c;
    font-size: 0.9rem;
}

/* FAQ Accordion */
.meno-faq-item {
    border-bottom: 1px solid #e0d6d0;
    margin-bottom: 0;
}
.meno-faq-item:first-child {
    border-top: 1px solid #e0d6d0;
}
.meno-faq-question {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    cursor: pointer;
    background: none;
    border: none;
    width: 100%;
    text-align: left;
    font-family: 'Mulish', sans-serif;
    font-size: 1.05rem;
    font-weight: 600;
    color: #2c2c2c;
}
.meno-faq-question:hover {
    color: #C77D81;
}
.meno-faq-question::after {
    content: '+';
    font-size: 1.4rem;
    font-weight: 300;
    color: #C77D81;
    transition: transform 0.3s ease;
    flex-shrink: 0;
    margin-left: 16px;
}
.meno-faq-item.active .meno-faq-question::after {
    content: '−';
}
.meno-faq-answer {
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.3s ease, padding 0.3s ease;
}
.meno-faq-item.active .meno-faq-answer {
    max-height: 300px;
    padding-bottom: 20px;
}
.meno-faq-answer p {
    margin: 0;
    font-size: 0.95rem;
    color: #555;
}

/* CTA Section */
.meno-cta {
    background-color: #C77D81;
    text-align: center;
    padding: 70px 20px;
}
.meno-cta h2 {
    color: #fff;
}
.meno-cta p {
    color: rgba(255, 255, 255, 0.9);
    max-width: 550px;
    margin: 0 auto 30px;
}
.meno-cta-btn {
    display: inline-block;
    background: #fff;
    color: #C77D81;
    font-family: 'Mulish', sans-serif;
    font-weight: 700;
    font-size: 0.95rem;
    letter-spacing: 2px;
    text-transform: uppercase;
    text-decoration: none;
    padding: 16px 40px;
    border-radius: 4px;
    transition: all 0.3s ease;
}
.meno-cta-btn:hover {
    background: #2c2c2c;
    color: #fff;
}

/* Training section centered */
.meno-centered {
    text-align: center;
}
.meno-centered p {
    max-width: 700px;
    margin-left: auto;
    margin-right: auto;
}

/* Animations */
.meno-fade-in {
    opacity: 0;
    transform: translateY(25px);
    transition: opacity 0.7s ease, transform 0.7s ease;
}
.meno-fade-in.is-visible {
    opacity: 1;
    transform: translateY(0);
}
</style>

<!-- SECTION 1: Hero -->
<div class="meno-hero">
    <div class="meno-hero-content">
        <div class="meno-hero-label">Specialist Support</div>
        <h1>Reflexology for Menopause</h1>
        <p class="meno-hero-sub">Expert support for women navigating perimenopause and menopause, from a specialist-trained reflexologist in Berkhamsted.</p>
    </div>
</div>

<!-- SECTION 2: Introduction -->
<div class="meno-section meno-fade-in">
    <div class="meno-inner">
        <div class="meno-two-col meno-text-60">
            <div>
                <h2>You deserve to feel supported</h2>
                <p>Menopause is not an illness — it's a natural transition. But the symptoms can be overwhelming. Hot flushes, night sweats, brain fog, disrupted sleep, anxiety, joint pain, mood changes. Many women feel unsupported and unheard during this time.</p>
                <p><strong>I believe you deserve better.</strong></p>
                <p>I have completed specialist training in Menopause Reflexology under Sally Earlam and Women's Health Reflexology under Hagar Basis. These advanced techniques go beyond standard reflexology, specifically targeting the endocrine system and the hormonal pathways that are most affected during menopause.</p>
            </div>
            <div>
                <img src="<?php echo content_url(); ?>/uploads/2021/04/3PC2080A-scaled.jpeg" alt="Jenny Sumner providing reflexology treatment" />
            </div>
        </div>
    </div>
</div>

<!-- SECTION 3: How It Helps -->
<div class="meno-section meno-warm meno-fade-in">
    <div class="meno-inner">
        <h2>How reflexology supports you through menopause</h2>
        <p>Reflexology works by stimulating specific reflex points on the feet that correspond to the endocrine glands — the pituitary, thyroid, adrenals and ovaries. During menopause, these glands are working overtime to adjust to changing hormone levels. Reflexology supports this process by encouraging the body's own natural rebalancing.</p>

        <h3>What my clients experience</h3>
        <ul class="meno-benefits">
            <li>Reduced frequency and intensity of hot flushes and night sweats</li>
            <li>Better quality sleep</li>
            <li>Lower anxiety and improved mood</li>
            <li>Reduced joint pain and stiffness</li>
            <li>Improved mental clarity and reduced brain fog</li>
            <li>A greater sense of calm and emotional balance</li>
        </ul>
    </div>
</div>

<!-- SECTION 4: What to Expect -->
<div class="meno-section meno-fade-in">
    <div class="meno-inner">
        <div class="meno-two-col meno-text-40">
            <div>
                <img src="<?php echo content_url(); ?>/uploads/2021/04/2PC1981A-scaled.jpg" alt="Reflexology treatment at Berkhamsted Reflexology clinic" />
            </div>
            <div>
                <h2>What to expect from your treatment</h2>
                <p>Every treatment begins with a conversation. I want to understand where you are in your menopause journey, what symptoms are most affecting you, and what you hope to achieve. Your first session includes a full consultation — no two treatments are the same.</p>
                <p>During the treatment, you'll lie comfortably while I work through specific reflex points tailored to your needs. Most clients find the experience deeply relaxing. Many fall asleep. Sessions last approximately 45–60 minutes.</p>
                <p>I recommend an initial course of weekly treatments for 4–6 weeks to allow the cumulative benefits to build, followed by maintenance sessions every 2–4 weeks. However, even a single session can provide noticeable relief.</p>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 5: Testimonials -->
<div class="meno-section meno-warm meno-fade-in">
    <div class="meno-inner">
        <h2 style="text-align: center;">What my clients say</h2>
        <div class="meno-testimonials">
            <div class="meno-testimonial-card">
                <p>Jenni is the most incredible, caring and skilled reflexologist I have been to. Going through perimenopause and a neurodivergent diagnosis, Jenni's treatments feel essential for my wellbeing and relaxation.</p>
                <span class="meno-testimonial-author">— Caralyn D.</span>
            </div>
            <div class="meno-testimonial-card">
                <p>After a couple of sessions I have seen a massive improvement on my mood, sleep and cycles.</p>
                <span class="meno-testimonial-author">— Amy G.</span>
            </div>
            <div class="meno-testimonial-card">
                <p>Jenny has also helped me manage my cycle with lots of advice and information which has helped me understand why I feel the way I do.</p>
                <span class="meno-testimonial-author">— Liz C.</span>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 6: Training -->
<div class="meno-section meno-centered meno-fade-in">
    <div class="meno-inner">
        <h2>Specialist training in menopause reflexology</h2>
        <p>I trained in the Eunice Ingham method at The London School of Reflexology and hold a Level 3 qualification with full insurance. I am a proud member of the Association of Reflexologists.</p>
        <p>My specialist menopause and women's health training was completed under two of the leading practitioners in the field: Sally Earlam (Menopause Reflexology) and Hagar Basis (Women's Health Reflexology). This additional training equips me with advanced techniques specifically designed to support women through hormonal transitions.</p>
    </div>
</div>

<!-- SECTION 7: FAQ -->
<div class="meno-section meno-warm meno-fade-in">
    <div class="meno-inner" style="max-width: 800px;">
        <h2 style="text-align: center;">Frequently asked questions</h2>

        <div class="meno-faq-item">
            <button class="meno-faq-question" onclick="this.parentElement.classList.toggle('active')">Can reflexology help with hot flushes?</button>
            <div class="meno-faq-answer">
                <p>Many women experience a reduction in both the frequency and intensity of hot flushes after regular reflexology. The treatment works by supporting the endocrine system to rebalance hormone levels naturally.</p>
            </div>
        </div>

        <div class="meno-faq-item">
            <button class="meno-faq-question" onclick="this.parentElement.classList.toggle('active')">How many sessions will I need?</button>
            <div class="meno-faq-answer">
                <p>I typically recommend an initial course of 4–6 weekly sessions, followed by maintenance every 2–4 weeks. However, many women notice benefits after just one or two treatments.</p>
            </div>
        </div>

        <div class="meno-faq-item">
            <button class="meno-faq-question" onclick="this.parentElement.classList.toggle('active')">Is reflexology safe during menopause?</button>
            <div class="meno-faq-answer">
                <p>Absolutely. Reflexology is non-invasive and has no known side effects. It works alongside any HRT or medication you may be taking — it is not a replacement for medical treatment.</p>
            </div>
        </div>

        <div class="meno-faq-item">
            <button class="meno-faq-question" onclick="this.parentElement.classList.toggle('active')">Do I need a referral from my GP?</button>
            <div class="meno-faq-answer">
                <p>No. You can book directly. However, I'm happy to work alongside your GP or other healthcare providers.</p>
            </div>
        </div>
    </div>
</div>

<!-- SECTION 8: CTA -->
<div class="meno-cta">
    <div class="meno-inner">
        <h2>Ready to feel supported through menopause?</h2>
        <p>Book your appointment today. Your first session includes a full consultation so we can discuss your needs and create a treatment plan that works for you.</p>
        <a href="https://jennysumnerbookings.as.me/" target="_blank" class="meno-cta-btn">Book Your Appointment</a>
    </div>
</div>

<script>
// Fade-in animation
document.addEventListener('DOMContentLoaded', function() {
    var observer = new IntersectionObserver(function(entries) {
        entries.forEach(function(entry) {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
            }
        });
    }, { threshold: 0.1, rootMargin: '0px 0px -40px 0px' });

    document.querySelectorAll('.meno-fade-in').forEach(function(el) {
        observer.observe(el);
    });
});
</script>

<?php get_footer(); ?>
